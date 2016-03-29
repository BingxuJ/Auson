<?php 
/**
* The template for displaying Search Results pages.
*
*/
get_header(); ?>
<?php global $swiftbiz_lite_shortname; ?>
<div class="main-wrapper-item">
	<div class="bread-title-holder">
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title">
						<?php printf( __( 'Search Results for : %s', 'swiftbiz-lite' ), '<span>' . get_search_query() . '</span>' ); ?> 	
					</h1>
					<?php 
						if ((class_exists('swiftbiz_lite_breadcrumb_class'))) {$swiftbiz_lite_breadcumb->custom_breadcrumb();}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container post-wrap"> 
		<div class="row-fluid">
			<div id="container" class="span8">
				<div id="content" role="main">
					<?php if(have_posts()) : ?>
					<?php $post = $posts[0]; ?>
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
		</div>
	</div>
</div>
<?php get_footer(); ?>