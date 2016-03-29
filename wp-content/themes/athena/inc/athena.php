<?php

/**
 * 
 * Athena WordPress Theme
 * 
 * This file contains most of the work done by Athena
 * It's pretty straight forward, feel free to edit if you're comfortable with basic PHP
 * 
 * If you got here, thank you for using this theme ! Hack away at it as you see fit.
 * Please take a minute to leave us a review on WordPress.org
 * 
 * 
 */


function athena_scripts() {

    wp_enqueue_style('athena-style', get_stylesheet_uri());

    wp_enqueue_script('athena-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('athena-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }


    if ( 'Raleway, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Raleway, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('athena-font-raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,600', array(), ATHENA_VERSION);

    if ( 'Lato, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Lato, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('athena-font-lato', '//fonts.googleapis.com/css?family=Lato:400,700,300', array(), ATHENA_VERSION);

    if ( 'Source Sans Pro, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Source Sans Pro, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('athena-font-source', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,300', array(), ATHENA_VERSION);

    if ( 'Open Sans, sans-serif' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Open Sans, sans-serif' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('athena-font-opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600', array(), ATHENA_VERSION);

    if ( 'Lobster Two, cursive' == get_theme_mod('header_font', 'Raleway, sans-serif') || 'Lobster Two, cursive' == get_theme_mod('theme_font', 'Raleway, sans-serif') )
        wp_enqueue_style('athena-font-lobster', '//fonts.googleapis.com/css?family=Lobster+Two:400,700', array(), ATHENA_VERSION);

    wp_enqueue_style('athena-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-bootstrap-theme', get_template_directory_uri() . '/inc/css/bootstrap-theme.min.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-camera-style', get_template_directory_uri() . '/inc/css/camera.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-animations', get_template_directory_uri() . '/inc/css/animate.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), ATHENA_VERSION);
    wp_enqueue_style('athena-template', get_template_directory_uri() . '/inc/css/temps/' . esc_attr(get_theme_mod('theme_color', 'green')) . '.css', array(), ATHENA_VERSION);

    wp_enqueue_script('athena-sticky', get_template_directory_uri() . '/inc/js/sticky.min.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-easing', get_template_directory_uri() . '/inc/js/easing.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-camera', get_template_directory_uri() . '/inc/js/camera.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-parallax', get_template_directory_uri() . '/inc/js/parallax.min.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-carousel', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-slicknav', get_template_directory_uri() . '/inc/js/slicknav.min.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-wow', get_template_directory_uri() . '/inc/js/wow.js', array('jquery'), ATHENA_VERSION, true);
    wp_enqueue_script('athena-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-masonry'), ATHENA_VERSION);
}

add_action('wp_enqueue_scripts', 'athena_scripts');

function athena_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'athena'),
        'id' => 'sidebar-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'athena'),
        'id' => 'sidebar-left',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar ( WooCommerce )', 'athena'),
        'id' => 'sidebar-shop',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer', 'athena'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-4">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Slider Overlay', 'athena'),
        'id' => 'sidebar-overlay',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-6">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Homepage', 'athena'),
        'id' => 'sidebar-homepage',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'athena_widgets_init');



function athena_do_left_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'left' ) :
        
        echo '<div class="col-sm-4" id="athena-sidebar">' .
        get_sidebar() . '</div>';
        
    endif;
    
    
}
add_action('athena-sidebar-left', 'athena_do_left_sidebar');

function athena_do_right_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'right' ) :
        
        echo '<div class="col-sm-4" id="athena-sidebar">';
    
        get_sidebar();
        
        echo '</div>';
        
    endif;
    
    
}
add_action('athena-sidebar-right', 'athena_do_right_sidebar');

