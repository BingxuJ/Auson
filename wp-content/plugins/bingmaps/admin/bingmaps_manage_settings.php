<?php
/* 
Description: Code for Managing BingMaps Settings
 
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

include BINGMAPS_INCLUDE_PATH.'bingmapslib_admin.php';

if (!class_exists('BingMapsSettingsAdminListClass')) 
{
	define('BINGMAPS_KEY_TEXTLEN',80);
	define('BINGMAPS_KEY_EDITLEN',80);

	define('BINGMAPS_PX_TEXTLEN',7);
	define('BINGMAPS_PX_EDITLEN',6);
	define('BINGMAPS_WIDTH_DEFAULT',400);
	define('BINGMAPS_HEIGHT_DEFAULT',400);

	define('BINGMAPS_ZOOM_TEXTLEN',3);
	define('BINGMAPS_ZOOM_EDITLEN',2);
	define('BINGMAPS_ZOOM_DEFAULT',14);

	define('BINGMAPS_ADMINMAIL_EDITLEN', 60);

	class BingMapsSettingsAdminListClass extends BingMapsLibAdminListClass // Define class
	{		
		function __construct($env) //constructor
		{	
			// Call base constructor
			parent::__construct($env, true);
			
			$this->HeadersPosn = BingMapsLibTableClass::HEADERPOSN_TOP;
		}
		
		function GetTableID($result)
		{
			return "BingMaps-settings";
		}
		
		function GetRecordID($result)
		{
			return '';
		}
		
		function GetMainRowsDefinition()
		{
			$this->isTabbedOutput = true;
			
			$rowDefs = array(			
				array(self::TABLEPARAM_LABEL => 'General',    self::TABLEPARAM_ID => 'bingmaps-settings-tab', ),
			);
			
			return $rowDefs;
		}		
		
		function GetDetailsRowsDefinition()
		{
			$pluginID = basename(dirname(dirname(__FILE__)));	// Library files should be in 'include' folder			
			$UploadImagesPath = WP_CONTENT_DIR . '/uploads/'.$pluginID.'/images';
			
			// Locale information is defined at http://msdn.microsoft.com/en-us/library/gg427600.aspx
			
			$localeDefs = array(
				array('locale'=>'Czech Republic',  'lang'=>'Czech',              'mkt'=>'cs-CZ', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Denmark',         'lang'=>'Danish',             'mkt'=>'da-DK', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Belgium',         'lang'=>'Dutch',              'mkt'=>'nl-BE', 'mapctrl'=>true,  'dirnmod'=>false),
				array('locale'=>'Netherlands',     'lang'=>'Dutch',              'mkt'=>'nl-NL', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Australia',       'lang'=>'English',            'mkt'=>'en-AU', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Canada',          'lang'=>'English',            'mkt'=>'en-CA', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'India',           'lang'=>'English',            'mkt'=>'en-IN', 'mapctrl'=>true,  'dirnmod'=>false),
				array('locale'=>'United Kingdom',  'lang'=>'English',            'mkt'=>'en-GB', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'United States',   'lang'=>'English',            'mkt'=>'en-US', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Finland',         'lang'=>'Finnish',            'mkt'=>'fi-FI', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Canada',          'lang'=>'French',             'mkt'=>'fr-CA', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'France',          'lang'=>'French',             'mkt'=>'fr-FR', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Germany',         'lang'=>'German',             'mkt'=>'de-DE', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Italy',           'lang'=>'Italian',            'mkt'=>'it-IT', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Japan',           'lang'=>'Japanese',           'mkt'=>'ja-JP', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Norway',          'lang'=>'Norwegian (Bokmal)', 'mkt'=>'nb-NO', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Brazil',          'lang'=>'Portuguese',         'mkt'=>'pt-BR', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Portugal',        'lang'=>'Portuguese',         'mkt'=>'pt-PT', 'mapctrl'=>false, 'dirnmod'=>true),
				array('locale'=>'Mexico',          'lang'=>'Spanish',            'mkt'=>'es-MX', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Spain',           'lang'=>'Spanish',            'mkt'=>'es-ES', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'United States',   'lang'=>'Spanish',            'mkt'=>'es-US', 'mapctrl'=>true,  'dirnmod'=>true),
				array('locale'=>'Sweden',          'lang'=>'Swedish',            'mkt'=>'sv-SE', 'mapctrl'=>false, 'dirnmod'=>false),
			);
						
			$localesList = array();
			foreach ($localeDefs as $localeDef)
			{
				$index = count($localesList);
				$localesList[$index] = $localeDef['mkt'] .'|' . $localeDef['locale'];
			}
			
			$rowDefs = array(
				array(self::TABLEPARAM_LABEL => 'Bing Maps Key',      self::TABLEPARAM_ID => 'BingMapsKey',          self::TABLEPARAM_TYPE => self::TABLEENTRY_TEXT,     self::TABLEPARAM_LEN => BINGMAPS_KEY_TEXTLEN,        self::TABLEPARAM_SIZE => BINGMAPS_KEY_EDITLEN, ),
				array(self::TABLEPARAM_LABEL => 'Default Map Width',  self::TABLEPARAM_ID => 'BingMapDefWidth',      self::TABLEPARAM_TYPE => self::TABLEENTRY_TEXT,     self::TABLEPARAM_DEFAULT => BINGMAPS_WIDTH_DEFAULT,  self::TABLEPARAM_LEN => BINGMAPS_PX_TEXTLEN,    self::TABLEPARAM_SIZE => BINGMAPS_PX_EDITLEN, ),
				array(self::TABLEPARAM_LABEL => 'Default Map Height', self::TABLEPARAM_ID => 'BingMapDefHeight',     self::TABLEPARAM_TYPE => self::TABLEENTRY_TEXT,     self::TABLEPARAM_DEFAULT => BINGMAPS_HEIGHT_DEFAULT, self::TABLEPARAM_LEN => BINGMAPS_PX_TEXTLEN,    self::TABLEPARAM_SIZE => BINGMAPS_PX_EDITLEN, ),
				array(self::TABLEPARAM_LABEL => 'Default Zoom',       self::TABLEPARAM_ID => 'BingMapDefZoom',       self::TABLEPARAM_TYPE => self::TABLEENTRY_TEXT,     self::TABLEPARAM_DEFAULT => BINGMAPS_ZOOM_DEFAULT,   self::TABLEPARAM_LEN => BINGMAPS_ZOOM_TEXTLEN,  self::TABLEPARAM_SIZE => BINGMAPS_ZOOM_EDITLEN, ),
				array(self::TABLEPARAM_LABEL => 'Locale',             self::TABLEPARAM_ID => 'BingMapLocale',        self::TABLEPARAM_TYPE => self::TABLEENTRY_SELECT,   self::TABLEPARAM_ITEMS => $localesList,         self::TABLEPARAM_DEFAULT => 'en-GB', ),
			);
		
			$rowDefs = $this->MergeSettings(parent::GetDetailsRowsDefinition(), $rowDefs);
			return $rowDefs;
		}
	}
}
		
if (!class_exists('BingMapsSettingsAdminClass')) 
{
	class BingMapsSettingsAdminClass extends BingMapsLibSettingsAdminClass // Define class
	{		
		function __construct($env)
		{
			$this->pageTitle = 'Settings';
			
			$classId = $this->GetAdminListClass();
			$this->adminListObj = new $classId($env);			
			
			// Call base constructor
			parent::__construct($env);
		}
		
		function ProcessActionButtons()
		{
			$myDBaseObj = $this->myDBaseObj;
			
			if (isset($_POST['savebutton']))
			{
				BingMapsLibUtilsClass::check_admin_referer(plugin_basename($this->caller)); // check nonce created by wp_nonce_field()
				
				$SettingsUpdateMsg = '';
				
				if ($SettingsUpdateMsg === '')
				{
					$this->SaveSettings($myDBaseObj);
					
					echo '<div id="message" class="bingmaps-updated">'.__('Settings have been saved.', $this->myDomain).'</div>';
				}
				else
				{
					echo '<div id="message" class="bingmaps-error">'.$SettingsUpdateMsg.'</div>';
					echo '<div id="message" class="bingmaps-error">'.__('Settings have NOT been saved.', $this->myDomain).'</div>';
				}
			}
		}
		
		function Output_MainPage($updateFailed)
		{
			$myPluginObj = $this->myPluginObj;
			$myDBaseObj = $this->myDBaseObj;				
			
			// Settings HTML Output - Start 
?>
	<div class="bingmaps-admin-form">
	<form method="post">
<?php

			$this->WPNonceField();
			
			// Get setting as stdClass object
			$results = $myDBaseObj->GetAllSettingsList();
			if (count($results) == 0)
			{
				echo "<div class='noconfig'>" . __('No Settings Configured', $this->myDomain) . "</div>\n";
			}
			else
			{
				$this->adminListObj->OutputList($results, $updateFailed);
			}
			
			if (count($results) > 0)
				$this->OutputButton("savebutton", "Save Changes", "button-primary");
?>
	</form>
	</div>
<?php			
		}
		
		function GetAdminListClass()
		{
			return 'BingMapsSettingsAdminListClass';			
		}
		
	}
}
		

?>