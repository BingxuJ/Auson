<?php
/**
 * Photo Perfect functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Photo_Perfect
 */

if ( ! function_exists( 'photo_perfect_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function photo_perfect_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Photo Perfect, use a find and replace
	 * to change 'photo-perfect' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'photo-perfect', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in four location.
	register_nav_menus( array(
    'primary'  => esc_html__( 'Primary Menu', 'photo-perfect' ),
    'footer'   => esc_html__( 'Footer Menu', 'photo-perfect' ),
    'social'   => esc_html__( 'Social Menu', 'photo-perfect' ),
    'notfound' => esc_html__( '404 Menu', 'photo-perfect' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

  /*
   * This theme styles the visual editor to resemble the theme style,
   * specifically font, colors, icons, and column width.
   */
  add_editor_style( array( 'css/editor-style.css' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'photo_perfect_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

  /**
   * Enable support for footer widgets
   */
  add_theme_support( 'footer-widgets', 4 );

  /**
   * Load Supports.
   */
  require get_template_directory() . '/inc/support.php';

  global $photo_perfect_default_options;
  $photo_perfect_default_options = photo_perfect_get_default_theme_options();

  global $photo_perfect_post_count;
  $photo_perfect_post_count = 1;

}
endif; // photo_perfect_setup

add_action( 'after_setup_theme', 'photo_perfect_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function photo_perfect_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'photo_perfect_content_width', 640 );
}
add_action( 'after_setup_theme', 'photo_perfect_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function photo_perfect_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'photo-perfect' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'photo-perfect' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'photo_perfect_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function photo_perfect_scripts() {

  wp_register_style( 'fontawesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome.min.css', '', '4.4.0' );

  wp_register_style( 'photo-perfect-google-fonts', '//fonts.googleapis.com/css?family=Arizonia|Open+Sans:600,400,300,100,700' );

  wp_register_style( 'photo-perfect-photobox-css', get_template_directory_uri() . '/third-party/photobox/photobox.css', array(), '1.6.3' );

	wp_enqueue_style( 'photo-perfect-style', get_stylesheet_uri(), array( 'fontawesome', 'photo-perfect-google-fonts', 'photo-perfect-photobox-css' ) );

	wp_enqueue_script( 'photo-perfect-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

  wp_enqueue_script( 'photo-perfect-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  wp_enqueue_script( 'photo-perfect-imageloaded', get_template_directory_uri() . '/third-party/imageloaded/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'photo-perfect-photobox', get_template_directory_uri() . '/third-party/photobox/jquery.photobox.js', array( 'jquery' ), '1.6.3', true );

	wp_enqueue_script( 'photo-perfect-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery', 'masonry', 'photo-perfect-imageloaded', 'photo-perfect-photobox' ), '1.0.0', true );
	wp_localize_script( 'photo-perfect-custom', 'PhotoPerfectScreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'photo-perfect' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'photo-perfect' ) . '</span>',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photo_perfect_scripts' );

/**
 * Load init.
 */
require get_template_directory() . '/inc/init.php';
