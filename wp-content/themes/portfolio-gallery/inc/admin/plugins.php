<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once 'class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'wdwt_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function wdwt_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Form Maker', // The plugin name.
			'slug'               => 'form-maker', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '1',
			'show_notices'       => true,
		),
		array(
			'name'               => 'Gallery', // The plugin name.
			'slug'               => 'photo-gallery', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '2',
			'show_notices'       => true,
		),
		array(
			'name'               => 'Slider WD', // The plugin name.
			'slug'               => 'slider-wd', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '3',
			'show_notices'       => true,
		),
		array(
			'name'               => 'Calendar', // The plugin name.
			'slug'               => 'event-calendar-wd', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '4',
			'show_notices'       => true,
		),
		array(
			'name'               => 'Instagram Feed WD', // The plugin name.
			'slug'               => 'wd-instagram-feed', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '5',
			'show_notices'       => true,
		),
		array(
			'name'               => 'FAQ', // The plugin name.
			'slug'               => 'faq-wd', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '6',
		),
		array(
			'name'               => 'WordPress Event Calendar', // The plugin name.
			'slug'               => 'spider-event-calendar', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '7',
		),
		
		
		
		
		
		array(
			'name'               => 'Contact Form Builder', // The plugin name.
			'slug'               => 'contact-form-builder', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '8',
		),
		array(
			'name'               => 'WordPress Video Player', // The plugin name.
			'slug'               => 'player', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			'popular'						 => '9',

		),
		array(
			'name'               => 'WordPress Catalog', // The plugin name.
			'slug'               => 'catalog', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'popular'						 => '10',
		),
		
		
		array(
			'name'               => 'WordPress Facebook', // The plugin name.
			'slug'               => 'spider-facebook', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'popular'						 => '11',
		),
		array(
			'name'               => 'WordPress Contacts', // The plugin name.
			'slug'               => 'spider-contacts', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'popular'						 => '12',
		),
		array(
			'name'               => 'Widget Twitter', // The plugin name.
			'slug'               => 'widget-twitter', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'popular'						 => '13',
		),
		array(
			'name'               => 'Zoom', // The plugin name.
			'slug'               => 'zoom-widget', // The plugin slug (typically the folder name).
			//'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'popular'						 => '14',
		),
	
		

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		// array(
		// 	'name'         => 'TGM New Media Plugin', // The plugin name.
		// 	'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
		// 	'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
		// 	'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		// 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		// ),

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		// array(
		// 	'name'      => 'Adminbar Link Comments to Pending',
		// 	'slug'      => 'adminbar-link-comments-to-pending',
		// 	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		// ),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		// array(
		// 	'name'      => 'BuddyPress',
		// 	'slug'      => 'buddypress',
		// 	'required'  => false,
		// ),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		// array(
		// 	'name'        => 'WordPress SEO by Yoast',
		// 	'slug'        => 'wordpress-seo',
		// 	'is_callable' => 'wpseo_init',
		// ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'wdwt-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install Recommended Plugins', "portfolio-gallery" ),
			'menu_title'                      => __( 'Recommended Plugins', "portfolio-gallery" ),
			'installing'                      => __( 'Installing Plugin: %s', "portfolio-gallery" ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', "portfolio-gallery" ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				"portfolio-gallery"
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				"portfolio-gallery"
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				"portfolio-gallery"
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				"portfolio-gallery"
			),
			'return'                          => __( 'Return to Required Plugins Installer', "portfolio-gallery" ),
			'activate'                        => __( 'Activate', "portfolio-gallery" ),
			'plugin_activated'                => __( 'Plugin activated successfully.', "portfolio-gallery" ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', "portfolio-gallery" ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', "portfolio-gallery" ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', "portfolio-gallery" ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', "portfolio-gallery" ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', "portfolio-gallery" ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		
	);

	tgmpa( $plugins, $config );


}



function wdwt_plugins_description($slug){
	$string='';
	switch ($slug) {
		case 'form-maker':
			$string = 'Form Maker is user-friendly plugin to create highly customizable and responsive forms in a few minutes with simple drag and drop interface.' ;
			break;
		case 'slider-wd':
			$string = 'Create responsive, highly configurable sliders with various effects for your WordPress site. ' ;
			break;
		case 'photo-gallery':
			$string = 'Photo Gallery is an advanced plugin with a list of tools and options for adding and editing images for different views. It is fully responsive.' ;
			break;
		case 'event-calendar-wd':
			$string = 'Organize and publish your events in an easy and elegant way using Event Calendar WD.' ;
			break;
		case 'wd-instagram-feed':
			$string = 'Bring your Instagram feeds to WordPress site with the most advanced and user-friendly Instagram plugin.' ;
			break;	
		case 'faq-wd':
			$string = 'Organize and publish your FAQs in an easy and elegant way using FAQ WD.' ;
			break;
		case 'contact-form-builder':
			$string = 'Create responsive FREE contact forms with multiple templates and theme options.' ;
			break;
		case 'spider-event-calendar':
			$string = 'WordPress event calendar is a FREE user-friendly responsive plugin to manage multiple recurring events and with various options.' ;
			break;
		case 'player':
			$string = 'Add HTML 5 and Flash players easily to your WordPress website by organizing videos in playlists and having playback options.' ;
			break;
		case 'catalog':
			$string = 'Create easy customizable products catalog for FREE at your WordPress website with categories, subcategories and multiple view options.' ;
			break;
		case 'spider-facebook':
			$string = 'Connect your WordPress website with Facebook by help of this Free plugin.' ;
			break;
		case 'spider-contacts':
			$string = 'Create and manage staff contact lists in your WordPress site for FREE easily and effectively: add photos, contact data and enable feedback for each contact.' ;
			break;
		case 'widget-twitter':
			$string = 'Fully integrate your website with your Twitter account! You can easily customize both the appearance and functionality of the plugin.' ;
			break;
		case 'zoom-widget':
			$string = 'Make your website more attractive and modern with WordPress Zoom plugin which has over 40 zoom styles. ' ;
			break;
		
		default:
			/*do nothing*/
	}
			
	return $string;

}



function wdwt_tgmpa_admin_scripts(){
	wp_enqueue_style( WDWT_VAR.'_admin_stylesheet', WDWT_URL . '/inc/css/admin.css', array(), WDWT_VERSION );
}