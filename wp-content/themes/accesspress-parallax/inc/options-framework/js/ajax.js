jQuery(document).ready( function($) {
	$('#add_new_section').click(function(){
		var count_section = $('#parallax_count').val();
		count_section++;
		$('#parallax_count').val(count_section);
		$.ajax({
		     url: ajaxurl,
		     data: ({
		     	'action' : 'get_my_option',
		     	'count_section' : count_section
		     }),
		     success: function(data) {
		      $('#section-parallax_section .controls').append(data);
		      $('.of-color').wpColorPicker();
		      
		      $('.parallax_section_page').on('change',function(){
				var sled = $(this).find("option:selected").text();
				$(this).parents('.sub-option').find('.title span').text(sled);
			   });
		     }
		});
	});
});