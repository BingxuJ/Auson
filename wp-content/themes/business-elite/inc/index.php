<?php 
/*include framework */

	/* include admin controller */
	require_once('admin/WDWT_admin_controller.php');
	/*filter function for sanitizing and validating*/  
	require_once( 'lib/WDWT_input.php' );  
	/*views for theme options and meta*/  
	require_once( 'lib/WDWT_output.php' );
	/*include customizer*/
	require_once('customizer/customizer.php');
	/*test for customizer*/
	/*require_once ('wordpress-theme-customizer-custom-controls-master/theme-customizer-demo.php');*/

if(is_admin()){
	/*include admin cpanel*/
	require_once('admin/WDWT_admin_cpanel.php');  
	/*include meta*/
	require_once('meta/meta.php');
}
else{
  /* include front end */
  require_once('front/front_params_output.php');
  require_once('front/front_functions.php');

  global $wdwt_front; 
}
/* include widgets*/
require_once( 'widgets/widgets.php' );


