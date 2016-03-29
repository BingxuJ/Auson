jQuery(document).ready(function($){

$('.magee_shortcodes,.magee_shortcodes_textarea').click(function(){
  var popup = 'shortcode-generator';

        if(typeof params != 'undefined' && params.identifier) {
            popup = params.identifier;
        }
		var height = $("#TB_window").outerHeight();

        // load thickbox
        tb_show("Magee Shortcodes", ajaxurl + "?action=magee_shortcodes_popup&popup=" + popup + "&width=800&height=" + 500);
      
       // $('#TB_window').hide();
	   
  })




$('.magee_shortcodes_textarea').on("click",function(){
			var id = $(this).next().find("textarea").attr("id");
			$('#magee-shortcode-textarea').val(id);
		});																	   

$(document).on("click",'a.magee_shortcode_item',function(){
  								  
  var obj       = $(this);
  var shortcode = obj.data("shortcode");
  var form      = obj.parents("div#magee_shortcodes_container form");
 
   $.ajax({
		type: "POST",
		url: ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "magee_shortcode_form" },
		success:function(data){
		   form.find(".magee_shortcodes_list").hide();
		   form.find("#magee-shortcodes-settings").show();
		   form.find("#magee-shortcodes-settings .current_shortcode").text(shortcode);
		   form.find("#magee-shortcodes-settings #magee-shortcode").val(shortcode);
		   form.find("#magee-shortcodes-settings-inner").html(data);
		   $('.wp-color-picker-field').wpColorPicker();	
		   $.ajax({
			  type: "POST",
			  url: ajaxurl,
			  dataType: "html",
			  data: {action:'magee_control_button'},
			  success:function(data){ $('#TB_window').append(data);
			  
			  var content_height = $('#TB_window').outerHeight();
	          $('#TB_ajaxContent').css({'height':content_height-100});
	 
			  }});
		  
		   		
		},
		error:function(){
			}
		});
	
});

$(document).on("click",".magee-shortcodes-home",function(){
            $("#magee-shortcodes-settings").hide();
			$("#TB_footer").remove();
		    $("#magee-shortcodes-settings-innter").html("");
		    $(".magee_shortcodes_list").show();
		   
		});
		
// insert shortcode into editor
$(document).on("click",".magee-shortcode-insert",function(e){

    var obj       = $(this);
	var form      = $("#magee_shortcodes_container form");
	var shortcode = form.find("input#magee-shortcode").val();

	$.ajax({
		type: "POST",
		url: ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "magee_create_shortcode",attr:form.serializeArray()},
		
		success:function(data){
	
		window.magee_wpActiveEditor = window.wpActiveEditor;
		// Insert shortcode
		window.wp.media.editor.insert(data);
		// Restore previous editor
		window.wpActiveEditor = window.magee_wpActiveEditor;
tb_remove();
		},
		error:function(){
			tb_remove();
		// return false;
		}
		});
		// return false;
   });

 //iconpicker
 $(document).on("click",".iconpicker i",function(e){
    var icon = $(this).data('name');
	$('.iconpicker i').removeClass('selected');
	$(this).parent('.iconpicker').find('input').val(icon);
	$(this).addClass('selected');
	
  });
 
 
     // activate upload button
    $('.magee-upload-button').live('click', function(e) {
	    e.preventDefault();

        upid = $(this).attr('data-upid');

        if($(this).hasClass('remove-image')) {
            $('.magee-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', '').hide();
            $('.magee-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', '');
            $('.magee-upload-button[data-upid="' + upid + '"]').text('Upload').removeClass('remove-image');

            return;
        }

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Image',
            button: {
                text: 'Select Image',
            },
	        frame: 'post',
            multiple: false  // Set to true to allow multiple files to be selected
        });

	    file_frame.open();

        $('.media-menu a:contains(Insert from URL)').remove();

        file_frame.on( 'select', function() {
            var selection = file_frame.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                $('.magee-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
                $('.magee-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

            });

            $('.magee-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
            $('.media-modal-close').trigger('click');
        });

	    file_frame.on( 'insert', function() {
		    var selection = file_frame.state().get('selection');
		    var size = jQuery('.attachment-display-settings .size').val();

		    selection.map( function( attachment ) {
			    attachment = attachment.toJSON();

			    if(!size) {
				    attachment.url = attachment.url;
			    } else {
				    attachment.url = attachment.sizes[size].url;
			    }

			    $('.magee-upload-button[data-upid="' + upid + '"]').parent().find('img').attr('src', attachment.url).show();
			    $('.magee-upload-button[data-upid="' + upid + '"]').parent().find('input').attr('value', attachment.url);

		    });

		    $('.magee-upload-button[data-upid="' + upid + '"]').text('Remove').addClass('remove-image');
		    $('.media-modal-close').trigger('click');
	    });
    });

    //	column remove and add
	 $(document).on('click',"a.child-clone-row-remove.magee-shortcodes-button",function(){
			
			$(this).parents(".column-shortcode-inner")	.remove();
	        
			
												 
	 });
	 $(document).on('click',"a.child-shortcode-add",function(){
			var html = '<div class="param-item"><a id="child-shortcode-remove" href="#" class="child-clone-row-remove magee-shortcodes-button ">Remove</a></div>';
			$clone = $(this).parents("#magee_shortcodes_container").children(".column-shortcode-inner").eq(0).clone(true);
			$clone.removeClass("column-shortcode-inner hidden");
			$clone.addClass("column-shortcode-inner");
			//$clone.find('textarea').eq(0).val("Column Content");
			//$clone.find('#magee_class').eq(0).val("");
			//$clone.find('#magee_id').eq(0).val("");
			//$(this).parents("#magee-shortcodes-settings-inner").children(".column-shortcode-inner").eq(0).find('textarea').eq(0).val("Column Content") ;
			$(".shortcode-add").before($clone.append(html));	
			
	 });
 
 });