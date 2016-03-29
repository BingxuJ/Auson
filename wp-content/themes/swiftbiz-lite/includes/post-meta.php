<div class="news-head clearfix">
    <div class="meta-left">
        <p class="news-date-meta">
            <?php echo get_the_date( _x( 'j', '', 'swiftbiz-lite' )); ?>                        
        </p>
        <p class="news-month-meta">
            <?php echo get_the_date( _x( 'M', '', 'swiftbiz-lite' )); ?>
        </p>
        <span class="news-meta-sep"></span>
    </div>
    <div class="meta-right">
        <h2 class="post-title">
		 <a class="news-title" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else _e('Untitled Post','swiftbiz-lite'); ?></a>
		</h2>
		<div class="skepost-meta clearfix">
			<span class="author-name"><?php _e('<i class="fa fa-user"></i>','swiftbiz-lite');?><?php the_author_posts_link(); ?></span>
			<span class="comments"><?php _e('<i class="fa fa-comments"></i>','swiftbiz-lite');?><?php comments_popup_link(__('No Comments ','swiftbiz-lite'), __('1 Comment ','swiftbiz-lite'), __(' % Comments ','swiftbiz-lite'), '', __(' Comments off ','swiftbiz-lite') ); ?></span>
			<?php the_tags('<span class="tag-name">&nbsp;<i class="fa fa-tag"></i>',', ','</span>'); ?>
			<?php if (has_category()) { ?><span class="category">&nbsp;<i class="fa fa-folder-open"></i><?php the_category(', '); ?><?php } ?></span>
		</div>
	</div>
</div>