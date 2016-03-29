var $j = jQuery.noConflict();

//MOBILE MENU -----------------------------------------
//-----------------------------------------------------
jQuery(document).ready(function(){
	'use strict';
	jQuery('#menu-main').superfish();
	jQuery('#menu-main li.current-menu-item,#menu-main li.current_page_item,#menu-main li.current-menu-parent,#menu-main li.current-menu-ancestor,#menu-main li.current_page_ancestor').each(function(){
		jQuery(this).prepend('<span class="item_selected"></span>');
	});
});

(function( $ ) {
'use strict';
	$.fn.sktmobilemenu = function(options) { 
	var defaults = {
		'fwidth': 1025
	};

	//call in the default otions
	var options = $.extend(defaults, options);
	var obj = $(this);
	return this.each(function() {
		if($(window).width() < options.fwidth) {
			sktMobileRes();
		}

		$(window).resize(function() {
			if($(window).width() < options.fwidth) {
				sktMobileRes();
			}else{
				sktDeskRes();
			}
		});
		function sktMobileRes() {
			jQuery('#menu-main').superfish('destroy');
			obj.addClass('swiftbiz-mob-menu').hide();
			obj.parent().css('position','relative');
				if(obj.prev('.sktmenu-toggle').length === 0) {
					obj.before('<div class="sktmenu-toggle" id="responsive-nav-button"></div>');
				}
			obj.parent().find('.sktmenu-toggle').removeClass('active');
		}

		function sktDeskRes() {
			jQuery('#menu-main').superfish('init');
			obj.removeClass('swiftbiz-mob-menu').show();
			if(obj.prev('.sktmenu-toggle').length) {
				obj.prev('.sktmenu-toggle').remove();
			}
		}

		obj.parent().on('click','.sktmenu-toggle',function() {
			if(!$(this).hasClass('active')){
				$(this).addClass('active');
				$(this).next('ul').stop(true,true).slideDown();
			}
			else{
				$(this).removeClass('active');
				$(this).next('ul').stop(true,true).slideUp();
			}
		});
	});
};
})( jQuery );

jQuery(document).ready(function(){
'use strict';
	jQuery('#menu-main').sktmobilemenu();
});

// ADD CARET TO PARENT MENU
jQuery(document).ready(function(){
	'use strict';
	jQuery( ".sf-with-ul" ).append( '<span class="caret"></span>' );
});
// MAKE MOB-MENU FULL WIDTH
jQuery(window).load(function(){ 
	if(jQuery('#skenav .swiftbiz-mob-menu').length > 0){		
		jQuery('#skenav .swiftbiz-mob-menu').css('width',jQuery('.row-fluid').width());
	}
});

// SEARCH FORM FOCUS
jQuery(document).ready(function ($) {
	'use strict';
	document.getElementById('s') && document.getElementById('s').focus();
});

//BACK TO TOP -----------------------------------------
//-----------------------------------------------------
jQuery(document).ready( function() {
	'use strict';
	jQuery('#back-to-top,#backtop').hide();
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-to-top,#backtop').fadeIn();
		} else {
			jQuery('#back-to-top,#backtop').fadeOut();
		}
	});
	jQuery('#back-to-top,#backtop').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
	});
});

jQuery(window).load(function() {
	'use strict';
	var max = -1;
	jQuery(".flexslider .slides li").each(function() {
		var h = jQuery(this).height();
		max = h > max ? h : max;
		jQuery('.flexslider').css({'min-height': max});
	});
});

jQuery(window).resize(function() {
	'use strict';
	var max = -1;
	jQuery(".flexslider .slides li").each(function() {
		var h = jQuery(this).height();
		max = h > max ? h : max;
		jQuery('.flexslider').css({'min-height': max});
	});
});

// Search Box
jQuery(document).ready(function($) {
	'use strict';
	
	jQuery('.search-strip, .hsearch .hsearch-close').on('click', function(){
		jQuery('.hsearch .row-fluid').slideDown( "fast", "linear" );
	});
	jQuery('.hsearch .hsearch-close').on('click', function(){
		jQuery('.hsearch .row-fluid').slideUp( "fast", "linear" );
	});

});

// Capitalize Word
jQuery(document).ready(function($) {
	jQuery(function() {
	    jQuery('.iconbox-icon h4 a,.page-content-title,h2.section_heading,top-heading,.swiftbiz-footer-title').each(function() {
	        var text = this.innerHTML;
	        var firstSpaceIndex = text.indexOf(" ");
	        if (firstSpaceIndex > 0) {
	            var substrBefore = text.substring(0,firstSpaceIndex);
	            var substrAfter = text.substring(firstSpaceIndex, text.length)
	            var newText = '<span class="first-word rootword">' + substrBefore + '</span>' + substrAfter;
	            this.innerHTML = newText;
	        } else {
	            this.innerHTML = '<span class="first-word rootword">' + text + '</span>';
	        }
	    });
	});
});

//FEATURED BOXES LAYOUTS
jQuery(document).ready(function($) {
	var a = jQuery('#featured-box .mid-box-wrap > li.mid-box').length;
	var currentli = '#featured-box .mid-box-wrap > li.mid-box';
	if(a == 1) {
   		  $(currentli).removeClass('span4');
 		  $(currentli).addClass('span12');
	} else if(a == 2) {
	     $(currentli).removeClass('span4');
 		 $(currentli).addClass('span6');
	}
});