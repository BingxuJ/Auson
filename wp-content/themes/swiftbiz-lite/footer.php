<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $swiftbiz_lite_shortname, $swiftbiz_lite_themename;
?>
	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer" class="swiftbiz-section">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php if( is_active_sidebar('Footer Sidebar') ) { ?>
					<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<?php } else {
					

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
					<div class="swiftbiz-footer-container span4 swiftbiz-container widget_recent_entries">
						<h3 class="swiftbiz-title swiftbiz-footer-title"><?php _e('Recent Posts', 'swiftbiz-lite'); ?></h3>
						<ul>
						<?php while ( $r->have_posts() ) : $r->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></li>
						<?php endwhile; ?>
						</ul>
					</div>
				<?php
					// Reset the global $the_post as this query will have stomped on it
					wp_reset_postdata();
					endif;
				?>

				<div class="swiftbiz-footer-container span4 swiftbiz-container widget_search">
					<h3 class="swiftbiz-title swiftbiz-footer-title"><?php _e('Search','swiftbiz-lite'); ?></h3>
					<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
						<div class="searchleft">
							<input type="text" value="" placeholder="<?php _e('Search here','swiftbiz-lite'); ?>" name="s" id="searchbox" class="searchinput"/>
						</div>
					    <div class="searchright">
					    	<input type="submit" class="submitbutton" value="<?php _e('Search','swiftbiz-lite'); ?>" />
					    </div>
					    <div class="clearfix"></div>
					</form>
					<br/>
					<div class="widget_tag_cloud">
						<h3 class="swiftbiz-title swiftbiz-footer-title"><?php _e('Tag Cloud','swiftbiz-lite'); ?></h3>
						<div class="tagcloud">
							<?php wp_tag_cloud( array('number' => 7) );  ?>
						</div>
					</div>
				</div>

				<div class="swiftbiz-footer-container span4 swiftbiz-container widget_text">
					<h3 class="swiftbiz-title swiftbiz-footer-title"><?php _e('Contact Us','swiftbiz-lite'); ?></h3>
				    <div class="textwidget">
				        <!-- Footer Contact Section HTML Starts -->
				        <div class="footer-contact-info">
				        	<span class="footer-map-marker"><i class="fa fa-map-marker"></i></span>
				            <p><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean com modo ligula elet dolor. Lorem ipsum dolor sit amet.','swiftbiz-lite'); ?></p><p></p>
				        </div>

				        <div class="footer-contact-info">
				        	<span class="footer-phone"><i class="fa fa-phone"></i></span>
				            <p><a href="tel:013-6455-54552"><?php _e('013-6455-54552','swiftbiz-lite'); ?></a></p>
				        </div>

				        <div class="footer-contact-info">
				        	<span class="footer-envelope"><i class="fa fa-envelope"></i></span>
				            <p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">someone@example.com</a></p>
				        </div>

				        <div class="social_icon">
				        	<ul class="clearfix">
				        		<li class="fb-icon">
				        			<a target="_blank" href="#" title="<?php _e('Facebook','swiftbiz-lite'); ?>"><span class="fa fa-facebook"></span></a>
				        		</li>
				                <li class="tw-icon">
				                	<a target="_blank" href="#" title="<?php _e('Twitter','swiftbiz-lite'); ?>"><span class="fa fa-twitter"></span></a>
				                </li>
				                <li class="rss-icon">
				                	<a target="_blank" href="#" title="<?php _e('RSS','swiftbiz-lite'); ?>"><span class="fa fa-rss"></span></a>
				                </li>
				                <li class="linkedin-icon">
				                	<a target="_blank" href="#" title="<?php _e('Linkedin','swiftbiz-lite'); ?>"><span class="fa fa-linkedin"></span></a>
				                </li>
				            </ul>
				        </div>
				        <!-- Footer Contact Section HTML Ends -->
				    </div>
				</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $copyrightText = get_theme_mod('swiftbiz_lite_copyright', 'Copyright &copy; Proudly Powered by WordPress'); ?>
				<div class="copyright span6 alpha omega"><?php echo wp_kses_post($copyrightText); ?></div>
				<div class="owner span6 alpha omega"><?php _e('Swiftbiz Lite By ','swiftbiz-lite'); ?> <a href="<?php echo esc_url('http://sketchthemes.com/'); ?>" title="Sketch Themes"><?php _e('SketchThemes','swiftbiz-lite'); ?></a></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper -->
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
<a href="JavaScript:void(0);" title="<?php _e('Back To Top','swiftbiz-lite'); ?>" id="backtop"></a>

<?php wp_footer(); ?>
</body>
</html>