<?php

/* include  fornt end framework class */
require_once('WDWT_front_functions.php');

class Portfolio_gallery_frontend_functions extends WDWT_frontend_functions{


  public static function posted_on() {
    printf('<span class="sep date"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
      esc_url( get_permalink() ),
      esc_attr( get_the_time() ),
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() )
    );
  } 

  public static function posted_on_single() {
    printf('<span class="sep date"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep author"></span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>',
      esc_url( get_permalink() ),
      esc_attr( get_the_time() ),
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf( __( 'View all posts by %s', "portfolio-gallery" ), get_the_author() ) ),
      get_the_author()
    );
 }


 


  
public static function home_featured_post(){
  global $wdwt_front;
  $home_middle_description_post_enable = $wdwt_front->get_param('home_middle_description_post_enable');

  if(!$home_middle_description_post_enable){
    return;
  }
  
  $choose_post_page = $wdwt_front->get_param('home_middle_description_post_page_choose', array(), 'post');
  $home_middle_description_pos = $wdwt_front->get_param('home_middle_description_pos', array(), '2');

  if($choose_post_page == 'page'){
    $home_middle_description_post = $wdwt_front->get_param('home_middle_description_page');  
  }
  else{
    $home_middle_description_post = $wdwt_front->get_param('home_middle_description_post');  
  }
  $img_maxwidth = $wdwt_front->get_param('home_middle_image_maxwidth', array(), 600);   

  $grab_image = $wdwt_front->get_param('grab_image'); 
  $featured_id=isset($home_middle_description_post[0]) ? $home_middle_description_post[0] : null;
  $args = array();
  $args['post_type'] = $choose_post_page == 'page' ? 'page' : 'post';

  if(isset($featured_id)){
    $args['p']= $featured_id;
    
    
  }
  else{
    $args['post_count']=1;
  }
  $featured_query = new WP_Query( $args); 

 
  if ($featured_query->have_posts()):
    while($featured_query->have_posts()) :

      $featured_query->the_post();
      $has_thumb = false;
      if(has_post_thumbnail() || (Portfolio_gallery_frontend_functions::post_image_url() && $grab_image)){ 
        $has_thumb = true;
      }
      ?>
      
      <style>
      #right_middle #featured_post_img img{
        max-width: <?php echo $img_maxwidth; ?>px;
      }
      #right_middle #middle {
        min-width: calc(100% - <?php echo $img_maxwidth; ?>px);
        <?php if(!$has_thumb){ ?>
          width:100%;
        <?php } ?>
      }
      </style>
      <div class="clear"></div>
      <div id="right_middle" data-pos="<?php echo $home_middle_description_pos; ?>">
        <?php
        if($has_thumb){ ?>
        <div id="featured_post_img">
          <?php echo Portfolio_gallery_frontend_functions::auto_thumbnail($grab_image); ?>
        </div>
        <?php } ?>
        <div id="middle">   
          <a href="<?php echo get_permalink(get_the_ID()); ?>">
          <h3>
            <?php echo esc_html(the_title()); ?>
          </h3>
          </a>
          <?php
            self::the_excerpt_max_charlength(200, get_the_excerpt());
          ?>
          <div class="clear"></div>
        </div>
        <?php  ?>
      </div>
      <?php
    endwhile;
  endif; 
  wp_reset_postdata();
}

  
public static function frontpage() {
  ?>
    <script>
    // Hover
      jQuery(function() {
        jQuery('.da-thumbs > div:not(.da-empty)').hoverdir();
      });
    </script>

  <?php
    global $wdwt_front, 
      $wp_query,
      $paged;
     
    $content_posts_enable = $wdwt_front->get_param('content_posts_enable');

    $choose_posts_pages = $wdwt_front->get_param('content_posts_pages_choose', array(), 'posts');
    
    $content_post_order = $wdwt_front->get_param('content_post_order', array(), array('DESC'));
    $content_post_orderby = $wdwt_front->get_param('content_post_orderby', array(), array('date'));
    $content_post_order = $content_post_order[0];
    $content_post_orderby = $content_post_orderby[0];

    $content_posts_noimage = esc_url($wdwt_front->get_param('content_posts_noimage'));
    
    $lbox_width = $wdwt_front->get_param('lbox_image_width');
    $lbox_height = $wdwt_front->get_param('lbox_image_height');

    $cat_checked=0;
    $post_count=0;
    $grid_thumbs_size = $wdwt_front->get_param('grid_thumbs_size', array(), array('large'));
    $grid_thumbs_size = $grid_thumbs_size[0];

    $printed_featured=false;
    $n_of_home_post=get_option( 'posts_per_page', 2); 
    if($n_of_home_post == 0){
      $n_of_home_post = 1;
    }
    self::home_featured_post(); 
    $printed_featured = true;  ?>
 
    <div id="image_list_top" class="image_list_top portfolio_list da-thumbs">
        
      <?php
      
      if($content_posts_enable){
        /*show specific posts/pages*/
        if($choose_posts_pages == 'pages'){
          $content_pages_list = $wdwt_front->get_param('content_pages_list', array(), array('')) ;
          $args = array(
          'posts_per_page' => $n_of_home_post,
          'post_type' => 'page',
          'post__in' => $content_pages_list,
          'paged'=> $paged,
          'order'=>$content_post_order,
          'orderby'=>$content_post_orderby,
          //'post__in'  => get_option( 'sticky_posts' ),
          //'ignore_sticky_posts' => 1
          );
        }
        else{
          $content_post_categories = implode(",", $wdwt_front->get_param('content_post_categories', array(), array(''))) ;

          $args = array(
          'posts_per_page' => $n_of_home_post,
          'cat' => self::remove_last_comma($content_post_categories),
          'paged'=> $paged,
          'order'=>$content_post_order,
          'orderby'=>$content_post_orderby,
          //'post__in'  => get_option( 'sticky_posts' ),
          //'ignore_sticky_posts' => 1
          );
        }
      }
      else{
        /*show all posts/pages*/
        if($choose_posts_pages == 'pages'){
          $args = array(
          'posts_per_page' => $n_of_home_post,
          'post_type' => 'page',
          'paged'=> $paged,
          'order'=>$content_post_order,
          'orderby'=>$content_post_orderby,
          //'post__in'  => get_option( 'sticky_posts' ),
          //'ignore_sticky_posts' => 1
          );

        }
        else{
          $args = array(
          'posts_per_page' => $n_of_home_post,
          'paged'=> $paged,
          'order'=>$content_post_order,
          'orderby'=>$content_post_orderby,
          );
        }
      }
      $wp_query = new WP_Query($args);
      
        if(have_posts()): 
          while ($wp_query->have_posts()):
            
            $wp_query->the_post();  
          
            $article_class = "da-animate da-slideFromRight";
            $post_count++;
            
            $thumb_url = self::get_post_thumb($grid_thumbs_size);
            $full_img_url = self::get_post_thumb("full");

            if(!$thumb_url && !$content_posts_noimage){
              $article_class = "da-empty";
            }

      ?>
     
        <div class="image_list_item <?php echo ($article_class == "da-empty" ? "da-empty" : ""); ?>" style="background-image:url(<?php echo $thumb_url ? esc_url($thumb_url) : ($content_posts_noimage ? esc_url($content_posts_noimage) : ""); ?>);">
            <?php //echo Portfolio_gallery_frontend_functions::fixed_thumbnail(370,310); ?>

            <article class="<?php echo $article_class; ?>" style="display: block;">
              <h4><?php /*self::the_title_max_charlength(40)*/ the_title(); ?></h4>
              <center class="home_description_hover">
              <?php /*self::the_excerpt_max_charlength(60,get_the_excerpt());*/ the_excerpt(); ?></center>
               
             <span class="link_post">
                <a href="<?php echo get_permalink() ?>">
                </a>
              </span>
            <?php 
            if($full_img_url){ ?>
              <span class="zoom">
                <a href="<?php echo $full_img_url; ?>" class=" " onclick="wdwt_lbox.init(this, 'wdwt-lightbox', <?php echo intval($lbox_width);?> , <?php echo intval($lbox_height);?>); return false;" rel="wdwt-lightbox"><i class="fa fa-search-plus"></i>
                </a>
              </span>
            <?php 
            } 
            ?>
            </article>
            </div>
            <?php 
                                   
          endwhile; 
        endif; /*the loop*/
       
      
      /*if($content_posts_enable){*/ ?>
        <div class="page-navigation">
          <?php posts_nav_link(); ?>
        </div>     
      <?php /* } */?>
      
      </div>
      
      <?php 
    

    wp_reset_query();       
      
  }

  


