<div id="post-<?php the_ID(); ?>" <?php post_class('blog_post'); ?>>
	<div class="blog_postcontent">
        <?php if(has_post_thumbnail()) :?>
		<div class="image_frame">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('chronicle_small_thumbs'); ?>
		</a>
		</div>
		<?php endif; ?>		
        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            <ul class="post_meta_links">
            	<li><?php echo get_the_date(); ?></li>
                <li class="post_by"><i><?php _e('by:','chronicle'); ?></i>&nbsp;&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>&nbsp;</li>
				<?php if(get_the_tag_list() != '' ) { ?>
                <li class="post_categoty"><i><?php _e('in:','chronicle'); ?></i>&nbsp;&nbsp;<?php the_tags('', ' ', ''); ?>&nbsp;</li>
				<?php } ?>
                <li class="post_comments"><i><?php _e('note:','chronicle'); ?></i>&nbsp;&nbsp;<?php comments_number( 'no comments', 'one comment', '% comments' ); ?>&nbsp;</li>
            </ul>
        <div class="clearfix"></div>
        <div class="margin_top1"></div>
		<?php the_content(__('Read more...','chronicle')); ?>
		</div>
</div><!-- /# end post -->   
<div class="clearfix divider_dashed9"></div>