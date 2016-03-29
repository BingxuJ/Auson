<?php 
global $wdwt_options; 


/// include Layout page class
require_once( 'page_layout.php' );
/// include General Settings page class
require_once( 'page_general_settings.php' );
/// include Home page class
require_once( 'page_homepage.php' );
/// include Typography page class
require_once( 'page_typography.php' );
/// include Slider page class

//require_once( 'page_slider.php' );

require_once( 'page_lightbox.php' );


  ///include licensing page
  // color control free version is also here
  require_once( 'licensing.php' );


$wdwt_layout_page = new WDWT_layout_page_class();

$wdwt_general_settings_page = new WDWT_general_settings_page_class();
$wdwt_homepage_page = new WDWT_homepage_page_class();
$wdwt_typography_page = new WDWT_typography_page_class();
//$wdwt_slider_page = new WDWT_slider_page_class();
$wdwt_lightbox_page = new WDWT_lightbox_page_class();


  $wdwt_licensing_page = new WDWT_licensing_page_class();




/* option parameter example
'seo_home_title' => array( 
        'name' => 'seo_home_title', 
        'title' => __( 'Custom Title', '' ), 
        'type' => 'checkbox_open', 
        'section' => 'seo_home', 
        'tab' => 'seo', 
        'default' => ''
        'description' => __( 'Check the box to use a custom title for the website. By default it takes the combination of the website name and its description.', '' ), 
        'valid_options' => array("key" => "value"), 
        'sanitize_type' => '',
        'show' => array("key" => "value") for select_open and radio btn group, and array("value","value") for checkbox
        'hide' => array("key" => "value") for select_open and radio btn group, and array("value","value") for checkbox
        'input_size' = > 'char number' ,
        'width' => "",
        'height' => '', //for textarea
        'id' => '' only for buttons, and text_preview  and other elements without name!
        'modified_by' => array("name" => "css_attr") 'selects' modifying  text_preview
        
      )

see options for colors in page_color_control.php

*/



add_filter('option_'.WDWT_OPT, 'wdwt_options_mix_defaults');
/// ajax for install sample data
add_action('wp_ajax_wdwt_install_sample_data',  array(&$wdwt_sample_data,'install_ajax'));
/// ajax for remove sample data
add_action('wp_ajax_wdwt_remove_sample_data',  array(&$wdwt_sample_data,'remove_ajax'));

add_action( 'after_setup_theme', 'wdwt_options_init', 10, 2 );



function wdwt_options_init() {
  global $wdwt_options;


  $option_defaults = wdwt_get_option_defaults();
  $new_version = $option_defaults['theme_version'];
  $options = get_option( WDWT_OPT, array() );

  if(isset($options['theme_version'])){
    $old_version = $options['theme_version'];
  }
  else{
    $old_version = '0.0.0';
  }

  if($new_version !== $old_version){
    require_once('updater.php');
    $theme_update = new Portfolio_gallery_updater($new_version, $old_version);
    $options = $theme_update->get_old_params();  /* old params in new format */
  }
  
  /*overwrite defaults with new options*/
  $wdwt_options = apply_filters('wdwt_options_init', $options);
}

function wdwt_options_mix_defaults($options){
  $option_defaults = WDWT_get_option_defaults();
  /*theme version is saved separately*/
  /*for the updater*/
  if(isset($option_defaults['theme_version'])){
    unset($option_defaults['theme_version']);
  }
  $options = wp_parse_args( $options, $option_defaults);
  return $options;
}


function wdwt_get_options() {
  global $wdwt_options;
  wdwt_options_init();/*refrest options*/

  return apply_filters('wdwt_get_options', $wdwt_options);
}



function wdwt_get_option_defaults() {
  $option_parameters = wdwt_get_option_parameters();
  $option_defaults = array();
  
  $current_theme = wp_get_theme();
  $option_defaults['theme_version'] = $current_theme->get( 'Version' );
  
  foreach ( $option_parameters as $option_parameter ) {
    $name =  (isset($option_parameter['name']) && $option_parameter['name'] !='' ) ? $option_parameter['name'] : false;
    if($name && isset($option_parameter['default']))
      $option_defaults[$name] = $option_parameter['default'];
  }
  return apply_filters( 'wdwt_get_option_defaults', $option_defaults );
}




