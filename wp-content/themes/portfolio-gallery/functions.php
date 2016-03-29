<?php


/*define theme global constants*/
/*framework prefix is wdwt*/  
define("WDWT_TITLE", "Portfolio Gallery");
define("WDWT_SLUG", "portfolio-gallery");
define("WDWT_VAR", "portfolio_gallery");
/*translation text domain*/

define("WDWT_META", "_".WDWT_SLUG."_meta");
define("WDWT_OPT", WDWT_VAR."_options");
define("WDWT_VERSION", wp_get_theme()->get( 'Version' ));
define("WDWT_LOGO_SHOW", true);
define("WDWT_HOMEPAGE", "https://web-dorado.com");
/*directories*/
define("WDWT_DIR", get_template_directory());
/*URLs*/
define("WDWT_URL", get_template_directory_uri());
define("WDWT_IMG", WDWT_URL.'/images/');
define("WDWT_IMG_INC", WDWT_URL.'/inc/images/');

/*include admin, options and frontend classes*/
require_once('inc/index.php');




if(!is_admin()){
  add_action('init','wdwt_front_init');  
}
/* head*/
add_action('wp_head','wdwt_include_head');
/*  Frontend scripts and styles */
add_action('wp_enqueue_scripts','wdwt_scripts_front');


/* sidebars*/
add_action('widgets_init', 'wdwt_widgets_init');
/* change body class*/
add_filter('body_class', 'wdwt_multisite_body_classes');
/* add_theme_support , textdomain etc */
add_action('after_setup_theme', 'wdwt_setup_elements');
/* excerpt more */
add_filter('excerpt_more', array(WDWT_VAR.'_frontend_functions', 'excerpt_more'));
/*   remove more in posts and pages   */
add_filter('the_content_more_link', array(WDWT_VAR.'_frontend_functions', 'remove_more_jump_link'));


add_action('wp_ajax_wdwt_lightbox', 'wdwt_lightbox');
add_action('wp_ajax_nopriv_wdwt_lightbox', 'wdwt_lightbox');




/*functions are below*/
function wdwt_front_init(){
   global $wdwt_front,
          $wdwt_options;
  global $wp_customize;
  if ( !isset( $wp_customize ) ) {
    $wdwt_front =  new Portfolio_gallery_front($wdwt_options);
  }

}

function wdwt_include_head(){
 global $wdwt_front;
 
  $wdwt_front->layout();
  $wdwt_front->media_queries();
  $wdwt_front->typography();
  $wdwt_front->color_control();
  $wdwt_front->favicon_img(); // favicon function print favicon html located front_end/front_end_functions.php
  $wdwt_front->custom_css();
  $wdwt_front->menu_bg_img();
  //wp_get_post_tags('type=monthly&format=link');  // geting posts tags  
}


function wdwt_scripts_front(){
  global $wdwt_front;
  
  wp_enqueue_script('wdwt_infinite-scroll', WDWT_URL.'/inc/js/jquery.infinitescroll.js', array('jquery'), WDWT_VERSION);
  wp_enqueue_script('wdwt_custom_js', WDWT_URL.'/inc/js/javascript.js', array('jquery'), WDWT_VERSION);
  wp_localize_script( 'wdwt_custom_js', 'wdwt_custom_js', array('wdwt_images_right_click' => 0) );

  wp_enqueue_script('wdwt_response', WDWT_URL.'/inc/js/responsive.js', array('jquery','wdwt_infinite-scroll'), WDWT_VERSION, true);
  wp_enqueue_style( WDWT_SLUG.'-style', get_stylesheet_uri(), array(), WDWT_VERSION );
  wp_enqueue_script('wdwt_hover_effect',WDWT_URL.'/inc/js/jquery-hover-effect.js', array(), WDWT_VERSION);
  wp_enqueue_script( 'comment-reply' );


  // Styles/Scripts for popup.
  wp_enqueue_style('wdwt_font-awesome', WDWT_URL . '/inc/css/font-awesome/font-awesome.css', array(), WDWT_VERSION);
  wp_enqueue_script('wdwt_jquery_mobile', WDWT_URL . '/inc/js/jquery.mobile.min.js', array(), WDWT_VERSION);
  wp_enqueue_script('wdwt_mCustomScrollbar', WDWT_URL . '/inc/js/jquery.mCustomScrollbar.concat.min.js', array(), WDWT_VERSION);
  wp_enqueue_style('wdwt_mCustomScrollbar', WDWT_URL . '/inc/css/jquery.mCustomScrollbar.css', array(), WDWT_VERSION);
  wp_enqueue_script('wdwt_jquery-fullscreen', WDWT_URL . '/inc/js/jquery.fullscreen-0.4.1.js', array(), WDWT_VERSION);
  
  wp_enqueue_script('wdwt_lightbox_loader', WDWT_URL.'/inc/js/lightbox.js', array(), WDWT_VERSION);
  wp_localize_script( 'wdwt_lightbox_loader', 'admin_ajax_url', admin_url('admin-ajax.php') );
  
  
}



