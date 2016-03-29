<?php get_header(); ?>
<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php _e('404 Error','enigma-parallax'); ?></h1>
				<ul class="breadcrumb">
					<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home','enigma-parallax'); ?></a></li>
					<li><?php _e('404 Error','enigma-parallax'); ?></li>
				
				</ul>
			</div>
		</div>
	</div>	
</div>
<div class="container">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-12 hc_404_error_section">
			<div class="error_404">
				<h2><?php _e('404','enigma-parallax'); ?></h2>
				<h4><?php _e('Whoops... Page Not Found !!!','enigma-parallax'); ?></h4>
				<p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','enigma-parallax'); ?></p>
				<p><a href="<?php echo esc_url(home_url( '/' )); ?>"><button class="enigma_send_button" type="submit"><?php _e('Go To Homepage','enigma-parallax'); ?></button></a></p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>