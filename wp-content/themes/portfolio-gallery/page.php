<?php 

//for update general_settings


get_header();
global $wdwt_front; 

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
	
     <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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

			 <h2><?php the_title(); ?></h2>
			 <div class="entry"><?php the_content(); ?></div>
		  </div>
		<?php endwhile; 
				endif;  ?>
		 <div class="clear"></div>
		 <?php $wdwt_front->bottom_advertisment();
            wp_reset_query();
			  if(comments_open())
			  {  ?>
				<div class="comments-template">
					<?php comments_template();	?>
				</div>			
			<?php	}	 ?>	
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