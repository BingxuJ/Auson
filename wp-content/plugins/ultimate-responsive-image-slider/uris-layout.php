<?php
/**
 * Load All WRIS Custom Post Type
 */
$IG_CPT_Name = "ris_gallery";
$AllSlides = array(  'p' => $Id['id'], 'post_type' => $IG_CPT_Name, 'orderby' => $WRIS_L3_Slide_Order);
$loop = new WP_Query( $AllSlides );

while ( $loop->have_posts() ) : $loop->the_post();
//get the post id
$post_id = get_the_ID();

/**
 * Get All Slides Details Post Meta
 */
$RPGP_AllPhotosDetails = unserialize(base64_decode(get_post_meta( get_the_ID(), 'ris_all_photos_details', true)));
$TotalImages =  get_post_meta( get_the_ID(), 'ris_total_images_count', true );
$i = 1;
$j = 1;
?>
<script type="text/javascript">
	jQuery( document ).ready(function( jQuery ) {
		jQuery( '#example3_<?php echo $post_id; ?>' ).sliderPro({
			//width
			<?php if($WRIS_L3_Width == "100%") { ?>
			width: "100%",
			<?php } else if($WRIS_L3_Width == "custom") { ?>
			width: <?php if($WRIS_L3_Slider_Width != "") echo $WRIS_L3_Slider_Width; else echo "1000"; ?>,
			<?php } else if($WRIS_L3_Width == "fullWidth") { ?>
			forceSize: 'fullWidth', //'fullWidth', 'fullWindow', 'none'
			<?php } ?>
			
			//height
			<?php if($WRIS_L3_Height == "custom") { ?>
			height: <?php if($WRIS_L3_Slider_Height != "") echo $WRIS_L3_Slider_Height; else echo "500"; ?>,
			<?php } else { ?>
			autoHeight: true,
			<?php } ?>
			
			//autoplay
			<?php if($WRIS_L3_Auto_Slideshow == 1) { ?>
			autoplay:  true,
			autoplayOnHover: 'none',
			<?php } ?>
			<?php if($WRIS_L3_Auto_Slideshow == 2) { ?>
			autoplay: true,
			autoplayOnHover: 'pause',
			<?php } ?>
			<?php if($WRIS_L3_Auto_Slideshow == 3) { ?>
			autoplay:  false,
			<?php } ?>
			autoplayDelay: <?php if($WRIS_L3_Transition_Speed != "") echo $WRIS_L3_Transition_Speed; else echo "5000"; ?>,
			
			
			arrows: <?php if($WRIS_L3_Sliding_Arrow == 1) echo "true"; else echo "false"; ?>,
			buttons: <?php if($WRIS_L3_Navigation_Button == 1) echo "true"; else echo "false"; ?>,
			smallSize: 500,
			mediumSize: 1000,
			largeSize: 3000,
			fade: <?php if($WRIS_L3_Transition == 1) echo "true"; else echo "false"; ?>,
			
			//thumbnail
			thumbnailArrows: true,
			thumbnailWidth: <?php if($WRIS_L3_Thumbnail_Width != "") echo $WRIS_L3_Thumbnail_Width; else echo "120"; ?>,
			thumbnailHeight: <?php if($WRIS_L3_Thumbnail_Height != "") echo $WRIS_L3_Thumbnail_Height; else echo "100"; ?>,
			<?php if($WRIS_L3_Navigation_Position == "top") { ?>
			thumbnailsPosition: 'top',
			<?php } ?>
			<?php if($WRIS_L3_Navigation_Position == "bottom") { ?>
			thumbnailsPosition: 'bottom',
			<?php } ?>
			<?php if($WRIS_L3_Thumbnail_Style == "pointer") { ?>
			thumbnailPointer: true, 
			<?php } ?>
			centerImage: true,
			allowScaleUp: true,
			<?php if($WRIS_L3_Slide_Order == "shuffle") { ?>
			shuffle: true,
			<?php } ?>
			startSlide: 0,
			loop: true,
			slideDistance: <?php if($WRIS_L3_Slide_Distance) echo $WRIS_L3_Slide_Distance; else echo "5"; ?>,
			autoplayDirection: 'normal',
			touchSwipe: true,
			fullScreen: <?php if($WRIS_L3_Fullscreeen == 1) echo "true"; else echo "false"; ?>,
		});
	});
</script>
<style>
/* Example 3 */

/* border */
<?php if($WRIS_L3_Thumbnail_Style == "border") { ?>
#example3_<?php echo $post_id; ?> .sp-selected-thumbnail {
	border: 4px solid <?php echo $WRIS_L3_Navigation_Pointer_Color ; ?>;
}
<?php } ?>

/* font + color */
.title-in  {
	font-family: <?php echo $WRIS_L3_Font_Style; ?> !important;
	color: <?php echo $WRIS_L3_Title_Color; ?> !important;
	background-color: <?php echo $WRIS_L3_Title_BgColor; ?> !important;
	opacity: 0.7 !important;
}
.desc-in  {
	font-family: <?php echo $WRIS_L3_Font_Style; ?> !important;
	color: <?php echo $WRIS_L3_Desc_Color; ?> !important;
	background-color: <?php echo $WRIS_L3_Desc_BgColor; ?> !important;
	opacity: 0.7 !important;
}

/* bullets color */
.sp-button  {
	border: 2px solid <?php echo $WRIS_L3_Navigation_Bullets_Color; ?> !important;
}
.sp-selected-button  {
	background-color: <?php echo $WRIS_L3_Navigation_Bullets_Color; ?> !important;
}

