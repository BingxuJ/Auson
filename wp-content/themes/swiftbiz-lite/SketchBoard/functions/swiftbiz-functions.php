<?php
global $swiftbiz_lite_themename;
global $swiftbiz_lite_shortname;


//THEME SHORTNAME	
$swiftbiz_lite_shortname = 'swiftbiz-lite';	
$swiftbiz_lite_themename = 'swiftbiz-lite';	


/***************** EXCERPT LENGTH ************/
function swiftbiz_lite_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'swiftbiz_lite_excerpt_length');


/***************** READ MORE ****************/
function swiftbiz_lite_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'swiftbiz_lite_excerpt_more');

/************* CUSTOM PAGE TITLE ***********/
function swiftbiz_lite_title_filter($title)
{
	$swiftbiz_lite_title = $title;
	if ( is_home() && !is_front_page() ) {
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if ( is_front_page() ){
		$swiftbiz_lite_title .=  get_bloginfo('name');
		$swiftbiz_lite_title .= ' | '; 
		$swiftbiz_lite_title .= get_bloginfo('description');
	}

	if ( is_search() ) {
		$swiftbiz_lite_title .=  get_bloginfo('name');
	}

	if ( is_author() ) { 
		global $wp_query;
		$curauth = $wp_query->get_queried_object();	
		$swiftbiz_lite_title .= __('Author: ','swiftbiz-lite');
		$swiftbiz_lite_title .= $curauth->display_name;
		$swiftbiz_lite_title .= ' | ';
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if ( is_single() ) {
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if ( is_page() && !is_front_page() ) {
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if ( is_category() ) {
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if ( is_year() ) { 
		$swiftbiz_lite_title .= get_bloginfo('name');
	}
	
	if ( is_month() ) {
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if ( is_day() ) {
		$swiftbiz_lite_title .= get_bloginfo('name');
	}

	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$swiftbiz_lite_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$swiftbiz_lite_title .= get_bloginfo('name');
		}					
	}
	
	return $swiftbiz_lite_title;
}
add_filter( 'wp_title', 'swiftbiz_lite_title_filter' );


/********************************************************
	#DEFINE REQUIRED CONSTANTS HERE# &
	#OPTIONAL: SET 'OT_SHOW_PAGES' FILTER TO FALSE#.
	#THIS WILL HIDE THE SETTINGS & DOCUMENTATION PAGES.#
*********************************************************/

//CHECK AND FOUND OUT THE THEME VERSION AND ITS BASE NAME

if(function_exists('wp_get_theme')){
    $swiftbiz_lite_theme_data = wp_get_theme(get_option('template'));
    $swiftbiz_lite_theme_version = $swiftbiz_lite_theme_data->Version;  
}