function wdwt_get_option_parameters() {
  global  $wdwt_layout_page,       
      $wdwt_general_settings_page , 
      $wdwt_homepage_page,
      $wdwt_typography_page,
      $wdwt_lightbox_page;
      /*$wdwt_slider_page*/;

  
    global $wdwt_licensing_page;
 
  
  $options=array();
  
  foreach($wdwt_layout_page->options as $kay => $x)
    $options[$kay] = $x;
  foreach($wdwt_general_settings_page->options as $kay =>  $x) 
    $options[$kay] = $x;
  
  
  foreach($wdwt_homepage_page->options as $kay =>  $x)  
    $options[$kay] = $x;
  
  foreach($wdwt_typography_page->options  as $kay => $x)  
    $options[$kay] = $x;
/*
  foreach($wdwt_slider_page->options  as $kay => $x)  
    $options[$kay] = $x;
*/
  foreach($wdwt_lightbox_page->options  as $kay => $x)  
    $options[$kay] = $x;
  
  return apply_filters( 'wdwt_get_option_parameters', $options );
}



function wdwt_get_tabs() {
  $tabs= array();

  $tabs['layout_editor'] = array(
    'name' => 'layout_editor',
    'title' => __( 'Layout Editor', "portfolio-gallery" ),
    'sections' => array(
      'layouts' => array(
        'name' => 'layouts',
        'title' => __( 'Layout Editor', "portfolio-gallery" ),
        'description' => ''
      )
    ),
  'description' => wdwt_section_descr('layout_editor')
  );

  $tabs['general'] = array(
    'name' => 'general',
    'title' => __( 'General', "portfolio-gallery" ),
    'sections' => array(
      'general_main' => array(
        'name' => 'general_main',
        'title' => __( 'General - Main', "portfolio-gallery" ),
        'description' => ''
      ),
      'general_media' => array(
        'name' => 'general_media',
        'title' => __( 'General - Media', "portfolio-gallery" ),
        'description' => ''
      ),
      'general_links' => array(
        'name' => 'general_links',
        'title' => __( 'General - Links', "portfolio-gallery" ),
        'description' => ''
      ),

    ),
  'description' => wdwt_section_descr('general')
  );

  
  $tabs['homepage'] = array(
    'name' => 'homepage',
    'title' => __( 'Homepage', "portfolio-gallery" ),
    'sections' => array(
      'homepage_featured' => array(
        'name' => 'homepage_featured',
        'title' => __( 'Featured Post', "portfolio-gallery" ),
        'description' => ''
      ),
      'homepage_content' => array(
          'name' => 'homepage_content',
          'title' => __( 'Content Posts', "portfolio-gallery" ),
          'description' => ''
      )
    ),
    'description' => wdwt_section_descr('homepage'),
  );

  

  $tabs['typography'] = array(
    'name' => 'typography',
    'title' => __( 'Typography', "portfolio-gallery" ),
    'description' => wdwt_section_descr('typography'),
    'sections' => array(
      'text_headers' => array(
        'name' => 'text_headers',
        'title' => __( 'Typography - Headings', "portfolio-gallery" ),
        'description' => ''
      ),
      'primary_font' => array(
        'name' => 'primary_font',
        'title' => __( 'Typography - Primary Font' , "portfolio-gallery"),
        'description' => ''
      ),
      'secondary_font' => array(
        'name' => 'secondary_font',
        'title' => __( 'Typography - Secondary Font' , "portfolio-gallery"),
        'description' => ''
      ),
      'inputs_textareas' => array(
        'name' => 'inputs_textareas',
        'title' => __( 'Typography - Inputs and Text Areas', "portfolio-gallery" ),
        'description' => ''
      )
    ),
    
  );



  $tabs['lightbox'] = array(
    'name' => 'lightbox',
    'title' => __( 'Lightbox', "portfolio-gallery" ),
    'description' => wdwt_section_descr('lightbox'),
    'sections' => array(
      'lightbox' => array(
        'name' => 'lightbox',
        'title' => __( 'Lightbox', "portfolio-gallery" ),
        'description' => ''
      ),
    ),
  );

 

  /* NO if WDWT_IS_PRO*/
    $tabs['color_control'] = array(
      'name' => 'color_control',
      'title' => __( 'Color Control', "portfolio-gallery" ),
      'sections' => array(
        'color_control' => array(
          'name' => 'color_control',
          'title' => __( 'Color Control', "portfolio-gallery" ),
          'description' => ''
        )
      ),
    'description' => wdwt_section_descr('color_control')
    );



    $tabs['licensing'] = 
      array(
        'name' => 'licensing',
        'title' => __( 'Upgrade to Pro', "portfolio-gallery" ),
        'sections' => array(
          'licensing' => array(
            'name' => 'licensing',
            'title' => __( 'Upgrade to Pro', "portfolio-gallery" ),
            'description' => ''
          )
        ),
        'description' =>  ''
      );
    
  return apply_filters( 'wdwt_get_tabs', $tabs );
}