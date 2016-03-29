<?php
/**
 * The template for displaying Full Width pages.
 *
 * Template Name: Full Width (No Sidebar)
 *
 * @package Bose
 */

get_header(); ?>
	<div class="header-title col-md-12">
		<?php the_title(); ?>
	</div>
	<div id="primary-mono" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
