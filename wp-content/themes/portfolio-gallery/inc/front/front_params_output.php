<?php

/* include  front end framework class */
require_once('WDWT_front_params_output.php');

class Portfolio_gallery_front extends WDWT_frontend {

  
/**
 * print Layout styles
 *
 */

  public function layout(){
    global $post;
    if(is_singular() && isset($post)){
      /*get all the meta of the current theme for the post*/
      $meta = get_post_meta( $post->ID, WDWT_META, true );
    }
    else{
      $meta = array();
    }
    $default_menu_layout = $this->get_param('default_menu_layout', $meta);
    $menu_width = $this->get_param('menu_width', $meta);
    $default_layout = $this->get_param('default_layout', $meta);
    $main_column = $this->get_param('main_column', $meta);
    $pwa_width = $this->get_param('pwa_width', $meta);
    switch ($default_menu_layout):
      /*left menu*/
      case 3:
      ?>
        <style type="text/css">
          .left_container{
            left:0;
            width:<?php echo $menu_width ?>%;
          }
          .right_container{
            float:right;
            width:<?php echo 100-$menu_width-0.555; ?>%;
          }
        </style>
        <?php
        break;
      /*right menu*/
      case 2:
      ?>
        <style type="text/css">
          .left_container{
            right:0;
            width:<?php echo $menu_width ?>%;
          }
          .right_container{
            float:left;
            width:<?php echo 100-$menu_width-1; ?>%;
          }
        </style>
        <?php
        break;
    endswitch;
    switch ($default_layout) :
      case 1:
      ?>
        <style type="text/css">
          #sidebar1,
          #sidebar2 {
            display:none;
          }
          #content, .blog{
            display:block; 
            float:left;
            width:100%;
          }     
          #blog, .blog{
            width:100%;
          }               
        </style>
        <?php
        break;
      case 2:
      ?>
        <style type="text/css">
          #sidebar2{
            display:none;
          } 
          #sidebar1 {
            display:block;
            float:right;
          }
          .blog,#content{
            display:block;
            float:left;
          }
          .blog, #content{
            width:<?php echo $main_column; ?>%;
          }
          #sidebar1{
            width:<?php echo (99  - $main_column); ?>%;
          }
        </style>
        <?php
        break;
      case 3:
      ?>
        <style type="text/css">
          #sidebar2{
            display:none;
          } 
          #sidebar1 {
            display:block;
            float:left;
          } 
          .blog, #content{
            display:block;
            float:left;
          }
          .blog, #content{
            width:<?php echo $main_column; ?>%;
          }
          #sidebar1{
            width:<?php echo (99 -  $main_column); ?>%;
            margin-right: 1%;
          }
          #top-page .blog,#top-page #content{
            left:<?php echo  (100 -  $main_column) ; ?>%;
          }    
        </style>
        <?php
        break;
      case 4:
      ?>
        <style type="text/css">
          #sidebar2{
            display:block;
            float:right;
          } 
          #sidebar1 {
            display:block; float:right;
          } 
          #content, .blog,#content{
            display:block;
            float:left;
          }
          .blog,#content{
            width:<?php echo $main_column-2 ; ?>%;
          }
          #sidebar1{
            width:<?php echo $pwa_width ; ?>%;
          }
          #sidebar2{
            width:<?php echo (100  - $pwa_width - $main_column); ?>%;
            margin-right: 1%;
          }
        </style>
        <?php
        break;
      case 5:
      ?>
        <style type="text/css">
          #sidebar2{
            display:block;
            float:left;
          } 
          #sidebar1 {
            display:block;
            float:left;
          } 
          .blog,#content{
            display:block;
          }
          #content{
            float:right;
          }
          .blog,#content{
          width:<?php echo $main_column-2 ; ?>%;
          }
          #content{
            float:right;
          }
          #sidebar1{
          width:<?php echo $pwa_width ; ?>%;
          margin-right: 1%;
          }
          #sidebar2{
          width:<?php echo (100 - $pwa_width - $main_column); ?>%;
          margin-right: 1%;
          }
          .archive-page{
            float: right; 
          }
        </style>
        <?php
        break;
      case 6:
      ?>
        <style type="text/css">
          #sidebar2{
            display:block;
            float:right;
          } 
          #sidebar1 {
            display:block;
            float:left; 
          } 
          .blog, #content{
            display:block;
            float:left;
          }                
          .blog, #content{
            width:<?php echo $main_column-2 ; ?>%;
          }
          #sidebar1{
            width:<?php echo $pwa_width ; ?>%;
            margin-right: 1%;
          }
          #sidebar2{
            width:<?php echo (100  - $pwa_width - $main_column); ?>%;
          }       
          #top-page .blog,#top-page #content{
            left:<?php echo $pwa_width ; ?>%;
          }     
        </style>
        <?php
        break;
    endswitch;
  }


  public function media_queries(){
    global $post;
    
    if(is_singular() && isset($post)){
      /*get all the meta of the current theme for the post*/
      $meta = get_post_meta( $post->ID, WDWT_META, true );
    }
    else{
      $meta = array();
    }
    
    $menu_width = $this->get_param('menu_width', $meta, 30);
    $default_layout = $this->get_param('default_layout', $meta, 1);
    $main_column = $this->get_param('main_column', $meta, 67);
    $content_posts_margin = $this->get_param('content_posts_margin', array(), 0);
    $content_posts_border = $this->get_param('content_posts_border', array(), 0);
    $content_posts_width = $this->get_param('content_posts_width', array(), 250) + 2* $content_posts_margin;
    $content_posts_height = $this->get_param('content_posts_height', array(), 220);
    $number_line_title = $this->get_param('content_posts_number_line_title',$meta,1);
    $number_line_desc = $this->get_param('content_posts_number_line_desc',$meta,2);
  
    $menu_sidebars_width = $menu_width + 1;
    if($default_layout != 1){
      $menu_sidebars_width += (100 - $main_column);
    }
    $coefficient = $content_posts_height/$content_posts_width; ?>
    <style>
      .image_list_item, .SearchPost {
        border: <?php echo $content_posts_border; ?>px solid;
        margin: <?php echo $content_posts_margin; ?>px;
      }
      .gallery_description_hover, .home_description_hover {
        height: <?php echo $number_line_desc*19.6; ?>px;
        -webkit-line-clamp:<?php echo $number_line_desc; ?>;
      }
      .gallery-post-info h4, .image_list_item h4,.SearchPost h4 {
        height: <?php echo $number_line_title*24; ?>px;
        -webkit-line-clamp:<?php echo $number_line_title; ?>;
      }
      <?php
      //mediaqueries > screensize max 1920

      $screen_size = 1024 - (1024 * $menu_sidebars_width)/100;
      $count_item = floor($screen_size/$content_posts_width );
      echo "/*" . $screen_size. " ".$content_posts_width . " ttttt */";

      for($i=1024; $i <= 2400; $i+=$content_posts_width){
        /*$screen_size = $i - ($i * $menu_sidebars_width)/100;
        $count_item = floor($screen_size/$content_posts_width ); */
        if($count_item == 0) {
          $count_item = 1;
        } ?>
          @media screen and (min-width: <?php echo $i; ?>px) {
            .image_list_item, .SearchPost{
            /*<?php echo $count_item; ?>*/
              width:calc(<?php echo 100/($count_item ); ?>% - <?php echo 2*$content_posts_margin; ?>px);
              padding-bottom:calc(<?php echo (100/($count_item ))*$coefficient; ?>% - <?php echo 2*$content_posts_margin; ?>px);
            }
            .GalleryPost{
              width:<?php echo 100/($count_item ); ?>%;
              padding-bottom:<?php echo (100/($count_item ))*$coefficient; ?>%;
            } 
          }
        <?php
        $count_item++;
      }

      //mediaqueries < screenshize

      $screen_size = 1024; // - sidebars and menu;
      $count_item = floor($screen_size/$content_posts_width ); 
      if($count_item == 0) {
        $count_item = 1;
      }

      $first_break = $count_item * $content_posts_width;

      ?>
         @media screen and (max-width: 1024px)  {
          .image_list_item, .SearchPost{
            /* <?php echo $count_item; ?>*/
            width:calc(<?php echo 100/($count_item); ?>% - <?php echo 2*$content_posts_margin; ?>px);
            padding-bottom:calc(<?php echo (100/($count_item))*$coefficient; ?>% - <?php echo 2*$content_posts_margin; ?>px);
          } 
          .GalleryPost{
            width:<?php echo 100/($count_item ); ?>%;
            padding-bottom:<?php echo (100/($count_item))*$coefficient; ?>%;
          }  
        }

      <?php

      $count_item = $count_item -1;

      for($j=0; $j < $count_item; $j++){
        $break_point =  $first_break - $content_posts_width * $j;
      ?>
        @media screen and (max-width: <?php echo $break_point; ?>px) {
          .image_list_item, .SearchPost{
            /* <?php echo $count_item; ?>*/
            width:calc(<?php echo 100/($count_item - $j); ?>% - <?php echo 2*$content_posts_margin; ?>px);
            padding-bottom:calc(<?php echo (100/($count_item-$j))*$coefficient; ?>% - <?php echo 2*$content_posts_margin; ?>px);
          } 
          .GalleryPost{
            width:<?php echo 100/($count_item - $j); ?>%;
            padding-bottom:<?php echo (100/($count_item - $j))*$coefficient; ?>%;
          }  
        }
    <?php } ?>
        
    </style>
    <?php
  }  



  /**
  *    FRONT END COLOR CONTROL
  */

  public function color_control(){

    $background_color = get_theme_mod('background_color');
    $color_scheme = $this->get_param('[colors_active][active]', array(), 0);
    $menu_elem_back_color = $this->get_param('[colors_active][colors][menu_elem_back_color][value]' , array(), '#000000');
    $button_bg_color = $this->get_param('[colors_active][colors][button_bg_color][value]', array(), '#D3D3D3');
    $button_text_color = $this->get_param('[colors_active][colors][button_text_color][value]', array(), '#dd9933');
    $caption_bg_color = $this->get_param('[colors_active][colors][caption_bg_color][value]', array(), '#ffffff');
    $featured_post_bg_color = $this->get_param('[colors_active][colors][featured_post_bg_color][value]', array(), '#000000');
    $text_headers_color = $this->get_param('[colors_active][colors][text_headers_color][value]', array(), '#efb30e');
    $primary_text_color = $this->get_param('[colors_active][colors][primary_text_color][value]', array(), '#ffffff');
    $footer_text_color = $this->get_param('[colors_active][colors][footer_text_color][value]', array(), '#ffffff');
    $primary_links_color = $this->get_param('[colors_active][colors][primary_links_color][value]', array(), '#ccddff');
    $primary_links_hover_color = $this->get_param('[colors_active][colors][primary_links_hover_color][value]',  array(), '#1e73be');
    $menu_links_color = $this->get_param('[colors_active][colors][menu_links_color][value]', array(), '#ffffff');
    $menu_links_hover_color = $this->get_param('[colors_active][colors][menu_links_hover_color][value]', array(),'#dd9933');
    $menu_color = $this->get_param('[colors_active][colors][menu_color][value]', array(), '#000000');
    $selected_menu_color = $this->get_param('[colors_active][colors][selected_menu_color][value]', array(), '#000000');
    $logo_text_color = $this->get_param('[colors_active][colors][logo_text_color][value]', array(), '#ffffff');
    $input_text_color = $this->get_param('[colors_active][colors][input_text_color][value]', array(), '#ffffff');
    $content_posts_border_color = $this->get_param('[colors_active][colors][content_posts_border_color][value]', array(), '#dd9933');
    $wdwt_dark_bg = $this->dark_background();
    ?>
    <style type="text/css">
      h1, h2, h3, h4, h5, h6, h1>a,h2>a, h3>a, h4>a, h5>a, h6>a,h1 > a:link,h2 > a:link, h3 > a:link, h4 > a:link, h5 > a:link, h6 > a:link,h1 > a:hover,h2 > a:hover,h3 > a:hover,h4 > a:hover,h5 > a:hover,h6 > a:hover,h1> a:visited,h2> a:visited,h3 > a:visited,h4 > a:visited,h5 > a:visited,h6 > a:visited {
        color:<?php echo $text_headers_color; ?>;
      }
      #content .image_list_item, #right_bottom .image_list_item,.SearchPost{
        border-color: <?php echo $content_posts_border_color; ?> !important;
      }
      #right_middle{
        background:<?php echo $featured_post_bg_color; ?>;
      }
      #back h3 a{
        color: <?php echo '#'.$this->invert($this->ligther($menu_elem_back_color, 10)); ?> !important;
      }
      a:link.site-title-a,a:hover.site-title-a,a:visited.site-title-a,a.site-title-a,#logo h1, .site-tagline{
        color:<?php echo $logo_text_color;?>;
      }
      #commentform #submit,.reply,#reply-title small,.button-color, #portfolio_load_more  {
        color:<?php echo $button_text_color;?> !important;
        background-color: <?php echo $button_bg_color; ?>;
      }
      .widget_calendar td >a {
        /*background-color: <?php echo $button_bg_color; ?>;*/
        color: <?php echo $button_text_color; ?>;
      }
      

      .button-color:hover button,.button-color:hover a, #portfolio_load_more:hover{
           color:<?php echo '#'.$this->ligther($button_text_color,90);?> !important;
      }
      .button-color  .contact_send,.button-color a, #portfolio_load_more{
            color:<?php echo $button_text_color;?> !important ;
      }
      .button_hover:after {
        background-color: <?php echo '#'.$this->darker($button_bg_color,80); ?>;
      }
      .reply a,#reply-title small a:link{
         color:<?php echo $button_text_color;?> !important;
      }
      #back,#sidebar3{
           background:<?php echo $this->hex_to_rgba($menu_elem_back_color,0.3); ?>;
      }
      #footer-bottom {
        background:<?php echo $this->hex_to_rgba($menu_elem_back_color,0.3); ?>;
        background: -webkit-linear-gradient(<?php echo $this->hex_to_rgba($menu_elem_back_color,0.3); ?>, <?php echo $this->hex_to_rgba($menu_elem_back_color,0.01); ?>);
        background: -o-linear-gradient(<?php echo $this->hex_to_rgba($menu_elem_back_color,0.3); ?>, <?php echo $this->hex_to_rgba($menu_elem_back_color,0.01); ?>); 
        background: -moz-linear-gradient(<?php echo $this->hex_to_rgba($menu_elem_back_color,0.3); ?>, <?php echo $this->hex_to_rgba($menu_elem_back_color,0.01); ?>);
        background: linear-gradient(<?php echo $this->hex_to_rgba($menu_elem_back_color,0.3); ?>, <?php echo $this->hex_to_rgba($menu_elem_back_color,0.01); ?>);
      }
      #header-block{
        background-color:<?php echo $menu_color; ?>;
      }
      #header {
          color: <?php echo $text_headers_color; ?>;
      }
      body,.logged-in-as a:link,.logged-in-as a:visited{
        color: <?php echo $primary_text_color; ?>;
      }
      input,textarea{
        color:<?php echo $input_text_color; ?>;
      }
      ::-webkit-input-placeholder {
        color:<?php echo $input_text_color; ?>;
      }
      ::-moz-placeholder {
        color:<?php echo $input_text_color; ?>;
      }
      #footer-bottom {
        color: <?php echo $footer_text_color; ?>;
      }
      a:link, a:visited,aside .sidebar-container   ul li:before {
        text-decoration: none;
        color: <?php echo $primary_links_color; ?>;
      }
      .responsive_menu, .top-nav-list .current-menu-item,.top-nav-list .open,.top-nav-list li.current-menu-item, .top-nav-list li.current_page_item{
        color: <?php echo $menu_links_hover_color; ?> !important;
        background-color: <?php echo  $this->hex_to_rgba($selected_menu_color,0.4); ?>;
      }
      a:hover,aside .sidebar-container   ul li:hover:before {
        color: <?php echo $primary_links_hover_color; ?>;
      }
      #menu-button-block {
        background-color: <?php echo $menu_elem_back_color; ?>;
      }
      .blog.bage-news .news-post{
        border-bottom:1px solid <?php echo $menu_elem_back_color; ?>;
      }
      .top-nav-list li.current-menu-item:before,.top-nav-list li:before {
        background-color: <?php echo $this->hex_to_rgba($menu_color,0.01); ?>;
      }
      .top-nav-list li.current-menu-item:hover:before,.top-nav-list li:hover:before {
        background-color: <?php echo $this->hex_to_rgba($menu_color,0.2); ?>;
      }
      .top-nav-list li.haschild:hover {
        background-color: <?php echo $this->hex_to_rgba($menu_color,0.2); ?>;
      }
      .top-nav-list li li:hover .top-nav-list a:hover, .top-nav-list .current-menu-item a:hover,.top-nav-list li a:hover {
        color:<?php echo $menu_links_hover_color; ?> !important;
      }
      .top-nav-list li.current-menu-item a, .top-nav-list li.current_page_item a{
        color: <?php echo $menu_links_hover_color; ?> !important;
      }
      .top-nav-list> ul > li ul, .top-nav-list > li ul  {
       
      }
      .caption,.back_div {  
        background:<?php echo $this->hex_to_rgba($caption_bg_color,0.4); ?>;
      }
      .da-empty .caption{  
        background:<?php echo $this->hex_to_rgba($caption_bg_color,0.5); ?>;
      }
      .button-color{
        background:<?php echo $button_bg_color; ?>;
        color:<?php echo $button_text_color; ?>;
      }
      .top-nav-list, .top-nav-list li > a,#top-nav  div  ul  li  a, #top-nav > div > ul > li > a, #top-nav > div > div > ul > li > a{
        color:<?php echo $menu_links_color ?>;
      }
      .top-nav-list > li:hover > a, .top-nav-list > li ul > li > a:hover{
          color:<?php echo $menu_links_hover_color ?>;
      }
      
      .Form_main_div .bar:before,.Form_main_div .bar:after  {
        background:#5264AE; /* contac us page inputs active under line color*/
      }
      .da-thumbs div article{
        background-color:<?php echo $this->hex_to_rgba($caption_bg_color,0.4); ?>;
      }
      .da-thumbs div article.da-empty{
        background-color:<?php echo $this->hex_to_rgba($caption_bg_color,0.7); ?>;
      }
      .wdwt-social-link .fa{
        color: #<?php echo ($wdwt_dark_bg ? 'FBFBFB' : '000000') ?>;
      }   
      .wdwt-social-link{
        border-color: #<?php echo ($wdwt_dark_bg ? 'FBFBFB' : '000000') ?>;
      }

      #search-submit{
        background:url(<?php echo WDWT_IMG . ($wdwt_dark_bg ? 'search.png' : 'search-dark.png'); ?>) right top no-repeat;
        background-position-y:6px; 
        background-size:contain;
      }
      #searchsubmit {
        background: transparent url(<?php echo WDWT_IMG . ($wdwt_dark_bg ? 'search.png' : 'search-dark.png'); ?>) no-repeat;
        background-size: 75%;
        background-position: 10px 10px;
      }
      
      @media screen and (max-width: 1024px) {
        #top-nav-list .haschild.open ul li{
        background-color: <?php echo  $this->hex_to_rgba($selected_menu_color,1); ?> !important; 
        }
        #top-nav ul, #top-nav > div ul{
        color:<?php echo $menu_links_color ?> !important;
        background-color:<?php echo $this->hex_to_rgba($menu_elem_back_color,0.9); ?> !important;
        }
      }
      @media only screen and (max-width: 767px) {
       .top-nav-list  li.current-menu-item > a, .top-nav-list  li.current-menu-item > a:visited{
          color: <?php echo $menu_links_hover_color; ?> !important;
        background-color: <?php echo  $this->hex_to_rgba($selected_menu_color,0.4); ?>;
        }
        #top-nav-list .haschild.open ul li{
        background-color: <?php echo  $this->hex_to_rgba($selected_menu_color,1); ?> !important; 
        }
        .top-nav-list  > li:hover > a,  .top-nav-list> li  > a:hover, .top-nav-list> li  > a:focus,.top-nav-list > li  > a:active {
        color:<?php echo $menu_links_hover_color; ?> !important;
        }
        #top-nav > li  > a, #top-nav > li  > a:link,  #top-nav > li  > a:visited {
        color:<?php echo $menu_links_color; ?>;
        }
        .top-nav-list  li ul li  > a, .top-nav-list  li ul li  > a:link, .top-nav-list  li  ul li > a:visited {
        color:<?php echo $menu_links_color ?> !important;
        }
        .top-nav-list  li ul li:hover  > a,.top-nav-list  li ul li  > a:hover,.top-nav-list  li ul li  > a:focus, .top-nav-list  li ul li  > a:active {
        color:<?php echo $menu_links_hover_color; ?> !important;
        background-color:<?php echo $menu_elem_back_color; ?> !important;
        }
        .top-nav-list li.has-sub >  a, .top-nav-list li.has-sub > a:link, .top-nav-list li.has-sub >  a:visited {
        background:<?php echo $menu_elem_back_color; ?>  !important;
        }
        .top-nav-list li.has-sub:hover > a, .top-nav-list  li.has-sub > a:hover, .top-nav-list  li.has-sub > a:focus, .top-nav-list li.has-sub >  a:active {
        background:<?php echo $menu_elem_back_color; ?>  !important;
        }
        .top-nav-list  li ul li.has-sub > a, .top-nav-list  li ul li.has-sub > a:link, .top-nav-list  li ul li.has-sub > a:visited{
        background:<?php echo $menu_elem_back_color; ?>  !important;
        }
        .top-nav-list  li ul li.has-sub:hover > a,.top-nav-list  li ul li.has-sub > a:hover, .top-nav-list  li ul li.has-sub > a:focus, .top-nav-list  li ul li.has-sub > a:active {
        background:<?php echo '#'.$this->ligther($menu_elem_back_color,15); ?> !important;
        }
        .top-nav-list  li.current-menu-ancestor > a:hover, .top-nav-list  li.current-menu-item > a:focus, .top-nav-list  li.current-menu-item > a:active{
        color:<?php echo $menu_links_color ?> !important;
        background-color:<?php echo $menu_elem_back_color; ?> !important;
        }
        .top-nav-list  li.current-menu-parent > a, .top-nav-list  li.current-menu-parent > a:link, .top-nav-list  li.current-menu-parent > a:visited,.top-nav-list  li.current-menu-parent > a:hover, .top-nav-list  li.current-menu-parent > a:focus, .top-nav-list  li.current-menu-parent > a:active,.top-nav-list  li.has-sub.current-menu-item  > a, .top-nav-list  li.has-sub.current-menu-item > a:link, .top-nav-list  li.has-sub.current-menu-item > a:visited,.top-nav-list  li.has-sub.current-menu-ancestor > a:hover, .top-nav-list  li.has-sub.current-menu-item > a:focus, .top-nav-list  li.has-sub.current-menu-item > a:active,
        .top-nav-list  li.current-menu-ancestor > a, .top-nav-list  li.current-menu-ancestor > a:link, .top-nav-list  li.current-menu-ancestor > a:visited,.top-nav-list  li.current-menu-ancestor > a:hover, .top-nav-list  li.current-menu-ancestor > a:focus, .top-nav-list  li.current-menu-ancestor > a:active {
        color:<?php echo $menu_links_color ?> !important;
        background:<?php echo $menu_elem_back_color; ?> !important;
        }
        .top-nav-list  li ul  li.current-menu-item > a,.top-nav-list  li ul  li.current-menu-item > a:link, .top-nav-list  li ul  li.current-menu-item > a:visited,.top-nav-list  li ul  li.current-menu-ancestor > a:hover, .top-nav-list  li ul  li.current-menu-item > a:focus, .top-nav-list  li ul  li.current-menu-item > a:active, #top-nav > div ul, #top-nav ul{
        color:<?php echo $menu_links_color ?> !important;
        background-color:<?php echo $this->hex_to_rgba($menu_elem_back_color,0.9); ?> !important;
        }
        .top-nav-list li ul  li.current-menu-parent > a, .top-nav-list  li ul  li.current-menu-parent > a:link, .top-nav-list  li ul  li.current-menu-parent > a:visited,.top-nav-list li ul li.current-menu-parent  > a:hover, .top-nav-list  li ul  li.current-menu-parent > a:focus, .top-nav-list  li ul  li.current-menu-parent > a:active, .top-nav-list  li ul  li.has-sub.current-menu-item > a,.top-nav-list  li ul  li.has-sub.current-menu-item > a:link, .top-nav-list  li ul  li.has-sub.current-menu-item > a:visited,
        .top-nav-list  li ul  li.has-sub.current-menu-ancestor > a:hover,.top-nav-list  li ul  li.has-sub.current-menu-item > a:focus, .top-nav-list  li ul  li.has-sub.current-menu-item > a:active,
        .top-nav-list li ul  li.current-menu-ancestor > a, .top-nav-list  li ul  li.current-menu-ancestor > a:link, .top-nav-list  li ul  li.current-menu-ancestor > a:visited,.top-nav-list li ul li.current-menu-ancestor  > a:hover,.top-nav-list  li ul  li.current-menu-ancestor > a:focus, .top-nav-list  li ul  li.current-menu-ancestor > a:active {
        color:<?php echo $menu_links_color ?> !important;
        background:<?php echo '#'.$this->ligther($menu_elem_back_color,15); ?>  !important;
        }
      }


    </style>
    <?php
  }