function wdwt_widgets_init(){

    

    // Area 1, located at the top of the sidebar.

    register_sidebar(array(

            'name' => __('Primary Widget Area', "portfolio-gallery"),

            'id' => 'sidebar-1',

            'description' => __('The primary widget area', "portfolio-gallery"),

            'before_widget' => '<div id="%1$s" class="widget-sidebar sidebar-1 %2$s">',

            'after_widget' => '</div> ',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )
    );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

    register_sidebar(array(

            'name' => __('Secondary Widget Area', "portfolio-gallery"),

            'id' => 'sidebar-2',

            'description' => __('The secondary widget area', "portfolio-gallery"),

            'before_widget' => '<div id="%1$s" class="widget-sidebar sidebar-2 %2$s">',

            'after_widget' => '</div>',

            'before_title' => '<h3 class="widget-title">',

            'after_title' => '</h3>',
        )
    );

    // located at the bottom of the menu.

    register_sidebar(array(

            'name' => __('Sidebar Under Menu', "portfolio-gallery"),

            'id' => 'sidebar-3',

            'description' => __('Sidebar under menu', "portfolio-gallery"),

            'before_widget' => '<div id="%1$s" class="widget-sidebar sidebar-3 %2$s">',

            'after_widget' => '</div> ',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        )
    );
  
  // footer widget area
  /*
  register_sidebar(array(

            'name' => 'Footer Widget Area',

            'id' => 'footer-widget-area',

            'description' => 'The secondary widget area',

            'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',

            'after_widget' => '</div>',

            'before_title' => '<h3 class="widget-title">',

            'after_title' => '</h3>',
        )
    );
  */
  
  
  
}



function wdwt_multisite_body_classes($classes){
  foreach($classes as $key=>$class)
  {
    if($class=='blog')
    $classes[$key]='blog_body';
  }
  return $classes;
  
}

  /*************************************/
  /* CALL FUNCTIONS AFTER THEME SETUP  */
  /*************************************/

function wdwt_setup_elements(){
//  add_theme_support( 'title-tag' );
  
  // add custom header in admin menu
  add_theme_support( 'custom-header', array(
      'default-text-color'  => '220e10',
    'default-image'       => '',
    'header-text'         => false,
    'height'              => 240,
    'width'               => 1024
    //'wp-head-callback'    => 'expert_header_style',
    
  ) );
  
  // add custom background in admin menu
  
  $theme_defaults = array(
    'default-color'          => '000',
    'default-image'          => '',
  );
  add_theme_support('custom-background', $theme_defaults );
  
  /*ttt!!! there is a problem here*/
  
  if(!get_theme_mod('background_color',false))
    set_theme_mod('background_color','000000')  ;
  
  // For Post thumbnail
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(300, 300);
  add_image_size( /*WDWT_SLUG.*/'gallery-width', 370,310, true );
  
  // requerid  features
  add_theme_support('automatic-feed-links');
  
  /// include language
  load_theme_textdomain("portfolio-gallery", WDWT_DIR.'/languages' );
  
  // registr menu,
    register_nav_menu('primary-menu', __('Primary Menu', "portfolio-gallery"));
  
  // for editor styles
  add_editor_style();

  if ( ! isset( $content_width ) ) {
    $content_width = 1024;
  }
  add_theme_support( 'title-tag' );
}



function wdwt_lightbox (){

  $action = $_POST['action'];
  if($action == "wdwt_lightbox"){
    require_once('inc/front/WDWT_lightbox.php');
    $lightbox = new WDWT_Lightbox();
    $lightbox->view();
  }
  die();
}










?>
