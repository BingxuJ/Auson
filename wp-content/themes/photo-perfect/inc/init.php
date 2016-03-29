<?php
/**
 * Include default theme options.
 *
 * @package Photo_Perfect
 */

require get_template_directory() . '/inc/customizer/default.php';

/**
 * Load helpers.
 */
require get_template_directory() . '/inc/helper/common.php';
require get_template_directory() . '/inc/helper/options.php';

/**
 * Load theme core functions.
 */
require get_template_directory() . '/inc/core.php';

/**
 * Load hooks.
 */
require get_template_directory() . '/inc/hook/structure.php';
require get_template_directory() . '/inc/hook/basic.php';
require get_template_directory() . '/inc/hook/custom.php';

/**
 * Load metabox.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
