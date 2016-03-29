<?php	
	
	// Parallax Defaults
	$parallax_defaults = NULL;

	// Pull all the pages into an array
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');

	$options_categories_obj = get_categories();

	$countsettings = $_REQUEST['count_section'];
?>	

<div class="sub-option clearfix" data-id="<?php echo $countsettings; ?>">
<h3 class="title"><?php _e('Page Title:', 'accesspress-parallax') ?> <span></span><div class="section-toggle"><i class="fa fa-chevron-down"></i></div></h3>
<div class="sub-option-inner">

<div class="inline-label">
<label><?php _e('Page', 'accesspress-parallax') ?></label>
<select class="parallax_section_page" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][page]" class="of-input">
<option value=""><?php _e('Select a page:', 'accesspress-parallax') ?></option>
<?php foreach ($options_pages_obj as $page) { ?>
	<option value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
<?php } ?>
</select>
</div>

<div class="color-picker inline-label">
<label><?php _e('Font Color', 'accesspress-parallax') ?></label>
<input name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][font_color]" class="of-color" type="text">
</div>

<div class="color-picker inline-label">
<label><?php _e('Background Color', 'accesspress-parallax') ?></label>
<input name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][color]" class="of-color" type="text">
</div>

<div class="inline-label">
<label><?php _e('Layout', 'accesspress-parallax') ?></label>
<select class="of-section of-section-layout" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][layout]">
	<option value="default_template"><?php _e('Default Section', 'accesspress-parallax') ?></option>
	<option value="service_template"><?php _e('Service Section', 'accesspress-parallax') ?></option>
	<option value="team_template"><?php _e('Team Section', 'accesspress-parallax') ?></option>
	<option value="portfolio_template"><?php _e('Portfolio Section', 'accesspress-parallax') ?></option>
	<option value="testimonial_template"><?php _e('Testimonial Section', 'accesspress-parallax') ?></option>
	<option value="blog_template"><?php _e('Blog Section', 'accesspress-parallax') ?></option>
	<option value="action_template"><?php _e('Call to Action Section', 'accesspress-parallax') ?></option>
	<option value="googlemap_template"><?php _e('Google Map Section', 'accesspress-parallax') ?></option>
	<option value="blank_template"><?php _e('Blank Section', 'accesspress-parallax') ?></option>
</select>
</div>

<div class="inline-label toggle-category" style="display:none">
<label class=""><?php _e('Category', 'accesspress-parallax') ?></label>
<select name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][category]" class="of-input">
	<option value=""><?php _e('Select a Category:', 'accesspress-parallax') ?></option>
<?php foreach ($options_categories_obj as $category) { ?>
	<option value="<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></option>
<?php } ?>
</select>
</div>

<div class="inline-label">
<label class=""><?php _e('Background Image', 'accesspress-parallax') ?></label>
<input type="text" placeholder="No file chosen" value="" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][image]" class="upload" id="parallax_section">
<input type="button" value="<?php _e('Upload', 'accesspress-parallax') ?>" class="upload-button button" id="upload-parallax_section">
<div id="parallax_section-image" class="screenshot"></div>
</div>


<div class="of-background-properties hide inline-label">
<label><?php _e('Background Settings', 'accesspress-parallax') ?></label>

<div class="background-settings">
<div class="clearfix">
<select id="parallax_section_repeat" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][repeat]" class="of-background of-background-repeat">
	<option value="no-repeat"><?php _e('No Repeat', 'accesspress-parallax') ?></option>
	<option value="repeat-x"><?php _e('Repeat Horizontally', 'accesspress-parallax') ?></option>
	<option value="repeat-y"><?php _e('Repeat Vertically', 'accesspress-parallax') ?></option>
	<option value="repeat"><?php _e('Repeat All', 'accesspress-parallax') ?></option>
</select>

<select id="parallax_section_position" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][position]" class="of-background of-background-position">
<option value="top left"><?php _e('Top Left', 'accesspress-parallax') ?></option>
<option value="top center"><?php _e('Top Center', 'accesspress-parallax') ?></option>
<option value="top right"><?php _e('Top Right', 'accesspress-parallax') ?></option>
<option value="center left"><?php _e('Middle Left', 'accesspress-parallax') ?></option>
<option value="center center"><?php _e('Middle Center', 'accesspress-parallax') ?></option>
<option value="center right"><?php _e('Middle Right', 'accesspress-parallax') ?></option>
<option value="bottom left"><?php _e('Bottom Left', 'accesspress-parallax') ?></option>
<option value="bottom center"><?php _e('Bottom Center', 'accesspress-parallax') ?></option>
<option value="bottom right"><?php _e('Bottom Right', 'accesspress-parallax') ?></option>
</select>

<select id="parallax_section_attachment" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][attachment]" class="of-background of-background-attachment">
<option value="scroll"><?php _e('Scroll Normally', 'accesspress-parallax') ?></option>
<option value="fixed"><?php _e('Fixed in Place', 'accesspress-parallax') ?></option>
</select>

<select id="parallax_section_size" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][size]" class="of-background of-background-size">
<option value="auto"><?php _e('Auto', 'accesspress-parallax') ?></option>
<option value="cover"><?php _e('Cover', 'accesspress-parallax') ?></option>
<option value="contain"><?php _e('Contain', 'accesspress-parallax') ?></option>
</select>
</div>
</div>

<div class="inline-label">
<label><?php _e('Overlay', 'accesspress-parallax') ?></label>
<select id="parallax_section_overlay" class="of-background of-background-overlay" name="accesspress_parallax[parallax_section][<?php echo $countsettings; ?>][overlay]">
<option value="overlay0"><?php _e('No Overlay', 'accesspress-parallax') ?></option>
<option value="overlay1"><?php _e('Small Dotted', 'accesspress-parallax') ?></option>
<option value="overlay2"><?php _e('Large Dotted', 'accesspress-parallax') ?></option>
<option value="overlay3"><?php _e('Light Black', 'accesspress-parallax') ?></option>
<option value="overlay4"><?php _e('Black Dotted', 'accesspress-parallax') ?></option>
</select>
</div>
</div>
<div class="remove-parallax button-primary"><?php _e('Remove', 'accesspress-parallax') ?></div>
</div>
</div>

