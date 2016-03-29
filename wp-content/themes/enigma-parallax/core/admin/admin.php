<?php
/***** Theme Info Page *****/
if (!function_exists('enigma_info_page')) {
	function enigma_info_page() {
	$page1=add_theme_page(__('Enigma Parallax', 'enigma-parallax'), __('About Theme', 'enigma-parallax'), 'edit_theme_options', 'enigma', 'enigmadisplay_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'weblizar_admin_info');
	}
}
add_action('admin_menu', 'enigma_info_page');
function weblizar_admin_info(){
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome-4.4.0/css/font-awesome.min.css');
	wp_enqueue_style('bootstrp',  get_template_directory_uri() .'/css/bootstrap.css');
	
}
if (!function_exists('enigmadisplay_theme_info_page')) {
	function enigmadisplay_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
    <div class="row theme-info-wrap">
<div class="row theme-dtl">
	<div class="col-md-12 guidline">  
		<div class="col-md-6">
		<h1 id="theme_title"><?php printf(__('Welcome to %1s %2s', 'enigma-parallax'), $theme_data->Name, $theme_data->Version ); ?></h1>	
		<div class="row">
		<h4><?php printf(__('Getting Started with %s', 'enigma-parallax'), $theme_data->Name); ?></h4>
		<p class="faq"><?php printf(__('Guideline: How to configure Enigma-Parallax Theme', 'enigma-parallax')); ?></p>
        <p class="guidtext"><?php printf(__('1. %s Supports the Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.', 'enigma-parallax'), $theme_data->Name); ?></p>
	    <a href="<?php echo admin_url('customize.php'); ?>" class="customize_button"><?php _e('Customize Theme', 'enigma-parallax'); ?></a>
		<p class="faq"><?php printf('FAQ', 'enigma-parallax', 'enigma-parallax'); ?></p>
		<p class="faqtext">1. <?php _e("Child Theme:","enigma-parallax"); ?></p>
		<p class="faqtext"><?php _e("If you modify the theme and it upgrade with next updated version. Then your modifications will be lost. <br>If you want to protect your modifications then you create child theme. Child theme will ensure your modifications and speed up your development time ", "enigma-parallax"); ?></p>
		<p class="faqtext"><?php _e("For child theme to click on" ,'enigma-parallax'); ?> <a href="https://codex.wordpress.org/Child_Themes" target="_new" class="button">  <?php _e(' Child Theme', 'enigma-parallax'); ?></a> <?php _e("Button.",'enigma-parallax'); ?></p>
		</div>
		</div>
		<div class="col-md-6 theme-img">	
		<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php _e('Theme Screenshot', 'enigma-parallax'); ?>" />
	    </div>
    </div>
</div>
<div class="row proinfo">
	<div class="col-md-3">
	<h2> <?php printf(__('ENIGMA-PARALLAX PREMIUM THEME', 'enigma-parallax')); ?> </h2>
	<h3><?php printf(__('Get Our Premium Theme', 'enigma-parallax')); ?></h3>
	</div>
	<div class="col-md-3">
	<h1><?php printf(__('Our Latest Feature Set', 'enigma-parallax')); ?></h1>
	<ul> 
	    <li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Front Page', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('parallax Design', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Theme Option Panel', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Unlimited Color Skins', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Multiple Bakground Patterns', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Multiple Theme Templates', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('6 Portfolio Layout', 'enigma-parallax')); ?></li>
	</ul>
	</div>	
	<div class="col-md-3 new">
	<ul>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('10 Page Layout', 'enigma-parallax')); ?></li>
	    <li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('6 Blog Layout', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Multilingual', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Complete Doceumentation', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('2 Service Page Template', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('About Us Page with short-code', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Contact Us Page Template', 'enigma-parallax')); ?></li>
		<li class="feature"><i class="fa fa-check fa-1x"></i> <?php printf(__('Custom Shortcodes', 'enigma-parallax')); ?></li>
	</ul>
	</div>
	<div class="col-md-3 plan-feature">
		<ul>
		<li><a href="http://demo.weblizar.com/preview/#enigma" target="_new" class="demo_button"><i class="fa fa-check-circle"></i> Demo</a></li>
		<li><a href="https://weblizar.com/themes/enigma-premium/" target="_new" class="purchase_button"><i class="fa fa-shopping-cart"></i> Buy</a></li>
		</ul>
	</div>
</div>

  <!-- Theme Premium Features  -->
	<div class="container-fluid">
	<div class="col-md-12">
        <h1 class="section-title">ENIGMA PARALLAX PREMIUM THEME FEATURES </h1>	
	    <p class="section-description"> We create awesome themes which are the perfect solution for your website project. </p>
	</div>
	   <div class="col-md-12">
        <div class="container services">
		    <div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-reorder"></i>
				<h3> ENIGMA PARALLAX INCLUDED </h3>
				 <p class="desc">Enigma Parallax version is ONE PAGE LANDING PAGE of Enigma Theme.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-language"></i>
				<h3> WPML COMPATIBLE </h3>
				 <p class="desc">All our themes are WPML translation ready including Enigma.</p>
				 </div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-tablet"></i>
				<h3> RESPONSIVE DESIGN </h3>
				 <p class="desc">Weblizar Pro adapts to different screen sizes so that your website will work (and be optimized for) iPhones, iPads and other mobile devices.</p>
		    </div>
			</div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-eye"></i>
				<h3> RATINA EYE </h3>
				 <p class="desc">Ratina ready - iOS Competible. </p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-html5"></i>
				<h3> HTML5 & CSS3 </h3>
				 <p class="desc">Modern HTML5 / CSS3 Elements.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-css3"></i>
				<h3> 18 PAGE TEMPLATE </h3>
				 <p class="desc">A very large number of Page Templates for various usage.</p>
		    </div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-globe"></i>
				<h3> MULTI PURPOSE </h3>
				 <p class="desc">Theme can be used for various purpose like : Corporate - Healthcare - Hotels - RealEstate - Pharma etc. </p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-th"></i>
				<h3> UNLIMITED COLOR SCHEME </h3>
				 <p class="desc">!0 Predifined color schemes including Custom Color picker so that you can create your own color layout .</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-file-text-o"></i>
				<h3> WELL DOCUMENTED </h3>
				 <p class="desc">Our all themes have well docementation so that you could use our themes easily.</p>
			</div>
		    </div>
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-file-photo-o"></i>
				<h3> 2 IMAGE LIGHT BOX </h3>
				 <p class="desc">Portfolio Lightbox on Home Page and Portfolio Template.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-cubes"></i>
				<h3> ISOTOPE EFFECTS   </h3>
				 <p class="desc">Most Popular ISOTOPE Effects for Portfolio and Blog.</p>
				 </div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-calendar"></i>
				<h3> COMING SOON MODE </h3>
				 <p class="desc">You can HIDE your website untill the site is Complete, Using COMING SOON MODE.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-gears"></i>
				<h3> THEME OPTION PANEL </h3>
				 <p class="desc">Easily customizable settings through Theme-Options.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-plus-square-o"></i>
				<h3> CUSTOM SHOTCODES </h3>
				 <p class="desc">Variety of Shortcodes.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-thumbs-up"></i>
				<h3> BROWSER COMPATIBILITY </h3>
				 <p class="desc">Theme supports all leading web browsers.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-check-square-o"></i>
				<h3> FAST & FRIENDLY SUPPORT </h3>
				 <p class="desc">Dedicated Support via email / forum / skype / teamviewer .</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-shopping-cart"></i>
				<h3> WOOCOMMERCE COMPATIBLE </h3>
				 <p class="desc">You can create your own online Store using WOOCOMMERCE Plugin and ENIGMA Theme.</p>
			</div>
		    </div>
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-dollar"></i>
				<h3>ONE TIME PAYMENT </h3>
				 <p class="desc">No Recurring Billing , One Payment and its done.</p>
			</div>
		    </div>
	    </div>
	   </div>
	</div>
		<div id="theme-author">
		    <p><?php printf(__('%1s is proudly brought to you by %2s. If you like this WordPress theme, %3s.', 'enigma-parallax'),
					$theme_data->Name,
					'<a target="_blank" href="https://weblizar.com/" title="weblizar">Weblizar</a>',
					'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/enigma-parallax" title="enigma-parallax Review">' . __('rate it', 'enigma-parallax') . '</a>'); ?>
			</p>
		</div>
 </div>
 <?php
	}
}
?>