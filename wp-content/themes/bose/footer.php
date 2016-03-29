<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bose
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php get_template_part('sidebar', 'footer'); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="site-info col-md-4">
			<?php printf( __( 'Designed by %1$s.', 'bose' ), '<a href="http://inkhive.com.com" >InkHive.com</a>' ); ?>
			<?php echo esc_html(get_theme_mod('bose_footer_text')); ?>
		</div><!-- .site-info -->
		<div class="footer-menu col-md-8">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		</div>	
	</div><!--.container-->	
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>