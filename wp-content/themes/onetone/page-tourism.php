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
<div>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/map.jpg" style="position:relative;" >

<b style="top:-75px; left: 285px; z-index:50;" data-tip="This is Kangaroo Island." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;"></b>

<b style="top:-770px; left: 725px; z-index:50;" data-tip="This is Adelaide City." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;"></b>

<b style="top:-580px; left: 590px; z-index:50;" data-tip="This is Port Noarlunga." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;"></b>

<b style="top:-490px; left: 555px; z-idex:50;" data-tip="This is Our Company." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;"></b>

<b style="top:-470px; left: 485px; z-index:50;" data-tip="This is Port Noarlunga." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;"></b>

<b style="top:-230px; left: 560px; z-index:50;" data-tip="This is Victor Harbor." position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px" style="position:relative; z-index:2; opacity:0;"></b>


</div>



<!--
<b style="top:50px; left:50px; z-index:50;" data-tip="OKKK;" position:absolute;>
</b>
-->
<!--
  Speech bubbles
-->
<div style="position:relative;">
</br></br>
This is for further information. Please add information.
</div>



<?php get_footer(); ?>