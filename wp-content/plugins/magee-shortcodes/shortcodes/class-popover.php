<?php
class Magee_Popover {

	public static $args;
    private  $id;
	private  $num;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_popover', array( $this, 'render' ) );
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
				'id' 					=>'magee-popover',
				'class' 				=>'',
				'title'					=>'',	
				'triggering_text' 		=>'',
				'trigger'				=>'click',
				'placement'				=>'top',
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		$uniqid = uniqid('popover-');
		$this->id = $id.$uniqid;
			
		$html= sprintf('<span class="%s" id="%s" data-toggle="popover" data-trigger="%s" data-placement="%s" 
		data-content="%s" data-original-title="%s" >%s</span>',$class,$id,$trigger,$placement,do_shortcode( Magee_Core::fix_shortcodes($content)),$title,$triggering_text);
		
		return $html;
	}
	
}

new Magee_Popover();