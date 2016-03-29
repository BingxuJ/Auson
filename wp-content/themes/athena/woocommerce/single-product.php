<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

get_header('shop');
?>
<div class="row">

    <header id="title_bread_wrap" class="entry-header">
        <div class="ak-container">

            <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

                <h1 class="entry-title ak-container"><?php woocommerce_page_title(); ?></h1>

            <?php endif; ?>

            <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');
            ?>


            <?php do_action('woocommerce_archive_description'); ?>
        </div>
    </header>
    <div class="inner">
        <div class="ak-container">
            <div id="primary" class="content-area">
                <div class="content-inner clearfix">
                    <div class="col-sm-<?php echo (!is_active_sidebar('sidebar-right') ) ? '12' : '9'; ?>">
                        <?php while (have_posts()) : the_post(); ?>

                            <?php wc_get_template_part('content', 'single-product'); ?>

                        <?php endwhile; // end of the loop.  ?>
                    </div>
                     
                            <?php get_sidebar( 'shop' ); ?>
                     
                        <?php
                        /**
                         * woocommerce_after_main_content hook
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action('woocommerce_after_main_content');
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php get_footer('shop'); ?>