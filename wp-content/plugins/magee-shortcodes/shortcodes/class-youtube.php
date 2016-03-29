<?php
class Magee_Youtube {
    
	
	public static $args;
	private $id;
    
	/**
	 * Initiate the shortcode
	 */
    public function __construct() {
	 
	    add_shortcode( 'ms_youtube', array( $this,'render' ) );
	
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
		 $out = '';
		 
//		 $aaa = parse_url($link='https://vimeo.com/channels/staffpicks/153773597');
//		 print_r($aaa);
				$sid = substr($link,32,11);
				if( $width == '100%' || $height == '100%' && $width == '' || $height == ''):
				$out .= "<div id=\"youtube\" class=\"youtube-video " .$position . "\"><iframe id=\"".$sid."\" class=\"".$class."\" src=\"//www.youtube.com/embed/" . $sid . "?rel=0&controls=".$controls."&loop=".$loop."&playlist=".$sid."&autoplay=".$autoplay."&enablejsapi=".$mute."\" frameborder=\"0\" allowfullscreen></iframe>";
				
					$out .= "<script>var tag = document.createElement('script');";
					$out .= "var tag = document.createElement('script');";
    				$out .= "tag.src = \"//www.youtube.com/iframe_api\";";
    				$out .= "var firstScriptTag = document.getElementsByTagName('script')[0];";
    				$out .= "firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);";
					$out .= "var player;";
					$out .= "function onYouTubeIframeAPIReady() {";
					$out .= "player = new YT.Player('" .$sid ."', {";
					$out .= "events: {";
					$out .= "'onReady': onPlayerReady";
					$out .= "}";
					$out .= "});";
					$out .= "}";
					$out .= "function onPlayerReady(event) {";
					$out .= "player.playVideo();";
					$out .= "event.target.mute();";
					$out .= "}";
					$out .= "</script>";
				$out .= "</div>";
				
				    $out .= "<script>					        
							  var width = document.getElementById('youtube').clientWidth;
							  var height = document.getElementById('youtube').clientHeight;
							  var newwidth = document.getElementById('".$sid."').clientWidth ;
							  var newheight = document.getElementById('".$sid."').clientHeight ;
							  var op = newheight/newwidth;
							  newwidth = width;
							  newheight = op*newwidth;							  
							  document.getElementById('".$sid."').setAttribute('width',newwidth);
							  document.getElementById('".$sid."').setAttribute('height',newheight);												
					        </script>"; 								
				
				else:
				$out .= "<div id=\"youtube\" class=\"youtube-video " .$position . "\"><iframe id=\"".$sid."\" class=\"".$class."\" width=\"".$width."\" height=\"".$height."\" src=\"//www.youtube.com/embed/" . $sid . "?rel=0&controls=".$controls."&loop=".$loop."&playlist=".$sid."&autoplay=".$autoplay."&enablejsapi=".$mute."\" frameborder=\"0\" allowfullscreen></iframe>";
				
					$out .= "<script>var tag = document.createElement('script');";
					$out .= "var tag = document.createElement('script');";
    				$out .= "tag.src = \"//www.youtube.com/iframe_api\";";
    				$out .= "var firstScriptTag = document.getElementsByTagName('script')[0];";
    				$out .= "firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);";
					$out .= "var player;";
					$out .= "function onYouTubeIframeAPIReady() {";
					$out .= "player = new YT.Player('" .$sid ."', {";
					$out .= "events: {";
					$out .= "'onReady': onPlayerReady";
					$out .= "}";
					$out .= "});";
					$out .= "}";
					$out .= "function onPlayerReady(event) {";
					$out .= "player.playVideo();";
					$out .= "event.target.mute();";
					$out .= "}";
					$out .= "</script>";
				$out .= "</div>"; 
				endif;
				return $out;
		 		

		 
		 	 
	 } 
	 
}

new Magee_Youtube();