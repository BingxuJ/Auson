<div class="row-fluid pricing-table pricing-three-column" style="margin-top: 10px; display:block; width:100%; overflow:hidden; background:white; box-shadow: 0 0 5px hsla(0, 0%, 20%, 0.3);padding-bottom:70px">
	<div class="plan-name" style="margin-top:20px;text-align: center;">
        <h2 style="font-weight: bold;font-size: 36px;padding-top: 30px;padding-bottom: 10px;color:#D9534F;">Ultimate Responsive Image Slider </h2>
	
    </div>
	<hr>
	<div class="purchase_btn_div" style="margin-top:20px; margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 24px;padding-top: 30px;">View Support Docs or Open a Ticket</h2>	
		<a  style= "margin-right:10px; margin-left:40px; margin-top:30px; text-decoration:none;" href="https://wordpress.org/support/plugin/ultimate-responsive-image-slider" target="_new" class="btn btn-primary btn-lg">View Support Docs or Open a Ticket</a>		
	</div>
	<hr>
	
	<div style="margin-top:40px; margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 34px;padding-top: 30px;">Rate Us</h2>
		<h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px">If you are enjoying using our <b>Ultimate Responsive Image Slider Pro</b> plugin and find it useful, then please consider writing a positive feedback. Your feedback will help us to encourage and support the plugin's continued development and better user support.</h6>
		<style>
			.acl-rate-us  span.dashicons{
			width: 30px;
			height: 30px;
			}
			.acl-rate-us  span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
			}
			.acl-rate-us {
				color : #FBD229 !important;
				padding-top:5px !important;
			}
			
			.acl-rate-us span{
				display:inline-block;
			}
		</style>
		<div style="background:#EF4238;display:inline-block;">
		<a class="acl-rate-us" style="text-align:center; text-decoration: none;font:normal 30px/l; " href="https://wordpress.org/plugins/ultimate-responsive-image-slider/" target="_blank" >
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</a>
		</div>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top: 30px;">Share Us Your Suggestion</h2>
		<h6 style="font-size: 18px;padding-top: 10px;padding-bottom: 10px;line-height:50px;">If you have any suggestion or features in your mind then please share us. We will try our best to add them in this plugin. </h6>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top:10px;">Language Contribution </h2>
		<h6 style="font-size: 18px;padding-top: 20px;padding-bottom: 10px;line-height:30px; margin-left:30px;">Translate this plugin into your language <br> <strong>Question :</strong> How to convert Plguin into My Language ? <br> <strong>Answer :</strong> Contact as to lizarweb@gmail.com  for translate this plugin into your language. We will guide you in better manner.</h6>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top:10px;">Change Old Server URLs</h2>
		<form action="" method="post">
			<input type="submit" value="Change All URLs" name= "urispchangeurl" style= "margin-top:10px; margin-right:10px; margin-left:30px; background:#31B0D5; text-decoration:none;" class="btn btn-primary btn-lg">
			<h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px"><b>Note:</b> Use this option after successfully imported <b>Ultimate Responsive Image Slider</b> Plugin and Uploads directory from old server to new server.</h6>
		</form>
	</div>
</div>
<?php
if(isset($_REQUEST['urispchangeurl']) )
{		
	$all_posts = wp_count_posts( 'ris_gallery')->publish;
	$args = array('post_type' => 'ris_gallery', 'posts_per_page' =>$all_posts);
	global $URISP_Sliders;
	$URISP_Sliders = new WP_Query( $args );			

	while ( $URISP_Sliders->have_posts() ) : $URISP_Sliders->the_post();
	
		$URISP_Id = get_the_ID();
		$RISP_AllPhotosDetails = unserialize(base64_decode(get_post_meta( $URISP_Id, 'ris_all_photos_details', true)));
		$TotalImages =  get_post_meta( $URISP_Id, 'ris_total_images_count', true );
		if($TotalImages) {
			foreach($RISP_AllPhotosDetails as $RISP_SinglePhotoDetails) {
				$name = $RISP_SinglePhotoDetails['rpgp_image_label'];
				$desc = $RISP_SinglePhotoDetails['rpgp_image_desc'];						
				$url = $RISP_SinglePhotoDetails['rpgp_image_url'];
				$url1 = $RISP_SinglePhotoDetails['rpggallery_admin_thumb'];
				$url3 = $RISP_SinglePhotoDetails['rpggallery_admin_large'];
				
				$upload_dir = wp_upload_dir();
				$data = $url;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url1;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url1 = $upload_dir['baseurl']. $image_path;
				}
				
				$ImagesArray[] = array(
					'rpgp_image_label' => $name,
					'rpgp_image_desc' => $desc,
					'rpgp_image_url' => $url,
					'rpggallery_admin_thumb' => $url1,
					'rpggallery_admin_large' => $url3
				);
			}
			update_post_meta($URISP_Id, 'ris_all_photos_details', base64_encode(serialize($ImagesArray)));
			$ImagesArray="";
		}
	
	endwhile; 
}

?>