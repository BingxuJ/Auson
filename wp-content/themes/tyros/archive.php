<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tyros
 */
get_header();
?>


<div id="content" class="site-content site-content-wrapper">
    <div class="page-content row ">

        <article class="col-md-9 item-page">
            <?php if ( have_posts() ) : ?>


                <h2 class="post-title">
                <?php
                if ( is_category() ) :
                    single_cat_title();

                elseif ( is_tag() ) :
                    single_tag_title();

                elseif ( is_author() ) :
                    printf( __( 'Author: %s', 'tyros' ), '<span class="vcard">' . get_the_author() . '</span>' );

                elseif ( is_day() ) :
                    printf( __( 'Day: %s', 'tyros' ), '<span>' . get_the_date() . '</span>' );

                elseif ( is_month() ) :
                    printf( __( 'Month: %s', 'tyros' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'tyros' ) ) . '</span>' );

                elseif ( is_year() ) :
                    printf( __( 'Year: %s', 'tyros' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'tyros' ) ) . '</span>' );

                elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                    _e( 'Asides', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                    _e( 'Galleries', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                    _e( 'Images', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                    _e( 'Videos', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                    _e( 'Quotes', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                    _e( 'Links', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                    _e( 'Statuses', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                    _e( 'Audios', 'tyros' );

                elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                    _e( 'Chats', 'tyros' );

                else :
                    _e( 'Archives', 'tyros' );

                endif;
                ?>
                </h2>

                <?php
                // Show an optional term description.
                $term_description = term_description();
                if ( !empty( $term_description ) ) :
                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                endif;
                ?>
                </header><!-- .page-header -->

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                <?php endwhile; ?>

                <?php tyros_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>        

        </article>
        <div class="col-md-3 avenue-sidebar">
            <?php get_sidebar(); ?>
        </div>        
    </div>
</div>

<?php get_footer(); ?>
