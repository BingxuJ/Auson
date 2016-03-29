<?php 


 
///// initial menu
add_action('admin_menu','wdwt_admin_menu');
add_action( 'admin_init', 'wdwt_register_settings' );



function wdwt_admin_menu(){
		
  $menu=add_theme_page( WDWT_TITLE, WDWT_TITLE, 'edit_theme_options', WDWT_SLUG, 'wdwt_admin_options_page' ); 
  add_action('admin_print_styles-' . $menu, 'wdwt_admin_scripts'); 
}



function wdwt_register_settings() {
  global $wdwt_tabs;
  $wdwt_tabs = wdwt_get_tabs();

  $option_parameters = wdwt_get_option_parameters();

/*ttt!!!*/
  register_setting(   'wdwt_options', WDWT_OPT,  'wdwt_options_validate' ); 
  
  foreach ( $wdwt_tabs as $tab ) {
    $tabname = $tab['name'];
    $tabsections = $tab['sections'];
    foreach ( $tabsections as $section ) {
      $sectionname = $section['name'];
      $sectiontitle = $section['title'];

      add_settings_section(
        // $sectionid
        'wdwt_' . $sectionname . '_section',
        // $title
        $sectiontitle,
        // $callback
        'wdwt_sections_callback',
        // $pageid
        'wdwt_' . $tabname . '_tab'
      );
    }
  }
  foreach ( $option_parameters as $option ) {
    if(isset($option['name']) && isset($option['title']) && isset($option['tab']) && isset($option['section']) && isset($option['type'])){
      $optionname = $option['name'];
      $optiontitle = $option['title'];
      $optiontab = $option['tab'];
      $optionsection = $option['section'];
      $optiontype = $option['type'];
      if ( 'custom' != $optiontype ) {
        add_settings_field(
          /* $setting id */
          'wdwt_setting_' . $optionname,
          /* $title */
          $optiontitle,
          /* $callback */
          'wdwt_field_callback',
          /* $page id */
          'wdwt_' . $optiontab . '_tab',
          /* $section id */
          'wdwt_' . $optionsection . '_section',
          /* $args */
          $option
        );
      } 
      if ( 'custom' == $optiontype ) {
        add_settings_field(
          /* $setting id */
          'wdwt_setting_' . $optionname,
          /* $title */
          $optiontitle,
          /* $callback */
          'wdwt_field_callback' . $optionname,
          /* $page id */
          'wdwt_' . $optiontab . '_tab',
          /* $section id */
          'wdwt_' . $optionsection . '_section'
        );
      }
    } 
  }

}





function wdwt_get_settings_by_tab() {
  $tabs = wdwt_get_tabs();
  $settingsbytab = array();
  foreach ( $tabs as $tab ) {
    $tabname = $tab['name'];
    $settingsbytab[] = $tabname;
  }
  $option_parameters = wdwt_get_option_parameters();
  foreach ( $option_parameters as $option_parameter ) {
    $optionname =  (isset($option_parameter['name']) && $option_parameter['name'] !='' ) ? $option_parameter['name'] : false;
    if($optionname){
      $optiontab = $option_parameter['tab'];
      $settingsbytab[$optiontab][] = $optionname;
      $settingsbytab['all'][] = $optionname;
    }
  }
  return $settingsbytab;
}

function wdwt_get_current_tab() {

  
  
    if ( isset( $_GET['tab'] ) ) {
        $current = $_GET['tab'];
    }
    else {
      $current = 'licensing';
    } 

    $tabs = wdwt_get_tabs();
    
    if(!array_key_exists($current, $tabs)){
      $current = 'general';
    }
  return apply_filters( 'wdwt_get_current_tab', $current );
}




function wdwt_admin_options_page() {
  global $wdwt_options;

  global $wdwt_licensing_page;
  
  $currenttab = wdwt_get_current_tab();
  $tabs = wdwt_get_tabs();
  $options = $wdwt_options;
  
  $current_settings_sections = 'wdwt_' . $currenttab . '_tab'; 
  $tab = ( isset( $_GET['tab'] ) ? $_GET['tab'] : 'licensing' ); 

  
  ?>
  

  <div class="wrap free" id="main_<?php echo $currenttab; ?>_page">
    <h1 class="screen-reader-text"><?php echo WDWT_TITLE; ?></h1>
    <?php 
      if(WDWT_LOGO_SHOW){
      ?>
      <a href="<?php echo WDWT_HOMEPAGE ?>/wordpress-themes.html" target="_blank">
        <div style="background:url(<?php echo WDWT_IMG_INC; ?>adminheader.jpg) no-repeat; background-size: auto 100%; background-position:center; width:calc(100% - 4px); height:72px; margin:2px;"></div>
      </a>
    <?php } 
    
      wdwt_admin_options_page_tabs(); 
      if ( isset( $_GET['settings-updated']) ){
        echo "<div class='updated'><p>".__('Theme settings updated successfully', "portfolio-gallery")."</p></div>";
      }
      /*pages without option submit forms*/
      if ($currenttab == 'licensing'):
        echo $wdwt_licensing_page->view_licensing();
      else :
        echo $wdwt_licensing_page->view_licensing();
      
      endif; 
      ?>
   </div>
  <?php 
}


function wdwt_admin_scripts(){
  /*seee which scripts are not necessary!!! ttt!!!*/

  wp_enqueue_script( 'common' );
 
  wp_print_scripts('editor');
  if (function_exists('add_thickbox')) {
    add_thickbox();
  }
  wp_print_scripts('media-upload');
  wp_admin_css();
  wp_enqueue_script('utils');
  do_action("admin_print_styles-post-php");
  do_action('admin_print_styles');
  
  wp_enqueue_style( WDWT_VAR.'_admin_stylesheet', WDWT_URL . '/inc/css/admin.css', array(), WDWT_VERSION );
  wp_enqueue_script( WDWT_VAR.'_admin_element_view_script', WDWT_URL.'/inc/lib/WDWT_elements.js',array( ), WDWT_VERSION, true);
  wp_localize_script( WDWT_VAR.'_admin_element_view_script', 'wdwt_slide_warning', __("You cannot delete the last slide! Try to turn off the slider", "portfolio-gallery") );


}



?>