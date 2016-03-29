<?php
/**
 * Load Saved Ultimate Responsive Image Slider Pro Settings
 */
$PostId = $post->ID;
$WRIS_Gallery_Settings_Key = "WRIS_Gallery_Settings_".$PostId;
$WRIS_Gallery_Settings = unserialize(get_post_meta( $PostId, $WRIS_Gallery_Settings_Key, true));
if($WRIS_Gallery_Settings['WRIS_L3_Slider_Width'] && $WRIS_Gallery_Settings['WRIS_L3_Slider_Height']) {
	if(isset($WRIS_Gallery_Settings['WRIS_L3_Slide_Title'])) 
				$WRIS_L3_Slide_Title   		    = $WRIS_Gallery_Settings['WRIS_L3_Slide_Title'];
			else
				$WRIS_L3_Slide_Title			= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Auto_Slideshow'])) 
				$WRIS_L3_Auto_Slideshow			= $WRIS_Gallery_Settings['WRIS_L3_Auto_Slideshow'];
			else
				$WRIS_L3_Auto_Slideshow			= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Transition']))
				$WRIS_L3_Transition   			= $WRIS_Gallery_Settings['WRIS_L3_Transition'];
			else
				$WRIS_L3_Transition   			= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Transition_Speed']))
				$WRIS_L3_Transition_Speed   	= $WRIS_Gallery_Settings['WRIS_L3_Transition_Speed'];
			else
				$WRIS_L3_Transition_Speed   	= 5000;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Slide_Order']))
				$WRIS_L3_Slide_Order   			= $WRIS_Gallery_Settings['WRIS_L3_Slide_Order'];
			else
				$WRIS_L3_Slide_Order   			= "ASC";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Slide_Distance']))
				$WRIS_L3_Slide_Distance   		= $WRIS_Gallery_Settings['WRIS_L3_Slide_Distance'];
			else
				$WRIS_L3_Slide_Distance   		= 5;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Sliding_Arrow']))
				$WRIS_L3_Sliding_Arrow   		= $WRIS_Gallery_Settings['WRIS_L3_Sliding_Arrow'];
			else
				$WRIS_L3_Sliding_Arrow   		= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Slider_Navigation']))
				$WRIS_L3_Slider_Navigation   	= $WRIS_Gallery_Settings['WRIS_L3_Slider_Navigation'];
			else
				$WRIS_L3_Slider_Navigation   	= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Navigation_Position']))
				$WRIS_L3_Navigation_Position   	= $WRIS_Gallery_Settings['WRIS_L3_Navigation_Position'];
			else
				$WRIS_L3_Navigation_Position   	= "bottom";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Thumbnail_Style']))
				$WRIS_L3_Thumbnail_Style   		= $WRIS_Gallery_Settings['WRIS_L3_Thumbnail_Style'];
			else
				$WRIS_L3_Thumbnail_Style   		= "border";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Thumbnail_Width']))
				$WRIS_L3_Thumbnail_Width   		= $WRIS_Gallery_Settings['WRIS_L3_Thumbnail_Width'];
			else
				$WRIS_L3_Thumbnail_Width   		= 120;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Thumbnail_Height']))
				$WRIS_L3_Thumbnail_Height   	= $WRIS_Gallery_Settings['WRIS_L3_Thumbnail_Height'];
			else
				$WRIS_L3_Thumbnail_Height   	= 100;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Navigation_Button']))
				$WRIS_L3_Navigation_Button   	= $WRIS_Gallery_Settings['WRIS_L3_Navigation_Button'];
			else
				$WRIS_L3_Navigation_Button   	= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Width']))
				$WRIS_L3_Width   				= $WRIS_Gallery_Settings['WRIS_L3_Width'];
			else
				$WRIS_L3_Width   				= "custom";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Slider_Width']))
				$WRIS_L3_Slider_Width   		= $WRIS_Gallery_Settings['WRIS_L3_Slider_Width'];
			else
				$WRIS_L3_Slider_Width   		= 1000;

			if(isset($WRIS_Gallery_Settings['WRIS_L3_Height']))
				$WRIS_L3_Height   				= $WRIS_Gallery_Settings['WRIS_L3_Height'];
			else
				$WRIS_L3_Height   				= "custom";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Slider_Height']))
				$WRIS_L3_Slider_Height   		= $WRIS_Gallery_Settings['WRIS_L3_Slider_Height'];
			else
				$WRIS_L3_Slider_Height   		= 500;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Font_Style']))
				$WRIS_L3_Font_Style          	= $WRIS_Gallery_Settings['WRIS_L3_Font_Style'];
			else
				$WRIS_L3_Font_Style          	= "Arial";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Title_Color']))
				$WRIS_L3_Title_Color   			= $WRIS_Gallery_Settings['WRIS_L3_Title_Color'];
			else
				$WRIS_L3_Title_Color   			= "#00000";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Title_BgColor']))
				$WRIS_L3_Title_BgColor   		= $WRIS_Gallery_Settings['WRIS_L3_Title_BgColor'];
			else
				$WRIS_L3_Title_BgColor   		= "#FFFFFF";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Desc_Color']))
				$WRIS_L3_Desc_Color   			= $WRIS_Gallery_Settings['WRIS_L3_Desc_Color'];
			else
				$WRIS_L3_Desc_Color   			= "#FFFFFF";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Desc_BgColor']))
				$WRIS_L3_Desc_BgColor  			= $WRIS_Gallery_Settings['WRIS_L3_Desc_BgColor'];
			else
				$WRIS_L3_Desc_BgColor  			= "#00000";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Navigation_Color']))
				$WRIS_L3_Navigation_Color  		= $WRIS_Gallery_Settings['WRIS_L3_Navigation_Color'];
			else
				$WRIS_L3_Navigation_Color  		= "#FFFFFF";
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Fullscreeen']))
				$WRIS_L3_Fullscreeen  			= $WRIS_Gallery_Settings['WRIS_L3_Fullscreeen'];
			else
				$WRIS_L3_Fullscreeen  			= 1;
			
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Custom_CSS']))
				$WRIS_L3_Custom_CSS   			= $WRIS_Gallery_Settings['WRIS_L3_Custom_CSS'];
			else
				$WRIS_L3_Custom_CSS   			= "";
				
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Navigation_Bullets_Color']))
				$WRIS_L3_Navigation_Bullets_Color   = $WRIS_Gallery_Settings['WRIS_L3_Navigation_Bullets_Color'];
			else
				$WRIS_L3_Navigation_Bullets_Color   = "#000000";
				
			if(isset($WRIS_Gallery_Settings['WRIS_L3_Navigation_Pointer_Color']))
				$WRIS_L3_Navigation_Pointer_Color   = $WRIS_Gallery_Settings['WRIS_L3_Navigation_Pointer_Color'];
			else
				$WRIS_L3_Navigation_Pointer_Color   = "#000000";
}
?>
<style>
.thumb-pro th, .thumb-pro label, .thumb-pro h3, .thumb-pro {
	color:#31a3dd !important;
	font-weight:bold;
}
.caro-pro th, .caro-pro label, .caro-pro h3, .caro-pro {
	color:#DA5766 !important;
	font-weight:bold;
}
</style>
<?php require_once("tooltip.php"); ?>	
<input type="hidden" id="wl_action" name="wl_action" value="wl-save-settings">
<table class="form-table">
	<tbody>
		<tr id="L3">
			<th scope="row" colspan="2"><h2><?php _e('Configure Settings For Slider Shortcode', WRIS_TEXT_DOMAIN); ?>: <?php echo "[URIS id=$PostId]"; ?></h2><hr></th>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Display Slider Title', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Slide_Title)) $WRIS_L3_Slide_Title = 1; ?>
				<input type="radio" name="wl-l3-slide-title" id="wl-l3-slide-title" value="1" <?php if($WRIS_L3_Slide_Title == 1 ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-slide-title" id="wl-l3-slide-title" value="0" <?php if($WRIS_L3_Slide_Title == 0 ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to show/hide slide title above slider', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Auto Play Slide Show', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Auto_Slideshow)) $WRIS_L3_Auto_Slideshow = 1; ?>
				<input type="radio" name="wl-l3-auto-slide" id="wl-l3-auto-slide" value="1" <?php if($WRIS_L3_Auto_Slideshow == 1 ) { echo "checked"; } ?>> <?php _e('Yes', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-auto-slide" id="wl-l3-auto-slide" value="2" <?php if($WRIS_L3_Auto_Slideshow == 2 ) { echo "checked"; } ?>> <?php _e('Yes with Stop on Mouse Hover', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-auto-slide" id="wl-l3-auto-slide" value="3" <?php if($WRIS_L3_Auto_Slideshow == 3 ) { echo "checked"; } ?>> <?php _e('No', WRIS_TEXT_DOMAIN); ?>
				<p class="description">
					<?php _e('Select Yes/No option to auto slide enable or disable into slider', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Transition', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Transition)) $WRIS_L3_Transition = 1; ?>
				<input type="radio" name="wl-l3-transition" id="wl-l3-transition" value="1" <?php if($WRIS_L3_Transition == 1 ) { echo "checked"; } ?>> Fade &nbsp;&nbsp;
				<input type="radio" name="wl-l3-transition" id="wl-l3-transition" value="0" <?php if($WRIS_L3_Transition == 0 ) { echo "checked"; } ?>> Slide
				<p class="description">
					<?php _e('Select a transition effect you want to apply on slides', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Autoplay Transition Speed', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Transition_Speed)) $WRIS_L3_Transition_Speed = 5000; ?>
				<input type="text" name="wl-l3-transition-speed" id="wl-l3-transition-speed" value="<?php echo $WRIS_L3_Transition_Speed; ?>">
				<p class="description">
					<?php _e('Set your desired transition speed of slides. Default width is 5000px', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Order', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Slide_Order)) $WRIS_L3_Slide_Order = "ASC"; ?>
				<input type="radio" name="wl-l3-slide-order" id="wl-l3-slide-order" value="ASC" <?php if($WRIS_L3_Slide_Order == "ASC" ) { echo "checked"; } ?>> <?php _e('Ascending', WRIS_TEXT_DOMAIN); ?>  &nbsp;&nbsp;
				<input type="radio" name="wl-l3-slide-order" id="wl-l3-slide-order" value="DESC" <?php if($WRIS_L3_Slide_Order == "DESC" ) { echo "checked"; } ?>> <?php _e('Descending', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-slide-order" id="wl-l3-slide-order" value="shuffle" <?php if($WRIS_L3_Slide_Order == "shuffle" ) { echo "checked"; } ?>> <?php _e('Random', WRIS_TEXT_DOMAIN); ?>
				<p class="description">
					<?php _e('Select a slide order you want to apply on slides', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Distance', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Slide_Distance)) $WRIS_L3_Slide_Distance = 5; ?>
				<select name="wl-l3-slide-distance" id="wl-l3-slide-distance">
					<option value="0" <?php if($WRIS_L3_Slide_Distance == 0) echo "selected=selected";?>>0</option>
					<option value="5" <?php if($WRIS_L3_Slide_Distance == 5) echo "selected=selected";?>>5</option>
					<option value="10" <?php if($WRIS_L3_Slide_Distance == 10) echo "selected=selected";?>>10</option>
					<option value="15" <?php if($WRIS_L3_Slide_Distance == 15) echo "selected=selected";?>>15</option>
					<option value="20" <?php if($WRIS_L3_Slide_Distance == 20) echo "selected=selected";?>>20</option>
					<option value="25" <?php if($WRIS_L3_Slide_Distance == 25) echo "selected=selected";?>>25</option>
				</select>
				<p class="description">
					<?php _e('Set a gap between all slides. Range 0 to 25', WRIS_TEXT_DOMAIN); ?>&nbsp;
					<a href="#" id="p6" data-tooltip="#s6"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Sliding Arrow', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Sliding_Arrow)) $WRIS_L3_Sliding_Arrow = 1; ?>
				<input type="radio" name="wl-l3-sliding-arrow" id="wl-l3-sliding-arrow" value="1" <?php if($WRIS_L3_Sliding_Arrow == 1 ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-sliding-arrow" id="wl-l3-sliding-arrow" value="0" <?php if($WRIS_L3_Sliding_Arrow == 0 ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to show or hide arrows on mouse hover on slide', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p1" data-tooltip="#s1"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Show Thumbnail', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Slider_Navigation)) $WRIS_L3_Slider_Navigation = 1; ?>
				<input type="radio" name="wl-l3-navigation" id="wl-l3-navigation" value="1" <?php if($WRIS_L3_Slider_Navigation == 1 ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation" id="wl-l3-navigation" value="0" <?php if($WRIS_L3_Slider_Navigation == 0 ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to show or hide thumbnail based navigation under slides', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p2" data-tooltip="#s2"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Thumbnail Position', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Navigation_Position)) $WRIS_L3_Navigation_Position = "bottom"; ?>
				<input type="radio" name="wl-l3-navigation-position" id="wl-l3-navigation-position" value="top" <?php if($WRIS_L3_Navigation_Position == "top" ) { echo "checked"; } ?>> <?php _e('Top', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-position" id="wl-l3-navigation-position" value="bottom" <?php if($WRIS_L3_Navigation_Position == "bottom" ) { echo "checked"; } ?>> <?php _e('Bottom', WRIS_TEXT_DOMAIN); ?>
				<p class="description">
					<?php _e('Select a thumbnail position to show above or below the slider', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Thumbnail Style', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Thumbnail_Style)) $WRIS_L3_Thumbnail_Style = "border"; ?>
				<input type="radio" name="wl-l3-thumbnail-style" id="wl-l3-thumbnail-style" value="border" <?php if($WRIS_L3_Thumbnail_Style == "border" ) { echo "checked"; } ?>> <?php _e('Border', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-thumbnail-style" id="wl-l3-thumbnail-style" value="pointer" <?php if($WRIS_L3_Thumbnail_Style == "pointer" ) { echo "checked"; } ?>> <?php _e('Pointer', WRIS_TEXT_DOMAIN); ?>
				<p class="description">
					<?php _e('Select a thumbnail style to apply on thumbnails', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Thumbnail Resize', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Thumbnail_Width)) $WRIS_L3_Thumbnail_Width = "100"; ?>
				<?php if(!isset($WRIS_L3_Thumbnail_Height)) $WRIS_L3_Thumbnail_Height = "120"; ?>
				<?php _e('Width', WRIS_TEXT_DOMAIN); ?> <input type="text" name="wl-l3-navigation-width" id="wl-l3-navigation-width" value="<?php echo $WRIS_L3_Thumbnail_Width; ?>"> &nbsp;&nbsp;
				<?php _e('Height', WRIS_TEXT_DOMAIN); ?> <input type="text" name="wl-l3-navigation-height" id="wl-l3-navigation-height" value="<?php echo $WRIS_L3_Thumbnail_Height; ?>">
				<p class="description">
					<?php _e('Set custom thumbnail height & width according to you', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Show Navigation Bullets', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Navigation_Button)) $WRIS_L3_Navigation_Button = 1; ?>
				<input type="radio" name="wl-l3-navigation-button" id="wl-l3-navigation-button" value="1" <?php if($WRIS_L3_Navigation_Button == 1 ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-button" id="wl-l3-navigation-button" value="0" <?php if($WRIS_L3_Navigation_Button == 0 ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to show or hide slider navigation buttons under image slider', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p3" data-tooltip="#s3"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slider Width', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Slider_Width)) $WRIS_L3_Slider_Width = 1000; ?>
				<?php if(!isset($WRIS_L3_Width)) $WRIS_L3_Width = "custom"; ?>
				<input type="radio" name="wl-l3-width" id="wl-l3-width" value="100%" <?php if($WRIS_L3_Width == "100%" ) { echo "checked"; } ?>> <?php _e('100% Width', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-width" id="wl-l3-width" value="fullWidth" <?php if($WRIS_L3_Width == "fullWidth" ) { echo "checked"; } ?>> <?php _e('Full Width', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-width" id="wl-l3-width" value="custom" <?php if($WRIS_L3_Width == "custom" ) { echo "checked"; } ?>> <?php _e('Custom', WRIS_TEXT_DOMAIN); ?>
				<input type="text" name="wl-l3-slider-width" id="wl-l3-slider-width" value="<?php echo $WRIS_L3_Slider_Width; ?>">
				<p class="description">
					<?php _e('Enter your desired width for slider. Default width is 1000px', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p4" data-tooltip="#s4"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slider Height', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Slider_Height)) $WRIS_L3_Slider_Height = 500; ?>
				<?php if(!isset($WRIS_L3_Height)) $WRIS_L3_Height = "custom"; ?>				
				<input type="radio" name="wl-l3-height" id="wl-l3-height" value="auto" <?php if($WRIS_L3_Height == "auto" ) { echo "checked"; } ?>> <?php _e('Auto Height', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-height" id="wl-l3-height" value="custom" <?php if($WRIS_L3_Height == "custom" ) { echo "checked"; } ?>> <?php _e('Custom', WRIS_TEXT_DOMAIN); ?>
				<input type="text" name="wl-l3-slider-height" id="wl-l3-slider-height" value="<?php echo $WRIS_L3_Slider_Height; ?>">
				<p class="description">
					<?php _e('Enter your desired height for slider. Default height is 500px', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p5" data-tooltip="#s5"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e("Font Style", WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Font_Style)) $WRIS_L3_Font_Style = "Arial";?>	
				<select name="wl-l3-font-style" id="wl-l3-font-style" class="standard-dropdown" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($WRIS_L3_Font_Style == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($WRIS_L3_Font_Style == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($WRIS_L3_Font_Style == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($WRIS_L3_Font_Style == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($WRIS_L3_Font_Style == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($WRIS_L3_Font_Style == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($WRIS_L3_Font_Style == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($WRIS_L3_Font_Style == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($WRIS_L3_Font_Style == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="_OpenSansBold"   <?php if($WRIS_L3_Font_Style == '_OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($WRIS_L3_Font_Style == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($WRIS_L3_Font_Style == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($WRIS_L3_Font_Style == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($WRIS_L3_Font_Style == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($WRIS_L3_Font_Style == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($WRIS_L3_Font_Style == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($WRIS_L3_Font_Style == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
				</select>
				<p class="description"><?php _e("Choose a caption font style.", WRIS_TEXT_DOMAIN); ?> (Upgrade to pro for get 500+ Google fonts in plugin, check <a href="https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/" target="_new">demo</a> )</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Title Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Title_Color)) $WRIS_L3_Title_Color = "#000000"; ?>
				<input type="radio" name="wl-l3-title-color" id="wl-l3-title-color" value="#F8504B" <?php if($WRIS_L3_Title_Color == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-title-color" id="wl-l3-title-color" value="#31a3dd" <?php if($WRIS_L3_Title_Color == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-title-color" id="wl-l3-title-color" value="#000000" <?php if($WRIS_L3_Title_Color == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-title-color" id="wl-l3-title-color" value="#FFFFFF" <?php if($WRIS_L3_Title_Color == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set slide title color', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p7" data-tooltip="#s7"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Title Background Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Title_BgColor)) $WRIS_L3_Title_BgColor = "#FFFFFF"; ?>
				<input type="radio" name="wl-l3-title-bgcolor" id="wl-l3-title-bgcolor" value="#F8504B" <?php if($WRIS_L3_Title_BgColor == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-title-bgcolor" id="wl-l3-title-bgcolor" value="#31a3dd" <?php if($WRIS_L3_Title_BgColor == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-title-bgcolor" id="wl-l3-title-bgcolor" value="#000000" <?php if($WRIS_L3_Title_BgColor == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-title-bgcolor" id="wl-l3-title-bgcolor" value="#FFFFFF" <?php if($WRIS_L3_Title_BgColor == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set slide title background color', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p8" data-tooltip="#s8"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Description Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Desc_Color)) $WRIS_L3_Desc_Color = "#FFFFFF"; ?>
				<input type="radio" name="wl-l3-desc-color" id="wl-l3-desc-color" value="#F8504B" <?php if($WRIS_L3_Desc_Color == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-desc-color" id="wl-l3-desc-color" value="#31a3dd" <?php if($WRIS_L3_Desc_Color == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-desc-color" id="wl-l3-desc-color" value="#000000" <?php if($WRIS_L3_Desc_Color == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-desc-color" id="wl-l3-desc-color" value="#FFFFFF" <?php if($WRIS_L3_Desc_Color == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set slide description color', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p9" data-tooltip="#s9"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Slide Description Background Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Desc_BgColor)) $WRIS_L3_Desc_BgColor = "#000000"; ?>
				<input type="radio" name="wl-l3-desc-bgcolor" id="wl-l3-desc-bgcolor" value="#F8504B" <?php if($WRIS_L3_Desc_BgColor == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-desc-bgcolor" id="wl-l3-desc-bgcolor" value="#31a3dd" <?php if($WRIS_L3_Desc_BgColor == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-desc-bgcolor" id="wl-l3-desc-bgcolor" value="#000000" <?php if($WRIS_L3_Desc_BgColor == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-desc-bgcolor" id="wl-l3-desc-bgcolor" value="#FFFFFF" <?php if($WRIS_L3_Desc_BgColor == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set slide description background color', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p10" data-tooltip="#s10"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Navigation Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Navigation_Color)) $WRIS_L3_Navigation_Color = "#FFFFFF"; ?>
				<input type="radio" name="wl-l3-navigation-color" id="wl-l3-navigation-color" value="#F8504B" <?php if($WRIS_L3_Navigation_Color == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-color" id="wl-l3-navigation-color" value="#31a3dd" <?php if($WRIS_L3_Navigation_Color == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-color" id="wl-l3-navigation-color" value="#000000" <?php if($WRIS_L3_Navigation_Color == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-color" id="wl-l3-navigation-color" value="#FFFFFF" <?php if($WRIS_L3_Navigation_Color == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set navigation arrow and fullscreen icon color', WRIS_TEXT_DOMAIN); ?>.
					<a href="#" id="p11" data-tooltip="#s11"><?php _e('Preview', WRIS_TEXT_DOMAIN); ?></a>
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Navigation Bullets Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Navigation_Bullets_Color)) $WRIS_L3_Navigation_Bullets_Color = "#000000"; ?>
				<input type="radio" name="wl-l3-navigation-bullets-color" id="wl-l3-navigation-bullets-color" value="#F8504B" <?php if($WRIS_L3_Navigation_Bullets_Color == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-bullets-color" id="wl-l3-navigation-bullets-color" value="#31a3dd" <?php if($WRIS_L3_Navigation_Bullets_Color == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-bullets-color" id="wl-l3-navigation-bullets-color" value="#000000" <?php if($WRIS_L3_Navigation_Bullets_Color == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-bullets-color" id="wl-l3-navigation-bullets-color" value="#FFFFFF" <?php if($WRIS_L3_Navigation_Bullets_Color == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set navigation bullets color', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Navigation Pointer Color', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Navigation_Pointer_Color)) $WRIS_L3_Navigation_Pointer_Color = "#000000"; ?>
				<input type="radio" name="wl-l3-navigation-pointer-color" id="wl-l3-navigation-pointer-color" value="#F8504B" <?php if($WRIS_L3_Navigation_Pointer_Color == "#F8504B" ) { echo "checked"; } ?>> <?php _e('Red', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-pointer-color" id="wl-l3-navigation-pointer-color" value="#31a3dd" <?php if($WRIS_L3_Navigation_Pointer_Color == "#31a3dd" ) { echo "checked"; } ?>> <?php _e('Blue', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-pointer-color" id="wl-l3-navigation-pointer-color" value="#000000" <?php if($WRIS_L3_Navigation_Pointer_Color == "#000000" ) { echo "checked"; } ?>> <?php _e('Black', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-navigation-pointer-color" id="wl-l3-navigation-pointer-color" value="#FFFFFF" <?php if($WRIS_L3_Navigation_Pointer_Color == "#FFFFFF" ) { echo "checked"; } ?>> <?php _e('White', WRIS_TEXT_DOMAIN); ?> &nbsp;&nbsp;
				<p class="description">
					<?php _e('Select a color to set navigation pointer color', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Full Screen Slide Show', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Fullscreeen)) $WRIS_L3_Fullscreeen = 1; ?>
				<input type="radio" name="wl-l3-fullscreen" id="wl-l3-fullscreen" value="1" <?php if($WRIS_L3_Fullscreeen == 1 ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> &nbsp;&nbsp;
				<input type="radio" name="wl-l3-fullscreen" id="wl-l3-fullscreen" value="0" <?php if($WRIS_L3_Fullscreeen == 0 ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option for full screen slide show', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
		
		<tr id="L3">
			<th scope="row"><label><?php _e('Custom CSS', WRIS_TEXT_DOMAIN); ?></label></th>
			<td>
				<?php if(!isset($WRIS_L3_Custom_CSS)) $WRIS_L3_Custom_CSS = ""; ?>
				<textarea name="wl-l3-custom-css" id="wl-l3-custom-css" rows="5" cols="75"><?php echo $WRIS_L3_Custom_CSS; ?></textarea>
				<p class="description">
					<?php _e('Enter any custom css you want to apply on this slider into textarea filed', WRIS_TEXT_DOMAIN); ?>.<br>
					<?php _e('Note', WRIS_TEXT_DOMAIN); ?><strong>:</strong> <?php _e('Please Do Not Use', WRIS_TEXT_DOMAIN); ?> <strong>&lt;style&gt;...&lt;/style&gt;</strong> <?php _e('Tag With Custom CSS', WRIS_TEXT_DOMAIN); ?>.
				</p>
			</td>
		</tr>
	</tbody>
</table>