/* pointer color - bottom */
<?php if( $WRIS_L3_Navigation_Position == "bottom") { ?>
.sp-selected-thumbnail::before {
	border-bottom: 5px solid <?php echo $WRIS_L3_Navigation_Pointer_Color; ?> !important;
}
.sp-selected-thumbnail::after {
	border-bottom: 13px solid <?php echo $WRIS_L3_Navigation_Pointer_Color; ?> !important;
}
<?php } ?>

/* pointer color - top */
<?php if( $WRIS_L3_Navigation_Position == "top") { ?>

.sp-top-thumbnails.sp-has-pointer .sp-selected-thumbnail::before {
    border-bottom: 5px solid <?php echo $WRIS_L3_Navigation_Pointer_Color; ?>;
}
.sp-top-thumbnails.sp-has-pointer .sp-selected-thumbnail::after {
    border-top: 13px solid <?php echo $WRIS_L3_Navigation_Pointer_Color; ?> !important;
}
<?php } ?>


/* full screen icon */
.sp-full-screen-button::before {
    color: <?php echo $WRIS_L3_Navigation_Color; ?> !important;
}

/* hover navigation icon color */
.sp-next-arrow::after, .sp-next-arrow::before {
	background-color: <?php echo $WRIS_L3_Navigation_Color; ?> !important;
}
.sp-previous-arrow::after, .sp-previous-arrow::before {
	background-color: <?php echo $WRIS_L3_Navigation_Color; ?> !important;
}


#example3_<?php echo $post_id; ?> .title-in {
	color: <?php echo $RISP_Slide_In_Title_Color; ?> !important;
	font-weight: bolder;
	text-align: center;
}

#example3_<?php echo $post_id; ?> .title-in-bg {
	background: rgba(255, 255, 255, 0.7); !important;
	white-space: unset !important;
	max-width: 90%;
	min-width: 40%;
	transform: initial !important;
	-webkit-transform: initial !important;
	font-size: 14px !important;
}

#example3_<?php echo $post_id; ?> .desc-in {
	color: <?php echo $RISP_Slide_In_Desc_Color; ?> !important;
	text-align: center;
}
#example3_<?php echo $post_id; ?> .desc-in-bg {
	background: rgba(<?php echo $RISP_Slide_In_Desc_BG_Color; ?>, <?php echo $RISP_BG_Color_Opacity; ?>) !important;
	white-space: unset !important;
	width: 80% !important;
	min-width: 30%;
	transform: initial !important;
	-webkit-transform: initial !important;
	font-size: 13px !important;
}

@media (max-width: 640px) {
	#example3_<?php echo $post_id; ?> .hide-small-screen {
		display: none;
	}
}

@media (max-width: 860px) {
	#example3_<?php echo $post_id; ?> .sp-layer {
		font-size: 18px;
	}
	
	#example3_<?php echo $post_id; ?> .hide-medium-screen {
		display: none;
	}
}
/* Custom CSS */
<?php echo $WRIS_L3_Custom_CSS; ?>
</style>
<?php  if($WRIS_L3_Slide_Title == 1) { ?>
<h3 class="uris-slider-title"><?php echo get_the_title( $post_id ); ?> </h3>
<?php } ?>
<div id="example3_<?php echo $post_id; ?>" class="slider-pro">
	<!---- slides div start ---->
	<div class="sp-slides">
		<?php 
		foreach($RPGP_AllPhotosDetails as $RPGP_SinglePhotoDetails) {
		$Title = $RPGP_SinglePhotoDetails['rpgp_image_label'];
		$Desc = $RPGP_SinglePhotoDetails['rpgp_image_desc'];
		$Url = $RPGP_SinglePhotoDetails['rpgp_image_url'];
		$i++;
		?>
		<div class="sp-slide">
			<img class="sp-image" alt="<?php echo esc_url($Title); ?>" src="" 
				data-src="<?php echo esc_url($Url); ?>"
				data-small="<?php echo esc_url($Url); ?>"
				data-medium="<?php echo esc_url($Url); ?>"
				data-large="<?php echo esc_url($Url); ?>"
				data-retina="<?php echo esc_url($Url); ?>"/>

			<?php if($Title != "") { ?>
			<p class="sp-layer sp-white sp-padding title-in title-in-bg hide-small-screen" 
				data-position="centerCenter"
				data-vertical="-14%"
				data-show-transition="left" data-show-delay="500">
				<?php if(strlen(esc_html($Title)) > 100 ) echo substr(esc_html($Title),0,100); else echo esc_html( $Title ); ?>
			</p>
			<?php } ?>

			<?php if($Desc != "") { ?>
			<p class="sp-layer sp-black sp-padding desc-in desc-in-bg hide-medium-screen" 
				data-position="centerCenter"
				data-vertical="14%"
				data-show-transition="right" data-show-delay="500">
				<?php if(strlen(esc_html($Desc)) > 300 ) echo substr(esc_html($Desc),0,300)."..."; else echo esc_html($Desc); ?>
			</p>
			<?php } ?>
		</div>
		<?php } //end for each ?>		
	</div>
	
	<!---- slides div end ---->
	<?php 
	if($WRIS_L3_Slider_Navigation == 1) {
	?>
	<!-- slides thumbnails div start -->
	<div class="sp-thumbnails">
		<?php 
		foreach($RPGP_AllPhotosDetails as $RPGP_SinglePhotoDetails) {
			$ThumbUrl = $RPGP_SinglePhotoDetails['rpggallery_admin_thumb'];
			$j++;
			?>
			<img class="sp-thumbnail" src="<?php echo esc_url($ThumbUrl); ?>"/>
		<?php } ?>
	</div>
	<?php } ?>
	<!-- slides thumbnails div end -->
	
</div>
<?php endwhile; ?>