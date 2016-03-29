( function( $ ) {
    /* ==============================
        Site Title and Description
    ============================== */
    wp.customize('blogname',function( value ) {
        value.bind(function(newvalue) {
            $('#site-title a').html(newvalue);
        });
    });
    wp.customize('blogdescription',function( value ) {
        value.bind(function(newvalue) {
            $('#site-description').html(newvalue);
        });
    });

    /* ==============================
        Home Blog Section
    ============================== */
    wp.customize('swiftbiz_lite_home_blog_title',function( value ) {
        value.bind(function(newvalue) {
            $('#front-blog-title').html(newvalue);
        });
    });
    
    /* ==============================
        Footer Copyright Section
    ============================== */
    wp.customize('swiftbiz_lite_copyright',function( value ) {
        value.bind(function(newvalue) {
            $('#footer .third_wrapper .copyright').html(newvalue);
        });
    });

    /* ==============================
        Front Page Settings (Our Clients)
    ============================== */
    wp.customize('swiftbiz_lite_brand1_alt',function( value ) {
        value.bind(function(newvalue) {
            $('.brand1 img').attr('alt', newvalue);
            $('.brand1 a').attr('title', newvalue);
        });
    });
    wp.customize('swiftbiz_lite_brand1_url',function( value ) {
        value.bind(function(newvalue) {
            $('.brand1 a').attr('href', newvalue);
        });
    });
     wp.customize('swiftbiz_lite_brand2_alt',function( value ) {
        value.bind(function(newvalue) {
            $('.brand2 img').attr('alt', newvalue);
            $('.brand2 a').attr('title', newvalue);
        });
    });
    wp.customize('swiftbiz_lite_brand2_url',function( value ) {
        value.bind(function(newvalue) {
            $('.brand2 a').attr('href', newvalue);
        });
    });
     wp.customize('swiftbiz_lite_brand3_alt',function( value ) {
        value.bind(function(newvalue) {
            $('.brand3 img').attr('alt', newvalue);
            $('.brand3 a').attr('title', newvalue);
        });
    });
    wp.customize('swiftbiz_lite_brand3_url',function( value ) {
        value.bind(function(newvalue) {
            $('.brand3 a').attr('href', newvalue);
        });
    });
     wp.customize('swiftbiz_lite_brand4_alt',function( value ) {
        value.bind(function(newvalue) {
            $('.brand4 img').attr('alt', newvalue);
            $('.brand4 a').attr('title', newvalue);
        });
    });
    wp.customize('swiftbiz_lite_brand4_url',function( value ) {
        value.bind(function(newvalue) {
            $('.brand4 a').attr('href', newvalue);
        });
    });

} )( jQuery )