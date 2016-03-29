<?php

function swiftbiz_lite_customize_register( $wp_customize ) {

	// define image directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	// Do stuff with $wp_customize, the WP_Customize_Manager object.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_control('header_textcolor');
	
	// ====================================
	// = Background Image Size for custom-background
	// ====================================
	$wp_customize->add_setting( 'background_size', array(
		'default'        => 'cover',
		'theme_supports' => 'custom-background',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
	));
	$wp_customize->add_control('background_size', array(
		'label' => __('Breadcrumb Background Image Size','swiftbiz-lite'),
		'section' => 'background_image',
		'settings' => 'background_size',
	));
	// ====================================
	// = Swiftbiz Lite Theme Pannel
	// ====================================
	$wp_customize->add_panel( 'sketchthemes', array(
		'title' => __( 'Swiftbiz Lite Options', 'swiftbiz-lite'),
		'priority' => 10,
	) );

	// ====================================
	// = Swiftbiz Lite Theme Sections
	// ====================================
	$wp_customize->add_section( 'home_page_settings' , array(
		'title' => __('Home Page Settings','swiftbiz-lite'),
		'panel' => 'sketchthemes',
		'active_callback' => 'is_front_page'
	) );
	$wp_customize->add_section( 'general_settings' , array(
		'title' => __('General Settings','swiftbiz-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'header_settings' , array(
		'title' => __('Header Settings','swiftbiz-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'breadcrumb_settings' , array(
		'title' => __('Breadcrumb Settings','swiftbiz-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'blog_page_settings' , array(
		'title' => __('Blog Page Settings','swiftbiz-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'footer_settings' , array(
		'title' => __('Footer Settings','swiftbiz-lite'),
		'panel' => 'sketchthemes',
	) );
	$wp_customize->add_section( 'custom_message_settings' , array(
		'title' => __('Custom Message','swiftbiz-lite'),
		'panel' => 'sketchthemes',
	) );

	// ====================================
	// = General Settings Sections
	// ====================================
	$wp_customize->add_setting( 'swiftbiz_lite_pri_color', array(
		'default'           => '#41bb99' ,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'swiftbiz_lite_pri_color', array(
		'label'       => __( 'Primary Color Scheme', 'swiftbiz-lite' ),
		'description' => __( 'Theme Primary Color.', 'swiftbiz-lite' ),
		'section'     => 'general_settings',
	) ) );
	$wp_customize->add_setting( 'swiftbiz_lite_sec_color', array(
		'default'           => '#555555',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'swiftbiz_lite_sec_color', array(
		'label'       => __( 'Secondary Color Scheme', 'swiftbiz-lite' ),
		'description' => __( 'Theme Secondary Color.', 'swiftbiz-lite' ),
		'section'     => 'general_settings',
	) ) );	

	// ====================================
	// = Header Settings Sections
	// ====================================
	$wp_customize->add_setting( 'swiftbiz_lite_logo_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, 'swiftbiz_lite_logo_img', array(
		'label' => __( 'Logo Image', 'swiftbiz-lite' ),
		'section' => 'header_settings',
		'mime_type' => 'image',
	) ) );
	$wp_customize->add_setting( 'swiftbiz_lite_headserach', array(
		'default'           => 'on',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'swiftbiz_lite_headserach', array(
		'label' => __( 'Search Icon ON/OFF', 'swiftbiz-lite' ),
		'section' => 'header_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );
	$wp_customize->add_setting( 'swiftbiz_lite_persistent_on_off', array(
		'default'           => 'on',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'swiftbiz_lite_persistent_on_off', array(
		'label' => __( 'Persistent (sticky) Header Navigation ON/OFF', 'swiftbiz-lite' ),
		'section' => 'header_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );
	// ====================================
	// = Breadcrumb Settings Sections
	// ====================================
	$wp_customize->add_setting( 'breadcrumbbg_color', array(
		'default'           => '#41bb99',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbbg_color', array(
		'label'       => __( 'Breadcrumb Background Color', 'swiftbiz-lite' ),
		'section'     => 'breadcrumb_settings',
	) ) );
	$wp_customize->add_setting( 'breadcrumbbg_image', array(
		'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'breadcrumbbg_image', array(
		'label' => __( 'Breadcrumb Background Image', 'swiftbiz-lite' ),
		'section' => 'breadcrumb_settings',
	) ) );
	$wp_customize->add_setting( 'breadcrumbbg_repeat', array(
		'default'        => 'no-repeat',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_background_repeat',
	) );
	$wp_customize->add_control( 'breadcrumbbg_repeat', array(
		'label'      => __( 'Breadcrumb Background Repeat', 'swiftbiz-lite' ),
		'section'    => 'breadcrumb_settings',
		'type'       => 'radio',
		'choices'    => array(
			'no-repeat'  => __('No Repeat', 'swiftbiz-lite'),
			'repeat'     => __('Tile', 'swiftbiz-lite'),
			'repeat-x'   => __('Tile Horizontally', 'swiftbiz-lite'),
			'repeat-y'   => __('Tile Vertically', 'swiftbiz-lite'),
		),
		'active_callback' => 'swiftbiz_lite_active_breadcrumb_image',
	) );
	$wp_customize->add_setting( 'breadcrumbbg_position_x', array(
		'default'        => 'center',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_background_position',
	) );
	$wp_customize->add_control( 'breadcrumbbg_position_x', array(
		'label'      => __( 'Breadcrumb Background Position', 'swiftbiz-lite'),
		'section'    => 'breadcrumb_settings',
		'type'       => 'radio',
		'choices'    => array(
			'left'       => __('Left', 'swiftbiz-lite'),
			'center'     => __('Center', 'swiftbiz-lite'),
			'right'      => __('Right', 'swiftbiz-lite'),
		),
		'active_callback' => 'swiftbiz_lite_active_breadcrumb_image',
	) );
	$wp_customize->add_setting( 'breadcrumbbg_attachment', array(
		'default'        => 'scroll',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_background_attachment',
	) );
	$wp_customize->add_control( 'breadcrumbbg_attachment', array(
		'label'      => __( 'Breadcrumb Background Attachment', 'swiftbiz-lite'),
		'section'    => 'breadcrumb_settings',
		'type'       => 'radio',
		'choices'    => array(
			'scroll'     => __('Scroll', 'swiftbiz-lite'),
			'fixed'      => __('Fixed', 'swiftbiz-lite'),
		),
		'active_callback' => 'swiftbiz_lite_active_breadcrumb_image',
	) );
	
	$wp_customize->add_setting( 'breadcrumbbg_size', array(
		'default'        => 'cover',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
	));
	$wp_customize->add_control('breadcrumbbg_size', array(
		'label' => __('Breadcrumb Background Image Size','swiftbiz-lite'),
		'section' => 'breadcrumb_settings',
		'active_callback' => 'swiftbiz_lite_active_breadcrumb_image',
	));

	// ====================================
	// = Home Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'swiftbiz_lite_home_featured_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'swiftbiz_lite_home_featured_sec', array(
		'label' => __( 'Featured Section ON/OFF', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );
	$wp_customize->add_setting( 'swiftbiz_lite_home_blog_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'swiftbiz_lite_home_blog_sec', array(
		'label' => __( 'Home Blog Section ON/OFF', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );

	$wp_customize->add_setting( 'swiftbiz_lite_home_blog_title', array(
		'default'        => __('Blog', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_home_blog_title', array(
		'label' => __('Home Blog Section Title','swiftbiz-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'swiftbiz_lite_home_blog_num', array(
		'default'        => __('6', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
	));
	$wp_customize->add_control('swiftbiz_lite_home_blog_num', array(
		'label' => __('Number Of Blogs','swiftbiz-lite'),
		'section' => 'home_page_settings',
	));

	$wp_customize->add_setting( 'swiftbiz_lite_home_brand_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'swiftbiz_lite_home_brand_sec', array(
		'label' => __( 'Our Clients Section ON/OFF', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );

	// First Client Settings
	$wp_customize->add_setting( 'swiftbiz_lite_brand1_alt', array(
		'default'        => __('First Client Name', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand1_alt', array(
		'label' => __('First Client Name','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));

	$wp_customize->add_setting( 'swiftbiz_lite_brand1_url', array(
		'default'        => '#',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand1_url', array(
		'label' => __('First Client URL','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));

	$wp_customize->add_setting( 'swiftbiz_lite_brand1_img', array(
		'default'           => $imagepath.'brand-logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'swiftbiz_lite_brand1_img', array(
		'label' => __( 'First Client Logo Image', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	) ) );

	// Second Client Settings
	$wp_customize->add_setting( 'swiftbiz_lite_brand2_alt', array(
		'default'        => __('Second Client Name', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand2_alt', array(
		'label' => __('Second Client Name','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));

	$wp_customize->add_setting( 'swiftbiz_lite_brand2_url', array(
		'default'        => '#',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand2_url', array(
		'label' => __('Second Client URL','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));

	$wp_customize->add_setting( 'swiftbiz_lite_brand2_img', array(
		'default'           => $imagepath.'brand-logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'swiftbiz_lite_brand2_img', array(
		'label' => __( 'Second Client Logo Image', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	) ) );
	// Third Client Settings
	$wp_customize->add_setting( 'swiftbiz_lite_brand3_alt', array(
		'default'        => __('Third Client Name', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand3_alt', array(
		'label' => __('Third Client Name','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'swiftbiz_lite_brand3_url', array(
		'default'        => '#',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand3_url', array(
		'label' => __('Third Client URL','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'swiftbiz_lite_brand3_img', array(
		'default'           => $imagepath.'brand-logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'swiftbiz_lite_brand3_img', array(
		'label' => __( 'Third Client Logo Image', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	) ) );
	// Fourth Client Settings
	$wp_customize->add_setting( 'swiftbiz_lite_brand4_alt', array(
		'default'        => __('Fourth Client Name', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand4_alt', array(
		'label' => __('Fourth Client Name','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'swiftbiz_lite_brand4_url', array(
		'default'        => '#',
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_brand4_url', array(
		'label' => __('Fourth Client URL','swiftbiz-lite'),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'swiftbiz_lite_brand4_img', array(
		'default'           => $imagepath.'brand-logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'swiftbiz_lite_brand4_img', array(
		'label' => __( 'Fourth Client Logo Image', 'swiftbiz-lite' ),
		'section' => 'home_page_settings',
		'active_callback' => 'swiftbiz_lite_active_brand_section',
	) ) );

	// ====================================
	// = Blog Page Settings Sections
	// ====================================
	$wp_customize->add_setting( 'swiftbiz_lite_blogpage_heading', array(
		'default'        => __('Blog', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_blogpage_heading', array(
		'label' => __('Blog Page Title','swiftbiz-lite'),
		'section' => 'blog_page_settings',
	));
	// ====================================
	// = Footer Settings Sections
	// ====================================
	$wp_customize->add_setting( 'swiftbiz_lite_copyright', array(
		'default'        => __('Proudly Powered by WordPress', 'swiftbiz-lite'),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_copyright', array(
		'label' => __('Copyright Text','swiftbiz-lite'),
		'section' => 'footer_settings',
	));
	// ====================================
	// = Custom Message Settings Sections
	// ====================================
	$wp_customize->add_setting( 'swiftbiz_lite_four_zero_four_txt', array(
		'default'        => __("We're sorry, but the page you were looking for doesn't exist. You can try to search bellow", "swiftbiz-lite"),
		'sanitize_callback' => 'swiftbiz_lite_sanitize_textarea',
		//'transport' => 'postMessage',
	));
	$wp_customize->add_control('swiftbiz_lite_four_zero_four_txt', array(
		'label' => __('404 Page Message','swiftbiz-lite'),
		'section' => 'custom_message_settings',
	));

}
add_action( 'customize_register', 'swiftbiz_lite_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Fifteen 1.0
 */
function swiftbiz_lite_customize_preview_js() {
	wp_enqueue_script( 'swiftbiz-lite-customizer-js', get_template_directory_uri() . '/js/swiftbiz-lite-customizer.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'swiftbiz_lite_customize_preview_js' );


// sanitize textarea
function swiftbiz_lite_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function swiftbiz_lite_sanitize_on_off( $input ) {
	$valid = array(
		'on' =>'ON',
		'off'=> 'OFF'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function swiftbiz_lite_sanitize_background_repeat( $input ) {
	$valid = array(
		'no-repeat'  => __('No Repeat', 'swiftbiz-lite'),
		'repeat'     => __('Tile', 'swiftbiz-lite'),
		'repeat-x'   => __('Tile Horizontally', 'swiftbiz-lite'),
		'repeat-y'   => __('Tile Vertically', 'swiftbiz-lite'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function swiftbiz_lite_sanitize_background_position( $input ) {
	$valid = array(
		'left'       => __('Left', 'swiftbiz-lite'),
		'center'     => __('Center', 'swiftbiz-lite'),
		'right'      => __('Right', 'swiftbiz-lite'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function swiftbiz_lite_sanitize_background_attachment( $input ) {
	$valid = array(
		'scroll'     => __('Scroll', 'swiftbiz-lite'),
		'fixed'      => __('Fixed', 'swiftbiz-lite'),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function swiftbiz_lite_active_brand_section( $control ) {
	if ( $control->manager->get_setting('swiftbiz_lite_home_brand_sec')->value() == 'on' ) {
		return true;
	} else {
		return false;
	}
}

function swiftbiz_lite_active_breadcrumb_image( $control ) {
	if ( $control->manager->get_setting('breadcrumbbg_image')->value() != '' ) {
		return true;
	} else {
		return false;
	}
}

?>