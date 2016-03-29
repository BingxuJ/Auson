<?php get_header(); ?>
<div class="clearfix"></div>
<?php get_template_part('chronicle','breadcrumbs'); ?>
<div class="container">
	<div class="content_fullwidth">
	<div class="error_pagenotfound">    	
        <strong><?php _e('404','chronicle');?></strong>
        <br />
    	<b><?php _e('Oops... Page Not Found!', 'chronicle');?></b>
        
        <em><?php _e('Sorry the Page Could not be Found here.','chronicle');?></em>

        <p><?php _e('Try using the button below to go to main page of the site','chronicle');?></p>
        
        <div class="clearfix margin_top3"></div>
    	
        <a href="<?php echo home_url( '/' ); ?>" class="but_goback"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; <?php _e('Go to Back','chronicle');?></a>
        
    </div><!-- end error page notfound -->        
	</div>
</div><!-- end content area -->
<?php get_footer();?>