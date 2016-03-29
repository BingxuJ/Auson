<?php
/* 
 * Tyros Go
 */

if ( !function_exists( '_wp_render_title_tag' ) ) :

    function tyros_slug_render_title() { ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php }

    add_action( 'wp_head', 'tyros_render_title' );
    
endif;

function tyros_scripts() {
    
    wp_enqueue_style('tyros-style', get_stylesheet_uri());
    
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), TYROS_VERSION);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), TYROS_VERSION);
    wp_enqueue_style('tyros-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), TYROS_VERSION);
    
    if('Source Sans Pro, sans-serif' == of_get_option('tyros_font_family')) 
        wp_enqueue_style('tyros-font-sans', '//fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600', array(), TYROS_VERSION);
    if('Lato, sans-serif' == of_get_option('tyros_font_family')) 
        wp_enqueue_style('tyros-font-lato', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic', array(), TYROS_VERSION);
    
    if('Josefin Sans, sans-serif' == of_get_option('tyros_font_family')) 
        wp_enqueue_style('tyros-font-josefin', '//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700', array(), TYROS_VERSION);
    
    if('Open Sans, sans-serif' == of_get_option('tyros_font_family')) 
        wp_enqueue_style('tyros-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700', array(), TYROS_VERSION);
    
    wp_enqueue_style('tyros-template', get_template_directory_uri() . '/inc/css/temps/' . esc_attr( of_get_option('tyros_theme_color', 'red') ) . '.css', array(), TYROS_VERSION);
    wp_enqueue_style('tyros-slider-style', get_template_directory_uri() . '/inc/css/camera.css', array(), TYROS_VERSION);
    wp_enqueue_style('tyros-carousel-style', get_template_directory_uri() . '/inc/css/owl.carousel.css', array(), TYROS_VERSION);
    wp_enqueue_style('tyros-carousel-transitions', get_template_directory_uri() . '/inc/css/owl.transitions.css', array(), TYROS_VERSION);
    wp_enqueue_style('tyros-animations', get_template_directory_uri() . '/inc/css/animate.css', array(), TYROS_VERSION);
    
    wp_enqueue_script('tyros-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), TYROS_VERSION, true);
    wp_enqueue_script('tyros-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.js', array('jquery'), TYROS_VERSION, true);
    wp_enqueue_script('tyros-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), TYROS_VERSION, true);

    wp_enqueue_script('tyros-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array('jquery'), TYROS_VERSION, true);
    wp_enqueue_script('tyros-uslider', get_template_directory_uri() . '/inc/js/camera.js', array('jquery'), TYROS_VERSION, true);
    wp_enqueue_script('tyros-carousel', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array('jquery'), TYROS_VERSION, true);
    wp_enqueue_script('tyros-sticky', get_template_directory_uri() . '/inc/js/jquery.stickyNavbar.min.js', array('jquery'), TYROS_VERSION, true);
    

    wp_enqueue_script('tyros-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core','jquery-masonry'), TYROS_VERSION);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'tyros_scripts');


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tyros_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Homepage Widget', 'tyros'),
        'id' => 'sidebar-banner',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar', 'tyros'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="avenue-underline"></div>',
    ));
    

    
    register_sidebar(array(
        'name' => __('Above Page Widget', 'tyros'),
        'id' => 'sidebar-above-page',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="avenue-underline"></div>',
    ));
    
    register_sidebar(array(
        'name' => __('Below Page Widget', 'tyros'),
        'id' => 'sidebar-below-page',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="avenue-underline"></div>',
    ));
    
    register_sidebar(array(
        'name' => __('Above Post Widget', 'tyros'),
        'id' => 'sidebar-above-post',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="avenue-underline"></div>',
    ));
    
    register_sidebar(array(
        'name' => __('Below Post Widget', 'tyros'),
        'id' => 'sidebar-below-post',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="avenue-underline"></div>',
    ));
    
    
    register_sidebar(array(
        'name' => __('Footer', 'tyros'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="' . esc_attr( of_get_option('tyros_footer_columns', 'col-md-4') ) . ' widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="avenue-underline"></div>',
    ));    
    
    
}
add_action('widgets_init', 'tyros_widgets_init');


add_action('optionsframework_custom_scripts', 'tyros_optionsframework_custom_scripts');

function tyros_optionsframework_custom_scripts() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery('#example_showhidden').click(function() {
                jQuery('#section-example_text_hidden').fadeToggle(400);
            });

            if (jQuery('#example_showhidden:checked').val() !== undefined) {
                jQuery('#section-example_text_hidden').show();
            }

        });
    </script>
    <?php
}

