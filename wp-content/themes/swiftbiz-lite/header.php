<?php
/**
* The Header for our theme.
*/
?><!DOCTYPE html>
<?php global $swiftbiz_lite_shortname, $swiftbiz_lite_themename; ?>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
  <body <?php body_class(); ?> >
	<div id="wrapper" class="skepage">
		<!-- search-strip -->
		<div class="hsearch" >
			<div class="container">
				<div class="row-fluid">
					<?php get_search_form(); ?>
					<div class="hsearch-close"><i class="fa fa-times"></i></div>
				</div>
			</div>
		</div>

		<div id="header_wrap">
			<div id="header" class="skehead-headernav clearfix">
				<div class="glow">
					<div id="skehead">
						<div class="container">      
							<div class="row-fluid header-inner">      
								<!-- #logo -->
								<div id="logo" class="span4">
									<?php if( get_theme_mod('swiftbiz_lite_logo_img') ){ ?>
										<div class="logo_inner">
											<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img class="logo" src="<?php echo esc_url( get_theme_mod('swiftbiz_lite_logo_img') ); ?>" alt="<?php bloginfo('name'); ?>" /></a>
										</div>
									<?php } elseif ( display_header_text() ) { ?>
									<!-- #description -->
										<div id="site-title" class="logo_desp logo_inner">
											<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" ><?php bloginfo('name'); ?></a>
											<div id="site-description"><?php bloginfo( 'description' ); ?></div>
										</div>
									<!-- #description -->
									<?php } ?>
								</div>
								<!-- #logo -->
								
								<!-- .top-nav-menu --> 
								<div class="top-nav-menu span8">
									<!-- Header Search Icon// -->
									<?php if( get_theme_mod('swiftbiz_lite_headserach', 'on') == 'on' ) { ?>
									<div class="top-search">						
										<a href="javascript:void(0);" class="strip-icon search-strip" title="<?php _e('search','swiftbiz-lite'); ?>"><i class="fa fa-search"></i></a>
									</div>
									<?php } ?>
									<!-- Header Search Icon -->

									<div class="top-nav-menu">
										<?php 
											if( has_nav_menu( 'Header' ) ) {
												wp_nav_menu(array( 'container_class' => 'swiftbiz-menu', 'container_id' => 'skenav', 'menu_id' => 'menu-main','theme_location' => 'Header' )); 
											} else {
										?>
										<div class="swiftbiz-menu" id="skenav">
											<ul id="menu-main" class="menu">
												<?php wp_list_pages('title_li=&depth=0'); ?>
											</ul>
										</div>
										<?php } ?>
									</div>
								</div>
								<!-- .top-nav-menu --> 
							</div>
						</div>
					</div>
					<!-- #skehead -->
				</div>
				<!-- glow --> 
			</div>
			<div class="header-clone"></div>
		</div>
	<!-- #header -->
	
	<!-- header image section -->
  	<?php get_template_part( 'includes/front', 'bgimage-section' ); ?>
	
	<div id="main" class="clearfix">