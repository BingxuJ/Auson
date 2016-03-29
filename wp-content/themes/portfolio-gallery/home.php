<?php
global $wdwt_front;
get_header();
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
			<?php
			if( 'posts' == get_option( 'show_on_front' ) ){
				Portfolio_gallery_frontend_functions::frontpage();
				?>
				<div class="clear"></div>
				<?php
      }
      elseif('page' == get_option( 'show_on_front' )){
				 Portfolio_gallery_frontend_functions::homepage();

				 
      }
			?>	
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