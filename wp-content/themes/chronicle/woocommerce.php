<?php get_header();
get_template_part('chronicle','breadcrumbs'); ?>
<div class="container">
	<div class="content_left">
        <?php woocommerce_content(); ?>          
    <div class="clearfix divider_dashed9"></div>	
	<div class="clearfix mar_top2"></div>
	</div><!-- end content left side -->
<?php get_sidebar(); ?>
</div><!-- end content area -->
<div class="margin_top5"></div>	
<?php get_footer(); ?>