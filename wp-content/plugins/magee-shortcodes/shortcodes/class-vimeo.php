<?php
class Magee_Vimeo {
    
	
	public static $args;
	private $id;
    
	/**
	 * Initiate the shortcode
	 */
    public function __construct() {
	 
	    add_shortcode( 'ms_vimeo', array( $this,'render' ) );
	
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
			     'type'               =>'',
			     'id'                    =>'',
				 'class'                 =>'',
				 'width'                 =>'',
				 'height'                =>'',
				 'mute'                  =>'',
				 'link'                  =>'',
				 'autoplay'        =>'',
				 'loop'            =>'',    
				 'controls'        =>'',  
				        'position'   => 'left'
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
				preg_match( '/[0-9]+/',$link,$match);
				$sid = $match[0];
				$out = "<div id=\"vimeo\" class=\"vimeo-video " .$position . "\">";
				if ($mute == 1) {
					wp_enqueue_script( 'jquery-froogaloop', 'https://f.vimeocdn.com/js/froogaloop2.min.js',
						array( 'jquery' ),
						null, // No version of the jQuery froogaloop2 Plugin.
						true 
					);
				}
				preg_match('/https/',$link,$link_match);
				
				if( $width == '100%' || $height == '100%' && $width == '' || $height == ''):
				if(implode($link_match) == ''){$out .= "<iframe id=\"player_" .$sid  ."\" class=\"" .$class ."\"  src=\"http://player.vimeo.com/video/" .$sid ."?api=1&player_id=player_" .$sid ."&title=0&amp;amp;byline=0&amp;amp;portrait=0&amp;amp;color=d01e2f&amp;amp;&loop=" .$loop. "&autoplay=" .$autoplay. "\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>" ;
				}else{
				$out .= "<iframe id=\"player_" .$sid  ."\" class=\"" .$class ."\"  src=\"https://player.vimeo.com/video/" .$sid ."?api=1&player_id=player_" .$sid ."&title=0&amp;amp;byline=0&amp;amp;portrait=0&amp;amp;color=d01e2f&amp;amp;&loop=" .$loop. "&autoplay=" .$autoplay. "\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";}
				if ($mute == 1)
				{
					$out .= '<script>';
					$out .= 'jQuery(function($) {';
					$out .= 'var vimeo_iframe = $(\'#player_' .$sid .'\')[0];';
					$out .= 'var player = $f(vimeo_iframe);';
					$out .= 'player.addEvent(\'ready\', function() {';
					$out .= 'player.api(\'setVolume\', 0);';
					$out .= '});';
					$out .= '});';
					$out .= '</script>';
				}
				$out .= '</div>';
				$out .= "<script>					        
							  var width = document.getElementById('vimeo').clientWidth;
							  var height = document.getElementById('vimeo').clientHeight;
							  var newwidth = document.getElementById('player_".$sid."').clientWidth ;
							  var newheight = document.getElementById('player_".$sid."').clientHeight ;
							  var op = newheight/newwidth;
							  newwidth = width;
							  newheight = op*newwidth;							  
							  document.getElementById('player_".$sid."').setAttribute('width',newwidth);
							  document.getElementById('player_".$sid."').setAttribute('height',newheight);												
					        </script>"; 
							
				else:
				if(implode($link_match) == ''){
				$out .= "<iframe id=\"player_" .$sid  ."\" class=\"" .$class ."\" width=\"" .$width ."\" height=\"" .$height ."\" src=\"http://player.vimeo.com/video/" .$sid ."?api=1&player_id=player_" .$sid ."&title=0&amp;amp;byline=0&amp;amp;portrait=0&amp;amp;color=d01e2f&amp;amp;&loop=" .$loop. "&autoplay=" .$autoplay. "\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";}else{
				$out .= "<iframe id=\"player_" .$sid  ."\" class=\"" .$class ."\" width=\"" .$width ."\" height=\"" .$height ."\" src=\"https://player.vimeo.com/video/" .$sid ."?api=1&player_id=player_" .$sid ."&title=0&amp;amp;byline=0&amp;amp;portrait=0&amp;amp;color=d01e2f&amp;amp;&loop=" .$loop. "&autoplay=" .$autoplay. "\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";
				}
				
				if ($mute == 1)
				{
					$out .= '<script>';
					$out .= 'jQuery(function($) {';
					$out .= 'var vimeo_iframe = $(\'#player_' .$sid .'\')[0];';
					$out .= 'var player = $f(vimeo_iframe);';
					$out .= 'player.addEvent(\'ready\', function() {';
					$out .= 'player.api(\'setVolume\', 0);';
					$out .= '});';
					$out .= '});';
					$out .= '</script>';
				}
				$out .= '</div>';
				endif;
				return $out;
		
		 	 
	 } 
	 
}

new Magee_Vimeo();