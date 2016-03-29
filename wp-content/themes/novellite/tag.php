<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * 
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
  <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<?php printf(TAG_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1>
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
            <?php get_template_part('loop', 'index'); ?> 
			<div class="clear"></div>
<nav id="nav-single"> <span class="nav-previous">
		<?php next_posts_link(NEWER_POSTS); ?>
	</span> <span class="nav-next">
		<?php previous_posts_link(OLDER_POSTS); ?>
	</span> </nav>
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