<?php 



get_header();
global $wdwt_front,
          $post;

$grab_image = $wdwt_front->get_param('grab_image');

$lbox_width = $wdwt_front->get_param('lbox_image_width');
$lbox_height = $wdwt_front->get_param('lbox_image_height');
$search_view = $wdwt_front->get_param('search_view');
/*search results like blog*/
if($search_view == 'blog'):
  ?>
  <div class="right_container">

    <?php
    
    if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
      <aside id="sidebar1" >
        <div class="sidebar-container">     
          <?php  dynamic_sidebar( 'sidebar-1' );  ?>
          <div class="clear"></div>
        </div>
      </aside>
    <?php }

     ?>
    

    <div id="content" class="blog">
        <div class="single-post">
          <h2>
            <?php echo __('Search', "portfolio-gallery"); ?>
          </h2>
        </div>
        <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
            <div id="searchbox">
                    <input  type="text" id="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" class="searchbox_search" placeholder="<?php echo __('Search...', "portfolio-gallery"); ?>"/> 
                    <input type="submit" id="searchsubmit" value="" class=""/>
            </div>
        </form>
          
      <?php /*print page content*/ 
        if( have_posts() ) { 
      ?>
            
        <div id="blog-posts">   
      <?php 
              while( have_posts()): 
                  the_post(); ?>
                   <div class="blog-post">  
                <?php
                  if(has_post_thumbnail($post->ID) || Portfolio_gallery_frontend_functions::post_image_url() && $grab_image){
                  ?>
                    <div class="img_container fixed size180x150">
                      <?php echo Portfolio_gallery_frontend_functions::fixed_thumbnail(180,150, $grab_image); ?>
                    </div>
                <?php
                  }
                ?>
                <div class="blog-post-content">
                  <h3>
                     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>
                   <div class="blog_text"><?php
                    
                     Portfolio_gallery_frontend_functions::the_excerpt_max_charlength(400); 
                     
                ?></div>
                    <a href="<?php the_permalink(); ?>"  class="read_more" style="text-align:right;"><?php echo __('More info',"portfolio-gallery"); ?></a>
                </div>      
              </div>
         <?php endwhile;

         Portfolio_gallery_frontend_functions::posts_nav($wp_query);
          ?>
           </div>
      <?php }
      else {?>
          <div class="search-no-result">
            <?php echo __(" Nothing was found. Please try another keyword.", "portfolio-gallery");  ?>
        </div>
      <?php 
      }
      ?>
      <div class="clear"></div><?php
      
      $wdwt_front->bottom_advertisment(); 
        wp_reset_query();
    ?>
    </div>
      
     <?php
  if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
      <aside id="sidebar2">
        <div class="sidebar-container">
          <?php  dynamic_sidebar( 'sidebar-2' );  ?>
          <div class="clear"></div>
        </div>
      </aside>
  <?php } ?>
    <div class="clear"></div>
    <?php $wdwt_front->footer_text(); ?>
  </div>
  <?php

/*search results like gallery*/

else:
  $content_posts_noimage = esc_url($wdwt_front->get_param('content_posts_noimage'));
  $grid_thumbs_size = $wdwt_front->get_param('grid_thumbs_size', array(), array('large'));
  $grid_thumbs_size = $grid_thumbs_size[0];

?>
  <script>
  jQuery(document).ready(function(){
    wdwt_gallery.image_parent_class = 'SearchPost';
    wdwt_gallery.kaificent=238/363;
    //wdwt_gallery.standart_size=363;
    wdwt_gallery.enable_home=0;
    
    
    
  });

  jQuery(function() {
    jQuery('.da-thumbs > div:not(.da-empty)').hoverdir();
  });


  </script>
  <div class="right_container">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <aside id="sidebar1">
      <div class="sidebar-container">
        <?php  dynamic_sidebar( 'sidebar-1' );  ?>  
        <div class="clear"></div>
      </div>
    </aside>
  <?php }  ?>
      <div id="content" class="blog search-page">
        <div class="single-post">
          <h2>
            <?php echo __('Search', "portfolio-gallery"); ?>
          </h2>
        </div>
        <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
            <div id="searchbox">
                    <input  type="text" id="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" class="searchbox_search" placeholder="<?php echo __('Search...', "portfolio-gallery"); ?>"/> 
                    <input type="submit" id="searchsubmit" value="" class=""/>
            </div>
        </form>
          
      <?php /*print page content*/ 
        if( have_posts() ) { 
      ?>
            
        <div id="image_list_top" class="image_list_top portfolio_list da-thumbs">
      <?php 
        while( have_posts()): 
          the_post();
          $article_class = "da-animate da-slideFromRight";
           
          $thumb_url = Portfolio_gallery_frontend_functions::get_post_thumb($grid_thumbs_size);
          $full_img_url = Portfolio_gallery_frontend_functions::get_post_thumb("full");

          if(!$thumb_url && !$content_posts_noimage){
            $article_class = "da-empty";
          }

           ?>
           <div class="SearchPost <?php echo ($article_class == "da-empty" ? "da-empty" : ""); ?>"  style="background-image:url(<?php echo $thumb_url ? esc_url($thumb_url) : ($content_posts_noimage ? esc_url($content_posts_noimage) : ""); ?>);">
           <?php //echo Portfolio_gallery_frontend_functions::fixed_thumbnail(250,230); ?>
             <article class="<?php echo $article_class; ?>" style="display: block;">
               <h4><?php the_title(); ?></h4>
               <span class="link_post"><a href="<?php echo get_permalink() ?>"></a></span>
                <?php if($thumb_url){ ?>
                 <span class="zoom">
                   <a href="<?php echo $full_img_url; ?>" class=" " onclick="wdwt_lbox.init(this, 'wdwt-lightbox', <?php echo intval($lbox_width);?> , <?php echo intval($lbox_height);?>); return false;" rel="wdwt-lightbox"><i class="fa fa-search-plus"></i>
                   </a>
                 </span>
               <?php } ?>
               </article>
           </div>
         <?php endwhile;

         Portfolio_gallery_frontend_functions::posts_nav($wp_query);
          ?>
           </div>
      <?php }
      else {?>
          <div class="search-no-result">
            <?php echo __(" Nothing was found. Please try another keyword.", "portfolio-gallery");  ?>
        </div>
      <?php 
      }
      ?>
      <div class="clear"></div><?php
      
      $wdwt_front->bottom_advertisment(); 
        wp_reset_query();
    ?>
    </div>
      
     <?php
  if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
      <aside id="sidebar2">
        <div class="sidebar-container">
          <?php  dynamic_sidebar( 'sidebar-2' );  ?>
          <div class="clear"></div>
        </div>
      </aside>
  <?php } ?>
    <div class="clear"></div>
  <?php $wdwt_front->footer_text(); ?>
  </div>
    <?php
endif;

get_footer(); ?>
