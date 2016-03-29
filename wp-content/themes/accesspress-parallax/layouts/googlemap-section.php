<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

	<div class="content-area googlemap-section">
	<div class="googlemap-toggle"><?php _e('Map','accesspress-parallax'); ?></div>

		<?php  
            $query = new WP_Query( 'page_id='.$section['page'] );
            while ( $query->have_posts() ) : $query->the_post();
        ?>
		
		<div class="googlemap-content">
			<?php the_content(); ?>
		</div>

		<?php 
	        endwhile;    
	        wp_reset_postdata();
        ?>
	</div><!-- #primary -->



