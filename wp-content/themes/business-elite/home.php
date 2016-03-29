<?php global $wdwt_front; ?>

<?php get_header();?>

<div class="container">
	<?php 
	if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<aside id="sidebar1" >
			<div class="sidebar-container">			
				<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
				<div class="clear"></div>
			</div>
		</aside>
	<?php } ?> 
			
	<?php Business_elite_frontend_functions::content_for_home();   
	// content_posts_for_home(); ?>
	
	<?php 
	if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
		<aside id="sidebar2">
			<div class="sidebar-container">
			  <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
			  <div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
	
	<div class="clear"></div>
</div>  

<?php get_footer(); ?>