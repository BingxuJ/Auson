<?php get_header(); 
if ( get_option( 'show_on_front' ) == 'page' ) {
	get_template_part('breadcrums'); ?>
	<div class="container">
		<div class="row enigma_blog_wrapper">
		<div class="col-md-8">
		<?php get_template_part('post','page'); ?>	
		</div>
		<?php get_sidebar(); ?>	
		</div>
	</div>	<?php
	} else {
		$wl_theme_options = enigma_parallax_get_options();
		if($wl_theme_options['slider_home'] == "1") {
		get_template_part('home','slideshow'); 
		}
		if($wl_theme_options['service_home'] == "1") {
		get_template_part('home','services'); 
		}
		if($wl_theme_options['portfolio_home'] == "1") {
			get_template_part('home','portfolio'); 
		}
		if($wl_theme_options['show_testimonial'] == "1") {
		get_template_part('home','testimonial');
		}
		if($wl_theme_options['show_blog'] == "1") {
		get_template_part('home','blog');
		}
		if($wl_theme_options['show_team'] == "1") {
		get_template_part('home','team');
		}
		if($wl_theme_options['show_contact'] == "1") {
		get_template_part('home','contact');
		}
		if($wl_theme_options['fc_home'] == "1") {
		get_template_part('footer','callout');
		}		
	}
	get_footer();
?>