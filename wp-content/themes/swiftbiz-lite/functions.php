<?php
/**
 *  functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
 
/********************************************************
 INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
*********************************************************/
/**
 * THEMENAME & SHORTNAME	
 */

$swiftbiz_lite_shortname = 'swiftbiz-lite';	
$swiftbiz_lite_themename = 'Swiftbiz Lite';	
 
/**
 * FUNTION TO ADD CSS CLASS TO BODY
 */
function swiftbiz_add_class( $classes ) {
	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	return $classes;
}
add_filter( 'body_class','swiftbiz_add_class' );

 
/**
 * REGISTERS WIDGET AREAS
 */
function swiftbiz_widgets_init() {
	register_sidebar(array(
		'name' 			=> __( 'Blog Sidebar', 'swiftbiz-lite' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="swiftbiz-container %2$s">',
		'after_widget' 	=> '</li>',
		'before_title' 	=> '<h3 class="swiftbiz-title">',
		'after_title' 	=> '</h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>',
	));
	register_sidebar(array(
		'name' 			=> __( 'Footer Sidebar', 'swiftbiz-lite' ),
		'id'            => 'footer-sidebar',
		'before_widget' => '<div id="%1$s" class="swiftbiz-footer-container span4 swiftbiz-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="swiftbiz-title swiftbiz-footer-title">',
		'after_title' 	=> '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Home Featured Sidebar', 'swiftbiz-lite' ),
		'id'            => 'home-featured-sidebar',
		'before_widget' => '<li id="%1$s" class="swiftbiz-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name' 			=> __( 'Page Sidebar', 'swiftbiz-lite' ),
		'id'            => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="swiftbiz-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="swiftbiz-title">',
		'after_title'   => '</h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>',
	));
}
add_action( 'widgets_init', 'swiftbiz_widgets_init' );


