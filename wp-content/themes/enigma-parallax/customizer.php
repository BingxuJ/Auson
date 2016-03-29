<?php
add_action( 'customize_register', 'enigma_parallax_gl_customizer' );

function enigma_parallax_gl_customizer( $wp_customize ) {
	wp_enqueue_style('enigma-parallax-customizr', get_template_directory_uri() .'/css/customizr.css');
	$wl_theme_options = enigma_parallax_get_options();
	$ImageUrl1 = esc_url(get_template_directory_uri() ."/images/1.jpg");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/1.jpg");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/1.jpg");
	$ImageUrl4 = esc_url(get_template_directory_uri() ."/images/home-ppt1.png");
	$ImageUrl5 = esc_url(get_template_directory_uri() ."/images/home-ppt2.png");
	$ImageUrl6 = esc_url(get_template_directory_uri() ."/images/home-ppt3.png");
	$ImageUrl7 = esc_url(get_template_directory_uri() ."/images/home-ppt4.png");
	$team['1'] = get_template_directory_uri() ."/images/test1.jpg";
	$team['2'] = get_template_directory_uri() ."/images/test2.jpg";
	$team['3'] = get_template_directory_uri() ."/images/test3.jpg";
	$team['4'] = get_template_directory_uri() ."/images/test4.jpg";
	/* General section */
	$wp_customize->add_panel( 'enigma_theme_option', array(
    'title' => __( 'Theme Options','enigma-parallax' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
) );
$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __( 'Theme General Options','enigma-parallax' ),
            'description' => __( 'Here you can customize Your theme\'s general Settings','enigma-parallax' ),
			'panel'=>'enigma_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
		   ) );
		
	$wp_customize->add_setting(
		'enigma_options[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_front_page', array(
		'label'        => __( 'Show Front Page', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'enigma_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'enigma_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'enigma_parallax_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'enigma_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'enigma_parallax_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'enigma-parallax' ),
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'enigma_logo_height', array(
		'label'        => __( 'Logo Height', 'enigma-parallax' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[height]',
	) );
	$wp_customize->add_control( 'enigma_logo_width', array(
		'label'        => __( 'Logo Width', 'enigma-parallax' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[width]',
	) );
	
	$wp_customize->add_setting(
	'enigma_options[custom_css]',
		array(
		'default'=>esc_attr($wl_theme_options['custom_css']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'custom_css', array(
		'label'        => __( 'Custom CSS', 'enigma-parallax' ),
		'type'=>'textarea',
		'section'    => 'general_sec',
		'settings'   => 'enigma_options[custom_css]'
	) );
	
	
	/* Typography  & Google Font Section */
	$wp_customize->add_section(
        'font_sec',
        array(
            'title' =>  __( 'Typography Section','enigma-parallax' ),
			'panel'=>'enigma_theme_option',
            'description' =>  __( 'Here you can manage your theme font','enigma-parallax' ),
			'capability'=>'edit_theme_options',
            'priority' => 35,
        ));
		$wp_customize->add_setting(
	'enigma_options[font_title]',
		array(
		'default'=>esc_attr($wl_theme_options['font_title']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize, 'font_title',array(
			'label'    => __('Header Font Style', 'enigma-parallax'),
			'description' => __('Logo & Tagline Font Family', 'enigma-parallax'),
			'section'  => 'font_sec',
			'settings' => 'enigma_options[font_title]',			
	) ) );
		$wp_customize->add_setting(
	'enigma_options[header_menu_link]',
		array(
		'default'=>esc_attr($wl_theme_options['header_menu_link']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize, 'header_menu_link',array(
			'label'    => __('Header Menu Font', 'enigma-parallax'),
			'description' => __('Header Menu Font Family', 'enigma-parallax'),
			'section'  => 'font_sec',
			'settings' => 'enigma_options[header_menu_link]',			
	) ) );
		$wp_customize->add_setting(
	'enigma_options[theme_title]',
		array(
		'default'=>esc_attr($wl_theme_options['theme_title']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize, 'theme_title',array(
			'label'    => __('Theme Heading Title', 'enigma-parallax'),
			'description' => __('Change Theme Title Font Family', 'enigma-parallax'),
			'section'  => 'font_sec',
			'settings' => 'enigma_options[theme_title]',			
	) ) );
	$wp_customize->add_setting(
	'enigma_options[font_description]',
		array(
		'default'=>esc_attr($wl_theme_options['font_description']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize, 'font_description',array(
			'label'    => __('Font Family For Theme','enigma-parallax'), 
			'description' => __('', 'enigma-parallax'),
			'section'  => 'font_sec',
			'settings' => 'enigma_options[font_description]',			
	) ) );

	/* Slider options */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' =>  __( 'Theme Slider Options','enigma-parallax' ),
			'panel'=>'enigma_theme_option',
            'description' =>  __( 'Here you can add slider images','enigma-parallax' ),
			'capability'=>'edit_theme_options',
            'priority' => 35,
			'active_callback' => 'is_front_page',
        )
    );
	$wp_customize->add_setting(
		'enigma_options[slider_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_home'],
			'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
$wp_customize->add_control( 'enigma_show_slider', array(
		'label'        => __( 'Enable Slider on Home', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slider_home]'
	) );
	$wp_customize->add_setting(
		'enigma_options[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_image_3]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_title_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_desc_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_desc_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_desc_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_text_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_text_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_text_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'enigma_options[slide_btn_link_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'enigma-parallax' ),
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_image_1]'
	) ) );
	$wp_customize->add_control( 'enigma_slide_title_1', array(
		'label'        => __( 'Slider title one', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_title_1]'
	) );
	$wp_customize->add_control( 'enigma_slide_desc_1', array(
		'label'        => __( 'Slider description one', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_desc_1]'
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_text_1]'
	) );
	
	$wp_customize->add_control( 'enigma_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link One', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'enigma-parallax' ),
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_image_2]'
	) ) );
	
	$wp_customize->add_control( 'enigma_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_title_2]'
	) );
	$wp_customize->add_control( 'enigma_slide_desc_2', array(
		'label'        => __( 'Slider Description Two', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_desc_2]'
	) );
	$wp_customize->add_control( 'enigma_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Two', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_text_2]'
	) );
	$wp_customize->add_control( 'enigma_slide_btnlink_2', array(
		'label'        => __( 'Slider Button Link Two', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_link_2]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'enigma-parallax' ),
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_image_3]'
	) ) );
	$wp_customize->add_control( 'enigma_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_title_3]'
	) );
	
	$wp_customize->add_control( 'enigma_slide_desc_3', array(
		'label'        => __( 'Slider Description Three', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_desc_3]'
	) );
	$wp_customize->add_control( 'enigma_slide_btn_3', array(
		'label'        => __( 'Slider Button Text Three', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_text_3]'
	) );
	$wp_customize->add_control( 'enigma_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'enigma_options[slide_btn_link_3]'
	) );
	
	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options",'enigma-parallax'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting(
		'enigma_options[service_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['service_home'],
			'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
