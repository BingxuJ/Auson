<!-- Start the Loop. -->
<?php 
global $post;
if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!--Start post-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post">              
			  <?php $format = get_post_format( $post->ID );
			  ?>			  
			  <?php $Video_embed = get_post_meta($post->ID, 'video_url', true);
			  if ($format == 'video')  {  
			   echo $Video_embed;
			   } elseif ($format == 'gallery')  {  
				$galleries_images = get_post_galleries_images( $post ); ?>
			  <?php if ( $galleries_images )  {  ?>
               <div class="flexslider">                            
                 <ul class="slides">
                  <?php 
                   $length=sizeof($galleries_images);
                    for( $i=0;$i<$length ;$i++) {
                     $length_g=sizeof($galleries_images[$i]);
                    //$image_link = wp_get_attachment_url( $attachment_id );
				 for( $j=0;$j<$length_g ;$j++) {				
                                ?>
                                 <li><a href="<?php the_permalink() ?>"><img src="<?php echo $galleries_images[$i][$j]; ?>" /></a></li>
								 <?php } }?>             
                                 </ul>                            
                                    </div>
             <?php } 
			} elseif ($format == 'image') { ?>
			<div class="post_thumbnil">
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {  ?>
      <a href="<?php get_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_loop'); ?></a>			 
			<?php } ?>
			</div>
			<?php }  elseif ($format == 'quote')  { ?>
			<div class="post_thumbnil">
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
             <a href="<?php get_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_loop'); ?></a>			 
             <?php } ?>
			<a href="<?php the_permalink() ?>"><span class="image_link2 quote"></span></a>
			</div>
			<?php } else { ?>
             <div class="post_thumbnil">
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
             <a href="<?php get_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_loop'); ?></a>			 
             <?php } ?>
			<a href="<?php the_permalink() ?>"><span class="image_link2"></span></a>
			</div>
			<?php } ?>
			<div class="post_content">
			<h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();  ?></a> </h1>
			<ul class="post_meta">
			<li class="post_comment"><?php comments_popup_link( NO_CMNT, ONE_CMNT, '% '.CMNT); ?></li>
			<li class="posted_on"><span></span><?php echo get_the_time('M, d, Y') ?></li>
             <li class="posted_by"><span></span><?php the_author_posts_link(); ?></li>
              <li class="posted_in"><span></span><?php the_category(', '); ?></li>
              </ul>
              <?php the_excerpt();?>
			  <a class="read_more" href="<?php the_permalink() ?>"><?php echo READ_MORE; ?><span></span></a>
			  </div>			  
			  <div class="clear"></div>
            </div>
            </div>
             <?php endwhile;
else: ?>
    <div class="post">
        <p>
          <?php _e('sorry no post matched your criteria!', 'novellite'); ?>
        </p>
    </div>
<?php endif; ?>
  <div class="clear"></div>
              <!--End post-->