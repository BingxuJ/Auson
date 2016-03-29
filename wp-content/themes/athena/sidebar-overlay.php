<?php

if ( ! is_active_sidebar( 'sidebar-overlay' ) ) {
	return;
}
?>

<div id="athena-overlay" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-overlay' ); ?>
</div>
