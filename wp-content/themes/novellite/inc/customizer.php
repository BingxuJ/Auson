<?php
     //  =============================
     //  = Default Theme Customizer Settings  =
     //  @ NovelLite Theme
     //  =============================
/*theme customizer*/
function NovelLite_customize_register( $wp_customize ) {
 
     //  =============================
     //  = Genral Settings     =
   	 //  =============================

  $wp_customize->get_section('title_tagline')->title = esc_html__('General Settings', 'novellite');
   $wp_customize->get_section('title_tagline')->priority = 3;
		//Logo upload
     $wp_customize->add_setting('logo_upload', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_upload', array(
        'label'    => __('Logo Upload', 'novellite'),
        'section'  => 'title_tagline',
        'settings' => 'logo_upload',
    )));


     //  =============================
     //  = Home section sorting       =
     //  =============================

 $wp_customize->add_section('section_home_on_off', array(
        'title'    => __('Home Page Section Odering', 'novellite'),
        'priority' => 4,
    ));

         // section ordering
$wp_customize->add_setting('home_sorting', array(
        'default'        =>array('section_three_column','section_testimonial','section_woo',
        'section_blog','section_team','section_pricing','section_countactus'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_checkbox_explode'
    ));
    $wp_customize->add_control(new TH_Customize_Sort_List(
            $wp_customize,'home_sorting', array(
        'settings' => 'home_sorting',
        'label'   => __( 'Front Page Section Order Settings', 'novellite' ),
        'section' => 'section_home_on_off',
        'choices' => array(
                    'section_three_column'       => __( '1 Three Column Section',       'novellite' ),
                    'section_testimonial'        => __( '2 Testimonial Section',        'novellite' ),
                    'section_blog'               => __( '3 Blog Section Section',       'novellite' ),
                    'section_woo'                => __( '4 Woo Commerce Section',       'novellite' ),
                    'section_team'               => __( '5 Team Section Section',       'novellite' ),
                    'section_pricing'            => __( '6 Pricing  Section',           'novellite' ),
                    'section_countactus'         => __( '7 Contact Us  Section',        'novellite' ),
            )
        ) 
    )
);

     //  =============================
     //  = Home Page Slider Settings       =
   	 //  =============================

     $wp_customize->add_panel( 'home_page_slider', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Slider Settings', 'novellite'),
    'description'    => '',
) );

       //slider speed
 $wp_customize->add_section('section_slider_speed', array(
        'title'    => __('Slider Speed', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_page_slider',
    ));
    $wp_customize->add_setting('NovelLite_slider_speed', array(
        'default'           => 3000,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_int'
    ));
    $wp_customize->add_control('NovelLite_slider_speed', array(
        'label'    => __('Slider Speed', 'novellite'),
        'section'  => 'section_slider_speed',
        'settings' => 'NovelLite_slider_speed',
         'type'       => 'text',
    ));

    //First slider image

     $wp_customize->add_section('section_slider_first', array(
        'title'    => __('First Slider Settings', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_page_slider',
    ));
    $wp_customize->add_setting('first_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
        'label'    => __('First Slider Image', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_image',
    )));
    $wp_customize->add_setting('first_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_slider_heading', array(
        'label'    => __('Slider Heading', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_heading',
         'type'       => 'text',
    ));
 
    $wp_customize->add_setting('first_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'

    ));
    $wp_customize->add_control('first_slider_desc', array(
        'label'    => __('Slider Description', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_desc',
         'type'       => 'textarea',
    ));
       $wp_customize->add_setting('first_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('first_slider_link', array(
        'label'    => __('First Slider Link', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_link',
         'type'       => 'text',
    ));

         $wp_customize->add_setting('first_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_button_text', array(
        'label'    => __('Button Text', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('first_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('first_button_link', array(
        'label'    => __('Link For Button', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_button_link',
         'type'       => 'text',
    ));

    //Second slider image

     $wp_customize->add_section('section_slider_second', array(
        'title'    => __('Second Slider Settings', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_page_slider',
    ));
    $wp_customize->add_setting('second_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
        'label'    => __('Second Slider Image', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_image',
    )));
    $wp_customize->add_setting('second_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_slider_heading', array(
        'label'    => __('Slider Heading', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_heading',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('second_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_slider_desc', array(
        'label'    => __('Slider Description', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('second_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('second_slider_link', array(
        'label'    => __('Second Slider Link', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_link',
         'type'       => 'text',
    ));

   

    $wp_customize->add_setting('second_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_button_text', array(
        'label'    => __('Button Text', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('second_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('second_button_link', array(
        'label'    => __('Link for button', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_button_link',
         'type'       => 'text',
    ));
//-------------------End Sldier Panel----------------------------//


                //  =============================
                 //  = Three Column Settings       =
                 //  =============================

    $wp_customize->add_panel( 'home_three_col', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Three Column Feature Area', 'novellite'),
    'description'    => '',
) );


 $wp_customize->add_section('section_three_col_heading', array(
        'title'    => __('Feature Heading & Sub Heading', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('col_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('col_heading', array(
        'label'    => __('Three Column Feature Heading', 'novellite'),
        'section'  => 'section_three_col_heading',
        'settings' => 'col_heading',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('col_sub', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('col_sub', array(
        'label'    => __('Three Column Sub Heading', 'novellite'),
        'section'  => 'section_three_col_heading',
        'settings' => 'col_sub',
         'type'       => 'textarea',
    ));


           // Feature First Block
     $wp_customize->add_section('first_feature_block', array(
        'title'    => __('First Feature Section', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('first_feature_font_icon', array(
        'default'           => 'fa-microphone fa-stack-1x fa-inverse',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('first_feature_font_icon', array(
        'label'    => __('Feature Icon', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('first_feature_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_feature_heading', array(
        'label'    => __('Feature Heading', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('first_feature_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('first_feature_link', array(
        'label'    => __('Feature Heading Link', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('first_feature_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('first_feature_desc', array(
        'label'    => __('Feature Description', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_desc',
         'type'       => 'textarea',
    ));


    // Feature Second Block
     $wp_customize->add_section('second_feature_block', array(
        'title'    => __('Second Feature Section', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('second_feature_font_icon', array(
        'default'           => 'fa-rocket fa-stack-1x fa-inverse',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_feature_font_icon', array(
        'label'    => __('Feature Icon', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('second_feature_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_feature_heading', array(
        'label'    => __('Feature Heading', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('second_feature_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('second_feature_link', array(
        'label'    => __('Feature Heading Link', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('second_feature_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_feature_desc', array(
        'label'    => __('Feature Description', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_desc',
         'type'       => 'textarea',
    ));

    // Feature Third Block
     $wp_customize->add_section('third_feature_block', array(
        'title'    => __('Third Feature Section', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('third_feature_font_icon', array(
        'default'           => 'fa-rocket fa-stack-1x fa-inverse',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('third_feature_font_icon', array(
        'label'    => __('Feature Icon', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('third_feature_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('third_feature_heading', array(
        'label'    => __('Feature Heading', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('third_feature_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('third_feature_link', array(
        'label'    => __('Feature Heading Link', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('third_feature_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('third_feature_desc', array(
        'label'    => __('Feature Description', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_desc',
         'type'       => 'textarea',
    ));

//-------------------End Three Column Panel----------------------------//


                 //  =============================
                //  = Testimonial Settings       =
                //  =============================

$wp_customize->add_panel( 'home_testimonial', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Testimonial Settings', 'novellite'),
    'description'    => '',
) );

//Parallax Background Image
 $wp_customize->add_section('testimonial_bg_heading', array(
        'title'    => __('Testimonial Heading & Background', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));
    $wp_customize->add_setting('testimonial_parallax_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'testimonial_parallax_image', array(
        'label'    => __('Testimonial Background Image', 'novellite'),
        'section'  => 'testimonial_bg_heading',
        'settings' => 'testimonial_parallax_image',
    )));

// main heading

    $wp_customize->add_setting('testimonial_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('testimonial_heading', array(
        'label'    => __('Testimonial Main Heading', 'novellite'),
        'section'  => 'testimonial_bg_heading',
        'settings' => 'testimonial_heading',
         'type'       => 'text',
    ));

    // Testimonial first 1 
     $wp_customize->add_section('section_testimonial_first', array(
        'title'    => __('First Testimonial', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));
    $wp_customize->add_setting('first_author_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_author_image', array(
        'label'    => __('Author Image', 'novellite'),
        'section'  => 'section_testimonial_first',
        'settings' => 'first_author_image',
    )));

    $wp_customize->add_setting('first_author_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('first_author_desc', array(
        'label'    => __('Testimonial Text', 'novellite'),
        'section'  => 'section_testimonial_first',
        'settings' => 'first_author_desc',
         'type'       => 'textarea',
    ));

      $wp_customize->add_setting('first_author_name', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_author_name', array(
        'label'    => __('Author Name', 'novellite'),
        'section'  => 'section_testimonial_first',
        'settings' => 'first_author_name',
         'type'       => 'text',
    ));

    // Testimonial first 2
     $wp_customize->add_section('section_testimonial_second', array(
        'title'    => __('Second Testimonial', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));
    $wp_customize->add_setting('second_author_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_author_image', array(
        'label'    => __('Author Image', 'novellite'),
        'section'  => 'section_testimonial_second',
        'settings' => 'second_author_image',
    )));

    $wp_customize->add_setting('second_author_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_author_desc', array(
        'label'    => __('Testimonial Text', 'novellite'),
        'section'  => 'section_testimonial_second',
        'settings' => 'second_author_desc',
         'type'       => 'textarea',
    ));

      $wp_customize->add_setting('second_author_name', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_author_name', array(
        'label'    => __('Author Name', 'novellite'),
        'section'  => 'section_testimonial_second',
        'settings' => 'second_author_name',
         'type'       => 'text',
    ));


    //Home Page Blog heading and sub heading 

    $wp_customize->add_section( 'blog_head_desc', array(
     'title'          => __( 'Home Blog Heading & Sub Heading','novellite' ),
     'priority'       => 20,
) );
       $wp_customize->add_setting('blog_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('blog_head_', array(
        'label'    => __('Home Page Blog Heading', 'novellite'),
        'section'  => 'blog_head_desc',
        'settings' => 'blog_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('blog_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('blog_desc_', array(
        'label'    => __('Home Page Blog Sub Heading', 'novellite'),
        'section'  => 'blog_head_desc',
        'settings' => 'blog_desc_',
         'type'       => 'textarea',
    ));


   //-------------------End Blog Heading and SubHeading----------------------------//


  //  =============================
    //      = woo Commerce Section   =
    //  =============================
    // team panel
    $wp_customize->add_section( 'woo_section', array(
        'title'          => __( 'Woo Commerce Settings','novellite' ),
            'priority'       => 20,
        ));

    $wp_customize->add_setting('woo_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
     ));
    $wp_customize->add_control('woo_head_', array(
        'label'    => __('Woo Commerce Heading', 'novellite'),
        'section'  => 'woo_section',
        'settings' => 'woo_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('woo_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('woo_desc_', array(
        'label'    => __('Woo Commerce Sub Heading', 'novellite'),
        'section'  => 'woo_section',
        'settings' => 'woo_desc_',
         'type'       => 'textarea',
    ));

  $wp_customize->add_setting('woo_shortcode', array(
        'default'        => '[recent_products]',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('woo_shortcode', array(
        'settings' => 'woo_shortcode',
        'label'     => 'Woo Commerce ShortCode',
        'section' => 'woo_section',
        'type'    => 'textarea',
    ) );
    // End team section
    



        //  =============================
        //  = Our Team Settings       =
        //  =============================
    // team panel
$wp_customize->add_panel( 'our_team', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Our Team Settings', 'novellite'),
    'description'    => '',
) );

// team head and sub heading
    $wp_customize->add_section( 'team_head_desc', array(
     'title'          => __( 'Our Team Heading & Sub Heading','novellite' ),
     'theme_supports' => 'custom-background',
     'panel'  => 'our_team'
) );
       $wp_customize->add_setting('team_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('team_head_', array(
        'label'    => __('Our Team Heading', 'novellite'),
        'section'  => 'team_head_desc',
        'settings' => 'team_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('team_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('team_desc_', array(
        'label'    => __('Our Team Sub Heading', 'novellite'),
        'section'  => 'team_head_desc',
        'settings' => 'team_desc_',
         'type'       => 'textarea',
    ));


//our team first section

     $wp_customize->add_section('our_team_first', array(
        'title'    => __('First Member Settings', 'novellite'),
         'panel'  => 'our_team',
    ));
    $wp_customize->add_setting('our_team_img_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_team_img_first', array(
        'label'    => __('First Member Image', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_img_first',
    )));
    $wp_customize->add_setting('our_team_heading_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_heading_first', array(
        'label'    => __('First Member Name', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_heading_first',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('our_team_subhead_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_subhead_first', array(
        'label'    => __('First Member Designation', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_subhead_first',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('our_team_desc_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('our_team_desc_first', array(
        'label'    => __('First Member Description', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_desc_first',
         'type'       => 'textarea',
    ));

       $wp_customize->add_setting('our_team_link_first', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('our_team_link_first', array(
        'label'    => __('First Member Link', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_link_first',
         'type'       => 'text',
    ));


//our team second section

     $wp_customize->add_section('our_team_second', array(
        'title'    => __('Second Member Settings', 'novellite'),
         'panel'  => 'our_team',
    ));
    $wp_customize->add_setting('our_team_img_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_team_img_second', array(
        'label'    => __('Second Member Image', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_img_second',
    )));
    $wp_customize->add_setting('our_team_heading_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_heading_second', array(
        'label'    => __('Second Member Name', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_heading_second',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('our_team_subhead_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_subhead_second', array(
        'label'    => __('Second Member Designation', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_subhead_second',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('our_team_desc_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('our_team_desc_second', array(
        'label'    => __('Second Member Description', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_desc_second',
         'type'       => 'textarea',
    ));

       $wp_customize->add_setting('our_team_link_second', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('our_team_link_second', array(
        'label'    => __('Second Member Link', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_link_second',
         'type'       => 'text',
    ));

//our team third section

     $wp_customize->add_section('our_team_third', array(
        'title'    => __('Third Member Settings', 'novellite'),
         'panel'  => 'our_team',
    ));
    $wp_customize->add_setting('our_team_img_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_team_img_third', array(
        'label'    => __('Third Member Image', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_img_third',
    )));
    $wp_customize->add_setting('our_team_heading_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_heading_third', array(
        'label'    => __('Third Member Name', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_heading_third',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('our_team_subhead_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_subhead_third', array(
        'label'    => __('Third Member Designation', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_subhead_third',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('our_team_desc_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'

    ));
    $wp_customize->add_control('our_team_desc_third', array(
        'label'    => __('Third Member Description', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_desc_third',
         'type'       => 'textarea',
    ));

       $wp_customize->add_setting('our_team_link_third', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('our_team_link_third', array(
        'label'    => __('Third Member Link', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_link_third',
         'type'       => 'text',
    ));

//  =============================
    //      = Pricing Section   =
    //  =============================

    //panal settings
$wp_customize->add_panel( 'pricing_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Pricing Table Settings', 'novellite'),
    'description'    => '',
) );
// section setings
    $wp_customize->add_section( 'pricing_head', array(
     'title'          => __( 'Pricing Heading & Sub Heading','novellite' ),
     'theme_supports' => 'custom-background',
     'panel'  => 'pricing_section'
) );

    // heding and subheading (text & textarwa , uploadas)
     $wp_customize->add_setting('pricing_img_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'pricing_img_first', array(
        'label'    => __('Pricing Parallax Image Upload', 'novellite'),
        'section'  => 'pricing_head',
        'settings' => 'pricing_img_first',
    )));

       $wp_customize->add_setting('pricing_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_head_', array(
        'label'    => __('Pricing Heading', 'novellite'),
        'section'  => 'pricing_head',
        'settings' => 'pricing_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('pricing_desc_', array(
        'label'    => __('Pricing Sub Heading', 'novellite'),
        'section'  => 'pricing_head',
        'settings' => 'pricing_desc_',
         'type'       => 'textarea',
    ));


    //First Table  Settings 
    $wp_customize->add_section( 'pricing_table_first', array(
     'title'          => __( 'First Pricing Table','novellite' ),
     'theme_supports' => 'custom-background',
     'panel'  => 'pricing_section'
    ) );

 $wp_customize->add_setting('pricing_title_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_title_first', array(
        'label'    => __('Pricing Table Title', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_title_first',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_amount_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_amount_first', array(
        'label'    => __('Pricing Amount', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_amount_first',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('pricing_currency_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_currency_first', array(
        'label'    => __('Pricing Currency', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_currency_first',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_wmy_first', array(
        'default'           => '/Month',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_wmy_first', array(
        'label'    => __('Pricing month/year', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_wmy_first',
         'type'       => 'text',
    ));


    $wp_customize->add_setting('pricing_item1_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item1_first', array(
        'label'    => __('Item 1', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_item1_first',
         'type'       => 'text',
    ));

 $wp_customize->add_setting('pricing_item2_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item2_first', array(
        'label'    => __('Item 2', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_item2_first',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_item3_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item3_first', array(
        'label'    => __('Item 3', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_item3_first',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_item4_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item4_first', array(
        'label'    => __('Item 4', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_item4_first',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_signup_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_signup_first', array(
        'label'    => __('Signup Text', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_signup_first',
         'type'       => 'text',
    ));

 $wp_customize->add_setting('pricing_signup_link_first', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pricing_signup_link_first', array(
        'label'    => __('Signup Link', 'novellite'),
        'section'  => 'pricing_table_first',
        'settings' => 'pricing_signup_link_first',
         'type'       => 'text',
    ));

// second pricing table

     $wp_customize->add_section( 'pricing_table_second', array(
     'title'          => __( 'Second Pricing Table','novellite' ),
     'theme_supports' => 'custom-background',
     'panel'  => 'pricing_section'
    ) );

 $wp_customize->add_setting('pricing_title_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_title_second', array(
        'label'    => __('Pricing Table Title', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_title_second',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_amount_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_amount_second', array(
        'label'    => __('Pricing Amount', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_amount_second',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('pricing_currency_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_currency_second', array(
        'label'    => __('Pricing Currency', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_currency_second',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_wmy_second', array(
        'default'           => '/Month',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_wmy_second', array(
        'label'    => __('Pricing month/year', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_wmy_second',
         'type'       => 'text',
    ));


    $wp_customize->add_setting('pricing_item1_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item1_second', array(
        'label'    => __('Item 1', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_item1_second',
         'type'       => 'text',
    ));

 $wp_customize->add_setting('pricing_item2_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item2_second', array(
        'label'    => __('Item 2', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_item2_second',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_item3_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item3_second', array(
        'label'    => __('Item 3', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_item3_second',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_item4_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item4_second', array(
        'label'    => __('Item 4', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_item4_second',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_signup_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_signup_second', array(
        'label'    => __('Signup Link', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_signup_second',
         'type'       => 'text',
    ));

 $wp_customize->add_setting('pricing_signup_link_second', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pricing_signup_link_second', array(
        'label'    => __('Signup Text', 'novellite'),
        'section'  => 'pricing_table_second',
        'settings' => 'pricing_signup_link_second',
         'type'       => 'text',
    ));

    // third pricing table
 $wp_customize->add_section( 'pricing_table_third', array(
     'title'          => __( 'Third Pricing Table','novellite' ),
     'theme_supports' => 'custom-background',
     'panel'  => 'pricing_section'
    ) );

 $wp_customize->add_setting('pricing_title_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_title_third', array(
        'label'    => __('Pricing Table Title', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_title_third',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_amount_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_amount_third', array(
        'label'    => __('Pricing Amount', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_amount_third',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('pricing_currency_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_currency_third', array(
        'label'    => __('Pricing Currency', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_currency_third',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_wmy_third', array(
        'default'           => '/Month',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_wmy_third', array(
        'label'    => __('Pricing month/year', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_wmy_third',
         'type'       => 'text',
    ));


    $wp_customize->add_setting('pricing_item1_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item1_third', array(
        'label'    => __('Item 1', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_item1_third',
         'type'       => 'text',
    ));

 $wp_customize->add_setting('pricing_item2_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item2_third', array(
        'label'    => __('Item 2', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_item2_third',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_item3_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item3_third', array(
        'label'    => __('Item 3', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_item3_third',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_item4_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_item4_third', array(
        'label'    => __('Item 4', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_item4_third',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('pricing_signup_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_signup_third', array(
        'label'    => __('Signup Text', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_signup_third',
         'type'       => 'text',
    ));

 $wp_customize->add_setting('pricing_signup_link_third', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pricing_signup_link_third', array(
        'label'    => __('Signup Link', 'novellite'),
        'section'  => 'pricing_table_third',
        'settings' => 'pricing_signup_link_third',
         'type'       => 'text',
    ));
        // end pricing



           //  =============================
        //  = lead detail Settings       =
        //  =============================

    $wp_customize->add_section( 'lead_form', array(
     'title'          => __( 'Contact Form Setting', 'novellite' ),
     'priority'       => 20,
) );

    $wp_customize->add_setting('cf_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cf_image', array(
        'label'    => __('Contact Form Background Image', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_image',
    )));


       $wp_customize->add_setting('cf_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cf_head_', array(
        'label'    => __('Form Heading', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('cf_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('cf_desc_', array(
        'label'    => __('Form Sub Heading', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_desc_',
         'type'       => 'textarea',
    ));

    $wp_customize->add_setting('cf_email_', array(
        'default'           => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cf_email_', array(
        'label'    => __('Enter Email Address', 'novellite'),
        'description' => __('Enter receiver email address for contact form','novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_email_',
         'type'       => 'text',
    ));


     $wp_customize->add_section( 'footer_option', array(
         'title'          => __( 'Footer Text', 'novellite' ),
         'priority'       => 20,
    ) );

    $wp_customize->add_setting('footertext', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('footertext', array(
        'label'    => __('Footer Copyright Text', 'novellite'),
        'section'  => 'footer_option',
        'settings' => 'footertext',
         'type'       => 'textarea',
    ));


// custom color
    $wp_customize->get_section('colors')->title = esc_html__('Style Settings', 'novellite');
    $wp_customize->get_section('colors')->priority = 25;


    //  =============================
    //  = Custom Css      =
    //  =============================
 $wp_customize->add_section('custom_css', array(
        'title'    => __('Custom Css', 'novellite'),
        'priority' => 20,
    ));
   $wp_customize->add_setting('custom_css_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));
    $wp_customize->add_control('custom_css_text', array(
        'settings' => 'custom_css_text',
        'label'     => 'Custom Css',
        'section' => 'custom_css',
        'type'    => 'textarea',
    ) );

}
add_action('customize_register','NovelLite_customize_register');