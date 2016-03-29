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
	<div id="content" class="error-404">
		<p><?php _e('error', "portfolio-gallery"); ?></p>
		<h2>404</h2>
		<div class="imgBox">
      <div class="image_404"><img src="<?php echo WDWT_IMG.'404.png' ?>" title="404" /></div>		     
    </div>
		<p class="content-404"><?php _e('You are trying to reach a page that does not exist here. Either it has been moved or you typed a wrong address. Try searching:', "portfolio-gallery"); ?></p>
	  <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
			<div id="searchbox">
					<input  type="text" id="searchinput" value="" name="s" id="s" class="searchbox_search" placeholder="<?php echo __('Search...',"portfolio-gallery"); ?>"/> 
					<input type="submit" id="searchsubmit" value="" class="read_more" />									
			 </div>
		</form>
		<?php $wdwt_front->bottom_advertisment(); ?>
	</div>
  <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
	<aside id="sidebar2"> 
		<div class="sidebar-container">
		  <?php dynamic_sidebar( 'sidebar-2' ); ?>
		  <div class="clear"></div>
		</div>
	</aside>
<?php }	?>
<div class="clear"></div>
<?php $wdwt_front->footer_text(); ?>
</div>
<?php
get_footer(); ?>