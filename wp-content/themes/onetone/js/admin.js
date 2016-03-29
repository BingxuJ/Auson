jQuery(document).ready(function($){

/* ------------------------------------------------------------------------ */
/*  section accordion         	  								  	    */
/* ------------------------------------------------------------------------ */
								
$('.section-accordion').click(function(){
 var accordion_item = $(this).find('.heading span').attr('id');
 $('.'+accordion_item).slideToggle();
 if( $(this).hasClass('close')){
	 $(this).removeClass('close').addClass('open');
	 $(this).find('.heading span.fa').removeClass('fa-plus').addClass('fa-minus');
	 }else{
		$(this).removeClass('open').addClass('close'); 
		$(this).find('.heading span.fa').removeClass('fa-minus').addClass('fa-plus');
		 }
	   
	 })	;

/* ------------------------------------------------------------------------ */
/*  delete section             	  								  	    */
/* ------------------------------------------------------------------------ */
 $('#optionsframework').on('click','.delete-section',function(){
	$(this).parents('.home-section').remove();	
	var i = 0;
	 $('.home-section').each(function(){
			$(this).find("[name^='onetone']").each(function(){
				var name = $(this).attr('name');
				var id   = $(this).attr('id');
				var new_name = name.replace(/[0-9]+/, i);
				var new_id   = id.replace(/[0-9]+/, i);
				$(this).attr('name',new_name);
				$(this).attr('id',new_id);
               });
			i++;
			$('#section_num').val(i);
	   });
  });
 if( $('.onetone-step-2-text').length ){
 $('#menu-appearance > a').append($('#onetone-step-1-text').html());
 $('.onetone-step-2-text').closest('li').addClass('onetone-step-2');
 }

/////

 // save options
  
  $(function(){
          //Keep track of last scroll
          var lastScroll = 0;
          $(window).scroll(function(event){
              //Sets the current scroll position
              var st = $(this).scrollTop();

              //Determines up-or-down scrolling
              if (st > lastScroll){
                $(".onetone-admin-footer").css("display",'inline')
              } 
              if(st == 0){
                $(".onetone-admin-footer").css("display",'none')
              }
              //Updates scroll position
              lastScroll = st;
          });
        });

$('.onetone-import-demos .button-import-demo').click(function(){
			$('.importer-notice').show();															  
         });


$(document).on('click','#onetone-save-options',function(){
         $('.options-saving').fadeIn("fast");
	$.post('options.php',$('#optionsframework form').serialize(),function(msg){
         $('.options-saving').fadeOut("fast");
		 $('.options-saved').fadeIn("fast", function() {
		   $(this).delay(2000).fadeOut("slow");
		});
	  return false;
    });													
   });

$(document).on('click',"#optionsframework-submit [name='update']",function(e){
	e.preventDefault();
	
	$('.options-saving').fadeIn("fast");
	$.post('options.php',$('#optionsframework form').serialize(),function(msg){
		$('.options-saving').fadeOut("fast");
		$('.options-saved').fadeIn("fast", function() {
		   $(this).delay(2000).fadeOut("slow");
		});
	  return false;
    });	
	  return false;
   });
 
 });