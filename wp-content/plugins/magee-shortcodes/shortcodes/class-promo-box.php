<?php
class Magee_Promo_Box {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_promo_box', array( $this, 'render' ) );
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
				'style'                 =>'',
				'border_color'			=>'',
				'border_width'			=>'0',
				'border_position'		=>'left',
				'background_color'		=>'',
				'button_color'			=>'',
				'button_link'			=>'#',
				'button_icon'			=>'',
				'button_text'			=>'',
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		$uniq_class = uniqid('promo_box-');
		$class .= ' '.$uniq_class;
		$html   = '';

		$textstyle = sprintf('.'.$uniq_class.'.boxed{border-'.esc_attr($border_position).'-width: %s; background-color:%s;border-'.esc_attr($border_position).'-color:%s;}',$border_width,$background_color,$border_color);
		
		$css_style = '';
		if( $button_color !='' )
		$css_style .=sprintf('.'.$uniq_class.' .promo-action a{ background-color:%s;',$button_color);
		
		if( $style == 'boxed'){
		$class .= ' boxed';
		$html .= sprintf( '<style type="text/css" scoped="scoped">%s </style>', $textstyle);	
		}
		
		if( $css_style !='' )
		$html .= sprintf( '<style type="text/css" scoped="scoped">%s </style>', $css_style);	
		
		
		$html .= '<div class="magee-promo-box '.esc_attr($class).'" id="'.esc_attr($id).'">
                                        <div class="promo-info">
                                            '. do_shortcode( Magee_Core::fix_shortcodes($content)).'
                                        </div>
                                        <div class="promo-action">
                                            <a href="'.esc_url($button_link).'" class="btn-normal btn-lg"><i class="fa '.esc_attr($button_icon).'"></i> '.esc_attr($button_text).'</a>
                                        </div>
                                    </div>';
		
		return $html;
	}
	
}

new Magee_Promo_Box();