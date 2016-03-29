<?php if ( 'page' == get_option( 'show_on_front' ) ) {  ?>
	<!-- PAGE EDITER CONTENT -->
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<div id="front-page-content" class="swiftbiz-section">
				<div class="container">
					<div class="row-fluid"> 
						<?php the_content(); ?>
					</div>
					<div class="border-content-box bottom-space"></div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?> 
	<!-- \\PAGE EDITER CONTENT -->
<?php } ?>

<?php  if( get_theme_mod('swiftbiz_lite_home_blog_sec', 'on') == 'on') { ?>
<div id="front-content-box" class="swiftbiz-section">
	<div class="container">
		<div class="row-fluid">
			<h3 id="front-blog-title" class="swiftbiz-title"><?php echo get_theme_mod( 'swiftbiz_lite_home_blog_title', __('Latest News', 'swiftbiz-lite') ); ?></h3>
			<span class="border_left"></span>
		</br>
		</div>
		<div class="row-fluid front-blog-wrap">
			<?php $swiftbiz_lite_blogno = get_theme_mod('swiftbiz_lite_home_blog_num', '-1' );
				$swiftbiz_lite_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $swiftbiz_lite_blogno,'ignore_sticky_posts' => true ) );
			?>
			<?php if ( $swiftbiz_lite_lite_latest_loop->have_posts() ) : ?>

			<!-- pagination here -->

				<!-- the loop -->
				<?php while ( $swiftbiz_lite_lite_latest_loop->have_posts() ) : $swiftbiz_lite_lite_latest_loop->the_post(); ?>
					<div class="span4">
						<?php get_template_part('includes/post','meta'); ?>
						<?php the_excerpt(); ?>
						<div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More &rarr;','swiftbiz-lite');?></a></div>		  
					</div>
				<?php endwhile; ?>
				<!-- end of the loop -->

				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'swiftbiz-lite' ); ?></p>
			<?php endif; ?>
		</div>
 	</div>
</div>
<?php } ?>