add_action('wp_head', 'tyros_css');
function tyros_css() {
    ?>
    <style type="text/css">
        body{
            font-size: <?php echo esc_attr( of_get_option('tyros_font_size') ); ?>;
            font-family: <?php echo esc_attr( of_get_option('tyros_font_family', 'Open Sans, sans-serif') ); ?>;
            font-weight: lighter;
        }
        .row{
            /*width: ;*/
        }
        .sc-slider ul li{
            background-size: <?php echo esc_attr( of_get_option('tyros_slider_style') ); ?>;
            -webkit-background-size: <?php echo esc_attr( of_get_option('tyros_slider_style') ); ?>;
            -moz-background-size: <?php echo esc_attr( of_get_option('tyros_slider_style') ); ?>;
        }
        
        <?php if( of_get_option('tyros_background_image', FALSE) ) : ?>
        #page{ background : url( <?php echo esc_url( of_get_option('tyros_background_image') ); ?>) no-repeat fixed !important; background-size: cover !important; }
        <?php endif; ?>
        
    </style>
    <?php
}

class tyros_recent_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'tyros_recent_posts_widget', __('Tyros Recent Articles', 'tyros_recent_posts_widget_domain'), array('description' => __('Use this widget to display the Tyros Recent Posts.', 'tyros_recent_posts_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
//        include 'inc/widget.php';
        echo tyros_recent_posts();

    }

    // Widget Backend
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Articles', 'tyros');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tyros'); ?></label>
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

// Register and load the widget
function tyros_load_widget() {
    register_widget('tyros_recent_posts_widget');
}

add_action('widgets_init', 'tyros_load_widget');

function tyros_recent_posts() {
    $args = array(
        'numberposts' => '4',
        'post_status' => 'publish'
    );
    ?>
    <div id="sc_avenue_recent_posts">
        <?php $recent_posts = wp_get_recent_posts($args);
        foreach ($recent_posts as $post) { ?>
            <div class="col-sm-3">
                <div>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post['ID'])); ?>
                    <img src="<?php echo $url; ?> " title="<?php echo $post['post_title']; ?>"/>
                    <div class="overlay">
                        <a href="<?php echo get_permalink($post['ID']) ?>" class="title">
                            <?php echo $post['post_title']; ?>
                        </a>
                        <?php // $date = new DateTime($post['post_date']); ?>
                        <div class="date">
                            <i class="fa fa-calendar"></i>
                            <?php echo date('M d', strtotime($post['post_date'])); ?>
                        </div>
                        <div class="author">
                            <i class="fa fa-pencil"></i>
                            <?php echo get_userdata($post['post_author'])->user_login; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
    <?php } ?>
    </div>
