<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="<?php bloginfo('charset'); ?>" />	
	<?php $wl_theme_options = enigma_parallax_get_options(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div>
	<!-- Header Section -->
	<div class="top_fix">
	<div class="header_section affix-top transition">
		<div class="container" id="header">
			<!-- Logo & Contact Info -->
			<div class="row ">
				<div class="col-md-6 col-sm-12 wl_rtl" >					
					<div class="logo">						
					<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if($wl_theme_options['upload_image_logo']){ ?>
						<img class="img-responsive" src="<?php echo esc_url($wl_theme_options['upload_image_logo']); ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "80"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "200"; } ?>px;" />
						<?php } else {
							echo get_bloginfo('name');
						} ?>
					</a>
					<p><?php bloginfo( 'description' ); ?></p>
					</div>
				</div>
				<?php if($wl_theme_options['header_social_media_in_enabled']=='1') { ?>
				<div class="col-md-6 col-sm-12">
				<?php if($wl_theme_options['email_id'] || $wl_theme_options['phone_no'] !='') { ?>
				<ul class="head-contact-info">
						<?php if($wl_theme_options['email_id'] !='') { ?><li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $wl_theme_options['email_id']; ?>"><?php echo esc_attr($wl_theme_options['email_id']); ?></a></li><?php } ?>
						<?php if($wl_theme_options['phone_no'] !='') { ?><li><i class="fa fa-phone"></i><a href="tel:<?php echo $wl_theme_options['phone_no']; ?>"><?php echo esc_attr($wl_theme_options['phone_no']); ?></a></li><?php } ?>
				</ul>
				<?php } ?>
					<ul class="social">
					<?php if($wl_theme_options['fb_link']!='') { ?>
					   <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a  href="<?php echo esc_url($wl_theme_options['fb_link']); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php } if($wl_theme_options['twitter_link']!='') { ?>
					<li class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="<?php echo esc_url($wl_theme_options['twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php } if($wl_theme_options['linkedin_link']!='') { ?>					
					<li class="linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><a href="<?php echo esc_url($wl_theme_options['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php } if($wl_theme_options['youtube_link']!='') { ?>
					<li class="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"><a href="<?php echo esc_url($wl_theme_options['youtube_link']) ; ?>"><i class="fa fa-youtube"></i></a></li>
	                <?php } if($wl_theme_options['gplus']!='') { ?>
					<li class="twitter" data-toggle="tooltip" data-placement="bottom" title="gplus"><a href="<?php echo esc_url($wl_theme_options['gplus']) ; ?>"><i class="fa fa-google-plus"></i></a></li>
	                <?php } if($wl_theme_options['instagram']!='') { ?>
					<li class="facebook" data-toggle="tooltip" data-placement="bottom" title="instagram"><a href="<?php echo esc_url($wl_theme_options['instagram']) ; ?>"><i class="fa fa-instagram"></i></a></li>
	                <?php } ?>
					</ul>	
				</div>
				<?php } ?>
			</div>
			<!-- /Logo & Contact Info -->
		</div>	
	</div>	
	<!-- /Header Section -->
	<!-- Navigation  menus -->
	<div class="navigation_menu transition"  data-spy="affix" data-offset-top="95" id="enigma_nav_top">
		<span id="header_shadow"></span>
		<div class="container navbar-container" >
			<nav class="navbar navbar-default " role="navigation">
				
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					 
					  <span class="sr-only"><?php _e('Toggle navigation','enigma-parallax');?></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
				</div>
				<div id="menu" class="collapse navbar-collapse ">	
				<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'enigma_parallax_fallback_page_menu',
						'walker' => new enigma_parallax_nav_walker(),
						)
						);	?>				
				</div>	
			</nav>
		</div>
	</div>
	</div>
	<div class="home_menu">
	<div id="scroll_menu">
	
	<a href="<?php echo esc_url(home_url( '/' )); ?>" class="btn " data-toggle="tooltip" title="Home"><i class="fa fa-home"></i></a><br />
	<?php if($wl_theme_options['slider_home'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#slider" class="btn " data-toggle="tooltip" title="Slider"><i class="fa fa-caret-square-o-right"></i></a><br />
	<?php } ?>
	<?php if($wl_theme_options['service_home'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#service" class="btn " data-toggle="tooltip" title="Service"><i class="fa fa-yelp"></i></a><br />
	<?php } ?>
	<?php if($wl_theme_options['portfolio_home'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#portfolio" class="btn " data-toggle="tooltip" title="Portfolio"><i class="fa fa-picture-o"></i></a><br />
	<?php } ?>
	<?php if($wl_theme_options['show_testimonial'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#testimonial" class="btn " data-toggle="tooltip" title="Testimonial"><i class="fa fa-desktop"></i></a><br />
	<?php } ?>
	<?php if($wl_theme_options['show_blog'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#blog" class="btn" data-toggle="tooltip" title="Blog"><i class="fa fa-book"></i></a><br />
	<?php } ?>
	<?php if($wl_theme_options['show_team'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#team" class="btn " data-toggle="tooltip" title="Team"><i class="fa fa-users"></i></a><br />
	<?php } ?>
	<?php if($wl_theme_options['show_contact'] == "1") { ?>
	<a href="<?php if(!is_home()){ echo esc_url(home_url( '/' )); } ?>#contact" class="btn " data-toggle="tooltip" title="Contact"><i class="fa fa-phone"></i></a>
	<?php } ?>
	</div>
	<div class="scroll_toggle">
	<img src="<?php echo esc_url(get_template_directory_uri() . '/images/round.png'); ?>" height="50" width="50" id="bt1" onclick="setVisibility('scroll_menu');">
	</div>
	</div>