/**
 * Sets up theme defaults and registers the various WordPress features that
 *  supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function swiftbiz_theme_setup() {
	/*
	 * Makes  available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'swiftbiz-lite' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'swiftbiz-lite', get_template_directory() . '/languages' );
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => get_template_directory_uri() . '/images/front-bg-img.jpg') );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support('post-thumbnails');

	set_post_thumbnail_size( 770, 350, true );
	add_image_size( 'swiftbiz_standard_img', 770, 350, true);  //Standard Image Size
	
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'swiftbiz_lite_custom_background_args', array('default-color' => 'f5f5f5', ) ) );

	/**
	* SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ){
	      $content_width = 900;
	}
	
	// This theme uses wp_nav_menu() in one location which is the main navigation.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'swiftbiz-lite' ),
	));


}
add_action( 'after_setup_theme', 'swiftbiz_theme_setup' ); 

/**
 * Add Customizer 
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/includes/sketchtheme-upsell.php');


/**
 * Get Option.
 *
 * Helper function to return the option value.
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'swiftbiz_lite_get_option' ) ) {

  function swiftbiz_lite_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( 'swiftbiz_lite_option_tree' );
    

    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {

      return swiftbiz_lite_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}


/**
 * Filter the return values through WPML
 *
 * @param     array     $options The current options    
 * @param     string    $option_id The option ID
 * @return    mixed
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'swiftbiz_lite_wpml_filter' ) ) {

  function swiftbiz_lite_wpml_filter( $options, $option_id ) {
      
    // Return translated strings using WMPL
    if ( function_exists('icl_t') ) {
      
      $settings = get_option('swiftbiz_lite_option_tree_settings');
      
      if ( isset( $settings['settings'] ) ) {
      
        foreach( $settings['settings'] as $setting ) {
          
          // List Item & Slider
          if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
          
            foreach( $options[$option_id] as $key => $value ) {
          
              foreach( $value as $ckey => $cvalue ) {
                
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                
                if ( ! empty( $_string ) ) {
                
                  $options[$option_id][$key][$ckey] = $_string;
                  
                }
                
              }
            
            }
          
          // All other acceptable option types
          } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {
          
            $_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
            
            if ( ! empty( $_string ) ) {
            
              $options[$option_id] = $_string;
              
            }
            
          }
          
        }
      
      }
    
    }
    
    return $options[$option_id];
  
  }

}



$pre_options = ( get_option('swiftbiz_lite_option_tree') != '' ) ? get_option( 'swiftbiz_lite_option_tree' ) : false ;

if ( $pre_options) {

	add_action( 'wp_ajax_swiftbiz_lite_migrate_option', 'swiftbiz_lite_migrate_options' );
	add_action( 'wp_ajax_nopriv_swiftbiz_lite_migrate_option', 'swiftbiz_lite_migrate_options' );
	function swiftbiz_lite_migrate_options() {

		set_theme_mod('swiftbiz_lite_pri_color', swiftbiz_lite_get_option( 'swiftbiz-lite_primary_color_scheme' ) );
		set_theme_mod('swiftbiz_lite_sec_color', swiftbiz_lite_get_option( 'swiftbiz-lite_colorpicker' ) );
		set_theme_mod('swiftbiz_lite_logo_img', swiftbiz_lite_get_option( 'swiftbiz-lite_logo_img' ) );
		set_theme_mod('swiftbiz_lite_headserach', swiftbiz_lite_get_option( 'swiftbiz-lite_headserach' ) );
		set_theme_mod('swiftbiz_lite_persistent_on_off', swiftbiz_lite_get_option( 'swiftbiz-lite_persistent_on_off' ) );
		
		$_bread_background = ( swiftbiz_lite_get_option('swiftbiz-lite_bread_background') != '' ) ? swiftbiz_lite_get_option('swiftbiz-lite_bread_background') : '' ;
		$_is_bread_background = ( $_bread_background != '' ) ? true : false;
		if( $_is_bread_background ) {
			if ( $_bread_background['background-color'] != '' )
				set_theme_mod('breadcrumbbg_color', $_bread_background['background-color'] );

			if( $_bread_background['background-image'] != '' )
				set_theme_mod('breadcrumbbg_image', $_bread_background['background-image'] );

			if ( $_bread_background['background-repeat'] != '' )
				set_theme_mod('breadcrumbbg_repeat', $_bread_background['background-repeat'] );

			if ( $_bread_background['background-attachment'] != '' )
				set_theme_mod('breadcrumbbg_attachment', $_bread_background['background-attachment'] );

			if ( $_bread_background['background-position'] != '' )
				set_theme_mod('breadcrumbbg_position_x', $_bread_background['background-position'] );

			if ( $_bread_background['background-size'] != '' )
				set_theme_mod('breadcrumbbg_size', $_bread_background['background-size'] );
		}


		set_theme_mod('swiftbiz_lite_home_featured_sec', 'on' );
		
		set_theme_mod('swiftbiz_lite_home_blog_sec', swiftbiz_lite_get_option( 'swiftbiz-lite_hide_home_blog' ) );
		set_theme_mod('swiftbiz_lite_home_blog_title', swiftbiz_lite_get_option( 'swiftbiz-lite_blogsec_title' ) );
		set_theme_mod('swiftbiz_lite_home_blog_num', swiftbiz_lite_get_option( 'swiftbiz-lite_blog_no' ) );

		set_theme_mod('swiftbiz_lite_home_brand_sec', swiftbiz_lite_get_option( 'swiftbiz-lite_home_brand_sec' ) );
		set_theme_mod('swiftbiz_lite_brand1_alt', swiftbiz_lite_get_option( 'swiftbiz-lite_brand1_alt' ) );
		set_theme_mod('swiftbiz_lite_brand1_url', swiftbiz_lite_get_option( 'swiftbiz-lite_brand1_url' ) );
		set_theme_mod('swiftbiz_lite_brand1_img', swiftbiz_lite_get_option( 'swiftbiz-lite_brand1_img' ) );
		set_theme_mod('swiftbiz_lite_brand2_alt', swiftbiz_lite_get_option( 'swiftbiz-lite_brand2_alt' ) );
		set_theme_mod('swiftbiz_lite_brand2_url', swiftbiz_lite_get_option( 'swiftbiz-lite_brand2_url' ) );
		set_theme_mod('swiftbiz_lite_brand2_img', swiftbiz_lite_get_option( 'swiftbiz-lite_brand2_img' ) );
		set_theme_mod('swiftbiz_lite_brand3_alt', swiftbiz_lite_get_option( 'swiftbiz-lite_brand3_alt' ) );
		set_theme_mod('swiftbiz_lite_brand3_url', swiftbiz_lite_get_option( 'swiftbiz-lite_brand3_url' ) );
		set_theme_mod('swiftbiz_lite_brand3_img', swiftbiz_lite_get_option( 'swiftbiz-lite_brand3_img' ) );
		set_theme_mod('swiftbiz_lite_brand4_alt', swiftbiz_lite_get_option( 'swiftbiz-lite_brand4_alt' ) );
		set_theme_mod('swiftbiz_lite_brand4_url', swiftbiz_lite_get_option( 'swiftbiz-lite_brand4_url' ) );
		set_theme_mod('swiftbiz_lite_brand4_img', swiftbiz_lite_get_option( 'swiftbiz-lite_brand4_img' ) );


		set_theme_mod('swiftbiz_lite_blogpage_heading', swiftbiz_lite_get_option( 'swiftbiz-lite_blogpage_heading' ) );


		set_theme_mod('swiftbiz_lite_copyright', swiftbiz_lite_get_option( 'swiftbiz-lite_copyright' ) );


		set_theme_mod('swiftbiz_lite_four_zero_four_txt', swiftbiz_lite_get_option( 'swiftbiz-lite_four_zero_four_txt' ) );
		
		echo __('All the settings migrated successfully.', 'swiftbiz-lite');

		delete_option( 'swiftbiz_lite_option_tree' );
		delete_option( 'swiftbiz_lite_option_tree_settings' );

		die();

	}

	add_action('admin_menu', 'swiftbiz_lite_migrate_menu');
	function swiftbiz_lite_migrate_menu() {
		add_theme_page( __('Migrate Options', 'swiftbiz-lite'), __('Migrate Options', 'swiftbiz-lite'), 'administrator', 'sktmigrate', 'swiftbiz_lite_migrate_menu_options' );
	}

	function swiftbiz_lite_migrate_menu_options() { ?>
		<h1><?php _e('Migrate Settings to Customizer', 'swiftbiz-lite') ?></h1>
		<p><?php _e('As per the new WordPress guidelines it is required to use the Customizer for implementing theme options.', 'swiftbiz-lite'); ?></p>
		<p><?php _e('So click on this button for migrate the options from previous version.', 'swiftbiz-lite'); ?></p>
		<p><strong><?php _e('Note: only click this option once immidiatly after upgrade. Again clicking this button will revert all the changes you made from Appearance >> Customize.', 'swiftbiz-lite'); ?></strong></p>
		<button id="swiftbiz-migrate-btn" class="button button-primary"><?php _e( 'Migrate to Customizer', 'swiftbiz-lite' ); ?></button>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			'use strict';
			jQuery('#swiftbiz-migrate-btn').click(function() {
			    jQuery.ajax({
			        url: "<?php echo home_url('/');?>wp-admin/admin-ajax.php",
			        type: 'POST',
			        data: { action: 'swiftbiz_lite_migrate_option' },
			        success: function( response ) {
			            alert( response );
			            var wp_adminurl = "<?php echo esc_url( home_url('/') ).'wp-admin/themes.php'; ?>";
      					jQuery(location).attr("href", wp_adminurl);
			        }
			    });
				return false;

			});
		});
		</script>
	<?php }
} ?>