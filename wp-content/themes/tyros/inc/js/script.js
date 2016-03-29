/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {
    
    var $container = $('.item-blog');
    $container.imagesLoaded(function () {
        $container.masonry({
            itemSelector: '.blog-roll',
        }).masonry('reloadItems').masonry();
    });    
    
    $('.site-cta').css({visibility:'hidden'});
    $(window).scroll(function(){
        
        if( $('.site-cta').scrollTop() <= ( $(window).height() - 300 ) ){
            $('.site-cta').css({visibility:'visible'}).addClass('animated slideInUp');
        }
        
    });    
    $('body').on('touchstart', function () {
        if ($('.site-cta').scrollTop() <= $(window).height()) {
            $('.site-cta').css({visibility: 'visible'}).addClass('animated fadeInUp');
        }
    });    
    
    
    $('.site-branding').sticky({
        topSpacing:0,
        wrapperClassName: 'smartcat-menu-wrapper',
        responsiveWidth: true,
        center:true
    });
    
//    if( ! $('.button').hasClass('button-primary') ) {
        $('.button').addClass('btn btn-primary').removeClass('button');
//    }
    
    $('.avenue-sidebar .product_list_widget').removeClass('product_list_widget');
    
    $(".product_list_widget,.homepage-content").owlCarousel({
        items: 4,
        autoPlay : false,
        stopOnHover: false,
        lazyLoad: true,
        lazyFollow: true,
        LazyEffect: 'fade',
        pagination: true,
        navigation: false,
        
    });
    //--Match CTA Boxes height
    matchColHeights('.site-cta');
    
    $('.site-cta').hover( function() {
        $('.fa', this).addClass('hover');
    }, function(){
        $('.fa', this).removeClass('hover');
    });
    
    $('#tasty-mobile-toggle .fa').click(function(){
        var clicker = $(this);
        
        clicker.toggleClass('active');
        $('.menu', '#tasty-mobile-toggle').slideToggle(400);
        
    });
    
    //------------------- Match Height Function
    function matchColHeights(selector) {
        var maxHeight = 0;
        $(selector).each(function() {
            var height = $(this).height();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });
        $(selector).height(maxHeight);
    }
    
    function resize_slider() {
        var w = $('#main-slider').width();
        $('#slider_container,#slider_container > div').width(w);
    }

    $('.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    $('.menu-toggle').html('<i class="fa fa-bars fa-lg"></i>');
    
});