$wp_customize->add_control( 'enigma_show_service', array(
		'label'        => __( 'Enable Services on Home', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_home]'
	) );
	$wp_customize->add_setting(
	'enigma_options[home_service_heading]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_heading']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		
			)
	);
	$wp_customize->add_control( 'home_service_heading', array(
		'label'        => __( 'Home Service Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[home_service_heading]'
	) );
	$wp_customize->add_setting(
	'enigma_options[service_1_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_1_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text'
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_1_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_1_link]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'enigma_options[service_2_link]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'enigma_options[service_3_link]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_control(
    new enigma_parallax_Customize_Misc_Control(
        $wp_customize,
        'service_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	
	$wp_customize->add_control( 'service_one_title', array(
		'label'        => __( 'Service One Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_1_title]'
	) );
	
		$wp_customize->add_control('enigma_options[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'enigma-parallax' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','enigma-parallax'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'enigma_options[service_1_icons]'
        )
    );
	
	$wp_customize->add_control( 'service_one_text', array(
		'label'        => __( 'Service One Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_1_text]'
	) );
	
	$wp_customize->add_control( 'service_one_link', array(
		'label'        => __( 'Service One Link', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_1_link]'
	) );
		$wp_customize->add_control(
    new enigma_parallax_Customize_Misc_Control(
        $wp_customize,
        'service_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'service_two_title', array(
		'label'        => __( 'Service Two Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_2_title]'
	) );
		$wp_customize->add_control( 'enigma_options[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'enigma-parallax' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','enigma-parallax'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'enigma_options[service_2_icons]'
        )
    );
	$wp_customize->add_control( 'enigma_service_two_text', array(
		'label'        => __( 'Service Two Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_2_text]'
	) );
	$wp_customize->add_control( 'service_two_link', array(
		'label'        => __( 'Service One Link', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_2_link]'
	) );
		$wp_customize->add_control(new enigma_parallax_Customize_Misc_Control(
        $wp_customize, 'enigma_service_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'enigma_service_three_title', array(
		'label'        => __( 'Service Three Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_3_title]'
	) );
	$wp_customize->add_control('enigma_options[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'enigma-parallax' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','enigma-parallax'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'enigma_options[service_3_icons]'
        )
    );
	$wp_customize->add_control( 'enigma_service_three_text', array(
		'label'        => __( 'Service Three Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_3_text]'
	) );
	$wp_customize->add_control( 'service_three_link', array(
		'label'        => __( 'Service One Link', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'enigma_options[service_3_link]'
	) );
	$wp_customize->add_setting(
	    'enigma_options[service_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_title']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize, 'service_title',array(
			'label'    => __('Home Service Title', 'enigma-parallax'), 
			'section'  => 'service_section',
			'settings' => 'enigma_options[service_title]',			
	) ) );
	
/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','enigma-parallax'),
            'description' => __('Here you can add Portfolio title,description and even portfolios','enigma-parallax'),
			'panel'=>'enigma_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );
	
	$wp_customize->add_setting(
		'enigma_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['portfolio_home'],
			'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'enigma_options[port_heading]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['port_heading'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
		)
	);

	for($i=1;$i<=4;$i++){ 
		$wp_customize->add_setting(
			'enigma_options[port_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_img'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'enigma_options[port_'.$i.'_title]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_title'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'enigma_parallax_sanitize_text',
			)
		);

		$wp_customize->add_setting(
			'enigma_options[port_'.$i.'_link]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_link'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
	}
	
	$wp_customize->add_control( 'enigma_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[portfolio_home]'
	) );
	$wp_customize->add_control( 'enigma_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_heading]'
	) );

	for($i=1;$i<=4;$i++){
	$j = array(' One', ' Two', ' Three', ' Four');
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_portfolio_img_'.$i, array(
		'label'        => __( 'Portfolio Image', 'enigma-parallax' ).$j[$i-1],
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_'.$i.'_img]'
	) ) );
	$wp_customize->add_control( 'enigma_portfolio_title_'.$i, array(
		'label'        => __( 'Portfolio Title', 'enigma-parallax').$j[$i-1],
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_'.$i.'_title]'
	) );
	
	$wp_customize->add_control( 'enigma_portfolio_link_'.$i, array(
		'label'        => __( 'Portfolio Link', 'enigma-parallax' ).$j[$i-1],
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'enigma_options[port_'.$i.'_link]'
	) );
	}
	
