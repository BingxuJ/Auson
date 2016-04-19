<?php
/**
 * The template for displaying all single posts.
 *
 * @package onetone
 */

get_header(); 

$sidebar                   = isset($page_meta['page_layout'])?$page_meta['page_layout']:'none';
$left_sidebar              = isset($page_meta['left_sidebar'])?$page_meta['left_sidebar']:'';
$right_sidebar             = isset($page_meta['right_sidebar'])?$page_meta['right_sidebar']:'';
$full_width                = isset($page_meta['full_width'])?$page_meta['full_width']:'no';
$display_breadcrumb        = isset($page_meta['display_breadcrumb'])?$page_meta['display_breadcrumb']:'yes';
$display_title             = isset($page_meta['display_title'])?$page_meta['display_title']:'yes';
$padding_top               = isset($page_meta['padding_top'])?$page_meta['padding_top']:'';
$padding_bottom            = isset($page_meta['padding_bottom'])?$page_meta['padding_bottom']:'';

if( $full_width  == 'no' )
 $container = 'container';
else
 $container = 'container-fullwidth';
 
$aside          = 'no-aside';
if( $sidebar =='left' )
$aside          = 'left-aside';
if( $sidebar =='right' )
$aside          = 'right-aside';
if(  $sidebar =='both' )
$aside          = 'both-aside';

$container_css = '';
if( $padding_top )
$container_css .= 'padding-top:'.$padding_top.';';
if( $padding_bottom )
$container_css .= 'padding-bottom:'.$padding_bottom.';';

?>




<!-- map -->
<div id="map_container_div">
<img id="background_map_img" src="<?php echo get_stylesheet_directory_uri();?>/images/map.jpg" style="position:relative;" >


<b id="KI_B" style="z-index:50;" data-tip="This is Kangaroo Island." position:relative;>
<a href="https://en.wikipedia.org/wiki/Kangaroo_Island" target="_blank">
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;">
</a>
</b>

<b id="Ade_B" style="z-index:50;" data-tip="This is Adelaide City." position:relative;>
<a href="https://en.wikipedia.org/wiki/Adelaide" target="_blank">
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;">
</a>
</b>


<b id="Po_B" style="z-index:50;" data-tip="This is Port Noarlunga." position:relative;>
<a href="https://en.wikipedia.org/wiki/Port_Noarlunga,_South_Australia" target="_blank">
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;">
</a>
</b>


<b id="Co_B" style="z-index:50;" data-tip="This is Our Company." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;">
</b>


<b id="Ald_B" style="z-index:50;" data-tip="This is Aldinga Beach." position:relative;>
<a href="https://en.wikipedia.org/wiki/Aldinga_Beach,_South_Australia" target="_blank">
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;">
</a>
</b>



<b id="Vic_B" style="z-index:50;" data-tip="This is Victor Harbor." position:relative;>
<a href="https://en.wikipedia.org/wiki/Victor_Harbor,_South_Australia" target="_blank">
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;">
</a>
</b>

<center>
Sources from Wikipedia: 
<a href="https://en.wikipedia.org/wiki/Adelaide" target="_blank">Adelaide City, </a>
<a href="https://en.wikipedia.org/wiki/Kangaroo_Island" target="_blank">Kangaroo Island, </a>
<a href="https://en.wikipedia.org/wiki/Port_Noarlunga,_South_Australia" target="_blank">Port Noarlunga, </a>
<a href="https://en.wikipedia.org/wiki/Aldinga_Beach,_South_Australia" target="_blank">Aldinga Beach, </a>
<a href="https://en.wikipedia.org/wiki/Victor_Harbor,_South_Australia" target="_blank">Victor Harbor.</a>
<center>

</div>



<!--
<b style="top:50px; left:50px; z-index:50;" data-tip="OKKK;" position:absolute;>
</b>
-->
<!--
  Speech bubbles
-->




<?php get_footer(); ?>