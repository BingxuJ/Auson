jQuery(document).ready(function(){
  
  var cat_tab_is_animated = 0;
  jQuery('#top-nav li:has(> ul)').addClass('haschild');
  
  jQuery("#top-nav > ul  li.haschild,#top-nav > div > ul  li.haschild").hover(function(){
    if(matchMedia('only screen and (max-width : 767px)').matches || matchMedia('only screen and (max-width : 1024px)').matches ){return false;}
    jQuery(this).find('a').eq(0).addClass('clicked').attr('data-content','');
    var submenu = jQuery(this).find("ul").eq(0);
    timer_menui_hover=setTimeout(function(){
      submenu.slideDown(500, function(){
        if(jQuery('.left_container').hasClass("fixed_menu")){
          jQuery(window).scroll();   //fix for the case when left is short enough, but becomes larger after submenu open
        }
        
      });
      
    },300);
  },function(){
    if(matchMedia('only screen and (max-width : 767px)').matches || matchMedia('only screen and (max-width : 1024px)').matches ){return false;}
    clearTimeout(timer_menui_hover);
    jQuery(this).find('a').eq(0).removeClass('clicked').attr('data-content','');
    var submenu = jQuery(this).find("ul").eq(0);
    setTimeout(function(){
      submenu.slideUp(500, function(){
        if(jQuery('.left_container').hasClass("fixed_menu")){
          jQuery(window).scroll();  //fix for the case when left is short enough, but becomes larger after submenu open
        }
      });
      
    },300);
  });
    

    jQuery("#top-nav > ul  li.haschild > a,#top-nav > div > ul  li.haschild > a").click(function(){
      if(matchMedia('only screen and (max-width : 767px)').matches || matchMedia('only screen and (max-width : 1024px)').matches ){
      if(jQuery(this).parent().hasClass("open")){
        jQuery(this).removeClass('clicked').attr('data-content','');
        jQuery(this).parent().parent().find(".haschild ul").slideUp(500);
        jQuery(this).parent().removeClass("open");

        return false;
      }
      jQuery(this).parent().parent().find(".haschild ul").slideUp(500);
      jQuery(this).parent().parent().find(".clicked").removeClass('clicked').attr('data-content','');
      jQuery(this).parent().parent().find(".haschild").removeClass("open");
      jQuery(this).addClass('clicked').attr('data-content','');
      jQuery(this).next("ul").slideDown("fast");
      jQuery(this).parent().addClass("open");
      return false;
      }
      
      
    });
    
      jQuery("#back").on("click",".responsive_menu", function(){
      if(jQuery(".phone-menu-block").hasClass("open")){
        jQuery(".phone-menu-block").slideUp("fast", function(){
          jQuery(this).removeAttr('style');
        });
        jQuery(".phone-menu-block").removeClass("open");
      }
      else{
        jQuery(".phone-menu-block").slideDown("slow");
        jQuery(".phone-menu-block").addClass("open");
      }
    });

    /* Disable right click.*/
    if(wdwt_custom_js.wdwt_images_right_click == "1"){
      jQuery("img").bind("contextmenu", function (e) {
        return false;
      });
      jQuery("img").css('webkitTouchCallout','none');
    }

     jQuery('.GalleryPost').on('click', function(){
      
      if(wdwt_page_settings.width != 'desktop'){
        jQuery('.GalleryPost').find('.caption').hide();
        jQuery('.GalleryPost').find('.gallery-post-info').hide();
        if(!jQuery(this).find('.caption').is(":visible")){
          jQuery(this).find('.caption').show();
          jQuery(this).find('.gallery-post-info').show();
        }
      }
    
    });


});


  
