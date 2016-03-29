//scroll js			
jQuery().waypoint && jQuery("body").imagesLoaded(function () {
         jQuery(".animate_afc, .animate_afl, .animate_afr, .animate_aft, .animate_afb, .animate_wfc, .animate_hfc, .animate_rfc, .animate_rfl, .animate_rfr").waypoint(function () {
             if (!jQuery(this).hasClass("animate_start")) {
                var e = jQuery(this);
                 setTimeout(function () {
                     e.addClass("animate_start")
                 }, 20)
             }
        }, {
             offset: "85%",
             triggerOnce: !0
         })
     });
	// photobos js
		jQuery('.enima_photo_gallery').photobox('.photobox_a');
		// or with a fancier selector and some settings, and a callback:
		jQuery('.enima_photo_gallery').photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
		function imageLoaded(){
			console.log('image has been loaded...');
		}
		
		//scolltop
		jQuery(document).ready(function(){
	jQuery('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = jQuery(target);

	    jQuery('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 2000, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});