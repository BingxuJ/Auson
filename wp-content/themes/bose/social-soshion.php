<?php for ($i = 1; $i < 8; $i++) : 
	$social = get_theme_mod('bose_social_'.$i);
	if ( ($social != 'none') && ($social != '') ) : ?>
	<a title="<?php echo ucfirst($social)?>" href="<?php echo esc_url(get_theme_mod('bose_social_url'.$i)); ?>"><img src="<?php echo get_template_directory_uri().'/assets/images/social/'.$social.'.png'; ?>"></a>
	<?php endif;

endfor; ?>