<?php
/**
 * Intialize language files 
 */
load_theme_textdomain('novellite', get_template_directory() . '/languages');

$functions_path = get_template_directory() . '/functions/';
require_once (get_template_directory() . '/inc/inc.php'); 
/* ----------------------------------------------------------------------------------- */
/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */
function NovelLite_add_stylesheet() {
	if (!is_admin()) {
    wp_enqueue_style( 'NovelLite_font', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    wp_enqueue_style('NovelLite_bootstrap', get_template_directory_uri() . "/css/bootstrap.css", '', '', 'all');
    wp_enqueue_style('NovelLite_font_awesome', get_template_directory_uri() . "/font-awesome/css/font-awesome.min.css", '', '', 'all');
    wp_enqueue_style('NovelLite_animate', get_template_directory_uri() . "/css/animate.css", '', '', 'all');
	wp_enqueue_style('NovelLite_bxslider', get_template_directory_uri() . "/css/jquery.bxslider.css", '', '', 'all');
    wp_enqueue_style('NovelLite_prettyPhoto', get_template_directory_uri() . "/css/prettyPhoto.css", '', '', 'all');
	    wp_enqueue_style( 'NovelLite_style', get_stylesheet_uri() );
	}
}
add_action('wp_enqueue_scripts', 'NovelLite_add_stylesheet');
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */
function NovelLite_wp_enqueue_scripts() {
	if (!is_admin()) {
    wp_enqueue_script('jquery');
	wp_enqueue_script('NovelLite-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'));
    wp_enqueue_script('NovelLite-jqBootstrapValidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array('jquery'));
	wp_enqueue_script('NovelLite-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
    wp_enqueue_script('NovelLite-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script('NovelLite-hammer', get_template_directory_uri() . '/js/hammer.js', array('jquery'));
    wp_enqueue_script('NovelLite-superslides', get_template_directory_uri() . '/js/jquery.superslides.js', array('jquery'));
	wp_enqueue_script('NovelLite-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'));
    wp_enqueue_script('NovelLite-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));
	 wp_enqueue_script('jcarousellite', get_template_directory_uri() . '/js/jquery.jcarousellite.js', array('jquery'));
	 wp_enqueue_script('NovelLite-scrollSpeed', get_template_directory_uri() . '/js/jQuery.scrollSpeed.js', array('jquery'));
    wp_enqueue_script('NovelLite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
	
	}
}
add_action('wp_enqueue_scripts', 'NovelLite_wp_enqueue_scripts');
/* ----------------------------------------------------------------------------------- */
/* Custom Jqueries Enqueue */
/* ----------------------------------------------------------------------------------- */
function NovelLite_custom_jquery() {
	wp_enqueue_script('NovelLite-buxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'));
}


add_action('wp_footer', 'NovelLite_custom_jquery');

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);
//Front Page Rename
$get_status = NovelLite_get_option('re_nm');
$get_file_ac = get_template_directory() . '/front-page.php';
$get_file_dl = get_template_directory() . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
//False Part
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}

function NovelLite_get_option($name) {
    $options = get_option('NovelLite_options');
    if (isset($options[$name]))
        return $options[$name];
}

function NovelLite_enqueue_comment_reply() {
    // on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
}
// Hook into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'NovelLite_enqueue_comment_reply' );

function NovelLite_update_option($name, $value) {
    $options = get_option('NovelLite_options');
    $options[$name] = $value;
    return update_option('NovelLite_options', $options);
}

function NovelLite_delete_option($name) {
    $options = get_option('NovelLite_options');
    unset($options[$name]);
    return update_option('NovelLite_options', $options);
}

function NovelLite_setup() {
    /**
     * Post format support
     */
    add_theme_support('post-formats', array('image', 'gallery', 'video', 'link', 'quote'));

    /**
     * Automatic feed links support
     */
    add_theme_support('automatic-feed-links');

    /**
     * Custom editor style initialize
     */
    add_editor_style();
    register_nav_menus(array(
        'home-menu' => HOME_MENU,
        'frontpage-menu' => FRONT_MENU
    ));
}
function custom_theme_setup() {
	add_theme_support( 'custom-header' );
}
add_action('after_setup_theme', 'NovelLite_setup');


function NovelLitemenu_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'NovelLitemenu_add_menuclass');


