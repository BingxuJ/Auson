<?php
class Magee_Image_Compare {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_image_compare', array( $this, 'render' ) );
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
				'id' =>'',
				'class' =>'',
				'image_left' =>'',
				'image_right' =>'',
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		$unqid = uniqid( 'class-');
		$class .= $unqid;
		$html = '<div  id="'.esc_attr($id).'" class="twentytwenty-container '.esc_attr($class).'">
				  <img src="'.$image_left.'">
				  <img src="'.$image_right.'">
				</div>' ;		
		$html .= '<script>';
		$html .= 'jQuery(function($) {';
		$html .= '$(window).load(function() {
					  $(".'.$class.'").twentytwenty();
				  });';
		$html .= '});' ;			
		$html .= '</script>';		
		return $html;
	}
	
}

new Magee_Image_Compare();		