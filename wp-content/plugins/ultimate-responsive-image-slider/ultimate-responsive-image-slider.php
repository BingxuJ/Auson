<?php
/**
 * Plugin Name: Ultimate Responsive Image Slider
 * Version: 2.9.4.2
 * Description: Add unlimited image slides using Ultimate Responsive Image Slider in any Page and Post content to give an attractive mode to represent contents.
 * Author: Weblizar
 * Author URI: https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/
 * Plugin URI: https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/
 */ 

//Constant Variable
define("WRIS_TEXT_DOMAIN", "W_R_I_S" );
define("WRIS_PLUGIN_URL", plugin_dir_url(__FILE__));

// Apply default settings on activation
register_activation_hook( __FILE__, 'WRIS_DefaultSettingsPro' );
function WRIS_DefaultSettingsPro() {
    $DefaultSettingsProArray = serialize( array(
		//layout 3 settings
		"WRIS_L3_Slide_Title"   		=> 1,
		"WRIS_L3_Auto_Slideshow"   		=> 1,
		"WRIS_L3_Transition"   			=> 1,
		"WRIS_L3_Transition_Speed"   	=> 5000,
		"WRIS_L3_Sliding_Arrow"   		=> 1,
		"WRIS_L3_Slider_Navigation"   	=> 1,
		"WRIS_L3_Navigation_Button"   	=> 1,
		"WRIS_L3_Slider_Width"   		=> "1000",
		"WRIS_L3_Slider_Height"   		=> "500",
		"WRIS_L3_Font_Style"			=> "Arial",
		"WRIS_L3_Title_Color"   		=> "#FFFFFF",
		"WRIS_L3_Title_BgColor"   		=> "#000000",
		"WRIS_L3_Desc_Color"   			=> "#FFFFFF",
		"WRIS_L3_Desc_BgColor"  		=> "#000000",
		"WRIS_L3_Navigation_Color"  	=> "#000000",
		"WRIS_L3_Fullscreeen"  			=> 1,
		"WRIS_L3_Custom_CSS"   			=> "",

		'WRIS_L3_Slide_Order'   		=> "ASC",
		'WRIS_L3_Navigation_Position'  	=> "bottom",
		'WRIS_L3_Slide_Distance'   		=> 5,
		'WRIS_L3_Thumbnail_Style'   	=> "border",
		'WRIS_L3_Thumbnail_Width'   	=> 120,
		'WRIS_L3_Thumbnail_Height'   	=> 100,
		'WRIS_L3_Width'   				=> "custom",
		'WRIS_L3_Height'   				=> "custom",
		'WRIS_L3_Navigation_Bullets_Color' => "#000000",
		'WRIS_L3_Navigation_Pointer_Color' => "#000000",
    ));
    add_option("WRIS_Settings", $DefaultSettingsProArray);
}

// Image Crop Size Function 
add_image_size( 'rpggallery_admin_thumb', 300, 300, true ); 
add_image_size( 'rpggallery_admin_large', 500,9999 ); 

function admin_content_wpse_144936() { 
	if(get_post_type()=="ris_gallery") { ?>
		<style>
		.wlTBlock{
			background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?php echo WRIS_PLUGIN_URL.'/img/bg2.jpg'; ?>') no-repeat fixed;
			background-position: 50% 0 !important;
			padding: 27px 0 23px 0;
			margin-left: -20px;
			font-family: Myriad Pro ;
			cursor: pointer;
			text-align: center;
		}
		.wlTBlock .wlTBig{
			color: white;
			font-size: 30px;
			font-weight: bolder;
			padding: 0 0 15px 0;
		}
		.wlTBlock .wlTBig .dashicons{
			font-size: 40px;
			position: absolute;
			margin-left: -45px;
			margin-top: -10px;
		}
		.wlTBlock .WlTSmall{
			font-weight: bolder;
			color: white;
			font-size: 18px;
			padding: 0 0 15px 15px;
		}

		.wlTBlock a{
		text-decoration: none;
		}
		@media screen and ( max-width: 600px ) {
			.wlTBlock{ padding-top: 60px; margin-bottom: -50px; }
			.wlTBlock .WlTSmall { display: none; }
			
		}
		</style>
		<div class="wlTBlock ">
			<a href="https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/" target="_new">
				<div class="wlTBig"><span class="dashicons dashicons-cart"></span>Get Pro version</div>
				<div class="WlTSmall">with PRO version you get more advanced functionality and even more flexibility in settings </div>
				</a>
		</div>
		<?php
	}
}
add_action('in_admin_header','admin_content_wpse_144936');

