<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Bose
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php global $option_setting; ?>
<div id="page" class="hfeed container site">

<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="site-branding col-md-6">
				<?php if ( get_theme_mod('bose_logo') != "" ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod('bose_logo'); ?>"></a>
				</div>
				<?php endif; ?>
				<div id="text-title-desc">
					<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>	
		</div>
	
		<div id="top-right" class="col-md-6">
			<?php get_template_part('searchform', 'top'); ?>
			
			<div id="social-icons" class="col-md-6">
				<?php get_template_part('social', 'soshion'); ?>
			</div>
						
		</div>
	</div><!--.container-->
</header><!-- #masthead -->

<div class="container">
	<div id="top-nav" class="col-md-12">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'bose' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bose' ); ?></a>
				
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->	
	</div>
</div>
	
	<?php get_template_part('slider') ?>
	<?php get_template_part('features') ?>
	<?php get_template_part('showcase') ?>
	<?php get_template_part('featured') ?>	
	
	<div id="content" class="site-content container">