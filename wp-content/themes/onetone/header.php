<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri().'/js/html5.js' ); ?>"></script>
	<![endif]-->



  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

  <!-- Add fancyBox -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <!--This is for sliding in slides -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox({
      maxWidth: 800,
      openEffect  : 'none',
      closeEffect : 'none'
    });
  });


  
// var amountScrolled = 60;

// $(window).scroll(function() {
//     if ($(window).scrollTop() > amountScrolled) {
//         $('#totop').stop().animate({marginLeft:"0px"}, 500);
//     } 
//     if ($(window).scrollTop() < 60) {
//         $('#totop').stop().animate({marginLeft: "-400px"}, 500);
//     }
// });

</script>








<script>

(function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);

var win = $(window);

var allMods = $(".module");

allMods.each(function(i, el) {
  var el = $(el);
  if (el.visible(true)) {
    el.addClass("already-visible"); 
  } 
});

win.scroll(function(event) {
  
  allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("come-in"); 
    } 
  });
  
});

</script>




  


<?php wp_head(); ?>

</head>
<?php

  global  $page_meta;
  $detect                      = new Mobile_Detect;
  $display_top_bar             = onetone_option('display_top_bar','yes');
  $header_background_parallax  = onetone_option('header_background_parallax','');
  $header_top_padding          = onetone_option('header_top_padding','');
  $header_bottom_padding       = onetone_option('header_bottom_padding','');
  $header_background_parallax  = $header_background_parallax=="yes"?"parallax-scrolling":"";
  $top_bar_left_content        = onetone_option('top_bar_left_content','info');
  $top_bar_right_content       = onetone_option('top_bar_right_content','info');
  
  $logo               = onetone_option('logo','');
  $logo_retina        = onetone_option('logo_retina');
  $logo               = ( $logo == '' ) ? $logo_retina : $logo;
  $sticky_logo        = onetone_option('sticky_logo',$logo);
  $sticky_logo_retina = onetone_option('sticky_logo_retina');
  $sticky_logo        = ( $sticky_logo == '' ) ? $sticky_logo_retina : $sticky_logo;
  
  $header_overlay               = onetone_option('header_overlay','no');
 
  $overlay = '';
  if( $header_overlay == 'yes')
  $overlay = 'overlay';
  
  //sticky
  $enable_sticky_header         = onetone_option('enable_sticky_header','yes');
  $enable_sticky_header_tablets = onetone_option('enable_sticky_header_tablets','yes');
  $enable_sticky_header_mobiles = onetone_option('enable_sticky_header_mobiles','yes');
   
 if(isset($page_meta['nav_menu']) && $page_meta['nav_menu'] !='')
 $theme_location = $page_meta['nav_menu'];
 else
 $theme_location = 'primary';
 
 $body_class  = 'page blog';
 if( is_front_page() )
 $body_class  = 'page homepage';
 
  $header_image = get_header_image();
?>
<body <?php body_class($body_class); ?>>
	<div class="wrapper">
		<div class="top-wrap">
        <?php if( $header_image ):?>
        <img src="<?php echo $header_image; ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
         <?php endif;?>
            <!--Header-->
            <header class="header-wrap logo-left <?php echo $overlay; ?>">
             <?php if( $display_top_bar == 'yes' ):?>
                <div class="top-bar">
                    <div class="container">
                        <div class="top-bar-left">
                            <?php  onetone_get_topbar_content( $top_bar_left_content );?>                      
                        </div>
                        <div class="top-bar-right">
                          <?php onetone_get_topbar_content( $top_bar_right_content );?>
                        </div>
                    </div>
                </div>
                 <?php endif;?>
                
                <div class="main-header <?php echo $header_background_parallax; ?>">
                    <div class="container">
                        <div class="logo-box">
                        <?php if( $logo ):?>
                        
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img class="site-logo normal_logo" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo); ?>" />
                            </a>
                             <?php
					if( $logo_retina ):
					$pixels ="";
					if(is_numeric(onetone_option('retina_logo_width')) && is_numeric(onetone_option('retina_logo_height'))):
					$pixels ="px";
					endif; ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo $logo_retina; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo onetone_option('retina_logo_width').$pixels; ?>;max-height:<?php echo onetone_option('retina_logo_height').$pixels; ?>; height: auto !important" class="site-logo retina_logo" />
					 </a>
                     <?php endif;?>
                            <?php endif; ?>
                            <div class="name-box" style=" display:block;">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                                <span class="site-tagline"><?php bloginfo('description'); ?></span>
                            </div>
                            
                        </div>
                        <button class="site-nav-toggle">
                            <span class="sr-only"><?php _e( 'Toggle navigation', 'onetone' );?></span>
                            <i class="fa fa-bars fa-2x"></i>
                        </button>
                        <nav class="site-nav" role="navigation">
                            <?php 
					 wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
                        </nav>
                    </div>
                </div>
                
                <?php if( $enable_sticky_header == 'yes' ):?>
            <?php if( !$detect->isTablet() || ( $detect->isTablet() && $enable_sticky_header_tablets == 'yes' ) || ( $detect->isMobile() && !$detect->isTablet() && $enable_sticky_header_mobiles == 'yes' )  ):?>
            
                <div class="fxd-header">
                    <div class="container">
                        <div class="logo-box">
                        <?php if( $sticky_logo ):?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img class="site-logo normal_logo" src="<?php echo esc_url($sticky_logo); ?>"></a>
                            
                               <?php
					if( $sticky_logo_retina ):
					$pixels ="";
					if( is_numeric(onetone_option('sticky_logo_width_for_retina_logo')) && is_numeric(onetone_option('sticky_logo_height_for_retina_logo')) ):
					$pixels ="px";
					endif; ?>
					<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $sticky_logo_retina; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo onetone_option('sticky_logo_width_for_retina_logo').$pixels; ?>;max-height:<?php echo onetone_option('sticky_logo_height_for_retina_logo').$pixels; ?>; height: auto !important" class="site-logo retina_logo" /></a>
					<?php endif; ?>
                    
                            <?php endif ?>
                            <div class="name-box" style=" display:block;">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                                <span class="site-tagline"><?php bloginfo('description'); ?></span>
                            </div>
                            
                        </div>
                        <button class="site-nav-toggle">
                            <span class="sr-only"><?php _e( 'Toggle navigation', 'onetone' );?></span>
                            <i class="fa fa-bars fa-2x"></i>
                        </button>
                        <nav class="site-nav" role="navigation">
                            <?php 
					 wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
                        </nav>
                    </div>
                </div>
                
                <?php endif;?>
             <?php endif; ?>
             
            </header>
            <div class="slider-wrap"></div>
        </div>