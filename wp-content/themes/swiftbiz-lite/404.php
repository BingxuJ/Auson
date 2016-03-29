<?php 
/**
 * The template for displaying Error 404 page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<div class="main-wrapper-item">
	<div class="page-content">
	<div class="container" id="error-404">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post">
					<div class="skepost ske-404-page">
						<div class="error-txt"><?php _e( 'Oops !!!', 'swiftbiz-lite' ); ?></div>
						<div class="error-txt-first">
							<img alt="<?php _e("404 Image", "swiftbiz-lite"); ?>" src="<?php echo get_template_directory_uri().'/images/imgo.jpg'; ?>" />
						</div>
						<p><?php echo wp_kses_post( get_theme_mod('swiftbiz_lite_four_zero_four_txt', "We're sorry, but the page you were looking for doesn't exist. You can try to search bellow" ) ); ?></p>
						<?php get_search_form(); ?>
					</div>
					<!-- skepost --> 
				</div>
				<!-- post -->
			</div>
			<!-- content --> 
		</div>
	</div>
	</div>
</div>	
<?php get_footer(); ?>