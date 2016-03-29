<?php
class Magee_Expand {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_expand', array( $this, 'render' ) );
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
				'more_icon'				=>'',	
				'more_text'				=>'',
				'less_icon'				=>'',	
				'less_text'				=>'',
				
			), $args
		);
		extract( $defaults );
		self::$args = $defaults;
        $html ='
		<div class="magee-expand '.esc_attr($class).'" id="'.esc_attr($id).'">
            <div class="expand-control"><i class="fa '.esc_attr($more_icon).'"></i> '.esc_attr($more_text).'</div>
            <div class="expand-content" style="display:none;">
                '.do_shortcode( Magee_Core::fix_shortcodes($content)).'
            </div>
        </div>' ;
		$html .='
		<script>
        jQuery(function($) {
		     
		     $(".expand-control").toggle(
			  function(){	      				  
                        $(this).html(\'<i class="fa '.esc_attr($less_icon).'"></i> '.esc_attr($less_text).'\');
                      },
			 function(){	      				  
                        $(this).html(\'<i class="fa '.esc_attr($more_icon).'"></i> '.esc_attr($more_text).'\');
                      }
			 );
			 $(".expand-control").click(function(){
			  $(".expand-content").slideToggle(500);
			 });
		   
		});
        </script>';
        return $html;
		
		
	}
}
new  Magee_Expand();		