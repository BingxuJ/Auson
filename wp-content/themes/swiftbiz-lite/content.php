<?php

/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */

?>
<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
		
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
        <div class="featured-image-shadow-box quote_featured_img">
				<?php
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'swiftbiz_standard_img');
				?>
				<a href="<?php the_permalink(); ?>" class="image">
					<img src="<?php echo $thumbnail[0];?>" alt="<?php the_title(); ?>" class="featured-image alignnon"/>
				</a>
				
		</div>
			<?php } ?>
		<div class="post_inner_wrap clearfix">
			<?php get_template_part('includes/post','meta'); ?>
            <!-- skepost-meta -->
            <div class="skepost">
				<?php the_excerpt(); ?> 
				<div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More','swiftbiz-lite');?></a></div>		  
	        </div>
			<!-- skepost -->
        </div>
</div>
<!-- post -->