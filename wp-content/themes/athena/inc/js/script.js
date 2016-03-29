jQuery(document).ready(function ($) {

    function get_height() {

        if (jQuery(window).width() < 601) {

            return jQuery(window).height();
        } else {
            return jQuery(window).height();
        }


    }

    athena_slider();

    function athena_slider() {

        var height = get_height();

        jQuery('#athena-slider').camera({
            height: height + 'px',
            loader: 'bar',
            overlay: false,
            fx: 'simpleFade',
            pagination: false,
            thumbnails: false,
            transPeriod: 1000,
            overlayer: false,
            playPause: false,
            hover: false,
        });
    }
});

jQuery(document).ready(function ($) {

    $('#athena-featured .featured-box').click(function () {

        if( $(this).attr('data-target') && $(this).attr('data-target') != '#' ) {
            window.location.href = $(this).attr('data-target');
        }

    });


    $('.featured-box').hover(function () {

        $('.athena-icon', this).stop(true, false).animate({
            top: '-7px'

        }, 300);
        $('.athena-desc', this).stop(true, false).animate({
            top: '7px'

        }, 300);

        $('.athena-title', this).stop(true, false).animate({
            'letter-spacing': '1.5px'

        }, 300);

    }, function () {
        $('.athena-icon', this).stop(true, false).animate({
            top: '0px'

        }, 300);
        $('.athena-desc', this).stop(true, false).animate({
            top: '0px'

        }, 300);
        $('.athena-title', this).stop(true, false).animate({
            'letter-spacing': '1px'

        }, 300);
    });


    $('.athena-blog-content').imagesLoaded(function () {
        $('.athena-blog-content').masonry({
            itemSelector: '.athena-blog-post',
            gutter: 0,
            transitionDuration: 0,
        }).masonry('reloadItems');
    });

    $('#primary-menu').slicknav({
        prependTo: $('.athena-header-menu'),
        label: ''
    });

    $('.athena-search, #athena-search .fa.fa-close').click(function () {

        $('#athena-search').fadeToggle(449)

    });

    // Homepage Overlay
    $('#athena-overlay-trigger .fa').click(function () {

        var selector = $('#athena-overlay-trigger');

        if (selector.hasClass('open')) {

            $('.overlay-widget').hide();
            selector.removeClass('open animated slideInUp');

        } else {

            selector.addClass('open animated slideInUp');
            $('.overlay-widget').fadeIn(330);
        }

    });

    // scroll to top trigger
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });

    // scroll to top trigger
    $('.scroll-down').click(function () {

        $("html, body").animate({
            scrollTop: ($(window).height() - 85)
        }, 1000);

        return false;

    });



    // Parallax
    $(window).scroll(function () {

        var s = $(window).scrollTop();

        $('.parallax').css({top: (s / 3.)});

        if (s > $(window).height()) {

            $('#athena-header.frontpage').addClass('sticky animated slideInDown');

        } else {
            $('#athena-header.frontpage').removeClass('sticky animated slideInDown');
        }

    })

    // ------------
    var athenaWow = new WOW({
        boxClass: 'reveal',
        animateClass: 'animated',
        offset: 150

    });

    athenaWow.init();
    
    
});