jQuery( document ).ready( function( $ ){

//    $('#customize-header-actions').append('<a class="button button-primary">Upgrade to Pro</a>');

    $('#customize-info .preview-notice').html('<a class="button button-primary" href="http://smartcatdesign.net/preview/athena/" target="_BLANK">Upgrade to Athena Pro</a>');
    $('#customize-info .preview-notice').append('<p style="color: #cc0000">The pro version includes more skin colors, the ability to add more slides in the slider, more font options, an animated Ajax contact form, testimonials carousel, FAQs, Photo Gallery and more!</p>');

    $( '#customize-control-theme_color input[type=radio]' ).each( function() {

        var selector = $(this);
        
//        selector.css({ display: 'none' });

        if( selector.val()  === 'green' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #36B3A8"></span>')

        }

        if( selector.val()  === 'blue' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #5dade2"></span>')

        }

        if( selector.val()  === 'red' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #E74C3C"></span>')

        }

        if( selector.val()  === 'pink' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #e85387"></span>')

        }
        
        if( selector.val()  === 'yellow' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #f1c40f"></span>')

        }
        
        if( selector.val()  === 'darkblue' ) {

            selector.parent('label').append('<span class="theme-color" style="background: #34495e"></span>')

        }

    });
});