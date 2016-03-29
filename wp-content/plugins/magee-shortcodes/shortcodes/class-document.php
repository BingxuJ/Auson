<?php
class Magee_Document {

    public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_document', array( $this, 'render' ) );
	}

	/**
	 * Render the shortcode
	 * @param  array $args     Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string          HTML output
	 */
	function render( $args, $content = '') {

		$defaults =	Magee_Core::set_shortcode_defaults(
			array(
				'id' 					=>'',
				'class' 				=>'',
				'width'                 =>'',
				'height'                =>'',
				'responsive'            =>'',
				'url'                   =>'',
				'viewer'                =>'',
			), $args
		);
        extract( $defaults );
		self::$args = $defaults;
		$html = '';
		switch(esc_attr($viewer)){
		case 'google':
		$html .= '<div id="'.esc_attr($id).'" class="magee-document ' .esc_attr($class) . '" ><iframe src="http://docs.google.com/viewer?url='.esc_url($url) .'&embedded=true" width="' . esc_attr($width) . '" height="'.esc_attr($height). '" ></iframe></div>';
		break;
		case 'microsoft':
		$html .= '<div id="'.esc_attr($id).'" class="magee-document ' .esc_attr($class) . '"><iframe src="https://view.officeapps.live.com/op/embed.aspx?src='.esc_url($url) .'" width="' . esc_attr($width) . '" height="' .  esc_attr($height) . '" class="su-document' .esc_attr($class) . '" id="'.esc_attr($id).'"></iframe></div>';
		break;
		}
		
		if($responsive == 'yes'):
		$html .= "<script>";
		$html .= "var width = document.getElementsByClassName('magee-document')[0].clientWidth;           
		          if( width < '".$width."'){
				  var op = '".$height."'/'".$width."' ;
				  document.getElementsByTagName('iframe')[0].style.width = width + 'px';
				  document.getElementsByTagName('iframe')[0].style.height = op*width + 'px';
				  }             	   
				 ";
		$html .= "</script>";
		endif;
		
		return $html;
		
   }
}

new Magee_Document();		