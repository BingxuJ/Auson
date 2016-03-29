<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 */
?>
<?php
/* The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if (!is_active_sidebar('first-footer-widget-area') && !is_active_sidebar('second-footer-widget-area') && !is_active_sidebar('third-footer-widget-area') && !is_active_sidebar('fourth-footer-widget-area')
)
    return;
// If we get this far, we have widgets. Let do this.
?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="widget-area first">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php endif; ?>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="widget-area second">
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php endif; ?>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="widget-area third">
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php endif; ?>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="widget-area last">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php endif; ?>
    </div>
</div>
