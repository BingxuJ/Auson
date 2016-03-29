<?php
/*
 * Template Name: Right Sidebar
 */
get_header();
?>

<div id="content" class="site-content site-content-wrapper">

    
    <?php tyros_above_page(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <div class="page-content row ">


            <article class="col-md-9 item-page">
                <h2 class="post-title"><?php the_title(); ?></h2>
                <div class="avenue-underline"></div>
                <?php
                the_content();
                wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tyros' ), 'after' => '</div>' ) );

                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </article>
            <div class="col-md-3 avenue-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>

    <?php endwhile; // end of the loop.   ?>
    
    <?php tyros_below_page(); ?>
    
</div>

<?php get_footer(); ?>
