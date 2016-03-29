<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query. 
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
*/
?>
<?php get_header(); ?> 
<?php      
// slider template
get_template_part( 'template/home','slider'); 

    //-- All section loop --
    $section = array('section_three_column','section_testimonial','section_woo',
    'section_blog','section_team','section_pricing','section_countactus');

        foreach(get_theme_mod('home_sorting',$section) as $value):
        get_template_part( 'template/'.$value); 
        endforeach;
?>
	<script>
    // Super Slides
    jQuery(function() {
        var $slides = jQuery('#slides_full');
        Hammer($slides[0]).on("swipeleft", function(e) {
            $slides.data('superslides').animate('next');
        });
        Hammer($slides[0]).on("swiperight", function(e) {
            $slides.data('superslides').animate('prev');
        });
        $slides.superslides({
            hashchange: false
        });
    });
    jQuery('#slides_full').superslides({
        animation: 'fade',
        slide_easing: 'easeInOutCubic',
        play:<?php if ((get_theme_mod('second_slider_image') != '') ) { ?>jQuery("#txt_slidespeed").val(),<?php } else { ?>false,<?php } ?>
    });
</script>
<?php get_footer(); ?>