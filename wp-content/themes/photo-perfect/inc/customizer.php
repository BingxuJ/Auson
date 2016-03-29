<?php
/**
 * Photo Perfect Theme Customizer.
 *
 * @package Photo_Perfect
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function photo_perfect_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/control.php';

	// Load customize helpers.
	require get_template_directory() . '/inc/helper/options.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

}
add_action( 'customize_register', 'photo_perfect_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function photo_perfect_customize_preview_js() {

	wp_enqueue_script( 'photo_perfect_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'photo_perfect_customize_preview_js' );

/**
 * Load styles for Customizer.
 */
function photo_perfect_load_customizer_styles() {

	global $pagenow;

	if ( 'customize.php' === $pagenow ) {
		wp_register_style( 'photo-perfect-customizer-style', get_template_directory_uri() . '/css/customizer.css', false, '1.0.0' );
		wp_enqueue_style( 'photo-perfect-customizer-style' );

	}

}

add_action( 'admin_enqueue_scripts', 'photo_perfect_load_customizer_styles' );

/**
 * Add Upgrade To Pro button.
 *
 * @since 1.0.0
 */
function photo_perfect_custom_customize_enqueue_scripts() {

	wp_register_script( 'photo-perfect-customizer-button', get_template_directory_uri() . '/js/customizer-button.js', array( 'customize-controls' ), '1.0.0', true );
	$data = array(
	  'updrade_button_text' => __( 'Buy Photo Perfect Pro', 'photo-perfect' ),
	  'updrade_button_link' => 'http://themepalace.com/downloads/photo-perfect-pro/',
	);
	wp_localize_script( 'photo-perfect-customizer-button', 'Photo_Perfect_Customizer_Object', $data );
	wp_enqueue_script( 'photo-perfect-customizer-button' );

}

add_action( 'customize_controls_enqueue_scripts', 'photo_perfect_custom_customize_enqueue_scripts' );
