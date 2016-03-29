<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athena
 */
get_header();
?>



<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php do_action('athena_homepage'); ?>

        <div class="row">
            
            <?php get_sidebar('left'); ?>

            <div class="homepage-page-content col-sm-<?php echo athena_main_width(); ?>">
                
                <?php if (have_posts()) : ?>

                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    <?php $front = get_option('show_on_front'); ?>

                    <?php echo $front == 'posts' ? '<div class="athena-blog-content">' : ''; ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        if ('posts' == get_option('show_on_front')) :
                            get_template_part('template-parts/content-blog', get_post_format());
                        else:
                            get_template_part('template-parts/content-page-home', get_post_format());
                        endif;
                        ?>

                    <?php endwhile; ?>
                    <?php echo $front == 'posts' ? '</div>' : ''; ?>
                    <div class="athena-pagination">
                        <?php echo paginate_links(); ?>
                    </div>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>

            </div>


            <?php get_sidebar(); ?>


        </div>
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>        