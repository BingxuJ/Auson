<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( !defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

get_header( 'shop' );
?>
<div id="content" class="site-content site-content-wrapper row">
    <div class="page-content row ">
        <article class="col-md-9 item-page">
            <h2 class="post-title">
                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <?php woocommerce_page_title(); ?>
                <?php endif; ?>  
                <?php do_action( 'woocommerce_before_main_content' ); ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'single-product' ); ?>

                <?php endwhile; // end of the loop.   ?>
                <?php do_action( 'woocommerce_after_main_content' ); ?>


            </h2>
        </article>
        <div class="col-md-3 avenue-sidebar">
            <?php do_action( 'woocommerce_sidebar' ); ?>
        </div>        
    </div>
</div>   




<!--<script>
    jQuery(function () {
        jQuery("body").floatingShare({
            place: "top-left", // alternatively top-right
            counter: true, // set to false to hide counters of pinterest, facebook, twitter and linkedin
            buttons: ["facebook", "twitter", "google-plus", "linkedin", "pinterest", "stumbleupon", "envelope"], // all of the currently avalaible social buttons
            title: document.title, // your title, default is current page's title
            url: window.location.href, // your url, default is current page's url
            text: "share with ", // the title of a tags
            description: jQuery("meta[name='description']").attr("content"), // your description, default is current page's description
            popup_width: 400, // the sharer popup's width, default is 400px
            popup_height: 300 // the sharer popup's width, default is 300px
        });
    });
</script>-->
<?php get_footer( 'shop' ); ?>