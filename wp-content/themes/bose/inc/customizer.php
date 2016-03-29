<?php
/**
 * bose Theme Customizer
 *
 * @package bose
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bose_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'bose' ),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'bose_logo' , array(
	    'default'     => '',
	    'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'bose_logo',
	        array(
	            'label' => __('Upload Logo','bose'),
	            'section' => 'title_tagline',
	            'settings' => 'bose_logo',
	            'priority' => 5,
	        )
		)
	);
		
	$wp_customize->add_section( 'bose_blog' , array(
	    'title'      => __( 'Blog Layout', 'bose' ),
	    'priority'   => 30,
	) );
	
		
	$wp_customize->add_setting(
	'bose_layout',
	array(
		'default'		=> 'grid3',
		'sanitize_callback'	=> 'bose_sanitize_layout'
		)
	);
	
	$wp_customize->add_control(	 
	       'bose_layout',
	        array(
	            'section' => 'bose_blog',
	            'settings' => 'bose_layout',
	            'type' => 'select',
				'choices' => array(
						'grid2' => __('2 Column Standard','bose'),
						'grid3' => __('4 Columns','bose'),
						)
			        )
	);	
	
	function bose_santizie_layout() {
		if (in_array( $input, array('grid2','grid3') ) )
			return $input;
		else
			return 'grid3';
	}
	
	$wp_customize->add_setting(
	'bose_phone',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'bose_phone',
	        array(
		        'title' => __('Enter your Phone No. here. ','bose'),
	            'section' => 'bose_header',
	            'settings' => 'bose_phone',
	            'type' => 'text'
	        )
	);	
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override bose_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('bose_site_titlecolor', array(
	    'default'     => '#3a85ae',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'bose_site_titlecolor', array(
			'label' => __('Site Title Color','bose'),
			'section' => 'colors',
			'settings' => 'bose_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'bose_hide_title_tagline',
		array( 'sanitize_callback' => 'bose_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'bose_hide_title_tagline', array(
		    'settings' => 'bose_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'bose' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	function bose_title_visible( $control ) {
		$option = $control->manager->get_setting('bose_hide_title_tagline');
	    return $option->value() == false ;
	}
	
	// SLIDER PANEL
	$wp_customize->add_panel( 'bose_slider_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => 'Main Slider',
	) );
	
	$wp_customize->add_section(
	    'bose_sec_slider_options',
	    array(
	        'title'     => __('Enable/Disable','bose'),
	        'priority'  => 0,
	        'panel'     => 'bose_slider_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'bose_main_slider_enable',
		array( 'sanitize_callback' => 'bose_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'bose_main_slider_enable', array(
		    'settings' => 'bose_main_slider_enable',
		    'label'    => __( 'Enable Slider.', 'bose' ),
		    'section'  => 'bose_sec_slider_options',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'bose_main_slider_count',
			array(
				'default' => '0',
				'sanitize_callback' => 'bose_sanitize_positive_number'
			)
	);
	
	// Select How Many Slides the User wants, and Reload the Page.
	$wp_customize->add_control(
			'bose_main_slider_count', array(
		    'settings' => 'bose_main_slider_count',
		    'label'    => __( 'No. of Slides(Min:0, Max: 5)' ,'bose'),
		    'section'  => 'bose_sec_slider_options',
		    'type'     => 'number',
		    'description' => __('Save the Settings, and Reload this page to Configure the Slides.','bose'),
		    
		)
	);
	
		
	
	if ( get_theme_mod('bose_main_slider_count') > 0 ) :
		$slides = get_theme_mod('bose_main_slider_count');
		
		for ( $i = 1 ; $i <= $slides ; $i++ ) :
			
			//Create the settings Once, and Loop through it.
			
			$wp_customize->add_setting(
				'bose_slide_img'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'bose_slide_img'.$i,
			        array(
			            'label' => '',
			            'section' => 'bose_slide_sec'.$i,
			            'settings' => 'bose_slide_img'.$i,			       
			        )
				)
			);
			
			
			$wp_customize->add_section(
			    'bose_slide_sec'.$i,
			    array(
			        'title'     => 'Slide '.$i,
			        'priority'  => $i,
			        'panel'     => 'bose_slider_panel'
			    )
			);
			
			$wp_customize->add_setting(
				'bose_slide_title'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'bose_slide_title'.$i, array(
				    'settings' => 'bose_slide_title'.$i,
				    'label'    => __( 'Slide Title','bose' ),
				    'section'  => 'bose_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'bose_slide_desc'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'bose_slide_desc'.$i, array(
				    'settings' => 'bose_slide_desc'.$i,
				    'label'    => __( 'Slide Description','bose' ),
				    'section'  => 'bose_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			
			$wp_customize->add_setting(
				'bose_slide_url'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
					'bose_slide_url'.$i, array(
				    'settings' => 'bose_slide_url'.$i,
				    'label'    => __( 'Target URL','bose' ),
				    'section'  => 'bose_slide_sec'.$i,
				    'type'     => 'url',
				)
			);
			
		endfor;
	
	
	endif;
	
	//Featured Posts
	
	$wp_customize->add_section(
	    'bose_sec_featured_posts_options',
	    array(
	        'title'     => __('Featured Posts','bose'),
	        'priority'  => 41,
	    )
	);
	
	
	$wp_customize->add_setting(
		'bose_main_featured_posts_enable',
		array( 'sanitize_callback' => 'bose_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'bose_main_featured_posts_enable', array(
		    'settings' => 'bose_main_featured_posts_enable',
		    'label'    => __( 'Enable featured_posts.', 'bose' ),
		    'section'  => 'bose_sec_featured_posts_options',
		    'type'     => 'checkbox',
		)
	);
	
	if (class_exists('WP_Customize_Control')) {
		class Bose_WP_Customize_Category_Control extends WP_Customize_Control {
	        /**
	         * Render the control's content.
	         */
	        public function render_content() {
	            $dropdown = wp_dropdown_categories(
	                array(
	                    'name'              => '_customize-dropdown-categories-' . $this->id,
	                    'echo'              => 0,
	                    'show_option_none'  => __( '&mdash; Select &mdash;', 'bose' ),
	                    'option_none_value' => '0',
	                    'selected'          => $this->value(),
	                )
	            );
	 
	            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
	 
	            printf(
	                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
	                $this->label,
	                $dropdown
	            );
	        }
	    }
	}  
	
	$wp_customize->add_setting(
	    'bose_box_cat',
	    array( 'sanitize_callback' => 'bose_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new Bose_WP_Customize_Category_Control(
	        $wp_customize,
	        'bose_box_cat',
	        array(
	            'label'    => __('Category For Featured Posts.','bose'),
	            'settings' => 'bose_box_cat',
	            'section'  => 'bose_sec_featured_posts_options'
	        )
	    )
	);

	
	
	//Feature
	$wp_customize->add_panel( 'bose_Feature_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Features Box','bose'),
	) );
	
	$wp_customize->add_section(
	    'bose_sec_Feature_options',
	    array(
	        'title'     => __('Enable/Disable','bose'),
	        'priority'  => 0,
	        'panel'     => 'bose_Feature_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'bose_main_features_enable',
		array( 'sanitize_callback' => 'bose_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'bose_main_features_enable', array(
		    'settings' => 'bose_main_Feature_enable',
		    'label'    => __( 'Enable Feature.', 'bose' ),
		    'section'  => 'bose_sec_features_options',
		    'type'     => 'checkbox',
		)
	);
		
	
		$Features = 3;
		
		for ( $i = 1 ; $i <= $Features ; $i++ ) :
			
			//Create the settings Once, and Loop through it.
			
			$wp_customize->add_setting(
				'bose_features_img'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'bose_features_img'.$i,
			        array(
			            'label' => '',
			            'section' => 'bose_features_sec'.$i,
			            'settings' => 'bose_features_img'.$i,			       
			        )
				)
			);
			
			
			$wp_customize->add_section(
			    'bose_features_sec'.$i,
			    array(
			        'title'     => 'Feature '.$i,
			        'priority'  => $i,
			        'panel'     => 'bose_Feature_panel'
			    )
			);
			
			$wp_customize->add_setting(
				'bose_features_title'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'bose_features_title'.$i, array(
				    'settings' => 'bose_features_title'.$i,
				    'label'    => __( 'Feature Title','bose' ),
				    'section'  => 'bose_features_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'bose_features_desc'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'bose_features_desc'.$i, array(
				    'settings' => 'bose_features_desc'.$i,
				    'label'    => __( 'features Description','bose' ),
				    'section'  => 'bose_features_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			
			$wp_customize->add_setting(
				'bose_features_url'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
					'bose_features_url'.$i, array(
				    'settings' => 'bose_features_url'.$i,
				    'label'    => __( 'Target URL','bose' ),
				    'section'  => 'bose_features_sec'.$i,
				    'type'     => 'url',
				)
			);
			
		endfor;
		
	//Features
	//Feature
	$wp_customize->add_panel( 'bose_features_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Features','bose'),
	) );
	
	$wp_customize->add_section(
	    'bose_sec_features_options',
	    array(
	        'title'     => __('Enable/Disable','bose'),
	        'priority'  => 0,
	        'panel'     => 'bose_features_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'bose_main_features_enable',
		array( 'sanitize_callback' => 'bose_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'bose_main_features_enable', array(
		    'settings' => 'bose_main_features_enable',
		    'label'    => __( 'Enable Feature.', 'bose' ),
		    'section'  => 'bose_sec_features_options',
		    'type'     => 'checkbox',
		)
	);
		
	
		$featuress = 3;
		
		for ( $i = 1 ; $i <= $featuress ; $i++ ) :
			
			//Create the settings Once, and Loop through it.
			
			$wp_customize->add_setting(
				'bose_features_img'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'bose_features_img'.$i,
			        array(
			            'label' => '',
			            'section' => 'bose_features_sec'.$i,
			            'settings' => 'bose_features_img'.$i,			       
			        )
				)
			);
			
			
			$wp_customize->add_section(
			    'bose_features_sec'.$i,
			    array(
			        'title'     => 'Feature '.$i,
			        'priority'  => $i,
			        'panel'     => 'bose_features_panel'
			    )
			);
			
			$wp_customize->add_setting(
				'bose_features_title'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'bose_features_title'.$i, array(
				    'settings' => 'bose_features_title'.$i,
				    'label'    => __( 'Feature Title','bose' ),
				    'section'  => 'bose_features_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'bose_features_desc'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'bose_features_desc'.$i, array(
				    'settings' => 'bose_features_desc'.$i,
				    'label'    => __( 'Feature Description','bose' ),
				    'section'  => 'bose_features_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			
			$wp_customize->add_setting(
				'bose_features_url'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
					'bose_features_url'.$i, array(
				    'settings' => 'bose_features_url'.$i,
				    'label'    => __( 'Target URL','bose' ),
				    'section'  => 'bose_features_sec'.$i,
				    'type'     => 'url',
				)
			);
			
		endfor;	
	
	if (class_exists('WP_Customize_Control')) {
		class bose_WP_Customize_Upgrade_Control extends WP_Customize_Control {
	        /**
	         * Render the control's content.
	         */
	        public function render_content() {
	             printf(
	                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
	                $this->label,
	                $this->description
	            );
	        }
	    }
	}
	
	
	
	//Upgrade
	$wp_customize->add_section(
	    'bose_sec_upgrade',
	    array(
	        'title'     => __('Discover Bose Plus','bose'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'bose_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new bose_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'bose_upgrade',
	        array(
	            'label' => __('More of Everything','bose'),
	            'description' => __('Bose Pro Version has more of Everything. More New Features, More Options, Unlimited Colors, More Fonts, More Layouts, Configurable Slider, Inbuilt Advertising Options, More Widgets, and a lot more options and comes with Dedicated Support. To Know More about the Pro Version, click here: <a href="http://inkhive.com/product/bose-plus/">Upgrade to Bose Plus</a>.','bose'),
	            'section' => 'bose_sec_upgrade',
	            'settings' => 'bose_upgrade',			       
	        )
		)
	);
		
	
	class bose_Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'bose_custom_codes',
    array(
    	'title'			=> __('Custom CSS','bose'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','bose'),
    	'priority'		=> 41,
    	)
    );
    
	$wp_customize->add_setting(
	'bose_custom_css',
	array(
		'default'		=> '',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control(
	    new bose_Custom_CSS_Control(
	        $wp_customize,
	        'bose_custom_css',
	        array(
	            'section' => 'bose_custom_codes',
	            

	        )
	    )
	);
	
	function bose_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'bose_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','bose'),
    	'description'	=> __('Enter your Own Copyright Text.','bose'),
    	'priority'		=> 42,
    	)
    );
    
	$wp_customize->add_setting(
	'bose_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'bose_footer_text',
	        array(
	            'section' => 'bose_custom_footer',
	            'settings' => 'bose_footer_text',
	            'type' => 'text'
	        )
	);	
	
	
	// Social Icons
	$wp_customize->add_section('bose_social_section', array(
			'title' => __('Social Icons','bose'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','bose'),
					'facebook' => __('Facebook','bose'),
					'twitter' => __('Twitter','bose'),
					'google-plus' => __('Google Plus','bose'),
					'instagram' => __('Instagram','bose'),
					'rss' => __('RSS Feeds','bose'),
					'flickr' => __('Flickr','bose'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'bose_social_'.$x, array(
				'sanitize_callback' => 'bose_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'bose_social_'.$x, array(
					'settings' => 'bose_social_'.$x,
					'label' => __('Icon ','bose').$x,
					'section' => 'bose_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'bose_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'bose_social_url'.$x, array(
					'settings' => 'bose_social_url'.$x,
					'description' => __('Icon ','bose').$x.__(' Url','bose'),
					'section' => 'bose_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function bose_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'flickr',
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function bose_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function bose_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function bose_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'bose_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bose_customize_preview_js() {
	wp_enqueue_script( 'bose_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bose_customize_preview_js' );
