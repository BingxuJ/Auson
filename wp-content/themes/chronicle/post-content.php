<?php
if(is_page()):
the_content();
else: ?>
<div class="blog_post">
		<div class="blog_postcontent">
        <?php if(has_post_thumbnail()) :?>
		<div class="image_frame">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('chronicle_small_thumbs'); ?>
		</a>
		</div>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
		<ul class="post_meta_links">
		<li><?php echo get_the_date(); ?></li>				
                <li class="post_by"><i><?php _e('by:','chronicle'); ?>&nbsp;</i> <?php the_author(); ?></li>
				<?php if(get_the_tag_list() != '' ) { ?>
                <li class="post_categoty"><i><?php _e('in:','chronicle'); ?>&nbsp;</i> <?php the_tags('', ' ', ''); ?></li>
				<?php } ?>
                <li class="post_comments"><i><?php _e('note:','chronicle'); ?>&nbsp;</i><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
        </ul>
        <div class="clearfix"></div>
        <div class="margin_top1"></div>
		<?php endif; ?>            
		<?php the_content(__('Read more...','chronicle')); 
		$defaults = array(
              'before'           => '<div class="pagination">' . __( 'Pages:','chronicle' ),
              'after'            => '</div>',
	          'link_before'      => '',
	          'link_after'       => '',
	          'next_or_number'   => 'number',
	          'separator'        => ' ',
	          'nextpagelink'     => __( 'Next page'  ,'chronicle'),
	          'previouspagelink' => __( 'Previous page' ,'chronicle'),
	          'pagelink'         => '%',
	          'echo'             => 1
	          );
	          wp_link_pages( $defaults );
			  ?>
		</div>
</div>
<?php endif;?>