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


<!-- 
  This is function sliding bar
-->
<?php get_template_part('home','slideshow'); ?>


<!--
  This is function selection part
-->

<div id="" class=" no-padding row">
<div class=" col-md-4" id=""><div class="img-frame rounded"><div class="img-box figcaption-middle text-center fade-in"><a target="_self" href="<?php echo get_permalink( get_page_by_title( 'Ceremony' ) ); ?>">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/functionceremony.jpg" class="feature-img">
                                                        
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                    <div class="function-selection"><h1>Ceremony</h1></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a></div></div><div class="enigma_slider_shadow"></div></div>
                                                    
<div class=" col-md-4" id=""><div class="img-frame rounded"><div class="img-box figcaption-middle text-center fade-in"><a target="_self" href="<?php echo get_permalink( get_page_by_title( 'Party' ) ); ?>">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/functionparty.jpg" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                    <div class="function-selection"><h1>Party</h1></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a></div></div><div class="enigma_slider_shadow"></div></div>
                                                    
<div class=" col-md-4" id=""><div class="img-frame rounded"><div class="img-box figcaption-middle text-center fade-in"><a target="_self" href="<?php echo get_permalink( get_page_by_title( 'Wedding' ) ); ?>">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/functionwedding.jpg" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                    <div class="function-selection"><h1>Wedding</h1></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a></div></div><div class="enigma_slider_shadow"></div></div>


</div>


<?php get_footer(); ?>