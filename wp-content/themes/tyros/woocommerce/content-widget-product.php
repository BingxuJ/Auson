<?php global $product; ?>
<li>
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
            
                <!-- get image gallery -->
                <?php foreach( $product->get_gallery_attachment_ids() as $attachment ) : ?>
                    <?php //echo wp_get_attachment_image( $attachment) ; ?>
                <?php endforeach; ?>
            
            
		<?php echo $product->get_image('medium'); ?>
		<?php echo $product->get_title(); ?>
	</a>
	<?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
	<?php echo $product->get_price_html(); ?>
</li>