public static function homepage() {

  global $wdwt_front, 
    $wp_query,
    $paged;
    $date_enable =  $wdwt_front->get_param('date_enable');
    $grab_image = $wdwt_front->get_param('grab_image');
    $blog_style = $wdwt_front->blog_style();

  ?>
    <?php

      if(have_posts()) : 
        while (have_posts()) :
          the_post();
        
          ?>
          <div class="blog-post home-post">        
            <a class="title_href" href="<?php echo get_permalink() ?>">
              <h2><?php 
                    self::the_title_max_charlength(40);
              /*the_title();*/ ?></h2>
            </a>
            <?php
            if($date_enable){ ?>
              <div class="home-post-date">
                <?php echo self::posted_on();?>
              </div>
            <?php
            } 
            
            if(has_post_thumbnail() || (Portfolio_gallery_frontend_functions::post_image_url() && $blog_style && $grab_image)){
            ?>
              <div class="img_container fixed size250x180">
                <?php echo Portfolio_gallery_frontend_functions::fixed_thumbnail(250, 180, $grab_image); ?>
              </div>
            <?php
            }
            if($blog_style) {
              the_excerpt();
            }
            else {
              the_content(__('More', "portfolio-gallery"));
            }  
            ?>
            <div class="clear"></div>  
        
          </div>
          <?php 
        endwhile;
        if( $wp_query->max_num_pages > 2 ){ ?>
          <div class="page-navigation">
            <?php posts_nav_link(); ?>
          </div>     
          <?php 
        }
      endif;

      ?>
      <div class="clear"></div>
        <?php
        $wdwt_front->bottom_advertisment();
        wp_reset_query();
        
  }

  public static function entry_meta() {
    $categories_list = get_the_category_list(', ' );
    echo '<div class="entry-meta-cat">';
    if ( $categories_list ) {
      echo '<span class="categories-links"><span class="sep category"></span> ' . $categories_list . '</span>';
    }
    $tag_list = get_the_tag_list( '', ' , ' );
    if ( $tag_list ) {
      echo '<span class="tags-links"><span class="sep tag"></span>' . $tag_list . '</span>';
    }
    echo '</div>';
  }


  

}



