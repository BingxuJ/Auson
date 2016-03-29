<?php	
	function chronicle_default_settings()
	{	$ImageUrl1 = get_template_directory_uri() ."/images/slider-1.jpg";
		$ImageUrl2 = get_template_directory_uri() ."/images/slider-2.jpg";
		$ImageUrl3 = get_template_directory_uri() ."/images/slider-3.jpg";
		$port1 = get_template_directory_uri() ."/images/port-1.jpg";
		$port2 = get_template_directory_uri() ."/images/port-2.jpg";
		$port3 = get_template_directory_uri() ."/images/port-3.jpg";
		
		$chronicle_theme_options=array(
		'_frontpage'=>'on',
		'upload_image_logo'=>'',
		'height'=>'45',
		'width'=>'150',
		'text_title'=>'on',
		'upload_image_favicon'=>'',
		
		'callout_text'=>'Join The chronicle theme shop and Get Lots of Awesome Features themes',
		'button_1_text' => 'Read More',
		'button_1_link' => '#',		
		'button_2_text' => 'Purchase Know',
		'button_2_link' => '#',
		
		'header_social_media_in_enabled'=>'on',
		'footer_section_social_media_enbled'=>'on',
		'facebook_link' =>"#",
		'twitter_link' =>"#",
		'google_plus' =>"#",
		'linkedin_link' =>"#",
		'flicker_link' =>"#",
		'youtube_link' =>"#",
		'rss_link' =>"#",
		'contact_email' => 'Chronicle@chronicle.com',
		'phone_no' => '00159753586',
			
		'slide_image_1' => $ImageUrl1,
		'slide_title_1' => 'Chronicle Custom Layout',
		'slide_desc_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.',
		'slide_link_1' => '#',
		
		'slide_image_2' => $ImageUrl2,
		'slide_title_2' => 'Chronicle support Touch Slider',
		'slide_desc_2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.',
		'slide_link_2' => '#',
		
		'slide_image_3' => $ImageUrl3,
		'slide_title_3' => 'Responsive Theme Design',
		'slide_desc_3' => 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.',
	    'slide_link_3' => '#',
		
		
		'portfolio_home'=>'on',
		'port_heading' => 'LATEST PROJECTS',
		'blog_heading' => 'Our Latest Blog',
		
		'port_1_img'=> $port1,
		'port_1_title'=>'Responsive Design',
		'port_1_link'=>'#',
		
		'port_2_img'=> $port2,
		'port_2_title'=>'Retain Ready',
		'port_2_link'=>'#',
		
		'port_3_img'=> $port3,
		'port_3_title'=>'Interactive Portfolio ',
		'port_3_link'=>'#',		
	
		'home_service_title'=>'Multi purpose Our service',
		'home_service_description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		
		'service_1_title'=>"Corporate Theme",
		'service_1_icons'=>"fa fa-pencil-square-o",
		'service_1_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
		
		'service_2_title'=>"Creative Theme",
		'service_2_icons'=>"fa fa-clock-o",
		'service_2_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
		
		'service_3_title'=>"Quick Support ",
		'service_3_icons'=>"fa fa-comments-o",
		'service_3_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
	
		//footer customization 
		'footer_customizations' => 'Copyright @ 2015 WordPress.',
		'developed_by_text' => ' Developed By',
		'developed_by_chronicle_text' => 'chronicle',
		'developed_by_link' => 'https://www.weblizar.com',
		
		'terms_of_use_text' =>'Terms of Use',
		'terms_of_use_link' =>'#',
		
		'Privacy_policy_text' =>'Privacy Policy',
		'Privacy_policy_link' =>'#',
		
		// Font Options
		'title_font' => 'Open Sans',
		'desc_font' => 'Open Sans',
		'btn_font' => 'Open Sans',
		'heading_title_font' => 'Open Sans',
		'sidebar_title_font' => 'Open Sans',
		'sidebar_desc_font' => 'Open Sans',
		);
		
	return apply_filters( 'chronicle_theme_options', $chronicle_theme_options );
}
	function chronicle_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'chronicle_theme_options', array() ), 
        chronicle_default_settings());    
	}
	
	///add_option('chronicle_theme_options', $chronicle_theme_options);	
	// Option Reset
	add_action( 'wp_ajax_reset_options', 'reset_options_data' );
	function reset_options_data() {
		if(!wp_verify_nonce($_POST['chronicle_nonce'], 'chronicle_nonce')) exit;
		$chronicle_theme_options = chronicle_get_options();
		// Handle request then generate response using WP_Ajax_Response
		if($_POST['option']=="theme_gnrl_options"){		
		$chronicle_theme_options['_frontpage']='on';
		$chronicle_theme_options['upload_image_logo']='';
		$chronicle_theme_options['height']='45';
		$chronicle_theme_options['width']='150';
		$chronicle_theme_options['text_title']='off';
		$chronicle_theme_options['upload_image_favicon']='';
		$chronicle_theme_options['custom_css']='';
		$chronicle_theme_options['blog_title']='Our Latest Blog';
		update_option('chronicle_theme_options', $chronicle_theme_options);		
		}
		if($_POST['option']=="theme_callout_options"){		
		$chronicle_theme_options['callout_text']='Join The chronicle theme shop and Get Lots of Awesome Features themes';
		$chronicle_theme_options['button_1_text']='Read More';
		$chronicle_theme_options['button_1_link']='#';
		$chronicle_theme_options['button_2_text']='Purchase Know';
		$chronicle_theme_options['button_2_link']='#';
		update_option('chronicle_theme_options', $chronicle_theme_options);		
		}
		if($_POST['option']=="theme_social_options"){		
		$chronicle_theme_options['header_social_media_in_enabled']='on';
		$chronicle_theme_options['footer_section_social_media_enbled']='on';
		$chronicle_theme_options['facebook_link']="#";
		$chronicle_theme_options['twitter_link']="#";
		$chronicle_theme_options['google_plus']="#";
		$chronicle_theme_options['linkedin_link']="#";
		$chronicle_theme_options['flicker_link']="#";
		$chronicle_theme_options['youtube_link']="#";
		$chronicle_theme_options['rss_link']="#";
		$chronicle_theme_options['contact_email']='Chronicle@chronicle.com';
		$chronicle_theme_options['phone_no']='00159753586';
		update_option('chronicle_theme_options', $chronicle_theme_options);		
		}
		if($_POST['option']=="theme_slider_options"){
		$ImageUrl1 = get_template_directory_uri() ."/images/slider-1.jpg";
		$ImageUrl2 = get_template_directory_uri() ."/images/slider-2.jpg";
		$ImageUrl3 = get_template_directory_uri() ."/images/slider-3.jpg";
		$chronicle_theme_options['slide_image_1']=$ImageUrl1;
		$chronicle_theme_options['slide_title_1']='Chronicle Custom Layout';
		$chronicle_theme_options['slide_desc_1']='Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.';
		
		$chronicle_theme_options['slide_image_2']=$ImageUrl2;
		$chronicle_theme_options['slide_title_2']= 'Chronicle support Touch Slider';
		$chronicle_theme_options['slide_desc_2']= 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.';
		
		$chronicle_theme_options['slide_image_3']= $ImageUrl3;
		$chronicle_theme_options['slide_title_3']= 'Responsive Theme Design';
		$chronicle_theme_options['slide_desc_3']= 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.';
		
		update_option('chronicle_theme_options', $chronicle_theme_options);		
		}
		if($_POST['option']=="theme_portfolio_options"){
		
		$port1 = get_template_directory_uri() ."/images/port-1.jpg";
		$port2 = get_template_directory_uri() ."/images/port-2.jpg";
		$port3 = get_template_directory_uri() ."/images/port-3.jpg";
		
		$chronicle_theme_options['portfolio_home']='on';
		$chronicle_theme_options['port_heading']= 'LATEST PROJECTS';
		$chronicle_theme_options['blog_heading']= 'Our Latest Blog';
		
		$chronicle_theme_options['port_1_img']= $port1;
		$chronicle_theme_options['port_1_title']='Responsive Design';
		$chronicle_theme_options['port_1_link']='#';
		
		$chronicle_theme_options['port_2_img']=$port2;
		$chronicle_theme_options['port_2_title']='Retain Ready';
		$chronicle_theme_options['port_2_link']='#';
		
		$chronicle_theme_options['port_3_img']=$port3;
		$chronicle_theme_options['port_3_title']='Interactive Portfolio ';
		$chronicle_theme_options['port_3_link']='#';
		update_option('chronicle_theme_options', $chronicle_theme_options);		
		}
		
		if($_POST['option']=="	theme_service_options"){
		$chronicle_theme_options['home_service_title']='Multi purpose Our service';
		$chronicle_theme_options['home_service_description']='Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
		
		$chronicle_theme_options['service_1_title']="Corporate Theme";
		$chronicle_theme_options['service_1_icons']="fa fa-pencil-square-o";
		$chronicle_theme_options['service_1_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
		
		$chronicle_theme_options['service_2_title']="Creative Theme";
		$chronicle_theme_options['service_2_icons']="fa fa-clock-o";
		$chronicle_theme_options['service_2_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
		
		$chronicle_theme_options['service_3_title']="Quick Support ";
		$chronicle_theme_options['service_3_icons']="fa fa-comments-o";
		$chronicle_theme_options['service_3_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
		update_option('chronicle_theme_options', $chronicle_theme_options);		
		}
		if($_POST['option']=="theme_footer_options"){
			//footer customization 
			$chronicle_theme_options['footer_customizations']='Copyright @ 2015 WordPress.';
			$chronicle_theme_options['developed_by_text']=' Developed By';
			$chronicle_theme_options['developed_by_chronicle_text']='chronicle';
			$chronicle_theme_options['developed_by_link']='https://www.weblizar.com';
		
			$chronicle_theme_options['terms_of_use_text']='Terms of Use';
			$chronicle_theme_options['terms_of_use_link']='#';
			
			$chronicle_theme_options['Privacy_policy_text']='Privacy Policy';
			$chronicle_theme_options['Privacy_policy_link']='#';
			update_option('chronicle_theme_options', $chronicle_theme_options);	
		}
	}
?>