<?php
}
function tyros_slider() { ?>
<script>
    jQuery(document).ready(function($){
        jQuery('#camera_wrap_1').camera({
            height: '550px',
            loader: 'pie',
            pagination: false,
            thumbnails: false,
            fx: 'scrollLeft',
            time: 4000,
            transPeriod: 1000,
            overlayer: true,
            playPause: false,
        });            
    });

</script>
    <div class="sc-slider-wrapper">
	<div class="fluid_container">
        <div class="camera_wrap" id="camera_wrap_1">

                <?php if ('' != of_get_option('tyros_slide1_image', get_template_directory_uri() . '/inc/images/slide1_demo.jpg')) { ?>
                    <div data-thumb="<?php echo esc_url( of_get_option('tyros_slide1_image', get_template_directory_uri() . '/inc/images/slide1_demo.jpg') ); ?>" data-src="<?php echo esc_url( of_get_option('tyros_slide1_image', get_template_directory_uri() . '/inc/images/slide1_demo.jpg') ); ?>">
                        <div class="camera_caption primary_caption animated fadeInLeft">
                            <span><?php echo esc_attr( of_get_option('tyros_slide1_text','Tyros: Multi-purpose Responsive Theme') ); ?></span>
                        </div>
                        <div class="camera_caption secondary_caption animated fadeInRight">
                            <span><?php echo esc_attr( of_get_option('tyros_slide1_text2','Clean & Modern Design') ); ?></span>
                        </div>
                        <div class="camera_caption third_caption animated bounceIn">
                            <a href="<?php echo esc_url( of_get_option( 'tyros_slide1_button_url', '#' ) ); ?>" class="btn btn-slider">
                                <?php echo esc_attr( of_get_option( 'tyros_slide1_button_text', 'Click Here') ); ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>            
            
                <?php if ('' != of_get_option('tyros_slide2_image', get_template_directory_uri() . '/inc/images/slide1_demo.jpg')) { ?>
                      <div data-thumb="<?php echo esc_url( of_get_option('tyros_slide2_image', get_template_directory_uri() . '/inc/images/slide2_demo.jpg') ); ?>" data-src="<?php echo esc_url( of_get_option('tyros_slide2_image', get_template_directory_uri() . '/inc/images/slide2_demo.jpg') ); ?>">
                        <div class="camera_caption primary_caption animated fadeInLeft">
                            <span><?php echo esc_attr( of_get_option('tyros_slide2_text','Professional & Unique Design') ); ?></span>
                        </div>                       
                        <div class="camera_caption secondary_caption animated fadeInRight">
                            <span><?php echo esc_attr( of_get_option('tyros_slide2_text2','Easy to customize') ); ?></span>
                        </div>
                        <div class="camera_caption third_caption animated bounceIn">
                            <a href="<?php echo esc_url( of_get_option( 'tyros_slide2_button_url', '#' ) ); ?>" class="btn btn-slider">
                                <?php echo esc_attr( of_get_option( 'tyros_slide2_button_text', 'Click Here') ); ?>
                            </a>
                        </div>                          
                    </div>
                <?php } ?>
        </div>
        </div>
    </div>
    <?php
}

function tyros_ctas() { ?>
    <div id="site-cta" class="row <?php echo of_get_option('tyros_slider_bool', 'yes') == 'yes' ? '' : 'no-slider' ?>"><!-- #CTA boxes -->
        

        
        <div class="col-md-4 site-cta">
            <div class="center">
                <i class="<?php echo esc_attr( of_get_option('tyros_cta1_icon', 'fa fa-desktop') ); ?>"></i>
            </div>
                
            <h3><?php echo esc_attr( of_get_option('tyros_cta1_title', 'Woo Commerce Supported') ); ?></h3>
            <p>
                <?php echo esc_attr( of_get_option('tyros_cta1_text', 'Tyros is compatible with Woo Commerce') ); ?>
            </p>
            <p class="">
                <a href="<?php echo esc_url( of_get_option('tyros_cta1_url') ) ?>" class=""><?php echo esc_attr( of_get_option('tyros_cta1_button_text', 'Learn More') );  ?></a>
            </p>                                
                
        </div>
            <div class="col-md-4 site-cta">
                <div class="center">
                    <i class="<?php echo esc_attr( of_get_option('tyros_cta2_icon', 'fa fa-tachometer') ); ?>"></i>
                </div>

                <h3><?php echo esc_attr( of_get_option('tyros_cta2_title', 'Font Awesome Icons') ); ?></h3>
                <p>
                    <?php echo esc_attr( of_get_option('tyros_cta2_text', 'Tyros is loaded with over 600Font Awesome icons') ); ?>
                </p>
                <p class="">
                    <a href="<?php echo esc_url( of_get_option('tyros_cta2_url') ); ?>" class=""><?php echo esc_attr( of_get_option('tyros_cta2_button_text', 'Click Here') );  ?></a>
                </p>                                

            </div>
            <div class="col-md-4 site-cta">
                <div class="center">
                    <i class="<?php echo esc_attr( of_get_option('tyros_cta3_icon', 'fa fa-rocket') ); ?>"></i>
                </div>

                <h3><?php echo esc_attr( of_get_option('tyros_cta3_title', 'Responsive') ); ?></h3>
                <p>
                    <?php echo esc_attr( of_get_option('tyros_cta3_text', 'Tyros looks great on desktop, tablets and phones mobile phones.') ); ?>
                </p>
                <p class="">
                    <a href="<?php echo esc_url( of_get_option('tyros_cta3_url') ); ?>" class=""><?php echo esc_attr( of_get_option('tyros_cta3_button_text', 'Click Here') );  ?></a>
                </p>

            </div>
        
    </div><!-- #CTA boxes -->
    <div class="clear"></div>
    <?php
}

function tyros_banner() { ?>
    <div id="top-banner" class="full-banner col-md-12">
        <div class="top-banner-text">
            <?php get_sidebar('banner'); ?>
        </div>            
    </div>
    
    <div class="clear"></div>
<?php }

function tyros_toolbar() {
    if ('no' != of_get_option('tyros_headerbar_bool', 'yes')) {
        ?>
        <div id="site-toolbar">
            <div class="row ">
                 
                    <div class="col-xs-6 social-bar animated fadeInDown">

                        <?php if ('' != of_get_option('tyros_facebook_url', '#')) : ?>
                            <a href="<?php echo esc_url( of_get_option('tyros_facebook_url', '#') );?>" target="_blank" class="icon-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        <?php endif; ?>

                        <?php if ('' != of_get_option('tyros_twitter_url', '#')) : ?>
                            <a href="<?php echo esc_url( of_get_option('tyros_twitter_url', '#') ); ?>" target="_blank" class="icon-twitter">
                                <i class="fa fa-twitter"></i>                            
                            </a>
                        <?php endif; ?>


                        <?php if ('' != of_get_option('tyros_linkedin_url', '#')) : ?>
                            <a href="<?php echo esc_url( of_get_option('tyros_linkedin_url', '#') ); ?>" target="_blank" class="icon-linkedin">
                                <i class="fa fa-linkedin"></i>                            
                            </a>
                        <?php endif; ?>


                        <?php if ('' != of_get_option('tyros_gplus_url', '#')) : ?>
                            <a href="<?php echo esc_url( of_get_option('tyros_gplus_url', '#') ); ?>" target="_blank" class="icon-gplus">
                                <i class="fa fa-google-plus"></i>                            
                            </a>
                        <?php endif; ?>

                    </div>                    
                    
                    <div class="col-xs-6 contact-bar animated fadeInDown">
                        <?php if( of_get_option('tyros_store_link1_url', '/my-account') ) : ?>
                            <a href="<?php echo esc_url( of_get_option('tyros_store_link1_url', '/my-account') ); ?>"><?php echo esc_attr( of_get_option('tyros_store_link1_text', 'My Account') ); ?></a>
                        <?php endif; ?>
                        
                        <?php if( of_get_option('tyros_store_link2_url', '/cart') ) : ?>
                            <a href="<?php echo esc_url( of_get_option('tyros_store_link2_url', '/cart') ); ?>"><?php echo esc_attr( of_get_option('tyros_store_link2_text', 'Cart') ); ?></a>
                        <?php endif; ?>
                            
                        <?php if( of_get_option('tyros_store_link3_url', '/checkout') ) : ?>    
                            <a href="<?php echo esc_url( of_get_option('tyros_store_link3_url', '/checkout') ); ?>"><?php echo esc_attr( of_get_option('tyros_store_link3_text', 'Checkout') ); ?></a>
                        <?php endif; ?>
                    </div>


                
            </div>
        </div>
        <?php
    }
}

function tyros_close() { ?>

    <footer id="colophon" class="site-footer " role="contentinfo">
        <div class="footer-boxes">
            <div class="row ">
                <div class="col-md-12">
                    <?php get_sidebar('footer'); ?>
                </div>            
            </div>        
        </div>
        <div class="site-info">
            <div class="row ">
                <div class="col-xs-6 text-left payment-gateways">
                    <?php if( of_get_option( 'tyros_paypal', 'on') === 'on') : ?>
                    <i class="fa fa-cc-paypal"></i>
                    <?php endif; ?>

                    <?php if( of_get_option( 'tyros_visa', 'on') === 'on') : ?>
                    <i class="fa fa-cc-visa"></i>
                    <?php endif; ?>

                    <?php if( of_get_option( 'tyros_mastercard', 'on') === 'on') : ?>
                    <i class="fa fa-cc-mastercard"></i>
                    <?php endif; ?>                       
                </div>
                <div class="col-xs-6 text-right">

                    <div>
                        <?php echo esc_textarea( of_get_option('tyros_footer_text', 'Copyright &copy; your company name') );?>
                    </div>
                    <div>
                        <a href="http://smartcatdesign.net/" rel="designer" style="display: block !important">
                            <img src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo.png'?>" width="20px"/>
                            Design by SmartCat
                        </a>
                    </div>
                </div>              
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    </div><!-- #page -->    
    <?php 

}


function tyros_above_page(){
    
    if ( is_active_sidebar( 'sidebar-above-page' ) ) : ?>

        <div class="row">
            <div class="top-banner-text">
                <?php get_sidebar( 'above-page' ) ?>
            </div>            
        </div>

        <div class="clear"></div>            

    <?php endif;
        
}

function tyros_below_page(){
    
    if ( is_active_sidebar( 'sidebar-below-page' ) ) : ?>

        <div class="row">
            <div class="bottom-banner-text">
                <?php get_sidebar( 'below-page' ) ?>
            </div>
        </div>

        <div class="clear"></div>            

    <?php endif;
        
}

function tyros_above_post(){
    
    if ( is_active_sidebar( 'sidebar-above-post' ) ) : ?>

        <div class="row">
            <div class="top-banner-text">
                <?php get_sidebar( 'above-post' ) ?>
            </div>            
        </div>

        <div class="clear"></div>            

    <?php endif;
        
}

function tyros_below_post(){
    
    if ( is_active_sidebar( 'sidebar-below-post' ) ) : ?>

        <div class="row">
            <div class="bottom-banner-text">
                <?php get_sidebar( 'below-post' ) ?>
            </div>
        </div>

        <div class="clear"></div>            

    <?php endif;
        
}