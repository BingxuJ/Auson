<?php
class Magee_Dailymotion {
    
	
	public static $args;
	private $id;
    
	/**
	 * Initiate the shortcode
	 */
    public function __construct() {
	 
	    add_shortcode( 'ms_dailymotion', array( $this,'render' ) );
	
	}
	/**
	 * Render the shortcode
	 * @param  array $args     Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string          HTML output
	 */
     function render( $args, $content = '') {
	     
		 $defaults =  Magee_Core::set_shortcode_defaults(
		     
			 array(
			     'id'                    =>'',
				 'class'                 =>'',
				 'width'                 =>'',
				 'height'                =>'',
				 'mute'                  =>'',
				 'link'                  =>'',
				 'autoplay'              =>'',
				 'loop'                  =>'',    
				 'controls'              =>'',  
			 ),$args
	     );
	    
		 extract( $defaults );
		 self::$args = $defaults;
		  if( $autoplay == 'yes'):
		    $autoplay = '1';
		 else:
		    $autoplay = '0';
	     endif;
		 if( $loop == 'yes'):
		    $loop = '1';
		 else:
		    $loop = '0';
	     endif;
		 if( $controls == 'yes'):
		    $controls = '1';
		 else:
		    $controls = '0';
	     endif;
		 if( $mute == 'yes'):
		    $mute = '1';
		 else:	 
		    $mute = '0';
		 endif; 
		 if( $link !== '') 
		 $link = strtok(basename(esc_url($link)),'_');
		 if( $width == '100%' || $width == '' &&  $height == '100%' || $height == ''):
		 $html = '<div id="dailymotion"><iframe id="'.esc_attr($id).'" class="'.esc_attr($class).'" src="http://www.dailymotion.com/embed/video/' . $link . '?autoplay='.$autoplay.'&loop='.$loop.'&controls='.$controls.'&mute='.$mute.'" frameborder="0" allowfullscreen></iframe></div>';
		 
		 $html .= "<script>     
		 var width = document.getElementById('dailymotion').clientWidth;
		 var newwidth = document.getElementsByTagName('iframe')[0].clientWidth;
		 var newheight = document.getElementsByTagName('iframe')[0].clientHeight;
		 var op = newheight/newwidth ;
		 newwidth = width;
		 newheight = newwidth*op;
		 document.getElementsByTagName('iframe')[0].setAttribute('width',newwidth);
		 document.getElementsByTagName('iframe')[0].setAttribute('height',newheight);
		            </script>";
		else:
		$html = '<div id="dailymotion"><iframe id="'.esc_attr($id).'" class="'.$uniqid.' '.esc_attr($class).'" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/' . $link . '?autoplay='.$autoplay.'&loop='.$loop.'&controls='.$controls.'&mute='.$mute.'" frameborder="0" allowfullscreen></iframe></div>';
		endif;		   
		 return $html;
	 } 
	 
}

new Magee_Dailymotion();		 