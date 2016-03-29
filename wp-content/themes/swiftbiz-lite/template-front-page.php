<?php get_header();
 
 if( get_theme_mod('swiftbiz_lite_home_featured_sec', 'on') == 'on') {

 	get_template_part( 'includes/front', 'featured-boxes-section' );
 }

 get_template_part( 'includes/front', 'editor-content' );
  
 get_template_part( 'includes/front', 'brands-section' );
 
 get_footer(); 

?>