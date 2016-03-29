<?php
class Magee_Core{
	var	$conf;
	var	$popup;
	var	$params;
	var	$shortcode;
	var $popup_title;
	var	$output;
	var	$errors;
	public $magee_shortcodes ;
	public $magee_sliders ;
	
	public function __construct( $args = array() ) {
		global  $magee_shortcodes,$magee_sliders ;
		
		add_action( 'plugins_loaded', array( $this, 'init' ) );
		//add a button to the content editor, next to the media button
		//this button will show a popup that contains inline content
		add_action('media_buttons_context', array($this,'add_shortcodes_button'));
		if(is_admin()){
		add_action( 'admin_enqueue_scripts',  array($this,'admin_scripts' ));
		add_action('wp_ajax_magee_shortcodes_popup', array(&$this, 'popup') );
		add_action( 'wp_ajax_nopriv_magee_shortcodes_popup', array(&$this, 'popup') );
		
		add_action('wp_ajax_magee_shortcode_form', array(&$this, 'shortcode_form') );
		add_action( 'wp_ajax_nopriv_magee_shortcode_form', array(&$this, 'shortcode_form') );
		
		add_action('wp_ajax_magee_create_shortcode', array(&$this, 'create_shortcode') );
		add_action( 'wp_ajax_nopriv_magee_create_shortcode', array(&$this, 'create_shortcode') );
		
		add_action('wp_ajax_magee_control_button', array(&$this, 'get_control_button') );
		add_action( 'wp_ajax_nopriv_magee_control_button', array(&$this, 'get_control_button') );
				
		}else{
			add_action( 'wp_enqueue_scripts',  array($this,'frontend_scripts' ));
			
			}
		
		$this->init_shortcodes();
		
		if( file_exists( dirname(__FILE__) . '/options.php' ) )
		{
			$this->conf = dirname(__FILE__) . '/options.php';

			$this->formate_shortcode();
		}
		$this->magee_shortcodes = $magee_shortcodes;
		$this->magee_sliders = $this->sliders_meta();
		

	}
public static function init() {
	load_plugin_textdomain( 'magee-shortcodes', false,  dirname( plugin_basename( MAGEE_SHORTCODES_PATH ) ). '/languages/'  );
		
}
	
