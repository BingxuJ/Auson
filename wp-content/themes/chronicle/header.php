<!doctype html>
<head>
	<html <?php language_attributes(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" /> 
	<?php $chronicle_theme_options = chronicle_get_options(); ?>
	<?php if($chronicle_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($chronicle_theme_options['upload_image_favicon']); ?>" /> 
	<?php } ?>	
	<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<div class="wrapper_boxed">
<header id="header">	
	<div id="trueHeader">    
	<div class="wrapper"> 
    <div class="logoarea" style="<?php if(get_header_image()!=""){echo "background-image:url(".esc_url( get_header_image() ).");"; } ?>">
    <div class="container">    
    <!-- Logo -->
    <div class="logo">
	<?php //var_dump ( $chronicle_theme_options['title_font']); ?>
		<a href="<?php echo esc_url(home_url( '/' )); ?>" style="color:#<?php if(header_textcolor()){ echo header_textcolor();} ?>" id="logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		<?php 
		if($chronicle_theme_options['upload_image_logo']!='')	{ ?>
		<img class="img-responsive" src="<?php echo esc_url($chronicle_theme_options['upload_image_logo']); ?>" style="height:<?php if($chronicle_theme_options['height']!='') { echo esc_attr($chronicle_theme_options['height']); }  else { "50"; } ?>px; width:<?php if($chronicle_theme_options['width']!='') { echo esc_attr($chronicle_theme_options['width']); }  else { "180"; } ?>px;" /><?php 
		}elseif(display_header_text())
		{ echo get_bloginfo('name'); }
		?>
		</a>
	</div>
	<div class="right_links">
        <ul> <?php if($chronicle_theme_options['contact_email']!=''){ ?>           	
			<li class="link"><a href="mailto:<?php echo esc_url($chronicle_theme_options['contact_email']); ?>"><i class="fa fa-envelope"></i> <?php echo $chronicle_theme_options['contact_email']; ?></a></li>
			<?php } if($chronicle_theme_options['phone_no']!=''){ ?> 
			<li class="link"><i class="fa fa-phone"></i> + <?php echo esc_attr($chronicle_theme_options['phone_no']); ?></li>
			<?php } if($chronicle_theme_options['header_social_media_in_enabled'] =='on'){ 
						if($chronicle_theme_options['facebook_link']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['facebook_link']); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php }  if($chronicle_theme_options['twitter_link']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php }  if($chronicle_theme_options['google_plus']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['google_plus']); ?>"><i class="fa fa-google-plus"></i></a></li>
				<?php }  if($chronicle_theme_options['linkedin_link']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php }  if($chronicle_theme_options['flicker_link']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['flicker_link']); ?>"><i class="fa fa-flickr"></i></a></li>
				<?php }  if($chronicle_theme_options['youtube_link']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
				<?php }  if($chronicle_theme_options['rss_link']!=''){  ?>
				<li  class="social" ><a href="<?php echo esc_url($chronicle_theme_options['rss_link']); ?>"><i class="fa fa-rss"></i></a></li>
		<?php } 
		}	?>
		</ul>
    </div><!-- end right links --> 
    </div>
    </div>		
	<!-- Menu -->
	<div class="menu_main">    
    <div class="container">        
	<div class="navbar yamm navbar-default">    
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  ><span><?php __('Menu','chronicle') ;?></span>
          <button type="button" > <i class="fa fa-bars"></i></button>
        </div>
      </div>      
      <div id="navbar-collapse-1" class="navbar-collapse collapse">
		<?php
			wp_nav_menu( array(  
				'theme_location' => 'primary',
				'container'  => '',
				'menu_class' => 'nav navbar-nav',
				'fallback_cb' => 'chronicle_fallback_page_menu',
				'walker' => new chronicle_nav_walker()
			)); ?>
      </div>	 
      </div>
     </div>     
	</div>
    </div><!-- end menu -->        
	</div>    
	</div>    
</header>
<div class="clearfix"></div>