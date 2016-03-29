<?php if( get_header_image() ) { ?>
<div class="skt-header-image">
	<!-- header image -->
		<div class="swiftbiz-front-bgimg">
			<img alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="ad-slider-image"  src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
		</div>
	<!-- end  header image  -->
</div>
<?php }