<?php get_header(); 
$wl_theme_options = chronicle_get_options();
$wl_theme_options['_frontpage'];
if ($wl_theme_options['_frontpage']=="on" && is_front_page())
{	
	get_template_part('home','content'); 	
	get_footer();
}
 else 
{	
	if(is_page()){
	get_template_part('page');
	} else {
		get_template_part('index');
	}
}	?>