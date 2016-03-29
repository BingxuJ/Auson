<?php 
/** 
 * The Template for displaying all single posts
 */

global $wdwt_front,
  $post;

	get_header(); 

	$portfolio_gallery_meta = get_post_meta($post->ID, WDWT_META, TRUE);
?>
<div class="right_container">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<aside id="sidebar1" >
			<div class="sidebar-container">			
				<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
				<div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
  
	<div id="content">
    <?php $wdwt_front->integration_top(); ?>
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		
		<div class="single-post">
		<?php  
			
				$show_featured_image = $wdwt_front->get_param('show_featured_image', $portfolio_gallery_meta, true);
				if($show_featured_image){
			    if ( has_post_thumbnail()) { ?>
				  <div class="post-thumbnail-div">
					  <div class="img_container unfixed">
							<?php echo Portfolio_gallery_frontend_functions::auto_thumbnail(360,250, false); ?>
						</div>				  
				  </div>
				  <?php
					}
				}?>
			   <h2 class="single-title"><?php the_title(); ?></h2>
			<div class="entry">	
			    <?php  the_content(); ?>
			</div>
      <?php 
      if($wdwt_front->get_param('date_enable', $portfolio_gallery_meta, false)){ ?>
			<div class="entry-meta">
				  <?php Portfolio_gallery_frontend_functions::posted_on_single(); ?>
			</div>
			 <?php Portfolio_gallery_frontend_functions::entry_meta(); }?>
			<?php $wdwt_front->integration_bottom(); 
			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Page', "portfolio-gallery" ) . '</span>', 'after' => '</div>', 'link_before' => '<span class="page-links-number">', 'link_after' => '</span>' ) ); 
			Portfolio_gallery_frontend_functions::post_nav(); ?>
			<div class="clear"></div>
			<?php
			   $wdwt_front->bottom_advertisment();
			   wp_reset_query();
				  if(comments_open() || get_comments_number() )
				  {  ?>
						<div class="comments-template">
							<?php comments_template();	?>
						</div>
				<?php
					}		
				?>
			</div>

		<?php endwhile; ?>

		<?php endif;   ?>
	</div>
	

	
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