//main nav
function NovelLitemenu_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'menu_class' => 'sf-menu nav navbar-nav navbar-right', 'menu_id' => '','container' => '', 'fallback_cb' => 'NovelLitemenu_nav_fallback'));
    else
        NovelLitemenu_nav_fallback();
}
function NovelLitemenu_nav_fallback() {
    ?>

    <ul class="sf-menu nav navbar-nav navbar-right">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}
//Frontpage nav
function NovelLitemenu_frontpage_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'menu_class' => 'nav navbar-nav navbar-right sf-menu', 'menu_id' => '', 'container' => '', 'fallback_cb' => 'NovelLitemenu_frontpage_nav_fallback'));
    else
        NovelLitemenu_frontpage_nav_fallback();
}
function NovelLitemenu_frontpage_nav_fallback() {
    ?>
    <ul class="sf-menu nav navbar-nav navbar-right">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}
//mobile nav
function NovelLitemenu_mobile_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'menu_class' => '', 'menu_id' => '','container' => '', 'fallback_cb' => 'NovelLitemenu_mobile_nav_fallback'));
    else
        NovelLitemenu_mobile_nav_fallback();
}

// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function NovelLite_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'NovelLite_add_menuclass');

//main nav
function NovelLite_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'NovelLite_nav_fallback'));
    else
        NovelLite_nav_fallback();
}

function NovelLite_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
    <?php
    wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
    ?>
        </ul>
    </div>
    <?php
}

function NovelLite_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . HOME_TEXT . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . HOME_TEXT . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'NovelLite_nav_menu_items');

//Frontpage nav
function NovelLite_frontpage_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'NovelLite_frontpage_nav_fallback'));
    else
        NovelLite_frontpage_nav_fallback();
}

function NovelLite_frontpage_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
    <?php
    wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
    ?>
        </ul>
    </div>
    <?php
}
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
  /*----------------------------------------------------------------------------------- */

function NovelLite_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<p id="crumbs">';
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo PAGE . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</p>';
}

/* ----------------------------------------------------------------------------------- */
/* Attachment Page Design
  /*----------------------------------------------------------------------------------- */

//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function NovelLite_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function NovelLite_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3><span class="line"></span>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3><span class="line"></span>',
        'after_title' => '</h3>',
    ));
	// Footer Area 1,  Empty by default.
    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'novellite'),
        'id' => 'first-footer-widget-area',
        'description' => __('First Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	// Footer Area 2, Empty by default.
    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'novellite'),
        'id' => 'second-footer-widget-area',
        'description' => __('Second Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	// Footer Area 3, Empty by default.
    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'novellite'),
        'id' => 'third-footer-widget-area',
        'description' => __('Third Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	// Footer Area 4, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => __('Fourth Footer Widget Area', 'novellite'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('Fourth Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
        'name' => __('Woocommerce widget area', 'novellite'),
        'id' => 'th-woo-widget-area',
        'description' => __('Woocommerce page display', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    )); 
	
}

/** Register sidebars by running NovelLite_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'NovelLite_widgets_init');

/////////Theme Options
/* ----------------------------------------------------------------------------------- */
/* Add Favicon
  /*----------------------------------------------------------------------------------- */


function NovelLite_childtheme_favicon() {
    if (get_theme_mod('favicon_upload') != '') {
        echo '<link rel="shortcut icon" href="' .get_theme_mod('favicon_upload') . '"/>' . "\n";
    }
}

add_action('wp_head', 'NovelLite_childtheme_favicon');
/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */
add_action('wp_head', 'NovelLite_of_head_css');

