<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_callout_area">
	<div class="container">
		<div class="row">
		<?php if($wl_theme_options['fc_title'] !='') { ?>
			<div class="col-md-9">
			<p><i class="fa fa-thumbs-up"></i><?php echo esc_attr($wl_theme_options['fc_title']);?></p>
			</div>
			<?php } ?>
			<?php if($wl_theme_options['fc_btn_txt'] !='') { ?>
			<div class="col-md-3">
			<a href="<?php echo esc_url($wl_theme_options['fc_btn_link']); ?>" class="enigma_callout_btn"><?php echo esc_attr($wl_theme_options['fc_btn_txt']); ?></a>
			</div>
			<?php } ?>
		</div>
		
	</div>
	<div class="enigma_callout_shadow"></div>
</div>