/**
 *
 * portfolio-gallery page configuration
 *
 */

wdwt_page_settings = {
  /**
   * page width: desktop, tablet or phone
   */
  width : 'desktop',
}


/**
 *
 * resize thumbs in gallery according to sizes of their containers
 *
 */

var wdwt_gallery={  
  
  image_parent_class : 'image_list_item',
};


/**
 *
 * object to rearrange page layout
 *
 */

var wdwt_page_layout={  

   init:function (){
    wdwt_page_settings.width  = 'desktop';  
    
    if(matchMedia('only screen and (max-width : 767px)').matches){
      wdwt_page_layout.phone();   
    }
    else if (matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches){
      
      wdwt_page_layout.tablet();
    }
    else{
      wdwt_page_layout.refresh();
    }
  },

  /*refreshes layout according to screen size*/

  refresh: function (){
    //################SCREEN
    if(matchMedia('only screen and (min-width: 1025px)').matches){
      this.desktop();
    }
    //################TABLET
    if (matchMedia('only screen and (min-width: 768px) and (max-width: 1024px)').matches){
      this.tablet();
    }
    //################PHONE
    if(matchMedia('only screen and (max-width : 767px)').matches){
      this.phone(false);
    }
    this.featured_post_position();
    var content_height = jQuery("#wpadminbar").length ? jQuery(window).height() - jQuery("#wpadminbar").height() : jQuery(window).height();
    jQuery('.portfolio_gallery_wrap').css('min-height', content_height);
  },

  /*switch page layout to desktop mode*/
  desktop : function (){

    
    if(wdwt_page_settings.width=='tablet' || wdwt_page_settings.width=='phone'){
      jQuery('#back').after(jQuery('#sidebar3'));
      jQuery('#sidebar1').after(jQuery('#content'));
      jQuery('.right_container').append(jQuery('.footer_logo'));
      jQuery('.left_content').append(jQuery('#footer-bottom'));
      jQuery('#footer-bottom').css('float', 'none');
      jQuery('#footer-bottom').css('clear', 'none');
      jQuery("#top-nav ul li.addedli").remove();
    }

    this.featured_post_position();
    this.fixed_menu_width();
    
    this.fixed_menu();
    wdwt_page_settings.width  = 'desktop';
  },
  /*switch page layout to tablet mode*/
  tablet : function (){
    
    if(wdwt_page_settings.width == 'desktop'){
      jQuery('#content').after(jQuery('#sidebar1'));
      jQuery('#content').after(jQuery('#sidebar3'));
      jQuery('.right_container').append(jQuery('#footer-bottom'));
      jQuery('#footer-bottom').append(jQuery('.footer_logo'));
    }
    if(wdwt_page_settings.width=='desktop' ){
      jQuery("#top-nav >  ul  li:has(> ul),#top-nav > div > ul  li:has(> ul)").each(function(){
        var strtext=jQuery(this).children("a").html();
        var strhref=jQuery(this).children("a").attr("href");
        var strlink='<a href="'+strhref+'">'+strtext+'</a>';
        jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');

      });
      jQuery('.left_container').css('background-position', '0 0');  
    }
    
    this.fixed_menu_width();
    this.refresh_sidebar('.sidebar-container');
    this.featured_post_position();

    wdwt_page_settings.width  = 'tablet';
  },
  /*switch page layout to phone mode*/
  phone : function (full){
    
    if(wdwt_page_settings.width == 'desktop'){
      jQuery('#content').after(jQuery('#sidebar1'));
      jQuery('#content').after(jQuery('#sidebar3'));
      jQuery('.right_container').append(jQuery('#footer-bottom'));
      jQuery('#footer-bottom').append(jQuery('.footer_logo'));
      
      jQuery("#top-nav >  ul  li:has(> ul),#top-nav > div > ul  li:has(> ul)").each(function(){
        var strtext=jQuery(this).children("a").html();
        var strhref=jQuery(this).children("a").attr("href");
        var strlink='<a href="'+strhref+'">'+strtext+'</a>';
        jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');
      });
      jQuery('.left_container').css('background-position', '0 0');  
    }
    jQuery("#top-nav > div > ul  li.addedli,#top-nav > div > div > ul  li.addedli").remove();
    
    this.fixed_menu_width();
    this.refresh_sidebar('.sidebar-container');
    this.featured_post_position();
    wdwt_page_settings.width  = 'phone';
  },

   /*rearrange content of sidebar according to sidebar's width*/
   refresh_sidebar : function(sidebar){
    jQuery(sidebar).children('.clear:not(:last-child)').remove();
    var iner_elements=jQuery(sidebar).children();
    var main_width=jQuery(sidebar).width();
    var summary_width=0;
    for(i=0;i<iner_elements.length;i++){
      summary_width += jQuery(iner_elements[i]).outerWidth();
      if(summary_width >= main_width){
        jQuery(iner_elements[i]).before('<div class="clear"></div>')
        summary_width=jQuery(iner_elements[i]).outerWidth();
      }
    }
  },

  /*FEATURED POST POSITION*/
  featured_post_position : function(){
    var item_width = jQuery(".image_list_item ").eq(0).outerWidth(true);
    var parent_width = jQuery(".image_list_item ").parent().width();
    var count_in_line = Math.round(parent_width/item_width);
    var position = jQuery("#right_middle").data("pos");
    var thumbs = jQuery(".image_list_item ");
    var index_after_thumb = thumbs.length  > count_in_line * (position-1) ? count_in_line * (position-1) : thumbs.length;
    if(thumbs.length  > count_in_line * (position-1)){
      thumbs.eq(index_after_thumb).before( jQuery("#right_middle"));
    }
    else{
      thumbs.eq(thumbs.length-1).after(jQuery("#right_middle"));
    }
    
  },
  /*Fixed Menu*/
  fixed_menu : function(){
    var height = 0;
    var length = 0;
    if(jQuery("#wpadminbar").length) {
      var fixed_top = 32;
    } else {
      var fixed_top = 0;
    }
    var lastScrollTop = 0;
    if(!jQuery('.left_container').hasClass("fixed_menu")) {
      return ;
    }
    
    if(wdwt_page_settings.width != "desktop"){

      jQuery('.left_content').removeAttr("style");
      return;
    }
    
     
  if((jQuery('.left_content').height() < jQuery('.right_container').height() ) || 
    (jQuery('.left_content').height() >= jQuery('.right_container').height() ) && jQuery('.left_content').css('position') == 'fixed') { //fix for the case when left is short enough, but becomes larger after submenu open

    length = jQuery('.left_container').height() - jQuery('.left_content').height() + jQuery('.left_container').offset().top;
    if(jQuery(window).height() > jQuery('.left_content').height()) {
    
      if (jQuery(window).scrollTop() > length) {
        jQuery('.left_content').css({
          'position': 'absolute',
          'bottom': '0',
          'width': '100%',
          'top': 'auto'
        });
      } else {
        
        jQuery('.left_content').css({
          'position': 'fixed',
          'bottom': 'auto' , //jQuery(window).height() - fixed_top - jQuery('.left_content').height(),
          'top': /*'auto',*/ fixed_top + 'px',
          'width' : jQuery('.left_container').width()
        });
        
      }
    }else {
       var st = jQuery(window).scrollTop();

       if (st > lastScrollTop){
       //DOWN
         if (jQuery(window).scrollTop() + jQuery(window).height() >= jQuery('.left_content').height()+jQuery('.left_content').offset().top 
          || jQuery(window).scrollTop() + jQuery(window).height() >= jQuery('.right_container').height()) {
          jQuery('.left_content').css({
            'position': 'fixed',
            'top': 'auto',
            'bottom': '0',
            'width' : jQuery('.left_container').width()
          });
        }
        if(parseFloat(jQuery('.left_content').css("top")) == fixed_top && jQuery('.left_content').css("position") == 'fixed') {
          jQuery('.left_content').css({
            'position': 'absolute',
            'width': '100%',
            'top': st
          });
        }
       } else {
       //UP
        if (jQuery(window).scrollTop() < parseFloat(jQuery('.left_content').css("top"))) {
          jQuery('.left_content').css({
            'position': 'fixed',
            'top': fixed_top,
            'bottom': 'auto',
            'width' : jQuery('.left_container').width()
          });
        }
        if(jQuery('.left_content').css("bottom") == "0px" && jQuery('.left_content').css("position") == "fixed") {
          jQuery('.left_content').css({
            'position': 'absolute',
            'bottom': 'auto',
            'width': '100%',
            'top': st
          });
        }
       }
    }
    lastScrollTop = st;
  }
  if(jQuery('.left_content').css('position') == 'fixed' ){
    
   jQuery('.left_container').css('background-position', '0 '+jQuery(window).scrollTop() + 'px');
  }
  else{
    var bg_shift = jQuery(window).scrollTop() - jQuery('.left_container').offset().top;
    jQuery('.left_container').css('background-position', '0 '+ bg_shift + 'px');  
  }
    
  },
  
  fixed_menu_width : function(){
    if(jQuery('.left_content').css("position") == "fixed"){
      jQuery('.left_content').width(jQuery('.left_container').width());
    }
    if(jQuery('.left_content').css("position") == "fixed" && !matchMedia('only screen and (min-width:1025px)').matches){
      jQuery('.left_content').css({
        'position': 'static',
        'width' : '100%'
      });
    }
  },

  handle_new_elements : function(arrayOfNewElems){
    wdwt_loaded = 0;
    jQuery(arrayOfNewElems).css('opacity','0');
    jQuery(arrayOfNewElems).animate({ opacity: 1 },800);

    wdwt_number = arrayOfNewElems.length;

    jQuery(arrayOfNewElems).each(function (){
      jQuery(this).error(function() {
        jQuery(this).height(100);
        jQuery(this).width(100);
        if (++wdwt_loaded == wdwt_number) {
          //wdwt_page_layout.init();
          wdwt_page_layout.refresh();
          /*reset for the next pagination*/
          wdwt_loaded = 0;
        }
      });
      //jQuery(this).attr('src', img_src);
    });
    /*update featured post position*/
    wdwt_page_layout.featured_post_position();

    jQuery('.da-thumbs > div:not(.da-empty)').hoverdir();
    jQuery('.do_nothing').click(function(){
      return false;
    });
      
  }

}
/*
jQuery(window).load(function(){
  if(!jQuery("body").hasClass("phone") &&  !jQuery("body").hasClass("tablet")){
    wdwt_page_layout.refresh();
  }
});
*/
jQuery(document).ready(function(){
/*wait for images*/
  wdwt_page_layout.init();
  jQuery(window).scroll(function () {
    wdwt_page_layout.fixed_menu();
  });
  wdwt_number = jQuery("."+wdwt_gallery.image_parent_class+" >img").length;
  wdwt_loaded = 0;


  jQuery('.do_nothing').click(function(){
    return false;
  });
//var previus_view=document.getElementById('top_posts_web').innerHTML;
  
  
  
    
    
  /*infinite scroll for front page*/

  jQuery('.image_list_top').infinitescroll({
    navSelector  : "div.page-navigation",            
    nextSelector : "div.page-navigation a:first",    
    itemSelector : ".image_list_item",          
    debug        : false,                        
    loadingImg   : "/inc/images/loading.gif",          
    loadingText  : "Loading more posts",      
    animate      : false,      
    extraScrollPx: 0,      
    donetext     : "All posts are loaded" ,
    errorCallback: function(){},
    localMode    : false
    },
    function(arrayOfNewElems){
      wdwt_page_layout.handle_new_elements(arrayOfNewElems);
  });
  

/*infinite scroll for search results page*/

  jQuery('.blog.search-page .image_list_top').infinitescroll({
    navSelector  : "nav.page-navigation",            
    nextSelector : "nav.page-navigation a:first",    
    itemSelector : ".SearchPost",          
    debug        : false,                        
    loadingImg   : "/inc/images/loading.gif",          
    loadingText  : "Loading more posts",      
    animate      : false,      
    extraScrollPx: 0,      
    donetext     : "All posts are loaded" ,
    errorCallback: function(){},
    localMode    : false
    },
    function(arrayOfNewElems){  
      
      wdwt_page_layout.handle_new_elements(arrayOfNewElems);
  });

  /*infinite scroll for portfolio page*/
/*
  jQuery('.blog.page-gallery .gallery_main_div').infinitescroll({
    navSelector  : "nav.page-navigation",            
    nextSelector : "nav.page-navigation a:first",    
    itemSelector : ".GalleryPost",          
    debug        : false, 
    loadingImg   : "/inc/images/loading.gif",          
    loadingText  : "Loading more posts",      
    animate      : false,      
    extraScrollPx: 0,      
    donetext     : "All posts are loaded" ,
    errorCallback: function(){},
    localMode    : false
    },
    function(arrayOfNewElems){  
      wdwt_page_layout.handle_new_elements(arrayOfNewElems);
  });
*/


      
});


jQuery(window).on( "load", function(){

  /*resize left container if images are loaded*/
  if(wdwt_page_settings.width == 'desktop'){
    wdwt_page_layout.refresh();
  }

  /* infinitescroll trigger */
  /*turned on only after all the images are loaded*/
  if(jQuery(window).height()>=jQuery('.right_container').height()){
    //jQuery('body').css({'overflow-y':'scroll'});
    if(jQuery('.image_list_top').length){
      jQuery('.image_list_top').infinitescroll('scroll'); 
    }
    if(jQuery('.blog.search-page .image_list_top').length){
      jQuery('.blog.search-page .image_list_top').infinitescroll('scroll');
    }
    
    /*
    if(jQuery('.blog.page-gallery .gallery_main_div').length){
      jQuery('.blog.page-gallery .gallery_main_div').infinitescroll('scroll');
    }
    */
    
  }

});


jQuery(window).resize(function(){
    wdwt_page_layout.refresh();
});



/*other functions*/

/*why needed? ttt!!!*/
function sliderSize(sHeight) {
    jQuery("#slider-wrapper").css('height',sHeight);
}