/**
 * URIS Enqueue Scripts
 */
function URIS_Plugin_Scripts() {
	//js scripts
	wp_enqueue_script('ris-jquery-sliderPro-js', WRIS_PLUGIN_URL.'js/jquery.sliderPro.js', array('jquery'), '1.1.0', true);
	// css scripts
	wp_enqueue_style('ris-slider-css', WRIS_PLUGIN_URL.'css/slider-pro.css');
}
add_action( 'wp_enqueue_scripts', 'URIS_Plugin_Scripts' );
add_filter( 'widget_text', 'do_shortcode' );

class WRIS {

    private static $instance;
    private $admin_thumbnail_size = 150;
    private $thumbnail_size_w = 150;
    private $thumbnail_size_h = 150;
	var $counter;

    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		$this->counter = 0;
        add_action('admin_print_scripts-post.php', array(&$this, 'ris_admin_print_scripts'));
        add_action('admin_print_scripts-post-new.php', array(&$this, 'ris_admin_print_scripts'));
        add_image_size('rpg_gallery_admin_thumb', $this->admin_thumbnail_size, $this->admin_thumbnail_size, true);
        add_image_size('rpg_gallery_thumb', $this->thumbnail_size_w, $this->thumbnail_size_h, true);
        add_shortcode('rpggallery', array(&$this, 'shortcode'));
        if (is_admin()) {
			add_action('plugins_loaded', array(&$this, 'WRIS_Translate'), 1);
			add_action('init', array(&$this, 'ResponsiveImageSlider'), 1);
			
			add_action('add_meta_boxes', array(&$this, 'add_all_ris_meta_boxes'));
			add_action('admin_init', array(&$this, 'add_all_ris_meta_boxes'), 1);
			
			add_action('save_post', array(&$this, 'add_image_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'ris_settings_meta_save'), 9, 1);
			
			add_action('wp_ajax_uris_get_thumbnail', array(&$this, 'ajax_get_thumbnail_uris'));
		}
    }
	
	/**
	 * Translate Plugin
	 */
	public function WRIS_Translate() {
		load_plugin_textdomain('W_R_I_S', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
	}
	
	//Required JS & CSS
	public function ris_admin_print_scripts() {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('rpgp-media-uploader-js', WRIS_PLUGIN_URL . 'js/rpgp-multiple-media-uploader.js', array('jquery'));
		wp_enqueue_media();
		
		//custom add image box css
		wp_enqueue_style('ris-meta-css', WRIS_PLUGIN_URL.'css/ris-meta.css');
		
		//font awesome css
		wp_enqueue_style('ris-font-awesome-4', WRIS_PLUGIN_URL.'css/font-awesome/css/font-awesome.min.css');

		//tool-tip js & css
		wp_enqueue_script('ris-tool-tip-js',WRIS_PLUGIN_URL.'tooltip/jquery.darktooltip.min.js', array('jquery'));
		wp_enqueue_style('ris-tool-tip-css', WRIS_PLUGIN_URL.'tooltip/darktooltip.min.css');
		
		//color-picker css n js
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'ris-color-picker-script', plugins_url('js/wl-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
	
	// Register Custom Post Type
	public function ResponsiveImageSlider() {
		$labels = array(
			'name' => _x( 'Ultimate Responsive Image Slider', WRIS_TEXT_DOMAIN ),
			'singular_name' => _x( 'Ultimate Responsive Image Slider', WRIS_TEXT_DOMAIN ),
			'add_new' => __( 'Add New Image Slider', WRIS_TEXT_DOMAIN ),
			'add_new_item' => __( 'Add New Image Slider', WRIS_TEXT_DOMAIN ),
			'edit_item' => __( 'Edit Image Slider', WRIS_TEXT_DOMAIN ),
			'new_item' => __( 'New Image Slider', WRIS_TEXT_DOMAIN ),
			'view_item' => __( 'View Image Slider', WRIS_TEXT_DOMAIN ),
			'search_items' => __( 'Search Image Slider', WRIS_TEXT_DOMAIN ),
			'not_found' => __( 'No Image Slider found', WRIS_TEXT_DOMAIN ),
			'not_found_in_trash' => __( 'No Image Slider Found in Trash', WRIS_TEXT_DOMAIN ),
			'parent_item_colon' => __( 'Parent Image Slider:', WRIS_TEXT_DOMAIN ),
			'all_items' => __( 'All Image Sliders', WRIS_TEXT_DOMAIN ),
			'menu_name' => _x( 'UR Image Slider', WRIS_TEXT_DOMAIN ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title' ),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-format-gallery',
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => false,
			'capability_type' => 'post'
		);

        register_post_type( 'ris_gallery', $args );
        add_filter( 'manage_edit-ris_gallery_columns', array(&$this, 'ris_gallery_columns' )) ;
        add_action( 'manage_ris_gallery_posts_custom_column', array(&$this, 'ris_gallery_manage_columns' ), 10, 2 );
	}
	
	function ris_gallery_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'UR Image Slider Title' ),
            'shortcode' => __( 'UR Image Slider Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

    function ris_gallery_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[URIS id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	
	public function add_all_ris_meta_boxes() {
		add_meta_box( __('Add Images', WRIS_TEXT_DOMAIN), __('Add Images', WRIS_TEXT_DOMAIN), array(&$this, 'ris_generate_add_image_meta_box_function'), 'ris_gallery', 'normal', 'low' );
		add_meta_box( __('Apply Setting On Ultimate Responsive Image Slider', WRIS_TEXT_DOMAIN), __('Apply Setting On Ultimate Responsive Image Slider', WRIS_TEXT_DOMAIN), array(&$this, 'ris_settings_meta_box_function'), 'ris_gallery', 'normal', 'low');
		add_meta_box ( __('Copy Image Slider Shortcode', WRIS_TEXT_DOMAIN), __('Copy Image Slider Shortcode', WRIS_TEXT_DOMAIN), array(&$this, 'ris_shotcode_meta_box_function'), 'ris_gallery', 'side', 'low');
		add_meta_box('Show us some love, Rate Us', 'Show us some love, Rate Us', array(&$this, 'uris_Rate_us_meta_box_function'), 'ris_gallery', 'side', 'low');
		add_meta_box('Upgrade To Pro Version', 'Upgrade To Pro Version', array(&$this, 'uris_upgrade_to_pro_function'), 'ris_gallery', 'side', 'low');
		add_meta_box('Pro Features' , 'Pro Features', array(&$this ,'uris_pro_features'), 'ris_gallery', 'side', 'low');
	}
	
	//Rate Us Meta Box
	public function uris_Rate_us_meta_box_function() { ?>
		<style>
		.fag-rate-us span.dashicons {
			width: 30px;
			height: 30px;
		}
		.fag-rate-us span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
		}
		</style>
		<div align="center">
			<p>Please Review & Rate Us On WordPress</p>
			<a class="upgrade-to-pro-demo fag-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/support/view/plugin-reviews/ultimate-responsive-image-slider?filter=5" target="_blank">
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
			</a>
		</div>
		<div class="upgrade-to-pro" style="text-align:center;margin-bottom:10px;margin-top:10px;">
			<a href="https://wordpress.org/support/view/plugin-reviews/ultimate-responsive-image-slider?filter=5" target="_blank" class="button button-primary button-hero ">RATE US</a>
		</div>
		<?php
	}
	public function uris_upgrade_to_pro_function(){
	?>
		<div class="upgrade-to-pro-demo" style="text-align:center;margin-bottom:10px;margin-top:10px;">
			<a href="http://demo.weblizar.com/ultimate-responsive-image-slider-pro/"  target="_new" class="button button-primary button-hero">View Live Demo</a>
		</div>
		<div class="upgrade-to-pro-admin-demo" style="text-align:center;margin-bottom:10px;">
			<a href="https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/" target="_new" class="button button-primary button-hero">View Admin Demo</a>
		</div>
		<div class="upgrade-to-pro" style="text-align:center;margin-bottom:10px;">
			<a href="https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/" target="_new" class="button button-primary button-hero">Upgarde To Pro</a>
		</div>
	<?php
	}

	public	function uris_pro_features(){ ?>
		<ul style="">
			<li class="plan-feature">Responsive Design</li>
			<li class="plan-feature">5 Slider Layout</li>
			<li class="plan-feature">Unlimited Color Scheme</li>
			<li class="plan-feature">Touch Slider</li>
			<li class="plan-feature">Full Screen slideshow</li>
			<li class="plan-feature">Thumbnail Slider</li>
			<li class="plan-feature">Lightbox Integrated</li>
			<li class="plan-feature">External Link Button</li>
			<li class="plan-feature">Carousel Slider</li>
			<li class="plan-feature">All Gallery Shortcode</li>
			<li class="plan-feature">Each Gallery has Unique Shortcode</li>
			<li class="plan-feature">Drag and Drop image Position</li>
			<li class="plan-feature">Multiple Image uploader</li>
			<li class="plan-feature">Shortcode Button on post or page</li>
			<li class="plan-feature">Unique settings for each gallery</li>
			<li class="plan-feature">Auto Play Pause</li>
			<li class="plan-feature">All Browser Compatible</li>
		</ul>
		<?php 
	}

	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into photo gallery
	 */
    public function ris_generate_add_image_meta_box_function($post) { ?>
		<div id="rpggallery_container">
            <ul id="rpg_gallery_thumbs" class="clearfix">
				<?php
				/* load saved photos into ris */
				$WRIS_AllPhotosDetails = unserialize(base64_decode(get_post_meta( $post->ID, 'ris_all_photos_details', true)));
				$TotalImages =  get_post_meta( $post->ID, 'ris_total_images_count', true );
				if($TotalImages) {
					foreach($WRIS_AllPhotosDetails as $WRIS_SinglePhotoDetails) {
						$name = $WRIS_SinglePhotoDetails['rpgp_image_label'];
						$desc = $WRIS_SinglePhotoDetails['rpgp_image_desc'];						
						$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
						$url = $WRIS_SinglePhotoDetails['rpgp_image_url'];
						$url1 = $WRIS_SinglePhotoDetails['rpggallery_admin_thumb'];
						$url3 = $WRIS_SinglePhotoDetails['rpggallery_admin_large']; ?>
						<li class="rpg-image-entry" id="rpg_img">
							<a class="gallery_remove rpggallery_remove" href="#gallery_remove" id="rpg_remove_bt" ><img src="<?php echo  WRIS_PLUGIN_URL.'img/Close-icon.png'; ?>" /></a>
							<div class="rpp-admin-inner-div1" >
								<img src="<?php echo esc_url ( $url1 ); ?>" class="rpg-meta-image" alt=""  style="">
								<input type="hidden" id="unique_string[]" name="unique_string[]" value="<?php echo esc_attr( $UniqueString ); ?>" />
							</div>
							<div class="rpp-admin-inner-div2" >
								<input type="text" id="rpgp_image_url[]" name="rpgp_image_url[]" class="rpg_label_text"  value="<?php echo esc_url( $url ); ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="rpggallery_admin_thumb[]" name="rpggallery_admin_thumb[]" class="rpg_label_text"  value="<?php echo esc_url( $url1 ); ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="rpggallery_admin_large[]" name="rpggallery_admin_large[]" class="rpg_label_text"  value="<?php echo esc_url( $url3 ); ?>"  readonly="readonly" style="display:none;" />
								<p>
									<label><?php _e('Slide Title', WRIS_TEXT_DOMAIN); ?></label>
									<input type="text" id="rpgp_image_label[]" name="rpgp_image_label[]" value="<?php echo esc_attr( $name ); ?>" placeholder="<?php _e('Enter Slide Title', WRIS_TEXT_DOMAIN); ?>" class="rpg_label_text">
								</p>
								<p>
									<label><?php _e('Slide Descriptions', WRIS_TEXT_DOMAIN); ?></label>
									<textarea rows="4" cols="50" id="rpgp_image_desc[]" name="rpgp_image_desc[]" placeholder="<?php _e('Enter Slide Description', WRIS_TEXT_DOMAIN); ?>" class="rpg_label_text"><?php echo esc_attr( $desc ); ?></textarea>
								</p>
							</div>
						</li>
						<?php
					} // end of foreach
				} else {
					$TotalImages = 0;
				}
				?>
            </ul>
			
        </div>
		
		<!--Add New Image Button-->
		<div class="rpg-image-entry add_rpg_new_image" id="rpg_gallery_upload_button" data-uploader_title="Upload Image" data-uploader_button_text="Select" >
			<div class="dashicons dashicons-plus"></div>
			<p>
				<?php _e('Add New Images', WRIS_TEXT_DOMAIN); ?>
			</p>
		</div>
		<div style="clear:left;"></div>
		<input id="uris_delete_all_button" class="button" type="button" value="<?php _e('Remove All Slides', WRIS_TEXT_DOMAIN); ?>">
        <?php
    }
	
	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into photo gallery
	 */
    public function ris_settings_meta_box_function($post) { 
		require_once('ultimate-responsive-image-slider-settings-meta-box.php');
	}
	
	public function ris_shotcode_meta_box_function() { ?>
		<p><?php _e("Use below shortcode in any Page/Post to publish your slider", WRIS_TEXT_DOMAIN);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[URIS id=".get_the_ID()."]"; ?>">
		<?php 
	}	

	public function admin_thumb_uris($id) {
	$image  = wp_get_attachment_image_src($id, 'rpggallery_admin_original', true);
        $image1 = wp_get_attachment_image_src($id, 'rpggallery_admin_thumb', true);
        $image3 = wp_get_attachment_image_src($id, 'rpggallery_admin_large', true);
		$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        ?>
		<li class="rpg-image-entry" id="rpg_img">
			<a class="gallery_remove rpggallery_remove" href="#gallery_remove" id="rpg_remove_bt" ><img src="<?php echo  WRIS_PLUGIN_URL.'img/Close-icon.png'; ?>" /></a>
			<div class="rpp-admin-inner-div1" >
				<img src="<?php echo esc_url( $image1[0] ); ?>" class="rpg-meta-image" alt=""  style="">
				</div>
			<div class="rpp-admin-inner-div1" >
				<input type="text" id="rpgp_image_url[]" name="rpgp_image_url[]" class="rpg_label_text"  value="<?php echo esc_url( $image[0] ); ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="rpggallery_admin_thumb[]" name="rpggallery_admin_thumb[]" class="rpg_label_text"  value="<?php echo esc_url( $image1[0] ); ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="rpggallery_admin_large[]" name="rpggallery_admin_large[]" class="rpg_label_text"  value="<?php echo esc_url( $image3[0] ); ?>"  readonly="readonly" style="display:none;" />
				<p>
					<label><?php _e('Slide Title', WRIS_TEXT_DOMAIN); ?></label>
					<input type="text" id="rpgp_image_label[]" name="rpgp_image_label[]" placeholder="<?php _e('Enter Slide Title Here', WRIS_TEXT_DOMAIN); ?>" class="rpg_label_text">
				</p>
				<p>
					<label><?php _e('Slide Description', WRIS_TEXT_DOMAIN); ?></label>
					<textarea rows="4" cols="50" id="rpgp_image_desc[]" name="rpgp_image_desc[]" placeholder="<?php _e('Enter Slide Description Here', WRIS_TEXT_DOMAIN); ?>" class="rpg_label_text"></textarea>
				</p>
			</div>
		</li>
        <?php
    }
	
    public function ajax_get_thumbnail_uris() {
        echo $this->admin_thumb_uris($_POST['imageid']);
        die;
    }

    public function add_image_meta_box_save($PostID) {
	if(isset($PostID) && isset($_POST['rpgp_image_url'])) {
			$TotalImages = count($_POST['rpgp_image_url']);
			$ImagesArray = array();
			if($TotalImages) {
				for($i=0; $i < $TotalImages; $i++) {
					$image_label =stripslashes(sanitize_text_field($_POST['rpgp_image_label'][$i]));
					$image_desc = stripslashes(sanitize_text_field($_POST['rpgp_image_desc'][$i]));
					$url = sanitize_text_field( $_POST['rpgp_image_url'][$i] );
					$url1 = sanitize_text_field($_POST['rpggallery_admin_thumb'][$i] );
					$url3 = sanitize_text_field($_POST['rpggallery_admin_large'][$i] );
					$ImagesArray[] = array(
						'rpgp_image_label' => $image_label,
						'rpgp_image_desc' => $image_desc,
						'rpgp_image_url' => $url,
						'rpggallery_admin_thumb' => $url1,
						'rpggallery_admin_large' => $url3,
					);
				}
				update_post_meta($PostID, 'ris_all_photos_details', base64_encode(serialize($ImagesArray)));
				update_post_meta($PostID, 'ris_total_images_count', $TotalImages);
			} else {
				$TotalImages = 0;
				update_post_meta($PostID, 'ris_total_images_count', $TotalImages);
				$ImagesArray = array();
				update_post_meta($PostID, 'ris_all_photos_details', base64_encode(serialize($ImagesArray)));
			}
		}
    }
	
	//save settings meta box values
	public function ris_settings_meta_save($PostID) {
		if(isset($PostID) && isset($_POST['wl_action']) == "wl-save-settings") {

			$WRIS_L3_Slide_Title				=	 sanitize_option ( 'title', $_POST['wl-l3-slide-title'] );
			$WRIS_L3_Auto_Slideshow				=	 sanitize_option ( 'autoplay', $_POST['wl-l3-auto-slide'] );
			$WRIS_L3_Transition					=	 sanitize_option ( 'transition', $_POST['wl-l3-transition'] );
			$WRIS_L3_Transition_Speed			=	 sanitize_text_field( $_POST['wl-l3-transition-speed'] );
			$WRIS_L3_Sliding_Arrow				=	 sanitize_option ( 'arrow', $_POST['wl-l3-sliding-arrow'] );
			$WRIS_L3_Slider_Navigation			=	 sanitize_option ( 'navigation', $_POST['wl-l3-navigation'] );
			$WRIS_L3_Navigation_Button			=	 sanitize_option ( 'navigation_button', $_POST['wl-l3-navigation-button'] );
			$WRIS_L3_Slider_Width				=	 sanitize_option ( 'slider_width', $_POST['wl-l3-slider-width'] );
			$WRIS_L3_Slider_Height				=	 sanitize_option ( 'slider_height', $_POST['wl-l3-slider-height'] );
			$WRIS_L3_Font_Style					=	 sanitize_option ( 'font_style', $_POST['wl-l3-font-style'] );
			$WRIS_L3_Title_Color   				=	 sanitize_option ( 'title_color', $_POST['wl-l3-title-color'] );
			$WRIS_L3_Title_BgColor   			=	 sanitize_option ( 'title_bgcolor', $_POST['wl-l3-title-bgcolor'] );
			$WRIS_L3_Desc_Color   				=	 sanitize_option ( 'desc_color', $_POST['wl-l3-desc-color'] );
			$WRIS_L3_Desc_BgColor  				=	 sanitize_option ( 'desc_bgcolor', $_POST['wl-l3-desc-bgcolor'] );
			$WRIS_L3_Navigation_Color  			=	 sanitize_option ( 'navigation_color', $_POST['wl-l3-navigation-color'] );
			$WRIS_L3_Fullscreeen  				=	 sanitize_option ( 'fullscreen', $_POST['wl-l3-fullscreen'] );
			$WRIS_L3_Custom_CSS					=	 sanitize_text_field( $_POST['wl-l3-custom-css'] );
			$WRIS_L3_Slide_Order   				= 	 sanitize_option ( 'slide_order', $_POST['wl-l3-slide-order'] );
			$WRIS_L3_Navigation_Position   		= 	 sanitize_option ( 'navigation_position', $_POST['wl-l3-navigation-position'] );
			$WRIS_L3_Slide_Distance				= 	 sanitize_option ( 'slide_distance', $_POST['wl-l3-slide-distance'] );
			$WRIS_L3_Thumbnail_Style   			= 	 sanitize_option ( 'thumbnail_style', $_POST['wl-l3-thumbnail-style'] );
			$WRIS_L3_Thumbnail_Width   			= 	 sanitize_text_field( $_POST['wl-l3-navigation-width'] );
			$WRIS_L3_Thumbnail_Height   		= 	 sanitize_text_field( $_POST['wl-l3-navigation-height'] );
			$WRIS_L3_Width   					= 	 sanitize_text_field( $_POST['wl-l3-width'] );
			$WRIS_L3_Height   					= 	 sanitize_text_field( $_POST['wl-l3-height'] );
			$WRIS_L3_Navigation_Bullets_Color	= 	 sanitize_option ( 'navigation_bullet_color', $_POST['wl-l3-navigation-bullets-color'] );
			$WRIS_L3_Navigation_Pointer_Color	=	 sanitize_option ( 'navigation_pointer_color', $_POST['wl-l3-navigation-pointer-color'] );
			
			$WRIS_Settings_Array = serialize( array(
				'WRIS_L3_Slide_Title'  			=> 	$WRIS_L3_Slide_Title,
				'WRIS_L3_Auto_Slideshow'  		=> 	$WRIS_L3_Auto_Slideshow,
				'WRIS_L3_Transition'  			=> 	$WRIS_L3_Transition,
				'WRIS_L3_Transition_Speed'  	=> 	$WRIS_L3_Transition_Speed,
				'WRIS_L3_Sliding_Arrow'  		=> 	$WRIS_L3_Sliding_Arrow,
				'WRIS_L3_Slider_Navigation'  	=> 	$WRIS_L3_Slider_Navigation,
				'WRIS_L3_Navigation_Button'  	=> 	$WRIS_L3_Navigation_Button,
				'WRIS_L3_Slider_Width'  		=> 	$WRIS_L3_Slider_Width,
				'WRIS_L3_Slider_Height'  		=> 	$WRIS_L3_Slider_Height,
				'WRIS_L3_Font_Style'  			=> 	$WRIS_L3_Font_Style,
				'WRIS_L3_Title_Color'   		=> 	$WRIS_L3_Title_Color,
				'WRIS_L3_Title_BgColor'   		=> 	$WRIS_L3_Title_BgColor,
				'WRIS_L3_Desc_Color'   			=> 	$WRIS_L3_Desc_Color,
				'WRIS_L3_Desc_BgColor'  		=> 	$WRIS_L3_Desc_BgColor,
				'WRIS_L3_Navigation_Color' 		=> 	$WRIS_L3_Navigation_Color,
				'WRIS_L3_Fullscreeen' 			=> 	$WRIS_L3_Fullscreeen,
				'WRIS_L3_Custom_CSS'  			=> 	$WRIS_L3_Custom_CSS,
				'WRIS_L3_Slide_Order'   		=> 	$WRIS_L3_Slide_Order,
				'WRIS_L3_Navigation_Position'   => 	$WRIS_L3_Navigation_Position,
				'WRIS_L3_Slide_Distance'   		=> 	$WRIS_L3_Slide_Distance,
				'WRIS_L3_Thumbnail_Style'   	=> 	$WRIS_L3_Thumbnail_Style,
				'WRIS_L3_Thumbnail_Width'   	=> 	$WRIS_L3_Thumbnail_Width,
				'WRIS_L3_Thumbnail_Height'   	=> 	$WRIS_L3_Thumbnail_Height,
				'WRIS_L3_Width'   				=> 	$WRIS_L3_Width,
				'WRIS_L3_Height'   				=> 	$WRIS_L3_Height,
				'WRIS_L3_Navigation_Bullets_Color'      => 	$WRIS_L3_Navigation_Bullets_Color,
				'WRIS_L3_Navigation_Pointer_Color'      => 	$WRIS_L3_Navigation_Pointer_Color,
			));
			
			$WRIS_Gallery_Settings = "WRIS_Gallery_Settings_".$PostID;
			update_post_meta($PostID, $WRIS_Gallery_Settings, $WRIS_Settings_Array);
		}
	}
}

global $WRIS;
$WRIS = WRIS::forge();

/**
 * upgrade to pro
 */
add_action('admin_menu' , 'uris_pro_SettingsPage');
function uris_pro_SettingsPage() {
	function uris_upgrade_pro_function() {
		wp_enqueue_style('wl-font-awesome-4', WRIS_PLUGIN_URL.'css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style('wl-pricing-table-css', WRIS_PLUGIN_URL.'css/pricing-table.css');
		wp_enqueue_style('wl-boot-strap-admin', WRIS_PLUGIN_URL.'css/bootstrap-admin.css');
		require_once("get-uris-pro.php");
	}
	function RIS_Help_and_Support_page(){
		wp_enqueue_style('bootstrap-admin.css', WRIS_PLUGIN_URL.'css/bootstrap-admin.css');
		require_once("help_and_support.php");
	}
	add_submenu_page('edit.php?post_type=ris_gallery', 'Upgrade To Pro', 'Upgrade To Pro', 'administrator', 'ris_gallery', 'uris_upgrade_pro_function');
	add_submenu_page('edit.php?post_type=ris_gallery', 'Help and Support', 'Help and Support', 'administrator', 'RIS-Help-page', 'RIS_Help_and_Support_page');
}


/**
 * Weblizar RIS Short Code [URIS]
 */
require_once("ultimate-responsive-image-slider-short-code.php");
?>