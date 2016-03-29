<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

	<div class="call-to-action">
		<?php  
            $query = new WP_Query( 'page_id='.$section['page'] );
            while ( $query->have_posts() ) : $query->the_post();
        ?>
		<h1><?php the_title(); ?></h1>

		<div class="parallax-content">
			<?php if(get_the_content() != "") : ?>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php 
	        endwhile;    
	        wp_reset_postdata();
        ?>
	</div><!-- .call-to-action -->



