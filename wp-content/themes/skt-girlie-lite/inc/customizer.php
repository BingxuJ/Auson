<?php
/**
 * SKT Girlie Theme Customizer
 *
 * @package SKT Girlie
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_girlie_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_girlie_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'skt-girlie'),
            'priority' => 1,
	 		'description' => sprintf( __( 'Logo Settings available in <br /> %s.', 'skt-girlie' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('skt_girlie_options[logo-info]',array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_girlie_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'skt_girlie_options[logo-info]',
        'priority' => null
        ) )
    );
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#e42e54',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-girlie'),
	 		'description' => sprintf( __( 'More color options in <br /> %s.', 'skt-girlie' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
// Home Second Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Four Boxes Section','skt-girlie'),
		'description'	=> __('Select Pages from the dropdown for homepage four boxes section','skt-girlie'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'sanitize_callback' => 'skt_girlie_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('','skt-girlie'),
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'sanitize_callback' => 'skt_girlie_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('','skt-girlie'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'sanitize_callback' => 'skt_girlie_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('','skt-girlie'),
			'section' => 'section_second',
	));	
	
	$wp_customize->add_setting('page-column4',	array(
			'sanitize_callback' => 'skt_girlie_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',
			'label' => __('','skt-girlie'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','skt-girlie'),
 		'description' => sprintf( __( 'Add slider images here. <br /> More slider settings available in <br /> %s.', 'skt-girlie' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),		
		'priority'		=> null
	));	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(   new WP_Customize_Image_Control( $wp_customize, 'slide_image1', array(
            'label' => __('Slide Image 1 (1400x682)','skt-girlie'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
       		)
     	 )
	);	
	$wp_customize->add_setting('slide_title1',array(
			'default'	=> __('Living and Lifestyle Title','skt-girlie'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(	'slide_title1', array(	
			'label'	=> __('Slide title 1','skt-girlie'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title1'
	));
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> __('','skt-girlie'),
		'sanitize_callback'	=> 'wp_htmledit_pre'	
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc1', array(
				'label'	=> __('Slider description  1','skt-girlie'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc1'
	)));
	$wp_customize->add_setting('slide_link1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link1',array(
			'label'	=> __('Slide link 1','skt-girlie'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link1'
	));	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'slide_image2', array(
				'label'	=> __('Slide image 2','skt-girlie'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image2'
			)
		)
	);	
	$wp_customize->add_setting('slide_title2',array(	
			'default'	=> __('Living and Lifestyle Title','skt-girlie'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('slide_title2', array(	
			'label'	=> __('Slide title 2','skt-girlie'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title2'
	));	
	$wp_customize->add_setting('slide_desc2',array(
			'default'	=> __('','skt-girlie'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc2', array(
				'label'	=> __('Slide description 2','skt-girlie'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc2'
		))
	);	
	$wp_customize->add_setting('slide_link2',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide link 2','skt-girlie'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_link2'
	));	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,'slide_image3', array(
				'label'	=> __('Slide Image 3','skt-girlie'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image3'				
		))
	);	
	$wp_customize->add_setting('slide_title3',array(
			'default'	=> __('Living and Lifestyle Title','skt-girlie'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(	'slide_title3', array(		
			'label'	=> __('Slide title 3','skt-girlie'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title3'			
	));	
	$wp_customize->add_setting('slide_desc3',array(
			'default'	=> __('','skt-girlie'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control($wp_customize,'slide_desc3', array(
				'label'	=> __('Slide Description 3','skt-girlie'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc3'		
		))
	);	
	$wp_customize->add_setting('slide_link3',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link3',array(
			'label'	=> __('Slide link 3','skt-girlie'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link3'
	));	
 
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-girlie'),
	 		'description' => sprintf( __( 'More social icon available in <br /> %s.', 'skt-girlie' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-girlie'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-girlie'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-girlie'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-girlie'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','skt-girlie'),
	 		'description' => sprintf( __( 'To remove credit &amp; copyright text upgrade to <br /> %s.', 'skt-girlie' ), sprintf( 						'<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),			
			'priority'	=> null,
	));
	$wp_customize->add_setting('skt_girlie_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_girlie_Info( $wp_customize, 'cred_section', array(
		'label'	=> __('','skt-girlie'),
        'section' => 'footer_area',
        'settings' => 'skt_girlie_options[credit-info]'
        ) )
    );
	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Girlie','skt-girlie'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for about girlie','skt-girlie'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Consectetur, adipisci velit, sed quiaony on numquam eius modi tempora incidunt, ut laboret dolore agnam aliquam quaeratine voluptatem. ut enim ad minima veniamting suscipit suscipit lab velit, sed quiaony on numquam eius.','skt-girlie'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'about_description', array(	
			'label'	=> __('Add description for our philosophy','skt-girlie'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description'
	)) );
	
	$wp_customize->add_setting('recentpost_title',array(
			'default'	=> __('Recent Posts','skt-girlie'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('recentpost_title',array(
			'label'	=> __('Add title for recent posts','skt-girlie'),
			'section'	=> 'footer_area',
			'setting'	=> 'recentpost_title'
	));
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Contact Info','skt-girlie'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add Footer Contact Info','skt-girlie'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));		
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('100 King St, Melbourne PIC 4000, Australia','skt-girlie'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','skt-girlie'),
				'section'	=> 'footer_area',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+123 456 7890','skt-girlie'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-girlie'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-girlie'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_mail'
	));
	
	$wp_customize->add_section( 'theme_layout_sec', array(
            'title' => __('Layout Settings (PRO Version)', 'skt-girlie'),
            'priority' => null,
	 		'description' => sprintf( __( 'Layout Settings available in <br /> %s.', 'skt-girlie' ), sprintf( 						'<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('skt_girlie_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_girlie_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'skt_girlie_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section('theme_font_sec', array(
            'title' => __('Fonts Settings (PRO Version)', 'skt-girlie'),
            'priority' => null,
	 		'description' => sprintf( __( 'Font Settings available in <br /> %s.', 'skt-girlie' ), sprintf( 						'<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-girlie' )
						)
					),				
        )
    );  
    $wp_customize->add_setting('skt_girlie_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_girlie_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'skt_girlie_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section( 'theme_doc_sec', array(
            'title' => __('Documentation &amp; Support', 'skt-girlie'),
            'priority' => null,
	 		'description' => sprintf( __( 'For documentation and support check this link <br /> %s.', 'skt-girlie' ), sprintf( 						'<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), __( 'SKT Girlie Documentation', 'skt-girlie' )
						)
					),				
			
        )
    );  
    $wp_customize->add_setting('skt_girlie_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_girlie_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'skt_girlie_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'skt_girlie_customize_register' );

//Integer
function skt_girlie_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_girlie_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,				
					.copyright-txt span,					
					a.more-button span,
					.cols-4 span,					
					.listpages:hover h4,
					.header .header-inner .nav ul li a:hover, 
					.header .header-inner .nav ul li.current_page_item a
					{ color:<?php echo get_theme_mod('color_scheme','#e42e54'); ?>;}
					 
					.social-icons a:hover, 
					.pagination ul li .current, 
					.pagination ul li a:hover, 
					#commentform input#submit:hover,								
					h3.widget-title,				
					.wpcf7 input[type="submit"],
					.listpages:hover .morelink,
					.MoreLink:hover
					{ background-color:<?php echo get_theme_mod('color_scheme','#e42e54'); ?> !important;}
					
					.header .header-inner .nav,
					.nivo-controlNav a.active,
					.listpages:hover .morelink,
					.MoreLink
					{ border-color:<?php echo get_theme_mod('color_scheme','#e42e54'); ?>;}
					
			</style>  
<?php 
} 
add_action('wp_head','skt_girlie_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_girlie_customize_preview_js() {
	wp_enqueue_script( 'skt_girlie_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_girlie_customize_preview_js' );


function skt_girlie_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-girlie-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_girlie_custom_customize_enqueue' );