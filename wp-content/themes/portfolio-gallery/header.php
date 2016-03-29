<?php
  global $wdwt_front;

?>
<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
<?php 
wp_reset_query(); // reset query for comment and other
?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="initial-scale=1.0" />
<meta name="HandheldFriendly" content="true"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
wp_head(); // wordpress standart scripts, meta, etc..
?>

</head>
<body <?php body_class(); ?>>

<?php 

  $header_image = get_header_image();
  $fixed_menu = $wdwt_front->get_param('fixed_menu');
  if(! empty($header_image)){
  ?>
    <div class="container" style="text-align:center;">
      <a class="custom-header-a" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo header_image(); ?>" class="custom-header"> 
      </a>
    </div>
  <?php
  }
  ?>
  <div class="portfolio_gallery_wrap">
  <div class="left_container <?php echo $fixed_menu ? "fixed_menu" : ""; ?>"> 
    <div class="left_content"> 
      <div id="back">
        <div id="logo-block">       
          <?php 
            $wdwt_front->logo();
          ?>
        </div>
        <div class="responsive_menu" >
          <div class="active_menu_responsive"> <p><span style="display:inline-block; float:left; padding:0 10px;">  <span id='trigram-for-heaven'></span></span><span style="position:relative;"><?php echo __('Menu', "portfolio-gallery"); ?> </span></p> </div>        
        </div>
        <div class="phone-menu-block">
          <div id="top-nav">
            <?php 
            $portfolio_gallery_show_home = true;
            if(has_nav_menu( 'primary-menu')){
              $portfolio_gallery_show_home = false;
            }
            $wdwt_menu = wp_nav_menu( array(
                      'show_home' => $portfolio_gallery_show_home,
                      'theme_location'  => 'primary-menu',
                      'container'       => false,
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'top-nav-list',
                      'menu_id'         => '',
                      'echo'            => false,
                      'fallback_cb'     => 'wp_page_menu',
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '<ul id="top-nav-list" class=" %2$s">%3$s</ul>',
                      'depth'           => 0,
                      'walker'          => ''
                    ));
            echo $wdwt_menu;
                    ?>
          </div>        
        </div>

      </div>
      <?php if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
        <aside id="sidebar3" >
          <div class="sidebar-container">     
            <?php  dynamic_sidebar( 'sidebar-3' );  ?>
            <div class="clear"></div>
          </div>
        </aside>
      <?php } ?>
      
      <div id="footer-bottom">
        <?php $wdwt_front->social_links(); ?>
        <?php 
        //$wdwt_front->footer_text();
        ?>
      </div>
    </div>
  </div>