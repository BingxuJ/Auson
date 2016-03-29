<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package tyros
 */
?>

<article id="post-<?php the_ID(); ?>" class="col-md-9 <?php echo esc_attr( of_get_option('tyros_homepage_sidebar', 'sidebar-off') ); ?>">
	<header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="avenue-underline"></div>
	</header><!-- .entry-header -->
        
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tyros' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'tyros' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php if( 'sidebar-on' == of_get_option('tyros_homepage_sidebar', 'sidebar-off')) : ?>
<div class="col-md-3 avenue-sidebar">
    <?php get_sidebar(); ?>
</div>
<?php endif; ?>