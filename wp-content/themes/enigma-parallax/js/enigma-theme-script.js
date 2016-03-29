 //enigma  social tooltip js
 jQuery(function(){
		jQuery('li').tooltip();
		jQuery("[data-toggle='tooltip']").tooltip();
		jQuery("[data-toggle='popover']").popover();
		
		
		
    });

	/*----------------------------------------------------*/
/*	Scroll To Top Section
/*----------------------------------------------------*/
	jQuery(document).ready(function () {
	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.enigma_scrollup').fadeIn();
			} else {
				jQuery('.enigma_scrollup').fadeOut();
			}
		});
	
		jQuery('.enigma_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	
	});	

	
	jQuery.browser = {};
			(function () {
				jQuery.browser.msie = false;
				jQuery.browser.version = 0;
				if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
					jQuery.browser.msie = true;
					jQuery.browser.version = RegExp.$1;
				}
			})();

//Fade Up Menu
jQuery(window).scroll(function() {
// 100 = The point you would like to fade the nav in.
  
	if (jQuery(window).scrollTop() > 100 ){
	jQuery('.navigation_menu').addClass('nd');
 	jQuery('.header_section').addClass('fd');
    
  } else {
    jQuery('.navigation_menu').removeClass('nd');
    jQuery('.header_section').removeClass('fd');
    
 	};   	
});

function setVisibility(id) {
if(document.getElementById('bt1').value=='Hide'){
document.getElementById('bt1').value = 'Show';
document.getElementById(id).style.display = 'none';
}else{
document.getElementById('bt1').value = 'Hide';
document.getElementById(id).style.display = 'inline';
}
}

jQuery(document).ready(function() {
	var rotation=0;
	var trans = "all 0.6s ease-out";
    jQuery(document).on('click','#bt1',function(){
		rotation+=180;
		if(rotation == 360){
		rotation=0;
	}
		var rotate = "rotate(" + rotation + "deg)"
        jQuery("#bt1").css({	
         "-webkit-transform": rotate,

                "-moz-transform": rotate,

                "-o-transform": rotate,

                "msTransform": rotate,

                "transform": rotate,

                "-webkit-transition": trans,

                "-moz-transition": trans,

                "-o-transition": trans,

                "transition": trans
		});
    });
});