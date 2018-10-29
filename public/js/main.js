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

  $slick = $('.slider');
  $slick.slick({
    arrows: false,
    dots: true,
    speed: 1200,
    adaptiveHeight: false,
    draggable: false,
    swipe: false
  });

  $bar = $('.slider-progress .progress');

  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval(interval, 30);
  }

  function interval() {
    if (isPause === false) {
      percentTime += 1 / (time + 0.1);
      $bar.css({
        width: percentTime + "%"
      });
      if (percentTime >= 100) {
        $slick.slick('slickNext');
        startProgressbar();
      }
    }
  }

  function resetProgressbar() {
    $bar.css({
      width: 0 + '%'
    });
    clearTimeout(tick);
  }

  startProgressbar();

  $('.slick-next, .slick-prev, .slick-dots').click(function() {
    startProgressbar();
  });

 
 	 
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