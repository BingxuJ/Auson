<?php if ( class_exists( 'WooCommerce' ) ): ?>
<section id="section8" class="woo-wrapper" >
<?php $woo_product = get_theme_mod('woo_shortcode','[recent_products]');  
 ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">                    
                    <?php if (get_theme_mod('woo_head_','') != '') { ?>
                    <h2 class="section-heading"><?php echo stripslashes(get_theme_mod('woo_head_','')); ?></h2>
                <?php } else { ?>
                    <h2 class="section-heading">Latest Woo Commerce Product</h2>
                <?php } ?>
                <?php if (get_theme_mod('woo_desc_','') != '') { ?>
                    <h3 class="section-subheading text-muted"><?php echo stripslashes(get_theme_mod('woo_desc_','')); ?></h3>
                <?php } else { ?>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                <?php } ?>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-12">
                	<div class="woo_content"> 
                	<?php 	echo do_shortcode($woo_product); ?>
                	</div>
                </div>
            </div>	
		</div>
</section>
<?php endif; ?>