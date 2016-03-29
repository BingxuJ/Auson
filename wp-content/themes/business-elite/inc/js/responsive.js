var window_cur_size = 'screen';
jQuery('document').ready(function(){
  screenSize=jQuery(".container").width();
	jQuery('.cont_vat_tab ul.content > li').filter(function() { return jQuery(this).css("display")!='none'}).addClass('active');
	jQuery('#wd-categories-tabs > .tabs > li').eq(0).addClass('active');
	sliderHeight=parseInt(jQuery("#slider-wrapper").height());
	sliderWidth=parseInt(jQuery("#slider-wrapper").width());
	sliderIndex=sliderHeight/sliderWidth;
	
	if(full_width_business_elite==1)
		screenSize = jQuery("body").width() -50;
	else
		screenSize = jQuery(".container").width();
	
	
  if(jQuery("body").hasClass("phone")){
    phone();		
	}
	else if(jQuery("body").hasClass("tablet")){
    tablet();
	}
	else{
    checkMedia();}
	
	jQuery(window).resize(function(){checkMedia();});


/*in phone and tablet modes, menu links with submenu should not work*/
	jQuery("body.tablet #top-nav > div > ul li.menu-item-has-children>a").on('click', function(){
		return false;
	});
	jQuery("body.phone #top-nav > div > ul li.menu-item-has-children>a").on('click', function(){
		return false;
	});

	function checkMedia(){
		/*--------- SCREEN --*/
		if(jQuery(window).width()>=business_elite_content_area){screen();}
		/*--------- TABLET --*/
		if(jQuery(window).width()<business_elite_content_area && jQuery('body').width()>=768){tablet();}
		/*--------- PHONE --*/
		if(jQuery(window).width()<768){

      phone(false);

    }

   /*fix sticky menu after resize if layout has been changed*/
	  if(jQuery(window).scrollTop()>100 && !jQuery('#top-nav').hasClass('open')) {
			jQuery( "#header .container, #header" ).addClass('sticky_menu');
			sticky_menu();		
		}
	}
	function screen(){
		for(ii=0;ii<jQuery('.content-post').length;ii++){
			if(ii%2!=0){
				jQuery('.content-post > img').eq(ii).before(jQuery('.content-post > div').eq(2*ii+1));
			}
		}
	if(full_width_business_elite==1)
       screenSize = jQuery("body").width() -50;
    else
       screenSize = jQuery(".container").width();

    if(full_width_business_elite == 1){
      jQuery("#top-nav-list").css({'text-align':'center'});  
    }
    jQuery(".container").width(business_elite_content_area); 

		jQuery(".container").removeClass("tablet");
		jQuery(".container").removeClass("phone");
		
		jQuery("body").addClass("web");
		jQuery("body").removeClass("tablet");
		jQuery("body").removeClass("phone");

		jQuery(".phone-menu-block").removeClass("tablet");
		
		jQuery("#top-posts").addClass("web");
		jQuery("#top-posts").removeClass("tablet");
		jQuery("#top-posts").removeClass("phone");

		jQuery(".blog-post.content-posts").addClass("web");
		jQuery(".blog-post.content-posts").removeClass("tablet");
		jQuery(".blog-post.content-posts").removeClass("phone");
		
		jQuery('.container>#blog').before(jQuery('.container>#sidebar1'));
		jQuery(".container").width(jQuery("body").attr("screen-size"));
		jQuery("body > div, body header, body footer").not(".container").width("100%");
		jQuery("#blog,.blog,#top-posts .container,#header-top + .container").removeAttr('style');
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		
		sliderSize(sHeight);	
		if(window_cur_size == 'phone'){
			jQuery("#header-top .container").append(jQuery("#social"));
			jQuery("#header-middle").prepend(jQuery("#logo"));
			jQuery("#header .phone-menu-block").removeClass("container");
			jQuery("#header .phone-menu-block").css("width", '');
			jQuery("aside .sidebar-container .widget-area").removeClass("clear");
			jQuery(".top-posts-block").width("100%");
			jQuery('#content').after(jQuery('#sidebar1'));
			jQuery('.added_not_exsisted_footer_sidbar').remove();
			jQuery("#top-nav .sub-menu").css("display","");
		}
		if(window_cur_size == 'tablet' || window_cur_size == 'phone'){
			jQuery("#header").find("#menu-button-block").remove();
			jQuery("#top-nav").css({"display":"block"});

			jQuery("#top-nav > div li.addedli").remove();
			/*hide submenu in case of window resize and submenu opened*/
			jQuery("#top-nav > div li.open > ul").removeAttr('style')
			jQuery("#top-nav > div li.open").addClass('active').removeClass('open');
		}
		
		jQuery('.cont_vat_tab ul.content').height(jQuery('.cont_vat_tab ul.content > li.active').filter(function() { return jQuery(this).css("display") != "none" }).height())
		inserting_div_float_problem(jQuery('#sidebar-footer'));
		jQuery("#top-posts-contents-nav").css({"display":"none"});
	
		window_cur_size	= 'screen';
	}	
	function tablet() {	
		jQuery(".container").removeClass("phone");
		jQuery('.container>#content').after(jQuery('#sidebar1'));
		jQuery('.container>#blog').after(jQuery('#sidebar1'));
		jQuery(".container").addClass("tablet");
		
		jQuery("body").removeClass("phone");
		jQuery("body").removeClass("web");
		jQuery("body").addClass("tablet");
		
		jQuery("#top-posts").removeClass("phone");
		jQuery("#top-posts").removeClass("web");
		jQuery("#top-posts").addClass("tablet");
		
		jQuery(".blog-post.content-posts").removeClass("phone");
		jQuery(".blog-post.content-posts").removeClass("web");
		jQuery(".blog-post.content-posts").addClass("tablet");
		
		jQuery(".container").width(768);		
		jQuery(".tablet #blog,.tablet .blog,#top-posts .container.tablet,#header-top + .container.tablet").width('100%');
		
		if(window_cur_size == 'phone') {
			jQuery("#header").find("#menu-button-block").remove();
			jQuery("#top-nav").css({"display":"block"});
			jQuery("#header .phone-menu-block").removeClass("container");
			jQuery("#header .phone-menu-block").css("width", '');
			jQuery("#header-top .container").append(jQuery("#social"));
			jQuery("#header-middle").prepend(jQuery("#logo"));
			jQuery("aside .sidebar-container .widget-area").removeClass("clear");
			jQuery(".top-posts-block").width("100%");
			jQuery("#top-nav .sub-menu").css("display","");
			jQuery('.added_not_exsisted_footer_sidbar').remove();
			jQuery("#top-nav > div li.open").addClass('active').removeClass('open');
		}
		jQuery('.cont_vat_tab ul.content').height(jQuery('.cont_vat_tab ul.content > li.active').filter(function() { return jQuery(this).css("display") != "none" }).height())
		
		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		
		sliderSize(sHeight);
		
		if(window_cur_size == 'screen' ) {

			/* TABLET UNIQUE STYLES */
			jQuery("#top-nav > div > ul  li:has(> ul),#top-nav > div > div > ul  li:has(> ul)").each(function() {
				var strtext=jQuery(this).children("a").html();
				var strhref=jQuery(this).children("a").attr("href");
				var strlink='<a href="'+strhref+'">'+strtext+'</a>';
				jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');
				jQuery(this).find('.addedli a').each(function(){
			    menu_elem = this;
			    wdwt_scrollto_menuitem(menu_elem); 
			  });
			});
			window_cur_size	= 'tablet';
		}
	}	
		
	function phone(full) {
		jQuery("#header .phone-menu-block").addClass("container");
		jQuery(".container").removeClass("tablet");
		jQuery(".container").addClass("phone");
		
		jQuery("body").removeClass("web");
		jQuery("body").removeClass("tablet");
		jQuery("body").addClass("phone");
		
		jQuery("#top-posts").removeClass("web");
		jQuery("#top-posts").removeClass("tablet");
		jQuery("#top-posts").addClass("phone");
		
		jQuery(".blog-post.content-posts").removeClass("web");
		jQuery(".blog-post.content-posts").removeClass("tablet");
		jQuery(".blog-post.content-posts").addClass("phone");
		
		jQuery('#contact_us').after(jQuery('.container>#sidebar1'));
		jQuery('#blog').after(jQuery('#sidebar1'));
		if(jQuery('body').width()>320 && jQuery('body').width()<640){
			width="100%";
		}else if(jQuery('body').width()<=320){
			width="100%";
		}else{
			width="640px";
		}
		jQuery(".container").width(width);

		sHeight=sliderIndex*parseInt(jQuery("#slider-wrapper").width());
		sliderSize(sHeight);
		
		/* PHONE UNIQUE STYLES */
		jQuery("#top-nav > div > ul  li.addedli,#top-nav > div > div > ul  li.addedli").remove();
		jQuery("#top-nav > div > ul  li:has(> ul),#top-nav > div > div > ul  li:has(> ul)").each(function() {
			var strtext=jQuery(this).children("a").html();
			var strhref=jQuery(this).children("a").attr("href");
			var strlink='<a href="'+strhref+'">'+strtext+'</a>';
			jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');
			jQuery(this).find('.addedli a').each(function(){
		    menu_elem = this;
		    wdwt_scrollto_menuitem(menu_elem); 
		  });
			
		});
		if(window_cur_size != 'phone'){
			if(jQuery("#footer div.phone").length)
				jQuery("#footer div.phone").append(jQuery("#social"));
			else {
				jQuery("#footer > div").prepend("<div class='footer-sidbar added_not_exsisted_footer_sidbar'><div id='sidebar-footer' class='added_not_exsisted_footer phone container footer-sidbar'></div></div>")
				jQuery("#footer div.phone").append(jQuery("#social"));
					if(jQuery('body').width()>320 && jQuery('body').width()<640){
						width="100%";
					}else if(jQuery('body').width()<=320){width="100%";}else{width="640px";}
						jQuery(".container").width(width);
			}
			jQuery("#header-top .container").prepend(jQuery("#logo"));
		}
		for(var i=0;i<jQuery(".phone aside .sidebar-container .widget-area").length;i++){
			if (i%2 == 0){jQuery(".phone aside .sidebar-container .widget-area").eq(i).addClass("clear");}
		}
		jQuery("#header").find("#menu-button-block").remove();
		jQuery("#header .phone-menu-block").append('<div id="menu-button-block"><a href="#">Menu</a><span id="trigram-for-heaven"></span></div>');
		
		if(!jQuery("#top-nav").hasClass("open")){jQuery("#top-nav").css({"display":"none"})};
		jQuery(".phone #site-description p").css({"width":(jQuery(".container").width()-120)+"px"});
		jQuery(".phone .top-posts-block").width((jQuery("#top-posts-list li").length*255)+"px");
		jQuery('.cont_vat_tab ul.content').height(jQuery('.cont_vat_tab ul.content > li.active').filter(function() { return jQuery(this).css("display") != "none" }).height())
		window_cur_size	= 'phone';		
	}
	function sliderSize(sHeight) {
		jQuery("#slider-wrapper").css('height',sHeight);
	}
	function inserting_div_float_problem(main_div) {
		jQuery(main_div).children('.clear:not(:last-child)').remove();
		var iner_elements=jQuery(main_div).children();
		var main_width=jQuery(main_div).width();
		var summary_width=0;
		for(i=0;i<iner_elements.length;i++) {
			summary_width=summary_width+jQuery(iner_elements[i]).outerWidth();
			if(summary_width > main_width) {
				jQuery(iner_elements[i]).before('<div class="clear"></div>')
				summary_width=jQuery(iner_elements[i]).outerWidth();
			}
		}
	}
});