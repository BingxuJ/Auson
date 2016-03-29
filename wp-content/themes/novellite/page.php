<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
  <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<h1><?php the_title(); ?></h1>
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
                    <div class="content-bar gallery"> 

            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
			<div class="comment_section">
                            <!--Start Comment list-->
                            <?php comments_template('', true); ?>
                            <!--End Comment Form-->
						</div>
                    </div>
                </div>
				<div class="col-md-3">
		<!--Start Sidebar-->
		<?php get_sidebar(); ?>
		<!--End Sidebar-->
		</div> 
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>