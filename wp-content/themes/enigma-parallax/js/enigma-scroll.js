jQuery(document).ready(function(){
  jQuery('#menu-parallax-menu a[href*=#]:not([href=#]), header.header a[href*=#]:not([href=#])').bind('click',function () {
    var headerHeight;
    var hash    = this.hash;
    var idName  = hash.substring(1);    // get id name
    var alink   = this;                 // this button pressed
    // check if there is a section that had same id as the button pressed
    if ( jQuery('section [id*=' + idName + ']').length > 0 && jQuery(window).width() >= 751 ){
      jQuery('.current').removeClass('current');
      jQuery(alink).parent('li').addClass('current');
    }else{
      jQuery('.current').removeClass('current');
    }
    if ( jQuery(window).width() >= 751 ) {
      headerHeight = jQuery('#main-nav').height();
    } else {
      headerHeight = 0;
    }
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top - headerHeight + 10
        }, 1200);
        return false;
      }
    }
  });
});

/* SETS THE HEADER HEIGHT */
jQuery(window).load(function(){
  setminHeightHeader();
});
jQuery(window).resize(function() {
  setminHeightHeader();
});
function setminHeightHeader() 
{
  jQuery('#main-nav').css('min-height','75px');
  jQuery('.header').css('min-height','75px');
  var minHeight = parseInt( jQuery('#main-nav').height() );
  jQuery('#main-nav').css('min-height',minHeight);
  jQuery('.header').css('min-height',minHeight);
}
/* - */


/* STICKY FOOTER */
jQuery(window).load(fixFooterBottom);
jQuery(window).resize(fixFooterBottom);

function fixFooterBottom(){

  var header      = jQuery('header.header');
  var footer      = jQuery('footer#footer');
  var content     = jQuery('.site-content > .container');

  content.css('min-height', '1px');

  var headerHeight  = header.outerHeight();
  var footerHeight  = footer.outerHeight();
  var contentHeight = content.outerHeight();
  var windowHeight  = jQuery(window).height();

  var totalHeight = headerHeight + footerHeight + contentHeight;

  if (totalHeight<windowHeight){
    content.css('min-height', windowHeight - headerHeight - footerHeight );
  }else{
    content.css('min-height','1px');
  }
}


/*** CENTERED MENU */
var callback_menu_align = function () {

  var headerWrap    = jQuery('.header');
  var navWrap     = jQuery('#menu-parallax-menu');
  var logoWrap    = jQuery('.responsive-logo');
  var containerWrap   = jQuery('.container');
  var classToAdd    = 'menu-align-center';

  if ( headerWrap.hasClass(classToAdd) ) 
  {
        headerWrap.removeClass(classToAdd);
  }
    var logoWidth     = logoWrap.outerWidth();
    var menuWidth     = navWrap.outerWidth();
    var containerWidth  = containerWrap.width();

    if ( menuWidth + logoWidth > containerWidth ) {
        headerWrap.addClass(classToAdd);
    }
    else
    {
        if ( headerWrap.hasClass(classToAdd) )
        {
            headerWrap.removeClass(classToAdd);
        }
    }
}
jQuery(window).load(callback_menu_align);
jQuery(window).resize(callback_menu_align);
