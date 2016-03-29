<?php
get_header();
get_template_part('chronicle','breadcrumbs');  ?>
<div class="container">
	<div class="content_left">
	<?php if ( have_posts()): 
	while ( have_posts() ): the_post(); 
		get_template_part('loop');
	endwhile;
	endif;
	chronicle_pagination() ; ?><!-- /# end pagination -->
	</div><!-- end content left side -->
<?php get_sidebar(); ?>
</div><!-- end content area -->
<?php get_footer(); ?>