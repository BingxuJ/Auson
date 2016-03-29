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
<img src="<?php echo get_stylesheet_directory_uri();?>/images/map.png" style="z-index:1; position:absolute;top:50px; left:50px;" >
<b style="top:50px; left:50px; z-index:50;" data-tip="OKKK;" position:relative;>
<img src="<?php echo get_stylesheet_directory_uri();?>/images/pin.png" height="42px" width="42px"></b>

</div>


<!--
  Speech bubbles
-->
<div style="z-index:2; position:relative;">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<b data-tip="Hi there!">Ipsum</b>  
ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
</div>



<?php get_footer(); ?>