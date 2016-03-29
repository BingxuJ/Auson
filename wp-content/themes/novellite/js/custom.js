/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */
// jQuery for page scrolling feature - requires jQuery Easing plugin
jQuery.noConflict();

jQuery(document).ready(function() {
    jQuery('ul.sf-menu').superfish();

// $fn.scrollSpeed(step, speed, easing);
//jQuery.scrollSpeed(50, 600);

//Gallery
    jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'facebook', slideshow: 3000, autoplay_slideshow: false, social_tools: false});
    jQuery(".gallery_blog:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'facebook', slideshow: 3000, autoplay_slideshow: false, social_tools: false});
    jQuery(".gallery_portfolio a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'facebook', slideshow: 3000, autoplay_slideshow: false, social_tools: false});

    jQuery('a.page-scroll').bind('click', function(event) {
        var $anchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
// Highlight the top nav as scrolling occurs
//jQuery('body').scrollspy({
//    target: '.navbar-fixed-top'
//})
jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() >= jQuery('.blackwell_slider').height()) {
        jQuery('nav').addClass('navbar-shrink');
    } else {
        jQuery('nav').removeClass('navbar-shrink');
    }
});
jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() >= jQuery('.navbar-header').height()) {
        jQuery('nav').addClass('navbar-shrink');
    } else {
        jQuery('nav').removeClass('navbar-shrink');
    }
});
// Highlight the top nav as scrolling occurs
jQuery('body').scrollspy({
    target: '.navbar-fixed-top'
})
// Closes the Responsive Menu on Menu Item Click
jQuery('.navbar-collapse ul li a').click(function() {
    jQuery('.navbar-toggle:visible').click();
});


//Flexslider
//<![CDATA[
    jQuery('.flexslider').flexslider({
        animation: "fade", //String: Select your animation type, "fade" or "slide"
        slideDirection: "horizontal", //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow: true, //Boolean: Animate slider automatically
        slideshowSpeed: 7000, //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration: 600, //Integer: Set the speed of animations, in milliseconds
        directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav: true, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav: true, //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel: false, //Boolean: Allow slider navigating via mousewheel
        prevText: "Previous", //String: Set the text for the "previous" directionNav item
        nextText: "Next", //String: Set the text for the "next" directionNav item
        pausePlay: false, //Boolean: Create pause/play dynamic element
        pauseText: 'Pause', //String: Set the text for the "pause" pausePlay item
        playText: 'Play', //String: Set the text for the "play" pausePlay item
        randomize: false, //Boolean: Randomize slide order
        slideToStart: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: true
    });
    jQuery('.bxslider').bxSlider({
      auto: true,
      autoControls: true,
      captions: true,
      mode: 'fade',
      adaptiveHeight: true
    });

//Crousel Init  
    jQuery(".carousel-listing").jCarouselLite({     //carousel settings
            visible: jQuery('#carousel-full li').length,                        // visible items
            auto: 62800,
            speed: 1000,                                    // carousel speed
            mouseWheel: true,
            circular: true,
            btnNext: ".carousel-next",                      // next button class
            btnPrev: ".carousel-prev"                       // previous button class
    });

    
// Show-hide Scroll to top & move-to-top arrow
  jQuery("body").prepend("<a id='move-to-top' class='animate hiding' href='#header'><i class='fa fa-angle-up'></i></a>");  
  var scrollDes = 'html,body';  
  /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
  if(navigator.userAgent.match(/opera/i)){
    scrollDes = 'html';
  }
  //show ,hide
       jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 100) {
                jQuery('#move-to-top').fadeIn();
            } else {
                jQuery('#move-to-top').fadeOut();
            }
        }); 
        jQuery('#move-to-top').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
    
});
