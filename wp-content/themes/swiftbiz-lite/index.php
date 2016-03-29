<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header(); ?>

<?php global $swiftbiz_lite_shortname; ?>
<div class="main-wrapper-item">

	<!-- BreadCrumb Section // -->
	<div class="bread-title-holder">
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title"><?php echo esc_attr( get_theme_mod('swiftbiz_lite_blogpage_heading', 'Blog') ); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<!-- BreadCrumb Section // -->

	<!-- container // -->
	<div class="container post-wrap">
		 <!-- row-fluid // -->
		 <div class="row-fluid">
			  <div id="container" class="span8">
				<div id="content">
					<?php if(have_posts()) : ?>
						<?php /* The loop */ ?>
						<?php while(have_posts()) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
						<?php get_template_part( 'includes/navigation', 'section' ); ?>
					<?php else :  ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div>
				<!-- content -->
			  </div>
			  <!-- container --> 

			  <!-- Sidebar -->
			  <div id="sidebar" class="span4">
				<?php get_sidebar(); ?>
			  </div>
			  <!-- Sidebar --> 
		 </div><!-- row-fluid -->
	 </div><!-- container -->
</div>
<?php get_footer(); ?>