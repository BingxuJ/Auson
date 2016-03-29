<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athena
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('athena-blog-post reveal fadeInUp'); ?>>

    <?php if (get_post_thumbnail_id($post->ID)) : ?>
        <div id="athena-posts-image">

            <a href="<?php echo esc_url(get_the_permalink()); ?>"> 
                <?php echo the_post_thumbnail('large'); ?>
            </a> 

        </div>
    <?php endif; ?>
    
    <div class="post-panel-content">
        
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <div class="meta-detail">

                        <div><span class="fa fa-calendar"></span> <?php echo athena_posted_on(); ?></div>

                        <div class="author"><?php echo get_the_author() ? '<span class="fa fa-user"></span> ' . get_the_author() : ' '; ?></div>

                            <!--<span><?php echo get_comments_number() == 0 ? '<span class="fa fa-comment"></span> ' . __('No comments yet', 'athena') : get_comments_number() . ' Comments'; ?></span>-->

                            <!--<span><?php athena_entry_footer(); ?></span>-->

                    </div>

                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php echo wp_trim_words(get_the_content(), 50); ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'athena'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

        <?php if ('post' === get_post_type()) : ?>
            <div class="continue-reading">
                <a class="athena-button primary" href="<?php echo esc_url(get_the_permalink()); ?>"><?php _e('Continue Reading', 'athena'); ?></a>
            </div>
        <?php endif; ?>

        <footer class="entry-footer">
            <?php //athena_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
    
    
</article><!-- #post-## -->
