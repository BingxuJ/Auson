<?php 
	function enigma_parallax_scripts()
	{      
		wp_enqueue_style('enigma-parallax-bootstrap', get_template_directory_uri() .'/css/bootstrap.css');
		wp_enqueue_style('enigma-parallax-default', get_template_directory_uri() . '/css/default.css');
		wp_enqueue_style('enigma-parallax-theme', get_template_directory_uri() . '/css/enigma-theme.css');
		wp_enqueue_style('enigma-parallax-media-responsive', get_template_directory_uri() . '/css/media-responsive.css');
		wp_enqueue_style('enigma-parallax-animations', get_template_directory_uri() . '/css/animations.css');
		wp_enqueue_style('enigma-parallax-theme-animtae', get_template_directory_uri() . '/css/theme-animate.css');
		wp_enqueue_style('enigma-parallax-font-awesome', get_template_directory_uri() . '/css/font-awesome-4.4.0/css/font-awesome.css');              
		wp_enqueue_style('enigma-parallax-OpenSansRegular','//fonts.googleapis.com/css?family=Open+Sans');
		wp_enqueue_style('enigma-parallax-OpenSansBold','//fonts.googleapis.com/css?family=Open+Sans:700');
		wp_enqueue_style('enigma-parallax-OpenSansSemiBold','//fonts.googleapis.com/css?family=Open+Sans:600');
		wp_enqueue_style('enigma-parallax-RobotoRegular','//fonts.googleapis.com/css?family=Roboto');
		wp_enqueue_style('enigma-parallax-RobotoBold','//fonts.googleapis.com/css?family=Roboto:700');
		wp_enqueue_style('enigma-parallax-RalewaySemiBold','//fonts.googleapis.com/css?family=Raleway:600');
		wp_enqueue_style('enigma-parallax-Courgette','//fonts.googleapis.com/css?family=Courgette');
		
		// Js
		wp_enqueue_script('enigma-parallax-menu', get_template_directory_uri() .'/js/menu.js', array('jquery'));
		wp_enqueue_script('enigma-parallax-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.js');
		wp_enqueue_script('enigma-parallax-enigma-theme-script', get_template_directory_uri() .'/js/enigma-theme-script.js');
		if(is_front_page()){
		
		/*Carofredsul Slides*/
		wp_enqueue_script('enigma-parallax-carouFredSel', get_template_directory_uri() .'/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js');
		wp_enqueue_script('enigma-parallax-carouFredSel-element', get_template_directory_uri() .'/js/carouFredSel-6.2.1/caroufredsel-element.js');
		
		/*PhotoBox JS*/
		wp_enqueue_script('enigma-parallax-photobox-js', get_template_directory_uri() .'/js/jquery.photobox.js');
		wp_enqueue_style('enigma-parallax-photobox', get_template_directory_uri() . '/css/photobox.css');
		
		//Footer JS//
		wp_enqueue_script('enigma-parallax-footer-script', get_template_directory_uri() .'/js/enigma-footer-script.js','','',true);
		wp_enqueue_script('enigma-parallax-waypoints', get_template_directory_uri() .'/js/waypoints.js','','',true);				
		wp_enqueue_script('enigma-parallax-scroll', get_template_directory_uri() .'/js/scroll.js','','',true);
		wp_enqueue_script('enigma-parallax-scrollReveal', get_template_directory_uri() .'/js/scrollReveal.js','','',true);
		wp_enqueue_script('enigma-parallax-smoothscroll', get_template_directory_uri() .'/js/smoothscroll.js','','',true);
		wp_enqueue_script('enigma-parallax-scroll', get_template_directory_uri() .'/js/enigma-scroll.js','','',true);		
		}
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
	add_action('wp_enqueue_scripts', 'enigma_parallax_scripts');
	
	function enigma_parallax_upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload-media-widget', get_template_directory_uri(). '/js/upload-media.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }
	add_action('admin_enqueue_scripts', 'enigma_parallax_upload_scripts');
?>