/* testimonial option */
$wp_customize->add_section(
        'testimonial_section',
        array(
            'title' => __( 'Theme Testimonial Options','enigma-parallax' ),
            'description' => __( 'Add Testimonial Area Details here.','enigma-parallax' ),
			'panel'=>'enigma_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
	$wp_customize->add_setting(
	'enigma_options[show_testimonial]',
		array(
		'default'=>esc_attr($wl_theme_options['show_testimonial']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_testimonial', array(
		'label'        => __( 'Enable Testimonial Area In Front Page', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'testimonial_section',
		'settings'   => 'enigma_options[show_testimonial]'
	) );
	$wp_customize->add_setting(
		'enigma_options[testimonial_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['testimonial_title'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_testimonial_title', array(
		'label'        => __( 'Client Area Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'testimonial_section',
		'settings'   => 'enigma_options[testimonial_title]',
	) );
	for($i=1;$i<=4;$i++){
	$wp_customize->add_setting(
		'enigma_options[testimonial_name_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['testimonial_name_'.$i],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_testimonial_name'.$i.'', array(
		'label'        => __( 'Testimonial Name ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'testimonial_section',
		'settings'   => 'enigma_options[testimonial_name_'.$i.']',
	) );
	$wp_customize->add_setting(
		'enigma_options[testimonial_desti_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['testimonial_desti_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_testimonial_desti'.$i.'', array(
		'label'        => __( 'Testimonial Designation ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'testimonial_section',
		'settings'   => 'enigma_options[testimonial_desti_'.$i.']',
	) );
	$wp_customize->add_setting(
		'enigma_options[testimonial_desc_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['testimonial_desc_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_testimonial_desc'.$i.'', array(
		'label'        => __( 'Testimonial Description ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'testimonial_section',
		'settings'   => 'enigma_options[testimonial_desc_'.$i.']',
	) );
	$wp_customize->add_setting(
			'enigma_options[testimonial_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$team[$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_testimonial_img_'.$i, array(
		'label'        => __( 'Testimonial Image ', 'enigma-parallax' ).$i,
		'section'    => 'testimonial_section',
		'settings'   => 'enigma_options[testimonial_'.$i.'_img]'
	) ) );	
	}	
	
/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__('Home Blog Options','enigma-parallax'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[show_blog]',
		array(
		'default'=>esc_attr($wl_theme_options['show_blog']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_blog', array(
		'label'        => __( 'Enable Blog Area in Front Page', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'enigma_options[show_blog]'
	) );
	$wp_customize->add_setting(
		'enigma_options[blog_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['blog_title'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_latest_post', array(
		'label'        => __( 'Home Blog Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'enigma_options[blog_title]',
	) );
	
/* Team Option */
	$wp_customize->add_section('team_section',array(
	'title'=>__('Home Team Options','enigma-parallax'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[show_team]',
		array(
		'default'=>esc_attr($wl_theme_options['show_team']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_team', array(
		'label'        => __( 'Enable Team Area in Front Page', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[show_team]'
	) );
	$wp_customize->add_setting(
		'enigma_options[team_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['team_title'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_team_title', array(
		'label'        => __( 'Team Area Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_title]',
	) );
	for($i=1; $i<=4; $i++){
	$wp_customize->add_setting(
		'enigma_options[team_name_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['team_name_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_team_name'.$i, array(
		'label'        => __( 'Name ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_name_'.$i.']',
	) );
	$wp_customize->add_setting(
		'enigma_options[team_post_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['team_post_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_team_post'.$i, array(
		'label'        => __( 'Designation ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_post_'.$i.']',
	) );
	$wp_customize->add_setting(
		'enigma_options[team_fb_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['team_fb_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_fb_link'.$i, array(
		'label'        => __( 'Facebook Link ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_fb_'.$i.']',
	) );
	$wp_customize->add_setting(
		'enigma_options[team_twitter_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['team_twitter_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_twitter_link'.$i, array(
		'label'        => __( 'Twitter Link ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_twitter_'.$i.']',
	) );
	$wp_customize->add_setting(
		'enigma_options[team_linkedin_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['team_linkedin_'.$i.''],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_linkedin_link'.$i, array(
		'label'        => __( 'Linkedin Link ', 'enigma-parallax' ).$i,
		'type'=>'text',
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_linkedin_'.$i.']',
	) );
	$wp_customize->add_setting(
			'enigma_options[team_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$team[$i],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_team_img_'.$i, array(
		'label'        => __( 'Team Image ', 'enigma-parallax' ).$i,
		'section'    => 'team_section',
		'settings'   => 'enigma_options[team_'.$i.'_img]'
	) ) );
	}
	
/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options",'enigma-parallax'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'enigma_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'enigma_options[email_id]',
		array(
		'default'=>esc_attr($wl_theme_options['email_id']),
		'type'=>'option',
		'sanitize_callback'=>'sanitize_email',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'email_id', array(
		'label'        =>  __('Email ID', 'enigma-parallax' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[email_id]'
	) );
	$wp_customize->add_setting(
	'enigma_options[phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['phone_no']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'phone_no', array(
		'label'        =>  __('Phone Number', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[phone_no]'
	) );
	$wp_customize->add_setting(
	'enigma_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fb_link]',
		array(
		'default'=>esc_attr($wl_theme_options['fb_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'fb_link', array(
		'label'        => __( 'Facebook', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[fb_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[linkedin_link]'
	) );
	
	$wp_customize->add_setting(
	'enigma_options[gplus]',
		array(
		'default'=>esc_attr($wl_theme_options['gplus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'gplus', array(
		'label'        => __( 'Goole+', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[gplus]'
	) );
	$wp_customize->add_setting(
	'enigma_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'enigma_options[instagram]',
		array(
		'default'=>esc_attr($wl_theme_options['instagram']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram', array(
		'label'        => __( 'Instagram', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'enigma_options[instagram]'
	) );
	
	/* Footer callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Footer Call-Out Options",'enigma-parallax'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[fc_home]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_home']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_home', array(
		'label'        => __( 'Enable Footer callout on HOme', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_home]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_title]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_title', array(
		'label'        => __( 'Footer callout Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_title]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_btn_txt]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_btn_txt']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_txt', array(
		'label'        => __( 'Footer callout Button Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_btn_txt]'
	) );
	$wp_customize->add_setting(
	'enigma_options[fc_btn_link]',
		array(
		'default'=>esc_attr($wl_theme_options['fc_btn_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_link', array(
		'label'        => __( 'Footer callout Button Link', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'enigma_options[fc_btn_link]'
	) );
	
	//Contact Option
	$wp_customize->add_section(
        'contact_sec',
        array(
            'title' => __( 'Theme Contact Options','enigma-parallax' ),
            'description' => __( 'Customize Contact Area','enigma-parallax' ),
			'panel'=>'enigma_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
	$wp_customize->add_setting(
	'enigma_options[show_contact]',
		array(
		'default'=>esc_attr($wl_theme_options['show_contact']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_contact', array(
		'label'        => __( 'Enable Contact Area In Front Page', 'enigma-parallax' ),
		'type'=>'checkbox',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[show_contact]'
	) );
	$wp_customize->add_setting(
		'enigma_options[contact_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['contact_title'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_contact_title', array(
		'label'        => __( 'Contact Area Title', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[contact_title]',
	) );
	$wp_customize->add_setting(
		'enigma_options[contact_desc]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['contact_desc'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_contact_contact_desc', array(
		'label'        => __( 'Contact Area Description', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[contact_desc]',
	) );
	$wp_customize->add_setting(
		'enigma_options[contact_number]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['contact_number'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_contact_number', array(
		'label'        => __( 'Contact Number', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[contact_number]',
	) );
	$wp_customize->add_setting(
		'enigma_options[contact_mail]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['contact_mail'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_contact_mail', array(
		'label'        => __( 'Email', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[contact_mail]',
	) );
	$wp_customize->add_setting(
		'enigma_options[contact_time]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['contact_time'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_contact_time', array(
		'label'        => __( 'Timing', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[contact_time]',
	) );
	$wp_customize->add_setting(
		'enigma_options[contact_location]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['contact_location'],
			'sanitize_callback'=>'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_contact_location', array(
		'label'        => __( 'Location', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'contact_sec',
		'settings'   => 'enigma_options[contact_location]',
	) );
	
	
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options",'enigma-parallax'),
	'panel'=>'enigma_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'enigma_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'enigma_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Developed By Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'enigma_options[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'enigma_parallax_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_weblizar_text', array(
		'label'        => __( 'Developed By Link Text', 'enigma-parallax' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'enigma_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Developed By Link', 'enigma-parallax' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'enigma_options[developed_by_link]'
	) ); 	
	
			$wp_customize->add_section( 'enigma_more' , array(
				'title'      	=> __( 'Upgrade to Enigma Parallax Premium', 'enigma-parallax' ),
				'priority'   	=> 999,
				'panel'=>'enigma_theme_option',
			) );

			$wp_customize->add_setting( 'enigma_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new enigma_parallax_More_Control( $wp_customize, 'enigma_more', array(
				'label'    => __( 'Enigma Premium', 'enigma-parallax' ),
				'section'  => 'enigma_more',
				'settings' => 'enigma_more',
				'priority' => 1,
			) ) );
		
}
function enigma_parallax_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function enigma_parallax_sanitize_checkbox( $input ) {
    return $input;
}
function enigma_parallax_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_parallax_Customize_Misc_Control' ) ) :
class enigma_parallax_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_parallax_More_Control' ) ) :
class enigma_parallax_More_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/enigma-premium/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Enigma Parallax Premium','enigma-parallax'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo get_template_directory_uri().'/images/Enig.png';?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Enigma Parallax Premium-Features','enigma-parallax'); ?></h3>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','enigma-parallax'); ?> </li>						
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 13 Templates','enigma-parallax'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('8 Different Types of Blog Templates','enigma-parallax'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('6 Types of Portfolio Templates','enigma-parallax'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','enigma-parallax'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','enigma-parallax'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','enigma-parallax'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo-commerce Compatible','enigma-parallax'); ?>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','enigma-parallax'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','enigma-parallax'); ?>  </li>	
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Isotope effect','enigma-parallax'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','enigma-parallax'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','enigma-parallax'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','enigma-parallax'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Extreme Gallery Design Layout','enigma-parallax'); ?>  </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/enigma-premium/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Enigma Parallax Premium','enigma-parallax'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Enigma Parallax?', 'enigma-parallax' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'enigma-parallax' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/enigma?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;


/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_parallax_Font_Control' ) ) :
class enigma_parallax_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   <select <?php $this->link(); ?> >
    <option  value="Abril Fatface"<?php if($this->value()== 'Abril Fatface') echo 'selected="selected"';?>><?php _e('Abril Fatface','enigma-parallax'); ?></option>
	<option  value="Advent Pro"<?php if($this->value()== 'Advent Pro')  echo 'selected="selected"';?>><?php _e('Advent Pro','enigma-parallax'); ?></option>
	<option  value="Aldrich"<?php if($this->value()== 'Aldrich') echo 'selected="selected"';?>><?php _e('Aldrich','enigma-parallax'); ?></option>
	<option  value="Alex Brush"<?php if($this->value()== 'Alex Brush') echo 'selected="selected"';?>><?php _e('Alex Brush','enigma-parallax'); ?></option>
	<option  value="Allura"<?php if($this->value()== 'Allura') echo 'selected="selected"';?>><?php _e('Allura','enigma-parallax'); ?></option>
	<option  value="Amatic SC"<?php if($this->value()== 'Amatic SC') echo 'selected="selected"';?>><?php _e('Amatic SC','enigma-parallax'); ?></option>
	<option  value="arial"<?php if($this->value()== 'arial') echo 'selected="selected"';?>><?php _e('Arial','enigma-parallax'); ?></option>
	<option  value="Astloch"<?php if($this->value()== 'Astloch') echo 'selected="selected"';?>><?php _e('Astloch','enigma-parallax'); ?></option>
	<option  value="arno pro bold italic"<?php if($this->value()== 'arno pro bold italic') echo 'selected="selected"';?>><?php _e('Arno pro bold italic','enigma-parallax'); ?></option>
	<option  value="Bad Script"<?php if($this->value()== 'Bad Script') echo 'selected="selected"';?>><?php _e('Bad Script','enigma-parallax'); ?></option>
	<option  value="Bilbo"<?php if($this->value()== 'Bilbo') echo 'selected="selected"';?>><?php _e('Bilbo','enigma-parallax'); ?></option>
	<option  value="Calligraffitti"<?php if($this->value()== 'Calligraffitti') echo 'selected="selected"';?>><?php _e('Calligraffitti','enigma-parallax'); ?></option>
	<option  value="Candal"<?php if($this->value()== 'Candal') echo 'selected="selected"';?>><?php _e('Candal','enigma-parallax'); ?></option>
	<option  value="Cedarville Cursive"<?php if($this->value()== 'Cedarville Cursive') echo 'selected="selected"';?>><?php _e('Cedarville Cursive','enigma-parallax'); ?></option>
	<option  value="Clicker Script"<?php if($this->value()== 'Clicker Script') echo 'selected="selected"';?>><?php _e('Clicker Script','enigma-parallax'); ?></option>
	<option  value="Dancing Script"<?php if($this->value()== 'Dancing Script') echo 'selected="selected"';?>><?php _e('Dancing Script','enigma-parallax'); ?></option>
	<option  value="Dawning of a New Day"<?php if($this->value()== 'Dawning of a New Day') echo 'selected="selected"';?>><?php _e('Dawning of a New Day','enigma-parallax'); ?></option>
	<option  value="Fredericka the Great"<?php if($this->value()== 'Fredericka the Great') echo 'selected="selected"';?>><?php _e('Fredericka the Great','enigma-parallax'); ?></option>
	<option  value="Felipa"<?php if($this->value()== 'Felipa') echo 'selected="selected"';?>><?php _e('Felipa','enigma-parallax'); ?></option>
	<option  value="Give You Glory"<?php if($this->value()== 'Give You Glory') echo 'selected="selected"';?>><?php _e('Give You Glory','enigma-parallax'); ?></option>
	<option  value="Great vibes"<?php if($this->value()== 'Great vibes') echo 'selected="selected"';?>><?php _e('Great vibes','enigma-parallax'); ?></option>
	<option  value="Homemade Apple"<?php if($this->value()== 'Homemade Apple') echo 'selected="selected"';?>><?php _e('Homemade Apple','enigma-parallax'); ?></option>
	<option  value="Indie Flower"<?php if($this->value()== 'Indie Flower') echo 'selected="selected"';?>><?php _e('Indie Flower','enigma-parallax'); ?></option>
	<option  value="Italianno"<?php if($this->value()== 'Italianno') echo 'selected="selected"';?>><?php _e('Italianno','enigma-parallax'); ?></option>
	<option  value="Jim Nightshade"<?php if($this->value()== 'Jim Nightshade') echo 'selected="selected"';?>><?php _e('Jim Nightshade','enigma-parallax'); ?></option>
	<option  value="Kaushan Script"<?php if($this->value()== 'Kaushan Script') echo 'selected="selected"';?>><?php _e('Kaushan Script','enigma-parallax'); ?></option>
	<option  value="Kristi"<?php if($this->value()== 'Kristi') echo 'selected="selected"';?>><?php _e('Kristi','enigma-parallax'); ?></option>
	<option  value="La Belle Aurore"<?php if($this->value()== 'La Belle Aurore') echo 'selected="selected"';?>><?php _e('La Belle Aurore','enigma-parallax'); ?></option>
	<option  value="Meddon"<?php if($this->value()== 'Meddon') echo 'selected="selected"';?>><?php _e('Meddon','enigma-parallax'); ?></option>
	<option  value="Montez"<?php if($this->value()== 'Montez') echo 'selected="selected"';?>><?php _e('Montez','enigma-parallax'); ?></option>
	<option  value="Megrim"<?php if($this->value()== 'Megrim') echo 'selected="selected"';?>><?php _e('Megrim','enigma-parallax'); ?></option>
	<option  value="Mr Bedfort"<?php if($this->value()== 'Mr Bedfort') echo 'selected="selected"';?>><?php _e('Mr Bedfort','enigma-parallax'); ?></option>
	<option  value="Neucha"<?php if($this->value()== 'Neucha') echo 'selected="selected"';?>><?php _e('Neucha','enigma-parallax'); ?></option>
	<option  value="Nothing You Could Do"<?php if($this->value()== 'Nothing You Could Do') echo 'selected="selected"';?>><?php _e('Nothing You Could Do','enigma-parallax'); ?></option>
	<option  value="Open Sans"<?php if($this->value()== 'Open Sans') echo 'selected="selected"';?>><?php _e('Open Sans','enigma-parallax'); ?></option>
	<option  value="Over the Rainbow"<?php if($this->value()== 'Over the Rainbow') echo 'selected="selected"';?>><?php _e('Over the Rainbow','enigma-parallax'); ?></option>
	<option  value="Pinyon Script"<?php if($this->value()== 'Pinyon Script') echo 'selected="selected"';?>><?php _e('Pinyon Script','enigma-parallax'); ?></option>
	<option  value="Princess Sofia"<?php if($this->value()== 'Princess Sofia') echo 'selected="selected"';?>><?php _e('Princess Sofia','enigma-parallax'); ?></option>
	<option  value="Reenie Beanie"<?php if($this->value()== 'Reenie Beanie') echo 'selected="selected"';?>><?php _e('Reenie Beanie','enigma-parallax'); ?></option>
	<option  value="Rochester"<?php if($this->value()== 'Rochester') echo 'selected="selected"';?>><?php _e('Rochester','enigma-parallax'); ?></option>
	<option  value="Rock Salt"<?php if($this->value()== 'Rock Salt') echo 'selected="selected"';?>><?php _e('Rock Salt','enigma-parallax'); ?></option>
	<option  value="Ruthie"<?php if($this->value()== 'Ruthie') echo 'selected="selected"';?>><?php _e('Ruthie','enigma-parallax'); ?></option>
	<option  value="Sacramento"<?php if($this->value()== 'Sacramento') echo 'selected="selected"';?>><?php _e('Sacramento','enigma-parallax'); ?></option>
	<option  value="Sans Serif"<?php if($this->value()== 'Sans Serif') echo 'selected="selected"';?>><?php _e('Sans Serif','enigma-parallax'); ?></option>
	<option  value="Seaweed Script"<?php if($this->value()== 'Seaweed Script') echo 'selected="selected"';?>><?php _e('Seaweed Script','enigma-parallax'); ?></option>
	<option  value="Shadows Into Light"<?php if($this->value()== 'Shadows Into Light') echo 'selected="selected"';?>><?php _e('Shadows Into Light','enigma-parallax'); ?></option>
	<option  value="Smythe"<?php if($this->value()== 'Smythe') echo 'selected="selected"';?>><?php _e('Smythe','enigma-parallax'); ?></option>
	<option  value="Stalemate"<?php if($this->value()== 'Stalemate') echo 'selected="selected"';?>><?php _e('Stalemate','enigma-parallax'); ?></option>
	<option  value="Tahoma"<?php if($this->value()== 'Tahoma') echo 'selected="selected"';?>><?php _e('Tahoma','enigma-parallax'); ?></option>
	<option  value="Tangerine"<?php if($this->value()== 'Tangerine') echo 'selected="selected"';?>><?php _e('Tangerine','enigma-parallax'); ?></option>
	<option  value="Trade Winds"<?php if($this->value()== 'Trade Winds') echo 'selected="selected"';?>><?php _e('Trade Winds','enigma-parallax'); ?></option>
	<option  value="UnifrakturMaguntia"<?php if($this->value()== 'UnifrakturMaguntia') echo 'selected="selected"';?>><?php _e('UnifrakturMaguntia','enigma-parallax'); ?></option>
	<option  value="Verdana"<?php if($this->value()== 'Verdana') echo 'selected="selected"';?>><?php _e('Verdana','enigma-parallax'); ?></option>
	<option  value="Waiting for the Sunrise"<?php if($this->value()== 'Waiting for the Sunrise') echo 'selected="selected"';?>><?php _e('Waiting for the Sunrise','enigma-parallax'); ?></option>
	<option  value="Warnes"<?php if($this->value()== 'Warnes') echo 'selected="selected"';?>><?php _e('Warnes','enigma-parallax'); ?></option>
	<option  value="Yesteryear"<?php if($this->value()== 'Yesteryear') echo 'selected="selected"';?>><?php _e('Yesteryear','enigma-parallax'); ?></option>
	<option  value="Zeyada"<?php if($this->value()== 'Zeyada') echo 'selected="selected"';?>><?php _e('Zeyada','enigma-parallax'); ?></option>
    </select>		
		
  <?php
 }
}
endif;
?>