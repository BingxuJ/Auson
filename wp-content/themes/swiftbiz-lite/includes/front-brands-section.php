<!-- FULL-CLIENT-BOX -->
<?php

$_home_brand_sec  = get_theme_mod("swiftbiz_lite_home_brand_sec", "on");

$_brand1_img  = get_theme_mod("swiftbiz_lite_brand1_img", ""); // returns an array
$_brand1_alt  = get_theme_mod("swiftbiz_lite_brand1_alt", "");
$_brand1_url  = get_theme_mod("swiftbiz_lite_brand1_url", "");

$_brand2_img  = get_theme_mod("swiftbiz_lite_brand2_img", "");
$_brand2_alt  = get_theme_mod("swiftbiz_lite_brand2_alt", "");
$_brand2_url  = get_theme_mod("swiftbiz_lite_brand2_url", "");

$_brand3_img  = get_theme_mod("swiftbiz_lite_brand3_img", "");
$_brand3_alt  = get_theme_mod("swiftbiz_lite_brand4_alt", "");
$_brand3_url  = get_theme_mod("swiftbiz_lite_brand3_url", "");

$_brand4_img  = get_theme_mod("swiftbiz_lite_brand4_img", "");
$_brand4_alt  = get_theme_mod("swiftbiz_lite_brand4_alt", "");
$_brand4_url  = get_theme_mod("swiftbiz_lite_brand4_url", "");

if( $_home_brand_sec == 'on' ) {
?>

<div id="full-client-box">
	<div class="container">
		<div class="row-fluid">
			<div id="our-brands">
				<ul id="brand-logos">
					<?php if( $_brand1_img != '' ) { ?>
					<li class="item span3 brand1">
						<a href="<?php echo esc_url($_brand1_url); ?>" title="<?php echo esc_html($_brand1_alt); ?>"><img alt="<?php echo esc_html($_brand1_alt); ?>" src="<?php echo esc_url($_brand1_img); ?>"></a>
					</li>
					
					<?php } if( $_brand2_img != '' ) { ?>
					<li class="item span2 brand2">
						<a href="<?php echo esc_url($_brand2_url); ?>" title="<?php echo esc_html($_brand2_alt); ?>"><img alt="<?php echo esc_html($_brand2_alt); ?>" src="<?php echo esc_url($_brand2_img); ?>"></a>
					</li>
					
					<?php } if( $_brand3_img != '' ) { ?>
					<li class="item span3 brand3">
						<a href="<?php echo esc_url($_brand3_url); ?>" title="<?php echo esc_html($_brand3_alt); ?>"><img alt="<?php echo esc_html($_brand3_alt); ?>" src="<?php echo esc_url($_brand3_img); ?>"></a>
					</li>
					
					<?php } if( $_brand4_img != '' ) { ?>
					<li class="item span3 brand4">
						<a href="<?php echo esc_url($_brand4_url); ?>" title="<?php echo esc_html($_brand4_alt); ?>"><img alt="<?php echo esc_html($_brand4_alt); ?>" src="<?php echo esc_url($_brand4_img); ?>"></a>
					</li>
					<?php } ?>
				</ul>
			</div><!-- /our-brands -->
		</div>
	</div>
</div>
<?php }  ?>