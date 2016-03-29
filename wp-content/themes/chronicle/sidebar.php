<!-- sidebar starts -->
<div class="col-md-3 right_sidebar">
    <?php if ( is_active_sidebar( 'sidebar-primary' ) )
	{ dynamic_sidebar( 'sidebar-primary' );	}
	else  { 
	$args = array(
	'before_widget' => '<div class="sidebar_widget">',
	'after_widget' => '</div><div class="clearfix margin_top3"></div>',
	'before_title' => '<div class="sidebar_title"><h4>',
	'after_title' => '</h4></div>' 
	);
	the_widget('WP_Widget_Archives', null, $args);
	} ?>
</div><!-- end right sidebar -->