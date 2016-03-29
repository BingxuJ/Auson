<?php
/*
  Template Name: Fullwidth Page
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
  <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<?php the_title(); ?></h1>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
             <div class="col-md-9">
                <div class="fullwidth">
				<h1 class="page-title-gall"><?php the_title(); ?></h1>
			  <?php if (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>	
			  <?php endif; ?>	  
				</div>  
				</div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>