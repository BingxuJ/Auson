<?php
/*
 * Theme homepage
 * @author bilal hassan <bilal@smartcat.ca>
 * 
 */
get_header(); ?>

<div class="site-content-wrapper row">
    <div id="" class="page-content frontpage">

        <?php if ( of_get_option('tyros_slider_bool', 'yes' ) == 'yes') echo tyros_slider(); ?>
        
        <?php if( of_get_option( 'tyros_cta_header_two', TRUE ) ) : ?>
        <div class="row center relative" id="main-heading">
            
            <div class="main-heading-box larger-box animated fadeInUp" id="">
                <div class="col-sm-10">
                    <?php echo of_get_option('tyros_cta_header_two', 'Tyros: Customizable, Professional, Beautiful');?>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo esc_url( of_get_option( 'tyros_cta_button_link', '#' ) ); ?>" class="btn btn-default">
                        <?php echo esc_attr( of_get_option('tyros_cta_button_text', 'Learn More') );?>
                    </a>
                </div>
                
            </div>
            
        </div>
        <?php endif; ?>
        
        <?php if ( of_get_option( 'tyros_cta_bool', 'yes' ) == 'yes' ) echo tyros_ctas(); ?>
           
        <?php if( is_active_sidebar('sidebar-banner') ) echo tyros_banner(); ?>
        <div class="row <?php echo 'posts' == get_option('show_on_front') ? 'homepage-content' : ''; ?>">
        <?php while (have_posts()) : the_post(); ?>
            <?php
                if ('posts' == get_option('show_on_front') ) {
                    get_template_part('content', 'posts');
                } else {
                    get_template_part('content', 'page');
                }
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; // end of the loop.   ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