/**
 * Display logo image or text
 */

  public function logo(){
    $logo_type = $this->get_param('logo_type');
    $logo_img = esc_url(trim($this->get_param('logo_img')));
    $logo_text = esc_attr($this->get_param('logo_text'));
    $display_site_tagline = $this->get_param('display_site_tagline');

    if(!$this->dark_background()){
      if($logo_img == WDWT_IMG."logo.png"){
        $logo_img = WDWT_IMG."logo-dark.png";
      }
    }

    if($logo_type=='image'):
      ?> 
      <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <img id="site-title" src="<?php echo $logo_img; ?>" alt="logo">
      </a>
      <?php 
    elseif($logo_type=='text'):
      ?>
      <a id="logo"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <h1><?php echo $logo_text; ?></h1>
      </a>
      <?php 
    endif;
    if($display_site_tagline){
      ?>
      <h2 class="site-tagline"><?php echo esc_html( get_bloginfo ( 'description' )); ?></h2>
      <?php
    }
  }
  

  /*
  *
  * return true or false 
  */

  public function blog_style(){

    global $post;
    if(is_singular() && isset($post)){
      /*get all the meta of the current theme for the post*/
      $meta = get_post_meta( $post->ID, WDWT_META, true );
    }
    else{
      $meta = array();
    }
    $blog_style = $this->get_param('blog_style', $meta );

    return $blog_style;
  }

  /**
  * Prints style for menu background image
  */

  public function social_links(){
    $header_for_links = $this->get_param('header_for_links', "");
    $twt = $this->get_param('twitter_icon_show', false);
    $fb = $this->get_param('facebook_icon_show', false);
    $goo = $this->get_param('google_icon_show', false);
    $inst = $this->get_param('instagram_icon_show', false);
    $yout = $this->get_param('youtube_icon_show', false);
    $tumb = $this->get_param('tumblr_icon_show', false);
    $fl = $this->get_param('flickr_icon_show', false);
    $pin = $this->get_param('pinterest_icon_show', false);
    $dr = $this->get_param('dribbble_icon_show', false);
    $px = $this->get_param('px500_icon_show', false);
    if($this->dark_background()){

      $bg = 'gallery-socials.png';
      $hov = 'gallery-socials-hover.png';
    }
    else{
      $bg =  'gallery-socials-dark.png';
      $hov = 'gallery-socials.png'; 
    }
    
    if($twt || $fb || $goo || $inst || $yout || $tumb || $fl || $pin || $dr || $px){
      ?>
    <div class="wdwt-social-links">
      <div class="">
        <?php if(trim($header_for_links) != "") { ?>
          <h2><?php echo esc_html($header_for_links); ?></h2>
        <?php
        }
        if( $fb){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-fb wdwt-social-link' href='<?php echo esc_attr($this->get_param('facebook_url', '')); ?>' target='_blank'><i class="fa fa-facebook"></i>
          </a> 
        </span> 
        <?php } ?>
        <?php if( $twt){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-twt wdwt-social-link' href='<?php echo esc_attr($this->get_param('twitter_url', '')); ?>' target='_blank'><i class="fa fa-twitter"></i>
          </a>
        </span> 
        <?php } ?>
        <?php if( $goo){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-goo wdwt-social-link' href='<?php echo esc_attr($this->get_param('google_url', '')); ?>' target='_blank'><i class="fa fa-google-plus"></i>
          </a>
        </span> 
        <?php } ?>
        <?php if( $inst){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-inst wdwt-social-link' href='<?php echo esc_attr($this->get_param('instagram_url', '')); ?>' target='_blank'><i class="fa fa-instagram"></i>
          </a>
        </span> 
        <?php } ?>
        <?php if( $yout){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-yout wdwt-social-link' href='<?php echo esc_attr($this->get_param('youtube_url', '')); ?>' target='_blank'><i class="fa fa-youtube"></i>
          </a> 
        </span> 
        <?php } ?>
        <?php if( $tumb){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-tumb wdwt-social-link' href='<?php echo esc_attr($this->get_param('tumblr_url', '')); ?>' target='_blank'><i class="fa fa-tumblr"></i>
          </a>
        </span> 
        <?php } ?>
        <?php if( $fl){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-fl wdwt-social-link' href='<?php echo esc_attr($this->get_param('flickr_url', '')); ?>' target='_blank'><i class="fa fa-flickr"></i>
          </a>
        </span> 
        <?php } ?>
        <?php if( $pin){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-pin wdwt-social-link' href='<?php echo esc_attr($this->get_param('pinterest_url', '')); ?>' target='_blank'><i class="fa fa-pinterest"></i>
          </a> 
        </span> 
        <?php } ?>
        <?php if( $dr){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-dr wdwt-social-link' href='<?php echo esc_attr($this->get_param('dribbble_url', '')); ?>' target='_blank'><i class="fa fa-dribbble"></i>
          </a>  
        </span>
        <?php } ?>
        <?php if( $px){ ?>
        <span class='wdwt-social-span'>
          <a class='wdwt-social-px wdwt-social-link' href='<?php echo esc_attr($this->get_param('px500_url', '')); ?>' target='_blank'><i class="fa fa-500px"></i>
          </a>
        </span>         
        <?php } ?>
        <div class='wdwt-line'></div>
        <div class="clear"></div>
      </div>
      
    </div>

    
    <?php
    }
  }


  /**
  * Prints style for menu background image
  */


  public function menu_bg_img(){
    $menu_bg_img_enable = $this->get_param('menu_bg_img_enable');
    $menu_bg_img = esc_url($this->get_param('menu_bg_img'));
    if($menu_bg_img_enable){ ?>
      <style>
      .left_container{
        background:url(<?php echo $menu_bg_img; ?>) no-repeat;
      }
      </style>
      <?php
    }

  }
  
  




} /*end of class*/


   

