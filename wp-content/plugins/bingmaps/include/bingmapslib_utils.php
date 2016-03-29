<?php
/* 
Description: General Utilities Code
 
Copyright 2012 Malcolm Shergold

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

if (!class_exists('BingMapsLibUtilsClass')) 
{
	class BingMapsLibUtilsClass // Define class
	{
		static function GetSiteID()
		{
			$siteURL = get_option('siteurl');
			$slashPosn = strrpos($siteURL, '/');
			$siteURL = substr($siteURL, $slashPosn+1);
			
			return $siteURL;			
		}
		
		static function GetHTTPElement($reqArray, $elementId)
		{
			// HTTP escapes ', " and / 
			// This function will return the array element with escape sequences removed
			return stripslashes(self::GetArrayElement($reqArray, $elementId));
		}
		
		static function GetArrayElement($reqArray, $elementId, $defaultValue = '')
		{
			// Get an element from the array ... if it exists
			if (!is_array($reqArray)) 
			return $defaultValue;
			if (!array_key_exists($elementId, $reqArray)) 
			return $defaultValue;	
			return $reqArray[$elementId];
		}
		
		static function isNewVersion($ourVersion, $serverVersion, $debug=false)
		{
			// Compare version numbers - format N1.N2.N3 .... etc.
			$ourVersionVals = split('\.', $ourVersion);
			$serverVersionVals = split('\.', $serverVersion);
			if ($debug) echo "Compare Versions ($ourVersion , $serverVersion)<br>\n";					
			for ($i=0; $i<max(count($ourVersionVals),count($serverVersionVals)); $i++)
			{
				$ourVersionVal = isset($ourVersionVals[$i]) ? (int)$ourVersionVals[$i] : 0;
				$serverVersionVal = isset($serverVersionVals[$i]) ? (int)$serverVersionVals[$i] : 0;
				if ($serverVersionVal > $ourVersionVal)
				{
					if ($debug) echo "serverVersionVal > ourVersionVal ($serverVersionVal > $ourVersionVal)- Exit TRUE<br>\n";					
					return true;
				}
				if ($serverVersionVal < $ourVersionVal)
				{
					if ($debug) echo "serverVersionVal < ourVersionVal ($serverVersionVal < $ourVersionVal) - Exit FALSE<br>\n";					
					return false;
				}
				if ($debug) echo "serverVersionVal = ourVersionVal ($serverVersionVal = $ourVersionVal) - Continue<br>\n";
			}
			if ($debug) echo "serverVersionVal = ourVersionVal ($ourVersion = $serverVersion) - Exit FALSE<br>\n";					
			return false;
		}
		
		static function recurse_copy($src, $dst, $perm=0755)
		{
			$dir = opendir($src);
			@mkdir($dst, $perm, TRUE);
			while(false !== ( $file = readdir($dir)) )
			{
				if ( $file == '.' ) continue;
				if ( $file == '..' ) continue;
				if ( $file == 'Thumbs.db' ) continue;
				if ( is_dir($src . '/' . $file) )
				{
					self::recurse_copy($src . '/' . $file, $dst . '/' . $file);
				}
				else 
				{
					copy($src . '/' . $file, $dst . '/' . $file);
				}
			}
			closedir($dir);
		}
		
		static function deleteDir($dir)
		{
			if (substr($dir, strlen($dir)-1, 1) != '/')
				$dir .= '/';
			// echo $dir;
			if ($handle = opendir($dir))
			{
				while ($obj = readdir($handle))
				{
					if ($obj != '.' && $obj != '..')
					{
						if (is_dir($dir.$obj))
						{
							if (!self::deleteDir($dir.$obj))
								return false;
						}
						elseif (is_file($dir.$obj))
						{
							if (!unlink($dir.$obj))
								return false;
						}
					}
				}
				closedir($handle);
				if (!@rmdir($dir))
					return false;
				return true;
			}
			return false;
		}
		
		static function check_admin_referer($action = -1, $query_arg = '_wpnonce')
		{
			if (!wp_verify_nonce($_REQUEST[$query_arg], $action))
			{
				echo "NOnce check failed - Call Stack Follows:<br>\n";
				BingMapsLibUtilsClass::ShowCallStack();
			}
			return check_admin_referer($action, $query_arg);
		}
		
		static function Output_Javascript_SetFocus($elementId, $inScript = false)
		{
			if (!$inScript)
				echo '
<script type="text/javascript">
	<!--
';
			echo '
	function setInitialFocus()
	{
     document.getElementById("'.$elementId.'").focus();
	}
	window.onload = setInitialFocus;
';
			if (!$inScript)
				echo '
						
// -->
</script>
';
		}

		static function ShowCallStack($echoOut = true)
		{
			$lineBreak = $echoOut ? "<br>\n" : "\n";
			
			ob_start();		
			debug_print_backtrace();			
			$callStack = ob_get_contents();
			ob_end_clean();

			$callStack = preg_split('/#[0-9]+[ ]+/', $callStack, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			
			// Set once this function has been "seen"
			$showEntry = false;
			
			ob_start();		
			echo $lineBreak."Callstack:".$lineBreak;
			
			foreach ($callStack as $fncall)
			{
				// Separate Function Parameters
				$fields1 = explode('(', $fncall, 2);
				if (count($fields1) > 1)
				{
					// Separate Filename and Line No
					$fields2 = explode(' called at ', $fields1[1]);
				}
				
				if (strpos($fncall,'->ShowCallStack('))
				{
					$showEntry = true;
					continue;
				}
					
				if (!$showEntry)
					continue;
					
				echo $fields1[0].'()';
				
				if (count($fields2) > 1)
				{
					$fileName = basename(str_replace('[', '', str_replace(']', '', $fields2[1])));
					echo ' - '.$fileName;
/*					
					if (adminOptions['cbCallStackParams'])
						echo "    Params: ".$fields2[0]."\n";
*/
				}
								
				//echo $lineBreak;
			}
			
			$rtnVal = ob_get_contents();
			ob_end_clean();
			
			$rtnVal = str_replace("\n","<br>\n",$rtnVal);
			
			if ($echoOut) echo $rtnVal;
			
			return $rtnVal;
		}		
		
		static function UndefinedFuncCallError($classObj, $funcName)
		{
			$classId = get_class($classObj);
			BingMapsLibUtilsClass::ShowCallStack();
			echo "<strong><br>function $funcName() must be defined in $classId class<br></strong>\n";
			die;
		}
		
		static function print_r($obj, $name='', $return = false)
		{
			$rtnVal = "<br>";
			if ($name !== '') $rtnVal .= "$name<br>\n";
			$rtnVal .= str_replace("\n", "<br>\n", print_r($obj, true));
			//$rtnVal .= "<br>\n";
			
			if (!$return) echo $rtnVal;
			
			return $rtnVal;
		}
		
		static function print_r_nocontent($obj, $name='')
		{
			echo "<br>";
			if ($name !== '') echo "$name<br>\n";
			foreach ($obj as $key => $value)
			{
				echo "object->$key";
				self::print_element($value);
				echo "<br>\n";
			}
			echo "<br>\n";
		}
		
		static function print_element($obj, $spaces = '')
		{
			$spaces .= '..';
			if (!is_array($obj))
			{
				echo "=$obj";
				return;
			}
			echo " <strong>(Array)</strong>";
			
			foreach ($obj as $key => $value)
			{
				echo "\n<br>".$spaces.'['.$key.'] => '."\n";
				//self::print_element($value, $spaces.'..');
			}
		}
		
		static function DeleteFile($filePath)
		{
			if (!file_exists($filePath))
				return;
								
			try 
			{
				//throw exception if can't move the file
				chmod($filePath, 0666);
				unlink($filePath);
			}
			catch (Exception $e)
			{
			}
		}
	}
}

?>