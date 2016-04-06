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



//speech bubbles

var body = $('body').on('mouseover', '[data-tip]', function(event) {

    var self = $(this).removeClass('right');
    var x = self.offset().left + self.width() / 2;
    
    if (x < body.width() / 2) {
        
        self.addClass('right');
    }
});



