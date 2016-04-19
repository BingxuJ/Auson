var velocity = 0.54;

function update(){ 
    var pos = $(window).scrollTop(); 
    $('.section#about, .section#services').each(function() { 
        var $element = $(this);
        // subtract some from the height b/c of the padding
        var height = $element.height()-18;
        $(this).css('backgroundPosition', '55% ' + Math.round((height - pos) * velocity) + 'px'); 
    }); 
};

//$(window).bind('scroll', update);
$(window).on('scroll', update);


var $animation_elements = $('.animation-element');
var $window = $(window);

function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);

  $.each($animation_elements, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);

    //check to see if this current container is within viewport
    if ((element_bottom_position >= window_top_position) &&
      (element_top_position <= window_bottom_position)) {
      $element.addClass('in-view');
    } else {
      $element.removeClass('in-view');
    }
  });
}

$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');

//home image fadein
var amountScrolled = 10;

$(window).scroll(function() {
    if ($(window).scrollTop() > amountScrolled) {
      $('.feature-img').fadeTo(10,1);
        // $('.feature-img').stop().animate({marginLeft:"0px"}, 100);
    } else {
      $('.feature-img').fadeTo(0,0);
        // $('.feature-img').stop().animate({marginLeft:"-3000px"}, 100);
    }
});

// define the method for recalculating the position of the marks on the map
function calculate_map_marks_position() {
    var b_element = document.getElementById('KI_B');
    var ade_element = document.getElementById('Ade_B');

    var window_height = $window.height();
    var window_width = $window.width();
    console.log(window_height);
    console.log(window_width);
    console.log(window_width * 0.19791667);
    var KI_left = window_width * 0.21;
    var Ade_left = window_width * 0.567;
    var Po_left = window_width * 0.5;
    var Co_left = window_width * 0.513;
    var Ald_left = window_width * 0.488;
    var Vic_left = window_width * 0.578;

    if(window_width < 1000) {
        KI_left = window_width * 0.19;
    }

    var offset_top = $('#background_map_img').offset().top; // 0 or banner height

    var KI_top = $('#background_map_img').height() * 0.92 + offset_top;
    var Ade_top = $('#background_map_img').height() *0.032 + offset_top;
    var Po_top = $('#background_map_img').height() *0.2779 + offset_top;
    var Co_top = $('#background_map_img').height() *0.4079 + offset_top;
    var Ald_top = $('#background_map_img').height() *0.4379 + offset_top;
    var Vic_top = $('#background_map_img').height() *0.7279 + offset_top;

    console.log($('#KI_B').offset().top);
    console.log($('#KI_B').position().top);
    $('#KI_B').offset({top: KI_top, left: KI_left});
    $('#Ade_B').offset({top: Ade_top, left: Ade_left});
    $('#Po_B').offset({top: Po_top, left: Po_left});
    $('#Co_B').offset({top: Co_top, left: Co_left});
    $('#Ald_B').offset({top: Ald_top, left: Ald_left});
    $('#Vic_B').offset({top: Vic_top, left: Vic_left});

    var map_container_div = document.getElementById('map_container_div');
    console.log("map_container_width" + map_container_div.style.width);
    console.log("map_container_height" + map_container_div.style.height);

}

$window.on('resize', calculate_map_marks_position);
$window.trigger('resize');

$window.load(calculate_map_marks_position);





//speech bubbles

var body = $('body').on('mouseover', '[data-tip]', function(event) {

    var self = $(this).removeClass('right');
    var x = self.offset().left + self.width() / 2;
    
    if (x < body.width() / 2) {
        
        self.addClass('right');
    }
});



