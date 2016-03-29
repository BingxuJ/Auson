<?php 

get_header();

global $wdwt_front;
$grab_image = $wdwt_front->get_param('grab_image');
$blog_style = $wdwt_front->blog_style();
 // get them header part 
?>
<div class="right_container">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
		<aside id="sidebar1" >
			<div class="sidebar-container">			
				<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
				<div class="clear"></div>
			</div>
		</aside>
	<?php endif; ?>
		<!--<div id="content_front_page">-->
			<div id="content" class="blog" ><?php
			  if(have_posts()) { 
					while (have_posts()) {
						the_post();
					?>
					<div class="blog-post home-post">				 
						<a class="title_href" href="<?php echo get_permalink() ?>">
						  <h2><?php the_title(); ?></h2>
						</a>
						<?php
						if($wdwt_front->get_param('date_enable')){ ?>
							<div class="home-post-date">
								<?php echo portfolio_gallery_frontend_functions::posted_on();?>
							</div>
						<?php 
						} 

							if(has_post_thumbnail() || (Portfolio_gallery_frontend_functions::post_image_url() && $blog_style && $grab_image)){
							?>
								<div class="img_container unfixed ">
									<?php echo Portfolio_gallery_frontend_functions::auto_thumbnail($grab_image); ?>
								</div>
						<?php
							}

					  if($blog_style){
						  the_excerpt();
						}
						else {
						  the_content(__('More', "portfolio-gallery"));
						}  
						?>
							 <div class="clear"></div>	
						
					</div>
					<?php 
					}
					if( $wp_query->max_num_pages > 2 ){ ?>
						<div class="page-navigation">
							<?php posts_nav_link(); ?>
						</div>	   
					<?php }
					
					} ?>
					<div class="clear"></div>
					<?php
					$wdwt_front->bottom_advertisment();
					wp_reset_query(); ?>			
			</div>
		<!--</div>-->
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<aside id="sidebar2">
				<div class="sidebar-container">
				  <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
				  <div class="clear"></div>
				</div>
			</aside>
	<?php } ?>
  <div class="clear"></div>
	<?php $wdwt_front->footer_text(); ?>
</div>
<?php get_footer(); ?>