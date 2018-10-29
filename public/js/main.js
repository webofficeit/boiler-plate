$(document).ready(function(){
	
	// $('.slider').slick({
	//   dots: true,
	//   infinite: true,
	//   speed: 300, 
	//   arrows: false,
	//   slidesToShow: 1,
	//   slidesToScroll: 1,
 // 	});  

  var time = 2;
  var $bar,
    $slick,
    isPause,
    tick,
    percentTime;

  $slick = $('.slider-wrapper');
 

  $bar = $('.slider-progress .progress');

  

  


 
 	 
	$(window).scroll(function(){
		var headerHeight = $("header").outerHeight();
	    if ($(window).scrollTop() >= headerHeight) {
	        $('header').addClass('fixed-header');
	        $('nav div').addClass('visible-title');
	    }
	    else {
	        $('header').removeClass('fixed-header');
	        $('nav div').removeClass('visible-title');
	    }
	}); 

	$(".cat-inner").each(function() {
        var attr = $(this).attr('data-image-src');
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css('background-image', 'url(' + attr + ')');
        }
    });

    $(function() {
        $('.popup-modal, .register-modal').magnificPopup({
            closeBtnInside: true
        });
    });
 
});