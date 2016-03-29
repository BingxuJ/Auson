<?php
/**
 * The Primary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Photo_Perfect
 */
?>
<div id="sidebar-primary" class="widget-area" role="complementary">
  <div class="area-wrapper">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) :  ?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif ?>
 </div>
</div><!-- #sidebar-primary -->
