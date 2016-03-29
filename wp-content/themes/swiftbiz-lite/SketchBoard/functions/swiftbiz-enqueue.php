<?php

global $swiftbiz_lite_themename;
global $swiftbiz_lite_shortname;

/************************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/

//ENQUEUE FRONT SCRIPTS
function swiftbiz_lite_theme_stylesheet()
{
	global $swiftbiz_themename;
	global $swiftbiz_shortname;
	global $is_IE;

	$theme = wp_get_theme();
		
	//ENQUEUE STYLE FOR IE BROWSER	
	if($is_IE ) {
		wp_enqueue_style('swiftbiz-lite-ie-style', get_template_directory_uri().'/css/ie-style.css', false, $theme->Version );
		wp_enqueue_style('swiftbiz-lite-awesome-ie7-stylesheet', get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version );
	}
	wp_enqueue_script('swiftbiz-lite-componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'),'1.0',1 );
	wp_enqueue_script('comment-reply');
	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('swiftbiz-lite-superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true,'1.0');
	wp_enqueue_script('swiftbiz-lite-AnimatedHeader', get_template_directory_uri().'/js/cbpAnimatedHeader.js',array('jquery'),true,'1.0');
	wp_enqueue_script('swiftbiz-lite-waypoints',get_template_directory_uri().'/js/waypoints.js',array('jquery'),'1.0',true );

	wp_enqueue_style('swiftbiz-lite-style', get_stylesheet_uri() );
	wp_enqueue_style('swiftbiz-lite-animation-stylesheet', get_template_directory_uri().'/css/swiftbiz-animation.css', false, $theme->Version);
	wp_enqueue_style('swiftbiz-lite-awesome-stylesheet', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version);

	/*SUPERFISH*/
	wp_enqueue_style( 'swiftbiz-lite-superfish-stylesheet', get_template_directory_uri().'/css/superfish.css', false, $theme->Version);
	wp_enqueue_style( 'swiftbiz-lite-bootstrap-responsive-theme-stylesheet', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version);
	
	/*GOOGLE FONTS*/
	wp_enqueue_style( 'swiftbiz-lite-googleFontsOpenSansRaleway','//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Raleway:400,500,600,800,700&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic', false, $theme->Version);
}
add_action('wp_enqueue_scripts', 'swiftbiz_lite_theme_stylesheet');

function swiftbiz_lite_head() {
	
	require_once(get_template_directory().'/includes/swiftbiz-custom-css.php');
	
}
add_action('wp_head', 'swiftbiz_lite_head');