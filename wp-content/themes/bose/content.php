<?php
/**
 * @package Bose
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<?php if (has_post_thumbnail()) : ?>

		<div class="featured-thumb col-md-4">	
			<?php the_post_thumbnail(); ?>
		</div><!--.featured-thumb-->
	
		<div class="after-thumb col-md-8">
	
	<?php else: ?>
	
		<div class="after-thumb col-md-12">
	
	<?php endif; ?>
		
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'bose' ),
						'after'  => '</div>',
					) );
				?>
		</div><!-- .entry-content -->
	
	</div><!--.after-thumb-->
</article><!-- #post-## -->