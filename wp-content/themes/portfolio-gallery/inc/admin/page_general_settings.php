<?php

class WDWT_general_settings_page_class{
	
	public $options;

	
	
	function __construct(){
	
	$this->options = array( 

		'custom_css_enable' => array( 
			'name' => 'custom_css_enable', 
			'title' => __( 'Custom CSS', "portfolio-gallery" ), 
			'type' => 'checkbox_open', 
			'description' => __( 'Custom CSS will change the visual style of the website. The CSS code provided here can be applied to any page or post.', "portfolio-gallery" ), 
			'show' => array('custom_css_text'),
			'hide' => array(),
			'section' => 'general_main', 
			'tab' => 'general', 
			'default' => false,
			'customizer' => array()
		), 
		'custom_css_text' => array( 
			'name' => 'custom_css_text', 
			'title' => '', 
			'type' => 'textarea', 
			'sanitize_type' => 'css', 
			'description' => __( 'Provide the custom CSS code below.', "portfolio-gallery" ), 
			'section' => 'general_main',  
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()      
		),
		
		
		'blog_style' => array(
			'name' => 'blog_style', 
			'title' =>  __( 'Blog Style post format', "portfolio-gallery" ), 
			'type' => 'checkbox', 
			'description' => __( 'Show only excerpts of posts in index page.', "portfolio-gallery" ), 
			'section' => 'general_main', 
			'tab' => 'general', 
			'default' => true,
			'customizer' => array()           
		),
		'search_view' => array(
			'name' => 'search_view', 
			'title' =>  __( 'Search results.', "portfolio-gallery" ), 
			'type' => 'radio', 
			'description' => __( 'Display search results like blog or gallery view.', "portfolio-gallery" ), 
			'valid_options' => array(
				'gallery' => __('Gallery', "portfolio-gallery"),
				'blog' => __('Blog', "portfolio-gallery"),
			),
			'section' => 'general_main', 
			'tab' => 'general', 
			'default' => 'gallery',
			'customizer' => array()           
		), 
		
		
		'date_enable' => array(
			"name" => "date_enable", 
			"title" => __("Display post meta information","portfolio-gallery"), 
			'type' => 'checkbox',
			"description" => __("Choose whether to display the post meta information such as date, author and etc.", "portfolio-gallery"),
			'section' => 'general_main',  
			'tab' => 'general', 
			'default' => true,
			'customizer' => array()         
		),
		'footer_text_enable' => array(
			"name" => "footer_text_enable", 
			"title" => __("Information in the Footer", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => __("Check the box to display custom HTML for the footer.", "portfolio-gallery"),
			'section' => 'general_main',  
			'show' => array('footer_text'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => true,
			'customizer' => array()  
		),
		'footer_text' => array( 
			"name" => "footer_text", 
			"title" => __("Information in the Footer", "portfolio-gallery"), 
			'type' => 'textarea', 
			"sanitize_type" => "sanitize_html_field", 
			'width' => '450',
			'height' => '200',
			"description" => __("Here you can provide the HTML code to be inserted in the footer of your web site.", "portfolio-gallery"),
			
			'section' => 'general_main', 
			'tab' => 'general', 
			'default' => 'Copyright &copy; 2015. WordPress Themes by <a href="'.WDWT_HOMEPAGE.'"  target="_blank" title="Web-Dorado">Web-Dorado</a>',
			'customizer' => array()  
		),
		
		'logo_type' => array(
			"name" => "logo_type", 
			"title" => __("Logo type", "portfolio-gallery"), 
			'type' => 'radio_open', 
			"description" => "", 
			'valid_options' => array(
					'none' => __('None', "portfolio-gallery"),
					'image' => __('Image', "portfolio-gallery"),
					'text' => __('Text', "portfolio-gallery")
			),
			'show' => array('image'=>'logo_img', 'text' => 'logo_text'),
			'hide' => array(),
			'section' => 'general_main', 
			'tab' => 'general', 
			'default' => 'image',
			'customizer' => array()  
		),
		'logo_img' => array(
			'name' => 'logo_img', 
			'title' => __( 'Logo', "portfolio-gallery" ), 
			"sanitize_type" => "esc_url_raw",
			'type' => 'upload_single', 
			'description' => __( 'Upload custom logo image.', "portfolio-gallery" ), 
			'section' => 'general_main',  
			'tab' => 'general', 
			'default' => WDWT_IMG.'logo.png' ,
			'customizer' => array()           
		),
		'logo_text' => array( 
			"name" => "logo_text", 
			"title" => __("Logo Text", "portfolio-gallery"), 
			'type' => 'textarea', 
			"sanitize_type" => "sanitize_text_field", 
			"description" => __( "Provide with a custom text ", "portfolio-gallery" ),
			'section' => 'general_main',  
			'tab' => 'general', 
			'default' => '' ,
			'customizer' => array()  
		),
		'display_site_tagline' => array(
			"name" => "display_site_tagline", 
			"title" => __("Display site tagline","portfolio-gallery"), 
			'type' => 'checkbox',
			"description" => __("Display site tagline above the menu.", "portfolio-gallery"),
			'section' => 'general_main',  
			'tab' => 'general', 
			'default' => false,
			'customizer' => array()         
		),
		'menu_bg_img_enable' => array(
			"name" => "menu_bg_img_enable", 
			"title" => __("Show Menu Background Image", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => '', 
			'show' => array('menu_bg_img'),
			'hide' => array(),
			'section' => 'general_media',  
			'tab' => 'general', 
			'default' => true,
			'customizer' => array()  
		),
		'menu_bg_img' => array(
			'name' => 'menu_bg_img', 
			'title' => __( 'Menu Background Image', "portfolio-gallery"), 
			'type' => 'upload_single', 
			"sanitize_type" => "esc_url_raw", 
			'description' => __( 'You can apply a custom menu background image by clicking on the Upload Image button and uploading your image.', "portfolio-gallery" ), 
			'section' => 'general_media', 
			'tab' => 'general', 
			'default' => WDWT_IMG.'background.png',
			'customizer' => array()           
		),
		'grab_image' => array(
			'name' => 'grab_image', 
			'title' =>  __( 'Grab the first post image', "portfolio-gallery" ), 
			'type' => 'checkbox', 
			'description' => __( 'Use the first image of the post for generating post thumbnail if post does not have featured image. Note that the image needs to be hosted on your own server.', "portfolio-gallery" ), 
			'section' => 'general_media',  
			'tab' => 'general', 
			'default' => false,
			'customizer' => array()          
		),
		"grid_thumbs_size" => array(
			"name" => "grid_thumbs_size",
			"title" => __("Thumb size in posts grid", "portfolio-gallery" ),
			'type' => 'select',
			"description" => "",
			"valid_options" => array(
			"thumbnail" => __("Thumbnail", "portfolio-gallery"),
			"medium"  =>  __("Medium", "portfolio-gallery"),
			"large"  =>  __("Large", "portfolio-gallery"),
			"full"  =>  __("Original", "portfolio-gallery"),
			),
			'section' => 'general_media',
			'tab' => 'general',
			'default' => array('large'),
			'customizer' => array() 
		),
		'all_images_right_click' => array(
			"name" => "all_images_right_click", 
			"title" => __("Right click protection of all images.", "portfolio-gallery"), 
			'type' => 'checkbox',
			"description" => "",
			'section' => 'general_media',  
			'tab' => 'general', 
			'default' => false,
			'customizer' => array()         
		),
		'header_for_links' => array(
			"name" => "header_for_links", 
			"title" => __("Header for social links", "portfolio-gallery"), 
			'type' => 'text', 
			"description" => "",
			'section' => 'general_links',  
			'tab' => 'general', 
			'default' => "Get in touch" ,
			'customizer' => array()    
		),
		'twitter_icon_show' => array(
			"name" => "twitter_icon_show", 
			"title" => __("Show Twitter Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "",
			'show' => array('twitter_url'),
			'hide' => array(),
			'section' => 'general_links',  
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()    
		),      
		'twitter_url' => array( 
			"name" => "twitter_url", 
			"title" => __("Enter your Twitter profile URL below.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			"description" => __("Enter your Twitter Profile URL below.", "portfolio-gallery"), 
			'section' => 'general_links', 
			'tab' => 'general',
			'default' => '' ,
			'customizer' => array()     
		),   
		
		'facebook_icon_show' => array(
			"name" => "facebook_icon_show", 
			"title" => __("Show Facebook Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "",
			'show' => array('facebook_url'),
			'hide' => array(),
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		),      
		'facebook_url' => array(
			"name" => "facebook_url", 
			"title" => __("Enter your Facebook Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw",         
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '' ,
			'customizer' => array()  
		),      
		'google_icon_show' => array( 
			"name" => "google_icon_show", 
			"title" => __("Show Google+ Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('google_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'google_url' => array( 
			"name" => "google_url", 
			"title" => __("Enter your Google+ Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),
		'instagram_icon_show' => array( 
			"name" => "instagram_icon_show", 
			"title" => __("Show Instagram Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('instagram_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'instagram_url' => array( 
			"name" => "instagram_url", 
			"title" => __("Enter your Instagram Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),   
		'youtube_icon_show' => array( 
			"name" => "youtube_icon_show", 
			"title" => __("Show Youtube Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('youtube_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'youtube_url' => array( 
			"name" => "youtube_url", 
			"title" => __("Enter your Youtube Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),   
		'tumblr_icon_show' => array( 
			"name" => "tumblr_icon_show", 
			"title" => __("Show Tumblr Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('tumblr_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'tumblr_url' => array( 
			"name" => "tumblr_url", 
			"title" => __("Enter your Tumblr Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),   
		'flickr_icon_show' => array( 
			"name" => "flickr_icon_show", 
			"title" => __("Show Flickr Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('flickr_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'flickr_url' => array( 
			"name" => "flickr_url", 
			"title" => __("Enter your Flickr Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),   
		'pinterest_icon_show' => array( 
			"name" => "pinterest_icon_show", 
			"title" => __("Show Pinterest Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('pinterest_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'pinterest_url' => array( 
			"name" => "pinterest_url", 
			"title" => __("Enter your Pinterest Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),   
		'dribbble_icon_show' => array( 
			"name" => "dribbble_icon_show", 
			"title" => __("Show Dribbble Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('dribbble_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'dribbble_url' => array( 
			"name" => "dribbble_url", 
			"title" => __("Enter your Dribbble Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		),   
		'px500_icon_show' => array( 
			"name" => "px500_icon_show", 
			"title" => __("Show 500px Icon", "portfolio-gallery"), 
			'type' => 'checkbox_open', 
			"description" => "", 
			'section' => 'general_links', 
			'show' => array('px500_url'),
			'hide' => array(),
			'tab' => 'general', 
			'default' => false ,
			'customizer' => array()  
		), 
		'px500_url' => array( 
			"name" => "px500_url", 
			"title" => __("Enter your 500px Profile URL.", "portfolio-gallery"), 
			'type' => 'text', 
			"sanitize_type" => "esc_url_raw", 
			'section' => 'general_links', 
			'tab' => 'general', 
			'default' => '',
			'customizer' => array()
		), 
	);
	
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
	$this->options['favicon_enable'] = array(
		'name' => 'favicon_enable', 
		'title' => __( 'Show Favicon', "portfolio-gallery" ), 
		'type' => 'checkbox_open', 
		'description' => '', 
		'section' => 'general_main', 
		'show' => array('favicon_img'),
		'hide' => array(),
		'tab' => 'general', 
		'default' => false,
		'customizer' => array()         
		);
		$this->options['favicon_img'] = array(  
		'name' => 'favicon_img', 
		'title' => '', 
		'type' => 'upload_single', 
		"sanitize_type" => "esc_url_raw", 
		'description' => __( 'Click on the Upload Image button to upload the favicon image.', "portfolio-gallery" ), 
		'section' => 'general_main',  
		'tab' => 'general', 
		'default' => '',
		'customizer' => array()   
		);
	}  

	
	
	
	}

	
	
	

}