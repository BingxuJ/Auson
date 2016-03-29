<?php
/**
 * The sidebar containing the secondary widget area, displays on posts.
 * If no active widgets in this sidebar, it will be hidden completely.
 */	
?>
<div id="sidebar_2" class="swiftbiz_widget">
	<ul class="skeside">
		<?php if ( is_active_sidebar('Blog Sidebar') ) { ?>
			<?php dynamic_sidebar( 'Blog Sidebar' ); ?>
		<?php } else { ?>
		
		<li class="swiftbiz-container widget_search">
			<h3 class="swiftbiz-title"><?php _e('Search','swiftbiz-lite'); ?></h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>
			<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
				<div class="searchleft">
					<input type="text" value="" placeholder="<?php _e('Search here','swiftbiz-lite'); ?>" name="s" id="searchbox" class="searchinput"/>
				</div>
			    <div class="searchright">
			    	<input type="submit" class="submitbutton" value="<?php _e('Search','swiftbiz-lite'); ?>" />
			    </div>
			    <div class="clearfix"></div>
			</form>
		</li>

		<?php
		/**
		* Filter the arguments for the Recent Posts widget.
		*
		* @since 3.4.0
		*
		* @see WP_Query::get_posts()
		*
		* @param array $args An array of arguments used to retrieve the recent posts.
		*/
		$r = new WP_Query( apply_filters( 'widget_posts_args', array('posts_per_page'=>5, 'no_found_rows'=>true, 'post_status'=>'publish', 'ignore_sticky_posts'=>true ) ) );

		if ($r->have_posts()) :
		?>
		<li class="swiftbiz-container widget_recent_entries">
			<h3 class="swiftbiz-title"><?php _e('Recent Posts', 'swiftbiz-lite'); ?></h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>
			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></li>
			<?php endwhile; ?>
			</ul>
		</li>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
		?>

		<li class="swiftbiz-container widget_tag_cloud">
			<h3 class="swiftbiz-title"><?php _e('Tag Cloud','swiftbiz-lite'); ?></h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>
			<div class="tagcloud">
				<?php wp_tag_cloud( array('number' => 7) );  ?>
			</div>
		</li>

		<li class="swiftbiz-container widget_archive" title="Shift-click to edit this widget."><h3 class="swiftbiz-title"><?php _e('Archives', 'swiftbiz-lite') ?></h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>
			<ul>
				<?php wp_get_archives(); ?>
			</ul>
		</li>

		<li class="swiftbiz-container widget_archive" title="Shift-click to edit this widget."><h3 class="swiftbiz-title"><?php _e('Archives', 'swiftbiz-lite') ?></h3><div class="heading-sep clearfix"><ul class="heading-sep-block"><li></li><li></li><li></li><li></li></ul><div class="heading-sep-line"></div></div>
			<?php wp_get_archives(); ?>
		</li>

	<?php } ?>
	</ul>
</div>
<!-- #sidebar_2 .swiftbiz_widget -->