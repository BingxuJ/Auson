<?php

/*
Plugin Name: Bing Maps
Plugin URI: http://wordpress.org/extend/plugins/bingmaps/
Description: Adds a Bing Maps image to a web page
Author: Malcolm Shergold
Version: 0.3
Author URI: http://www.corondeck.co.uk
*/

include 'include/bingmapslib_dbase_api.php';  
    
if (!class_exists('BingMapsDBaseClass')) 
{
	global $wpdb;
	
	class BingMapsDBaseClass extends BingMapsLibDBaseClass
	{
		var $adminOptions;
		
		function __construct() 
		{
			// Call base constructor
			$opts = array (
				'PluginFolder'       => plugin_basename(dirname(__FILE__)),
				'CfgOptionsID'       => 'bingmapssettings',
			);	
			
			//$this->emailObj = new BingMapsLibHTMLEMailAPIClass($this);
					
			parent::__construct($opts);
		}

	    function upgradeDB()
	    {
		}
		
	}
}

$siteurl = get_option('siteurl');
	
if (!class_exists('BingMapsPluginClass')) 
{
	define('BINGMAPS_FILE_PATH', dirname(__FILE__).'/');
	define('BINGMAPS_DIR_NAME', basename(BINGMAPS_FILE_PATH));
	define('BINGMAPS_ADMIN_PATH', BINGMAPS_FILE_PATH . '/admin/');
	define('BINGMAPS_INCLUDE_PATH', BINGMAPS_FILE_PATH . '/include/');
	define('BINGMAPS_ADMINICON_PATH', BINGMAPS_ADMIN_PATH . 'images/');
	define('BINGMAPS_TEST_PATH', BINGMAPS_FILE_PATH . '/test/');

	define('BINGMAPS_FOLDER', dirname(plugin_basename(__FILE__)));
	define('BINGMAPS_URL', $siteurl.'/wp-content/plugins/' . BINGMAPS_FOLDER .'/');
	define('BINGMAPS_ADMIN_URL', BINGMAPS_URL . 'admin/');
	define('BINGMAPS_ADMIN_IMAGES_URL', BINGMAPS_ADMIN_URL . 'images/');
	
	define('BINGMAPS_CODE_PREFIX', BINGMAPS_DIR_NAME);
	define('BINGMAPS_DOMAIN_NAME', BINGMAPS_DIR_NAME);
	
	define('BINGMAPS_ADMINUSER_CAPABILITY', 'manage_options');
	
	define('BINGMAPS_SHORTCODE_MAP', BINGMAPS_CODE_PREFIX.'-map');
	
	include 'include/bingmapslib_plugin.php';      

	class BingMapsPluginClass extends BingMapsLibPluginClass
	{
		function __construct() 
		{
			$myDBaseObj = new BingMapsDBaseClass();
			$this->myDBaseObj = $myDBaseObj;
			$pluginFile = __FILE__;
			
			parent::__construct("Bing Maps", $pluginFile, $myDBaseObj);
				
			// Init options & tables during activation & deregister init option
			register_activation_hook( $pluginFile, array(&$this, 'activate') );
			register_deactivation_hook( $pluginFile, array(&$this, 'deactivate') );	

			add_action('admin_print_styles', array(&$this, 'load_styles') );
			
			$this->adminClassFilePrefix = 'bingmaps';
			$this->adminClassPrefix = 'BingMaps';

			$this->GetBingMapsOptions();
			
			$this->adminPagePrefix = basename(dirname($pluginFile));
			
			//Actions
			add_action('admin_menu', array(&$this, 'BingMaps_ap'));
			//add_action('activate_'.plugin_basename($pluginFile),  array(&$this, 'init'));
			add_action('wp_enqueue_scripts', array(&$this, 'load_user_styles'));
			
			//Filters
			add_shortcode(BINGMAPS_SHORTCODE_MAP, array(&$this, 'OutputContent_Map'));

/* TODO - Implement checkVersion() function 	
			if ($myDBaseObj->checkVersion())
			{
				// Versions are different ... call activate() to do any updates
				$this->activate();
			}	
*/		
		}

		function load_user_styles() 
		{
			//Add Style Sheet
			//wp_enqueue_style(BINGMAPS_CODE_PREFIX, BINGMAPS_URL.'css/bingmaps.css'); 	  // BingMaps core style
			
			//Add Javascript
			wp_enqueue_style(BINGMAPS_CODE_PREFIX, BINGMAPS_URL.'js/bingmaps.js'); 		// BingMaps javascript
		}
		
		//Returns an array of admin options
		function GetBingMapsOptions() 
		{
			$myDBaseObj = $this->myDBaseObj;
			
			return $myDBaseObj->adminOptions;
		}
    
		// Saves the admin options to the options data table
		function SaveBingMapsOptions() 
		{
			$myDBaseObj = $this->myDBaseObj;
			
			$myDBaseObj->saveOptions();
		}
    
	    // ----------------------------------------------------------------------
	    // Activation / Deactivation Functions
	    // ----------------------------------------------------------------------
	    
	    function activate() 
		{
			$myDBaseObj = $this->myDBaseObj;

/* TODO - Implement Logs Folder option          
			$LogsFolder = ABSPATH . '/' . $myDBaseObj->adminOptions['LogsFolderPath'];
			if (!is_dir($LogsFolder))
				mkdir($LogsFolder, 0644, TRUE);
						
			$DLoadsFolder = ABSPATH . '/' . $myDBaseObj->adminOptions['DownloadFolderPath'];
			if (!is_dir($DLoadsFolder))
				mkdir($DLoadsFolder, 0644, TRUE);
*/
						
			$this->SaveBingMapsOptions();
      
			$myDBaseObj->upgradeDB();
		}

	    function deactivate()
	    {
	    }

		function GetMapAttributeVal($atts, $attID, $index=0)
		{
			$rtnVal = '';
			
			if (isset($atts[$attID]))
			{
				$scodeAtt = $atts[$attID];
				$matches = array();
				
				// Check if the shorcode parameter requests a URL parameter 
				if (preg_match('|^{(.*)}$|', $scodeAtt, $matches) > 0)
				{
					// Parameter is enclosed by {} - content defines URL parameter
					$paramID = $matches[1];
					if ($index > 0)
					{
						$paramID .= $index;
					}
					if (isset($_GET[$paramID]))
					{
						// Get the URL parameter
						$rtnVal = $_GET[$paramID];
					}
					return $rtnVal;				
				}				
			}
			
			if ($index > 0)
			{
				$attID .= $index;
			}
				
			if (isset($atts[$attID]))
			{
				$rtnVal = $atts[$attID];				
			}
			
			return $rtnVal;
		}
		
		function OutputContent_Map( $passedAtts )
		{
      		$myDBaseObj = $this->myDBaseObj;

			if (!isset($myDBaseObj->adminOptions['BingMapsKey']))
				return 'BingMaps not configured';
			
			if ($myDBaseObj->adminOptions['BingMapsKey'] === '')
				return 'BingMaps not configured';
				
			$defWidth  = ($myDBaseObj->adminOptions['BingMapDefWidth'] > 0) ? $myDBaseObj->adminOptions['BingMapDefWidth'] : 400;
			$defHeight = ($myDBaseObj->adminOptions['BingMapDefHeight'] > 0) ? $myDBaseObj->adminOptions['BingMapDefHeight'] : 400;
			$defZoom   = ($myDBaseObj->adminOptions['BingMapDefZoom'] > 0) ? $myDBaseObj->adminOptions['BingMapDefZoom'] : 14;
			
			// Merge Shorcode Attributes with defaults
			$atts = shortcode_atts(array(
				'posn'  => '',
				'w'  => $defWidth,
				'h'  => $defHeight,
				'zoom'  => 7,
				'type' => 'road' 
			), $passedAtts );
      
			$posn = $this->GetMapAttributeVal($atts, 'posn');
			
			// Include x and y parameters for backwards compatibility
	  		if ($posn === '')
			{
	  			if (isset($atts['x']) && isset($atts['y']))
				{
					$posn = $atts['x'].','.$atts['y'];
				}
			}			
	  
	  		if ($posn === '')
			{
				echo __("BingMaps Shortcode must specify centre Coordinates", $this->myDomain);
				return;
			}
			
			$posn = $this->GetMapAttributeVal($atts, 'posn');
			$coords = explode(',', $posn);
			if (count($coords) != 2)
			{
				echo __("BingMaps Shortcode must specify BOTH centre Coordinates", $this->myDomain);
				return;			
			}
			
			$this->mapNo = isset($this->mapNo) ? $this->mapNo+1 : 1;
			
			$ctrlId = "mapDiv".$this->mapNo;
			$zoom   = $this->GetMapAttributeVal($atts, 'zoom');
			$mapType = $this->GetMapAttributeVal($atts, 'type');
			
			$bingKey = $myDBaseObj->adminOptions['BingMapsKey'];	// Al2Lm1tFrf8cRxrIv-4vtKal2ZVlKw4Z-NyzpDG4lf0Ff877Ae4WdRBDIC1xKCVg
			$mapObjName = 'Microsoft.Maps.MapTypeId.'.$mapType;		// Microsoft.Maps.MapTypeId.road / Microsoft.Maps.MapTypeId.ordnanceSurvey
			$libOpts = '&mkt=en-GB';
			
			ob_start();		
	
			if ($this->mapNo == 1) 
			{
				echo '
      				<script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0'.$libOpts.'"></script>';
			
				echo '
<script type="text/javascript">
function addLoadEvent(func)
{
	var oldonload = window.onload;
	if (typeof window.onload != "function") 
	{
		window.onload = func;
	} 
	else 
	{
		window.onload = function() 
		{
          oldonload();
          func();
        }
	}
}
</script>';
			}
			
			echo '
<script type="text/javascript">
function GetMap'.$this->mapNo.'()
{   
	var map = new Microsoft.Maps.Map(document.getElementById("'.$ctrlId.'"), 
		{
		credentials: "'.$bingKey.'",
		center: new Microsoft.Maps.Location('.$posn.'),
		mapTypeId: '.$mapObjName.',
		showDashboard: true,
		useInertia: false,
		zoom: '.$zoom.'
		}
	);
			';
			
			$pinIndex = 0;
			while (true)
			{
				$pinIndex++;
				$pinPosn = $this->GetMapAttributeVal($passedAtts, 'pin', $pinIndex);
				if ($pinPosn == '')
					break;
				$pinParamID = 'pin'.$pinIndex;
					
				echo '
	// Retrieve the location of the map center
	var locn'.$pinIndex.' = new Microsoft.Maps.Location('.$pinPosn.');
	
	// Add a pin to the center of the map
	var pin'.$pinIndex.' = new Microsoft.Maps.Pushpin(locn'.$pinIndex.');
	
	map.entities.push(pin'.$pinIndex.');
				';	
			}
			
			echo '
}
	  
addLoadEvent(GetMap'.$this->mapNo.');	  
</script>
	  
<div id="'.$ctrlId.'" style="position:relative; width:'.$atts['w'].'px; height:'.$atts['h'].'px;"></div>';

			$outputContent = ob_get_contents();
			ob_end_clean();
			
			return $outputContent;
		}
     
		function adminClass($env, $classId, $fileName)
		{
			$fileName = $env['PluginObj']->adminClassFilePrefix.'_'.$fileName.'.php';
			include 'admin/'.$fileName;
			
			$classId = $env['PluginObj']->adminClassPrefix.$classId;
			return new $classId($env);
		}
		
		function printAdminPage() 
		{
			$myDBaseObj = $this->myDBaseObj;		
			//Prints out an admin page
      			
			$env = $this->env;

			$pagePrefix = $this->adminPagePrefix;			
			$pageSubTitle = $_GET['page'];			
      		switch ($pageSubTitle)
      		{
				case $pagePrefix.'_settings' :
					$this->adminClass($env, 'SettingsAdminClass', 'manage_settings');
					break;
          
				case $pagePrefix.'_overview':
				default :
					$this->adminClass($env, 'OverviewAdminClass', 'manage_overview');
					break;
			}
		}//End function printAdminPage()	
		
		function load_styles()
		{
			// Add our own style sheet
			wp_enqueue_style( 'salesman', plugins_url( 'admin/css/salesman-admin.css', __FILE__ ));
			
			//do_action('AddStyleSheet');
		}

		// add anything else
		function BingMaps_ap() 
		{
			if (function_exists('add_menu_page'))
			{
				$icon_url = BINGMAPS_ADMIN_IMAGES_URL.'salesman16grey.png';
				$pagePrefix = $this->adminPagePrefix;
					
				add_menu_page($this->pluginDesc, $this->pluginDesc, BINGMAPS_ADMINUSER_CAPABILITY, $pagePrefix.'_adminmenu', array(&$this, 'printAdminPage'), $icon_url);
				add_submenu_page( $pagePrefix.'_adminmenu', __($this->pluginDesc.' - Overview', $this->myDomain),   __('Overview', $this->myDomain),  BINGMAPS_ADMINUSER_CAPABILITY, $pagePrefix.'_adminmenu',  array(&$this, 'printAdminPage'));				
				add_submenu_page( $pagePrefix.'_adminmenu', __($this->pluginDesc.' - Settings', $this->myDomain),   __('Settings', $this->myDomain),  BINGMAPS_ADMINUSER_CAPABILITY, $pagePrefix.'_settings',   array(&$this, 'printAdminPage'));
		      
			}
		}
		
	}
} //End Class BingMapsPluginClass

if (class_exists("BingMapsPluginClass")) 
{
	new BingMapsPluginClass();
}


?>