function athena_main_width(){
    
    $width = 12;
    
    if( is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right') ) :
        
        $width = 6;
        
    elseif( is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right') ) :
        $width = 9;
    else:
        $width = 12;
    endif;
    
    
    return $width;
}


function athena_get_image() {

    echo wp_get_attachment_url($POST['id']);

    exit();
}

add_action('wp_ajax_athena_get_image', 'athena_get_image');

function athena_customize_nav($items) {

    $items .= '<li class="menu-item"><a class="athena-search" href="#search" role="button" data-toggle="modal"><span class="fa fa-search"></span></a></li>';
    
    if( class_exists( 'WooCommerce' ) ) :
        $items .= '<li><a class="athena-cart" href="' . WC()->cart->get_cart_url() . '"><span class="fa fa-shopping-cart"></span> ' . WC()->cart->get_cart_total() . '</a></li>';
    endif;
    
    
    
    return $items;
}

add_filter('wp_nav_menu_items', 'athena_customize_nav');


function athena_custom_css() {
    ?>
    <style type="text/css">


        body{
            font-size: <?php echo esc_attr( get_theme_mod( 'theme_font_size', '14px') ); ?>;
            font-family: <?php echo esc_attr( get_theme_mod( 'theme_font', 'Raleway, sans-serif' ) ); ?>;

        }
        h1,h2,h3,h4,h5,h6,.slide2-header,.slide1-header,.athena-title, .widget-title,.entry-title, .product_title{
            font-family: <?php echo esc_attr( get_theme_mod('header_font', 'Raleway, sans-serif' ) ); ?>;
        }
        
        ul.athena-nav > li.menu-item a{
            font-size: <?php echo esc_attr( get_theme_mod('menu_font_size', '14px' ) ); ?>;
        }
        
    </style>
    <?php
}

add_action('wp_head', 'athena_custom_css');


function athena_render_homepage() { ?>

    <div id="athena-jumbotron">

        <div id="athena-slider" class="hero">

            <div id="slide1" data-thumb="<?php echo esc_url( get_theme_mod('featured_image1', get_template_directory_uri() . '/inc/images/athena.jpg' ) ); ?>" data-src="<?php echo esc_url( get_theme_mod( 'featured_image1', get_template_directory_uri() . '/inc/images/athena.jpg' ) ); ?>">

                <div class="overlay">
                    <div class="row">
                        
                        <div class="col-sm-6 parallax">
                            <h2 class="header-text animated slideInDown slide1-header"><?php echo esc_attr( get_theme_mod( 'featured_image1_title', __( 'Welcome to Athena', 'athena' )  ) ); ?></h2>
                            
                            <?php if( get_theme_mod( 'slide1_button1_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide1_button1_url', '#') ); ?>"
                               class="athena-button primary large animated flipInX slide1_button1 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide1_button1_text', __( 'View Features', 'athena' )  ) ); ?>
                            </a>
                            <?php endif; ?>

                            <?php if( get_theme_mod( 'slide1_button2_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide1_button2_url', '#') ); ?>"
                               class="athena-button default large animated flipInX slide1_button2 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide1_button2_text', __( 'Learn More', 'athena' )  ) ); ?>
                            </a>
                            <?php endif; ?>
                            
                        </div>
                        <div class="col-sm-6">

                        </div>

                    </div>
                </div>                    

            </div>                

            <div id="slide2" data-thumb="<?php echo esc_url(get_theme_mod('featured_image2', get_template_directory_uri() . '/inc/images/athena2.jpg')); ?>" data-src="<?php echo esc_url(get_theme_mod('featured_image2', get_template_directory_uri() . '/inc/images/athena2.jpg')); ?>">

                <div class="overlay">
                    
                    <div class="row">
                        
                        <div class="col-sm-6 parallax">
                            <h2 class="header-text animated slideInDown slide2-header"><?php echo esc_attr( get_theme_mod( 'featured_image2_title', __( 'Welcome to Athena', 'athena' )  ) ); ?></h2>
                            
                            <?php if( get_theme_mod( 'slide2_button1_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide2_button1_url', '#') ); ?>"
                               class="athena-button primary large animated flipInX slide2_button1 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide2_button1_text', __( 'View Features', 'athena' )  ) ); ?>
                            </a>
                            <?php endif; ?>

                            <?php if( get_theme_mod( 'slide2_button2_text', 'True' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'slide2_button2_url', '#') ); ?>"
                               class="athena-button default large animated flipInX slide2_button2 delay3">
                                <?php echo esc_attr( get_theme_mod( 'slide2_button2_text', __( 'Learn More', 'athena' )  ) ); ?>
                            </a>
                            <?php endif; ?>
                            
                        </div>
                        <div class="col-sm-6">

                        </div>

                    </div>
                </div>                    

            </div>                

        </div>
        
        <?php if( get_theme_mod( 'overlay_bool', 'on' ) == 'on' ) : ?>
        <div id="athena-overlay-trigger">

            <div class="overlay-widget">
                <div class="row">
                    <?php if (is_active_sidebar('sidebar-overlay')) : ?>
                        <?php dynamic_sidebar('sidebar-overlay'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <span class="<?php echo esc_attr( get_theme_mod( 'overlay_icon', 'fa fa-plus' ) ); ?> animated rotateIn delay3"></span>
            
        </div>

        <div class="slider-bottom">
            <div>
                <span class="fa fa-chevron-down scroll-down animated slideInUp delay-long"></span>
            </div>
        </div>
        <?php endif; ?>
        
    </div>

    <div class="clear"></div>

    <?php if( get_theme_mod('callout_bool', 'on' ) == 'on' ) : ?>

    <div id="athena-featured">

        <div class="col-sm-4 featured-box featured-box1" data-target="<?php echo esc_url( get_theme_mod( 'callout1_href', '#' ) ); ?>">

            <div class="reveal animated fadeInUp reveal">

                <div class="athena-icon">
                    <span class="<?php echo esc_attr(get_theme_mod('callout1_icon', __('fa fa-laptop', 'athena'))); ?>"></span>
                </div>

                <h3 class="athena-title"><?php echo esc_attr(get_theme_mod('callout1_title', __('Responsive', 'athena'))); ?></h3>

                <p class="athena-desc"><?php echo esc_attr(get_theme_mod('callout1_text', __('Athena looks amazing on desktop and mobile devices.', 'athena'))); ?></p>

            </div>

        </div>

        <div class="col-sm-4 featured-box featured-box2" data-target="<?php echo esc_url( get_theme_mod( 'callout2_href', '#' ) ); ?>">

            <div class="reveal animated fadeInUp delay1">

                <div class="athena-icon">
                    <span class="<?php echo esc_attr(get_theme_mod('callout2_icon', __('fa fa-magic', 'athena'))); ?>"></span>
                </div>

                <h3 class="athena-title"><?php echo esc_attr(get_theme_mod('callout2_title', __('Customizable', 'athena'))); ?></h3>

                <p class="athena-desc"><?php echo esc_attr(get_theme_mod('callout2_text', __('Athena is easy to use and customize without having to touch code', 'athena'))); ?></p>

            </div>

        </div>

        <div class="col-sm-4 featured-box featured-box3" data-target="<?php echo esc_url( get_theme_mod( 'callout3_href', '#' ) ); ?>">

            <div class="reveal animated fadeInUp delay2">

                <div class="athena-icon">
                    <span class="<?php echo esc_attr(get_theme_mod('callout3_icon', __('fa fa-shopping-cart', 'athena'))); ?>"></span>
                </div>

                <h3 class="athena-title"><?php echo esc_attr(get_theme_mod('callout3_title', __('WooCommerce', 'athena'))); ?></h3>

                <p class="athena-desc"><?php echo esc_attr(get_theme_mod('callout3_text', __('Athena supports WooCommerce to build an online shopping site', 'athena'))); ?></p>

            </div>
        </div>

    </div>
  <?php endif; ?>
    
   
    
    <?php get_sidebar('homepage'); ?>

    
    <?php
}

add_action( 'athena_homepage', 'athena_render_homepage' );


function athena_render_footer(){ ?>
    
    <div class="athena-footer" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_attr( get_theme_mod('footer_background_image', get_template_directory_uri() . '/inc/images/footer.jpg' ) ); ?>">
        <div>
            <div class="row">
                <?php get_sidebar('footer'); ?>
            </div>            
        </div>

        
    </div>
    
    <div class="clear"></div>
    
    <div class="site-info">
        
        <div class="row">
            
            <div class="athena-copyright">
                <?php echo esc_attr( get_theme_mod( 'copyright_text', __( 'Copyright Company Name 2015', 'athena' ) ) ); ?>
            </div>
            
            <div id="authica-social">
                
                <?php if( get_theme_mod( 'facebook_url', 'http://facebook.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'facebook_url', 'http://facebook.com' ) ); ?>" target="_BLANK" class="athena-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <?php endif; ?>
                
                
                <?php if( get_theme_mod( 'gplus_url', 'http://gplus.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'gplus_url', 'http://gplus.com' ) ); ?>" target="_BLANK" class="athena-gplus">
                    <span class="fa fa-google-plus"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'instagram_url', 'http://instagram.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'instagram_url', 'http://instagram.com' ) ); ?>" target="_BLANK" class="athena-instagram">
                    <span class="fa fa-instagram"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'linkedin_url', 'http://linkedin.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'linkedin_url', 'http://linkedin.com' ) ); ?>" target="_BLANK" class="athena-linkedin">
                    <span class="fa fa-linkedin"></span>
                </a>
                <?php endif; ?>
                
                
                <?php if( get_theme_mod( 'pinterest_url', 'http://pinterest.com' ) != '' ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'pinterest_url', 'http://pinterest.com' ) ); ?>" target="_BLANK" class="athena-pinterest">
                    <span class="fa fa-pinterest"></span>
                </a>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'twitter_url', 'http://twitter.com' ) ) : ?>
                <a href="<?php echo esc_url( get_theme_mod( 'twitter_url', 'http://twitter.com' ) ); ?>" target="_BLANK" class="athena-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <?php endif; ?>
                
            </div>

            <?php $menu = wp_nav_menu( array ( 
                'theme_location'    => 'footer', 
                'menu_id'           => 'footer-menu', 
                'menu_class'        => 'athena-footer-nav' ,

                ) ); ?>
            <br>

            <a href="https://smartcatdesign.net" rel="designer" style="display: block !important" class="rel">
                <?php _e( 'Design by' , 'athena' ); echo ' Smart' . 'cat'; ?>
                <img src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo_mini.png'?>"/>
            </a>
            
            
        </div>
        
        <div class="scroll-top alignright">
            <span class="fa fa-chevron-up"></span>
        </div>
        

        
    </div><!-- .site-info -->
    
    
<?php }
add_action( 'athena_footer', 'athena_render_footer' );



class athena_recent_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'athena_recent_posts_widget', __('Athena Recent Articles', 'athena'), array('description' => __('Use this widget to display the Athena Recent Posts.', 'athena'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        
        if( isset( $instance['title'] ) ) :
            $title = apply_filters('widget_title', $instance['title'] );
        else : 
            $title = '';
        endif;
        

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        
        echo athena_recent_posts();

    }

    // Widget Backend
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Articles', 'athena');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'athena'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />             
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

add_action('widgets_init', 'athena_load_widget');
function athena_load_widget() {
    register_widget('athena_recent_posts_widget');
}

function athena_recent_posts() {
    $args = array(
        'numberposts' => '6',
        'post_status' => 'publish',
    );
    ?>
    <div id="athena_recent_posts">
        <?php $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $post) { ?>
            <div class="col-sm-4 athena-single-post">
                <div>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post['ID'])); ?>
                    <img src="<?php echo $url; ?> " title="<?php echo $post['post_title']; ?>"/>
                    <div class="overlay">
                        <a href="<?php echo get_permalink($post['ID']) ?>" class="title"><?php echo $post['post_title']; ?></a>
                        <br>
                        <br>
                        <div class="center">
                            <a href="<?php echo get_permalink($post['ID']) ?>" class=""><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php
}

