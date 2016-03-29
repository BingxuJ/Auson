<?php

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-footer' ); ?>
</div><!-- #secondary -->