function NovelLite_of_head_css() {
    $output = '';
    $custom_css = get_theme_mod('custom_css_text','');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

// activate support for thumbnails
function get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

//Trm excerpt
function NovelLite_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

function NovelLite_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

//Trm post title
function the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}
function NovelLite_head_css() {
    $output = '';
    $alt_css = NovelLite_get_option('NovelLite_altstylesheet');
    if ($alt_css <> '') {
        $output .= $alt_css . "\n";
    }
// Output styles
    if ($output <> '') {
$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n
.footer_bg, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce ul.products li.product a.button, .woocommerce.archive ul.products li.product a.button, .woocommerce-page.archive ul.products li.product a.button, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce ul.products li.product a.button:hover, .woocommerce.archive ul.products li.product a.button:hover, .woocommerce-page.archive ul.products li.product a.button:hover .woocommerce-page #respond input#submit, .woocommerce-product-search input[type='submit'], .ui-slider .ui-slider-range {
background:" . $alt_css . ";
}  
.text-primary {
    color: " . $alt_css . ";
}
a {
    color: " . $alt_css . ";
}
.btn-primary {
    border-color: " . $alt_css . ";
    background-color:" . $alt_css . ";
}
.btn-primary.disabled,
.btn-primary[disabled],
fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active,
.btn-primary[disabled]:active,
fieldset[disabled] .btn-primary:active,
.btn-primary.disabled.active,
.btn-primary[disabled].active,
fieldset[disabled] .btn-primary.active {
    border-color:" . $alt_css . ";
    background-color:" . $alt_css . ";
}
.btn-primary .badge {
    color:" . $alt_css . ";
    background-color: #fff;
}
.btn-xl {
    border-color: " . $alt_css . ";
    background-color: " . $alt_css . ";
}
.navbar-default .navbar-brand {
    color:" . $alt_css . ";
}
.navbar-default .navbar-toggle {
    border-color:" . $alt_css . ";
    background-color:" . $alt_css . ";
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
    background-color:" . $alt_css . ";
}
.navbar-default .navbar-nav>.active>a {
    background-color:" . $alt_css . ";
}
.timeline>li .timeline-image {
    background-color:" . $alt_css . ";
}
.contact_section .form-control:focus {
    border-color:" . $alt_css . ";
}
ul.social-buttons li a:hover,
ul.social-buttons li a:focus,
ul.social-buttons li a:active {
    background-color:" . $alt_css . ";
}
::-moz-selection {
    background:" . $alt_css . ";
}

::selection {
    background:" . $alt_css . ";
}
body {
    webkit-tap-highlight-color:" . $alt_css . ";
}
ol.commentlist li.comment .comment-author .avatar {
    border: 3px solid " . $alt_css . "; 
}
ol.commentlist li.comment .reply a {
    background: " . $alt_css . ";
}
#commentform a {
    color: " . $alt_css . ";
}
.home_blog_content .post:hover .post_content_bottom{
    background:" . $alt_css . ";
}
#portfolio .portfolio-item .portfolio-link .portfolio-hover{
	background:" . $alt_css . ";
}
.navbar .sf-menu ul li {
    background-color:" . $alt_css . ";
}
.sf-menu ul ul li {
	background-color:" . $alt_css . ";
}
.navbar .sf-menu li:hover,
.navbar .sf-menu li.sfHover {
	background-color:" . $alt_css . ";
}
</style>\n";
        echo $output;
    }
}
add_action('wp_head', 'NovelLite_head_css');
/**
 * Enqueues the javascript for comment replys 
 * 
 * */
function NovelLite_enqueue_scripts() {
    if (is_singular() and get_site_option('thread_comments')) {
        wp_print_scripts('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'NovelLite_enqueue_scripts');

  // Set up the WordPress core custom background feature.
    add_theme_support('custom-background',apply_filters( 'novellite_background_args', array(
        'default-repeat'         => 'no-repeat',
        'default-position-x'     => 'center',
        'default-attachment'     => 'fixed'
    )));
?>