 function admin_scripts() {
	     wp_enqueue_script('thickbox');
	    wp_enqueue_style('thickbox');
	    wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style('font-awesome',  plugins_url( 'assets/font-awesome/css/font-awesome.css',MAGEE_SHORTCODES_PATH ), '', '4.4.0', false );
		wp_enqueue_style('magee-admin',  plugins_url( 'assets/css/admin.css',MAGEE_SHORTCODES_PATH ), '', MAGEE_SHORTCODES_VER, false );
        wp_enqueue_script( 'magee-admin-js',  plugins_url( 'assets/js/admin.js',MAGEE_SHORTCODES_PATH ), array( 'jquery','wp-color-picker' ),MAGEE_SHORTCODES_VER, true );
		
}
function frontend_scripts() {	
	wp_enqueue_style('font-awesome',  plugins_url( 'assets/font-awesome/css/font-awesome.css',MAGEE_SHORTCODES_PATH ), '', '4.4.0', false );
	wp_enqueue_style('bootstrap',  plugins_url( 'assets/bootstrap/css/bootstrap.min.css',MAGEE_SHORTCODES_PATH ), '', '3.3.4', false );
	wp_enqueue_style('prettyPhoto',  plugins_url( 'assets/css/prettyPhoto.css',MAGEE_SHORTCODES_PATH ), '', '', false );
	
	wp_enqueue_style('twentytwenty',  plugins_url( 'assets/css/twentytwenty.css',MAGEE_SHORTCODES_PATH ), '', '', false );
	
	wp_enqueue_style('animate',  plugins_url( 'assets/css/animate.css',MAGEE_SHORTCODES_PATH ), '', '', false );
	wp_enqueue_style('magee-shortcode',  plugins_url( 'assets/css/shortcode.css',MAGEE_SHORTCODES_PATH ), '', MAGEE_SHORTCODES_VER, false );
	wp_enqueue_script( 'bootstrap',  plugins_url( 'assets/bootstrap/js/bootstrap.min.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '3.3.4', false );
	wp_enqueue_script( 'waypoints',  plugins_url( 'assets/js/jquery.waypoints.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '2.0.5', false );
	wp_enqueue_script( 'countdown',  plugins_url( 'assets/jquery-countdown/jquery.countdown.min.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '2.0.4', false );
	wp_enqueue_script( 'easy-pie-chart',  plugins_url( 'assets/jquery-easy-pie-chart/jquery.easypiechart.min.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '2.1.7', false );
	wp_enqueue_script( 'jquery.prettyPhoto',  plugins_url( 'assets/js/jquery.prettyPhoto.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '3.1.6', false );
	
	wp_enqueue_script( 'jquery.event.move',  plugins_url( 'assets/js/jquery.event.move.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '1.3.6', false );
	wp_enqueue_script( 'jquery.twentytwenty',  plugins_url( 'assets/js/jquery.twentytwenty.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'), '', false );
		
	wp_enqueue_script( 'magee-main',  plugins_url( 'assets/js/magee-shortcodes.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'),MAGEE_SHORTCODES_VER, true );
	wp_enqueue_script( 'magee-main',  plugins_url( 'assets/js/main.js',MAGEE_SHORTCODES_PATH ), array( 'jquery'),MAGEE_SHORTCODES_VER, true );
	
	}


//action to add a custom button to the content editor
function add_shortcodes_button($context) {
  
  //path to shortcode icon
  $img =  plugins_url( 'assets/images/shortcode.png',MAGEE_SHORTCODES_PATH );
   
  //our popup's title
  $title = __('Magee Shortcodes','magee-shortcodes');

  //append the icon
  $context .= "<a class='magee_shortcodes button' title='{$title}'><img style='margin-bottom:2px' src='{$img}' />".__("Magee Shortcodes",'magee-shortcodes')."</a>";
  
  return $context;
}
	
		
/**
		 * Popup function which will show shortcode options in thickbox.
		 */
 function popup() {	
	require_once( MAGEE_SHORTCODES_DIR_PATH . '/inc/popup.php' );
	die();
		}
		
 function shortcode_form(){
     $magee_shortcodes = $this->magee_shortcodes;
	
	 if( isset($_POST['shortcode']) && isset($magee_shortcodes[$_POST['shortcode']]) ){
	      if( $magee_shortcodes[$_POST['shortcode']]['popup_title'] == 'Column Shortcode'){
		     echo '<h2 class="shortcode-name">'.$magee_shortcodes[$_POST['shortcode']]['popup_title'].'</h2>';
			 $this->popup = $_POST['shortcode'];
			 echo '<div class="column-shortcode-inner">'.self::formate_shortcode().'</div>';
			 echo '<div class="shortcode-add"><a href="#" class="child-shortcode-add">add</a></div>' ;
			 
		  }else{
			 echo '<h2 class="shortcode-name">'.$magee_shortcodes[$_POST['shortcode']]['popup_title'].'</h2>';
			 $this->popup = $_POST['shortcode'];
			 echo self::formate_shortcode();
		     }
		 }
		 
	 exit(0);
	 }
	 

function init_shortcodes() {

			foreach( glob( MAGEE_SHORTCODES_DIR_PATH . 'shortcodes/*.php' ) as $filename ) {
				require_once $filename;
			}

		}
		
		
		/**
		 * Function to get the default shortcode param values applied.
		 */
 public static function set_shortcode_defaults( $defaults, $args ) {
			
			if( ! $args ) {
				$$args = array();
			}
		
			$args = shortcode_atts( $defaults, $args );		
		
			foreach( $args as $key => $value ) {
				if( $value == '' || 
					$value == '|' 
				) {
					$args[$key] = $defaults[$key];
				}
			}

			return $args;
		
		}
	
	
	// fix shortcodes

 public static function fix_shortcodes($content){   
			$replace_tags_from_to = array (
				'<p>[' => '[', 
				']</p>' => ']', 
				']<br />' => ']',
				']<br>' => ']',
				']\r\n' => ']',
				']\n' => ']',
				']\r' => ']',
				'\r\n[' => '[',
			);

			return strtr( $content, $replace_tags_from_to );
		}
		


  public static function colourBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}

	/**
		 * Function to apply attributes to HTML tags.
	
		 */
 public static function attributes( $slug, $attributes = array() ) {

			$out = '';
			$attr = apply_filters( "magee_attr_{$slug}", $attributes );

			if ( empty( $attr ) ) {
				$attr['class'] = $slug;
			}

			foreach ( $attr as $name => $value ) {
				$out .= !empty( $value ) ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
			}

			return trim( $out );

		}
		
		
 function get_control_button(){
	 
	 echo '<div class="TB_footer" id="TB_footer"><div class="magee-shortcode-actions magee-shortcode-clearfix"><a class="button button-large magee-shortcodes-home"  href="javascript:void(0);">'.__("Shortcodes List",'magee-shortcodes').'</a> <a class="button button-primary button-large magee-shortcode-insert"  href="javascript:void(0);">'.__("Insert shortcode",'magee-shortcodes').'</a></div></div>';
	 exit(0);
	 }

 function create_shortcode(){
	 $magee_shortcodes = $this->magee_shortcodes;
	
	 $shortcode = '';

	if( isset( $magee_shortcodes ) && is_array( $magee_shortcodes ) && isset($_POST['shortcode']) )
		{
			
			$popup     = $_POST['shortcode'];
			
			$params    = $magee_shortcodes[$popup]['params'];
			
			$shortcode = $magee_shortcodes[$popup]['shortcode'];

			$attrs     = array();
			if( isset( $_POST['attr'] ) ):
			foreach( $_POST['attr'] as $attr){
				$attrs[str_replace('magee_','',$attr['name'])] = $attr['value'];
				}
				
			foreach( $params as $pkey => $param )
			{
			
				if( isset($attrs[$pkey] )){
					
					$shortcode = str_replace('{{'.$pkey.'}}',$attrs[$pkey],$shortcode);
					
					}else{
						$shortcode = str_replace('{{'.$pkey.'}}','',$shortcode);
						}
			}
			endif;
			
			if( $_POST['shortcode'] == 'column' ):
			
			   if( count($_POST['attr'])>6){
			   
			      $common = array_slice($_POST['attr'],count($_POST['attr'])-2,2) ;
                  array_splice($_POST['attr'],count($_POST['attr'])-2,2);
                  $loop = array_chunk($_POST['attr'],4);
			      $i = '';
				  $copyshortcode = '';
				  for( $i=0;$i<count($loop);$i++){
				   $cparams = $magee_shortcodes['column']['child_shortcode']['params'];
			
			       $cshortcode = $magee_shortcodes['column']['child_shortcode']['shortcode'];
			       $attrs = array();
				   $perattr = array_merge($loop[$i],$common); 
				   
				   foreach( $perattr as $attr){ 
			   
				   $attrs[str_replace('magee_','',$attr['name'])] = $attr['value'];
										  }
				   foreach( $cparams as $cpkey => $cparam )
				   {
				
					if( isset($attrs[$cpkey] )){
						
						$cshortcode = str_replace('{{'.$cpkey.'}}',$attrs[$cpkey],$cshortcode);
						
						}else{
							$cshortcode = str_replace('{{'.$cpkey.'}}','',$cshortcode);
						}
					}
				    $copyshortcode .= $cshortcode;
				  }  
				  $shortcode = str_replace('{{child_shortcode}}',$copyshortcode,$shortcode);
				
			   }else{
			   $cparams = $magee_shortcodes['column']['child_shortcode']['params'];
			
			   $cshortcode = $magee_shortcodes['column']['child_shortcode']['shortcode'];
			   $attrs = array();
			   foreach( $_POST['attr'] as $attr){ 
			   
			   $attrs[str_replace('magee_','',$attr['name'])] = $attr['value'];
			                          }
			   foreach( $cparams as $cpkey => $cparam )
			   {
			
				if( isset($attrs[$cpkey] )){
					
					$cshortcode = str_replace('{{'.$cpkey.'}}',$attrs[$cpkey],$cshortcode);
					
					}else{
						$cshortcode = str_replace('{{'.$cpkey.'}}','',$cshortcode);
					}
			    }
				$shortcode = str_replace('{{child_shortcode}}',$cshortcode,$shortcode);
			   }			
			endif;
			
		}
		$shortcode = str_replace('\\\'','\'',$shortcode);
		$shortcode = str_replace('\\"','"',$shortcode);
		$shortcode = str_replace('\\\\','\\',$shortcode);
	    echo $shortcode;
		exit();
	}

	function formate_shortcode()
	{
		$magee_shortcodes = $this->magee_shortcodes;
		
		// get config file
		require_once( $this->conf );
        $output = '';
		unset($magee_shortcodes['shortcode-generator']['params']['select_shortcode']);
	

		if( isset( $magee_shortcodes ) && is_array( $magee_shortcodes ) )
		{
			// get shortcode config stuff
			
           
			$this->params = $magee_shortcodes[$this->popup]['params'];
			$this->shortcode = $magee_shortcodes[$this->popup]['shortcode'];
			$this->popup_title = $magee_shortcodes[$this->popup]['popup_title'];

			// adds stuff for js use
			$this->append_output( "\n" . '<div id="_magee_shortcode" class="hidden">' . $this->shortcode . '</div>' );
			$this->append_output( "\n" . '<div id="_magee_popup" class="hidden">' . $this->popup . '</div>' );
            
			
			// filters and excutes params
			foreach( $this->params as $pkey => $param )
			{
				
				
				// prefix the fields names and ids with magee_
				$pkey = 'magee_' . $pkey;

				if(!isset($param['std'])) {
					$param['std'] = '';
				}


				if(!isset($param['desc'])) {
					$param['desc'] = '';
				}

				// popup form row start
				$row_start  = '<div class="param-item">' . "\n";
				$row_start .= '<div class="form-row row" class="' . $pkey . '">' . "\n";
				if($param['type'] != 'info') {
					$row_start .= '<div class="label">';
					$row_start .= '<span class="magee-form-label-title">' . $param['label'] . '</span>' . "\n";
					$row_start .= '<span class="magee-form-desc">' . $param['desc'] . '</span>' . "\n";
					$row_start .= '</div>' . "\n";
				}
				$row_start .= '<div class="field">' . "\n";

				// popup form row end
				$row_end   = '</div>' . "\n";
				$row_end   .= '</div>' . "\n";
				$row_end   .= '</div>' . "\n";

				switch( $param['type'] )
				{
					case 'text' :

						// prepare
						$output .= $row_start;
						$output .= '<input type="text" class="magee-form-text magee-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'textarea' :

						// prepare
						$output .= $row_start;;

						// Turn on the output buffer
						ob_start();

						// Echo the editor to the buffer
						wp_editor( $param['std'], $pkey, array( 'editor_class' => 'magee_tinymce', 'media_buttons' => true ) );

						// Store the contents of the buffer in a variable
						$editor_contents = ob_get_clean();

						//$output .= $editor_contents;
						$output .= '<textarea rows="10" cols="30" name="' . $pkey . '" id="' . $pkey . '" class="magee-form-textarea magee-input">' . $param['std'] . '</textarea>' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'select' :

						// prepare
						$output .= $row_start;
						$output .= '<div class="magee-form-select-field">';
						$output .= '<select name="' . $pkey . '" id="' . $pkey . '" class="magee-form-select magee-input">' . "\n";
						

						foreach( $param['options'] as $value => $option )
						{
							$selected = (isset($param['std']) && $param['std'] == $value) ? 'selected="selected"' : '';
							$output .= '<option value="' . $value . '"' . $selected . '>' . $option . '</option>' . "\n";
						}

						$output .= '</select>' . "\n";
						$output .= '</div>';
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'multiple_select' :

						// prepare
						$output .= $row_start;;
						$output .= '<select name="' . $pkey . '" id="' . $pkey . '" multiple="multiple" class="magee-form-multiple-select magee-input">' . "\n";

						if( $param['options'] && is_array($param['options']) ) {
							foreach( $param['options'] as $value => $option )
							{
								$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
							}
						}

						$output .= '</select>' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'checkbox' :

						// prepare
						$output .= $row_start;;
						$output .= '<label for="' . $pkey . '" class="magee-form-checkbox">' . "\n";
						$output .= '<input type="checkbox" class="magee-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' />' . "\n";
						$output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'uploader' :

						// prepare
						$output .= $row_start;;
						$output .= '<div class="magee-upload-container">';
						$output .= '<img src="" alt="Image" class="uploaded-image" />';
						$output .= '<input type="hidden" class="magee-form-text magee-form-upload magee-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= '<a href="' . $pkey . '" class="magee-upload-button" data-upid="' . $pkey . '">'.__('Upload','magee-shortcodes').'</a>';
						$output .= '</div>';
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'gallery' :

						if(!isset($cpkey)) {
							$cpkey = '';
						}
						
						// prepare
						$output .= $row_start;;
						$output .= '<a href="' . $cpkey . '" class="magee-gallery-button magee-shortcodes-button">'.__('Attach Images to Gallery','magee-shortcodes').'</a>';
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'iconpicker' :

						// prepare
						$output .= $row_start;
						$output .= '<div class="iconpicker">';
						$output .= '<div><input type="text" class="magee-form-text magee-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "</div>\n";
						foreach( $param['options'] as $value => $option ) {
							$output .= '<i class="fa ' . $value . '" data-name="' . $value . '"></i>';
						}
						$output .= '</div>';

						if(!isset($param['std'])) {
							$param['std'] = '';
						}

						
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'colorpicker' :

						if(!isset($param['std'])) {
							$param['std'] = '';
						}

						// prepare
						$output .= $row_start;;
						$output .= '<input type="text" class="magee-form-text magee-input wp-color-picker-field" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'info' :

						// prepare
						$output .= $row_start;;
						$output .= '<p>' . $param['std'] . "</p>\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'size' :

						// prepare
						$output .= $row_start;;
						$output .= '<div class="magee-form-group">' . "\n";
						$output .= '<label>'.__('Width','magee-shortcodes').'</label>' . "\n";
						$output .= '<input type="text" class="magee-form-text magee-input" name="' . $pkey . '_width" id="' . $pkey . '_width" value="' . $param['std'] . '" />' . "\n";
						$output  .= '</div>' . "\n";
						$output .= '<div class="magee-form-group last">' . "\n";
						$output .= '<label>'.__('Height','magee-shortcodes').'</label>' . "\n";
						$output .= '<input type="text" class="magee-form-text magee-input" name="' . $pkey . '_height" id="' . $pkey . '_height" value="' . $param['std'] . '" />' . "\n";
						$output .= '</div>' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;
					
				}     
			}

            // checks if has a child shortcode 
		    if( isset( $magee_shortcodes[$this->popup]['child_shortcode']) ){
			
			     
				// set child shortcode
				$this->cparams = $magee_shortcodes[$this->popup]['child_shortcode']['params'];
				$this->cshortcode = $magee_shortcodes[$this->popup]['child_shortcode']['shortcode'];
				
				// for js use
                $output_child  = "\n" . '<div id="_magee_cshortcode" class="hidden">' . $this->cshortcode . '</div>' ;
			    
				
			    $output .= $output_child;
				$this->append_output($output);   
			    //$this->append_output( "\n" . '<div id="_magee_popup" class="hidden">' . $this->popup . '</div>' );

				// add $prow_start to output
				//$this->append_output( $prow_start );

				foreach( $this->cparams as $cpkey => $cparam )
				{

					// prefix the fields names and ids with magee_
					$cpkey = 'magee_' . $cpkey;

					if(!isset($cparam['std'])) {
						$cparam['std'] = '';
					}


					if(!isset($cparam['desc'])) {
						$cparam['desc'] = '';
					}
                    
					// popup form row start
				    $row_start  = '<div class="param-item">' . "\n";
				    $row_start .= '<div class="form-row row" class="' . $cpkey . '">' . "\n";
				    if($cparam['type'] != 'info') {
					$row_start .= '<div class="label">';
					$row_start .= '<span class="magee-form-label-title">' . $cparam['label'] . '</span>' . "\n";
					$row_start .= '<span class="magee-form-desc">' . $cparam['desc'] . '</span>' . "\n";
					$row_start .= '</div>' . "\n";
					}
					$row_start .= '<div class="field">' . "\n";
	
					// popup form row end
					$row_end   = '</div>' . "\n";
					$row_end   .= '</div>' . "\n";
					$row_end   .= '</div>' . "\n";

					switch( $cparam['type'] )
					{
						case 'text' :

							// prepare
							$output_child  = $row_start;
							$output_child .= '<input type="text" class="magee-form-text magee-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$output_child .= $row_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;

						case 'textarea' :

							// prepare
							$output_child  = $row_start;
							$output_child .= '<textarea rows="10" cols="30" name="' . $cpkey . '" id="' . $cpkey . '" class="magee-form-textarea magee-cinput">' . $cparam['std'] . '</textarea>' . "\n";
							$output_child .= $row_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);
							
							break;

						case 'select' :

							// prepare
							$output_child  = $row_start;
							$output_child .= '<div class="magee-form-select-field">';
						    $output_child .= '<select name="' . $cpkey . '" id="' . $cpkey . '" class="magee-form-select magee-input">' . "\n";
						

						    foreach( $cparam['options'] as $value => $option )
						    {
							    $selected = (isset($param['std']) && $param['std'] == $value) ? 'selected="selected"' : '';
						  	    $output_child .= '<option value="' . $value . '"' . $selected . '>' . $option . '</option>' . "\n";
						    }

							$output_child .= '</select>' . "\n";
							$output_child .= '</div>';
							$output_child .= $row_end;
                            
							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;

						case 'checkbox' :

							// prepare
							$output_child  = $row_start;
							$output_child .= '<label for="' . $cpkey . '" class="magee-form-checkbox">' . "\n";
							$output_child .= '<input type="checkbox" class="magee-cinput" name="' . $cpkey . '" id="' . $cpkey . '" ' . ( $cparam['std'] ? 'checked' : '' ) . ' />' . "\n";
							$output_child .= ' ' . $cparam['checkbox_text'] . '</label>' . "\n";
							$output_child .= $row_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;

						case 'uploader' :

							if(!isset($cparam['std'])) {
								$cparam['std'] = '';
							}

							// prepare
							$output_child  = $row_start;
							$output_child .= '<div class="magee-upload-container">';
							$output_child .= '<img src="" alt="Image" class="uploaded-image" />';
							$output_child .= '<input type="hidden" class="magee-form-text magee-form-upload magee-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$output_child .= '<a href="' . $cpkey . '" class="magee-upload-button" data-upid="1">Upload</a>';
							$output_child .= '</div>';
							$output_child .= $row_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;

						case 'colorpicker' :

							// prepare
							$output_child  = $crow_start;
							$output_child .= '<input type="text" class="magee-form-text magee-cinput wp-color-picker-field" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$output_child .= $crow_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;

						case 'iconpicker' :

							// prepare
							$output_child  = $crow_start;

							$output_child .= '<div class="iconpicker">';
							foreach( $cparam['options'] as $value => $option ) {
								$output_child .= '<i class="' . $value . '" data-name="' . $value . '"></i>';
							}
							$output_child .= '</div>';

							$output_child .= '<input type="hidden" class="magee-form-text magee-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$output_child .= $crow_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;

						case 'size' :

							// prepare
							$output_child  = $crow_start;
							$output_child .= '<div class="magee-form-group">' . "\n";
							$output_child .= '<label>Width</label>' . "\n";
							$output_child .= '<input type="text" class="magee-form-text magee-cinput" name="' . $cpkey . '_width" id="' . $cpkey . '_width" value="' . $cparam['std'] . '" />' . "\n";
							$output_child  .= '</div>' . "\n";
							$output_child .= '<div class="magee-form-group last">' . "\n";
							$output_child .= '<label>Height</label>' . "\n";
							$output_child .= '<input type="text" class="magee-form-text magee-cinput" name="' . $cpkey . '_height" id="' . $cpkey . '_height" value="' . $cparam['std'] . '" />' . "\n";
							$output_child .= '</div>' . "\n";
							$output_child .= $crow_end;

							// append
							$output .= $output_child;
				            $this->append_output($output);

							break;
					}
				}

			
			         
			     }
		}
		
		return $output;
		
	}
	
	function append_output( $output )
	{
		$this->output = $this->output . "\n" . $output;
	}

	// --------------------------------------------------------------------------

	function reset_output( $output )
	{
		$this->output = '';
	}

	// --------------------------------------------------------------------------

	function append_error( $error )
	{
		$this->errors = $this->errors . "\n" . $error;
	}
	
	
	
 public static function sliders_meta(){
	 
	 $magee_sliders[''] =  __( 'Select a slider', 'magee-shortcodes' );
	 $args = array( 'post_type' => 'magee_slider', 'post_status'=>'publish', 'posts_per_page' => -1 );
	 $sliders = get_posts( $args );
       foreach( $sliders as $post ) : 
       $magee_sliders[$post->ID] = $post->post_title;
       endforeach;

	wp_reset_postdata();
	return $magee_sliders;
	 }

		
	}
	