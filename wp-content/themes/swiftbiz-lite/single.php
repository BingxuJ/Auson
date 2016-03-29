<?php 
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<?php global $swiftbiz_lite_shortname; ?>
<div class="main-wrapper-item">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
	
<!-- BreadCrumb Section // -->
<div class="bread-title-holder">
	<div class="container">
		<div class="row-fluid">
			<div class="container_inner clearfix">
				<h1 class="title"><?php the_title(); ?></h1>
				<?php 
				if ((class_exists('swiftbiz_lite_breadcrumb_class'))) {$swiftbiz_lite_breadcumb->custom_breadcrumb();}
				?>
			</div>
		</div>
	</div>
</div>
<!-- \\ BreadCrumb Section -->
	
<div class="container post-wrap">
	<div class="row-fluid">
		<div id="container" class="span8">
			<div id="content">  
					<div class="post" id="post-<?php the_ID(); ?>">
					  <div class="single_post_wrap">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
							<div class="featured-image-shadow-box quote_featured_img">
								<?php the_post_thumbnail('swiftbiz_standard_img'); ?>
							</div>
						<?php } ?>

						<div class="post_inner_wrap clearfix">
							<?php get_template_part('includes/post','meta'); ?>
							<!-- skepost-meta -->
					        <div class="skepost">
								<?php the_content(); ?>
								<br />
								<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages :','swiftbiz-lite').'</strong>','after' => '</p>', __('number','swiftbiz-lite'),));	?>
								<?php edit_post_link(__('Edit','swiftbiz-lite'), '', ''); ?>
					        </div>
					        <!-- skepost -->
				        </div>
				      </div>
				      <!-- single-post-wrap -->

						<div class="navigation"> 
							<?php previous_post_link( __('<span class="nav-previous"><i class="fa fa-angle-left"></i> %link</span>','swiftbiz-lite')); ?>
							<?php next_post_link( __('<span class="nav-next">%link <i class="fa fa-angle-right"></i></span>','swiftbiz-lite')); ?> 
						</div>

						<div class="clearfix"></div>
						<div class="comments-template">
							<?php comments_template( '', true ); ?>
						</div>
					</div>
				<!-- post -->
				<?php endwhile; ?>
				<?php else :  ?>

				<div class="post">
					<h2><?php _e('Not Found','swiftbiz-lite'); ?></h2>
				</div>
				<?php endif; ?>
			</div><!-- content --> 
		</div><!-- container --> 

		<!-- Sidebar -->
		<div id="sidebar" class="span4">
			<?php get_sidebar(); ?>
		</div>
		<!-- Sidebar --> 

	</div>
 </div>
</div>
<?php get_footer(); ?>