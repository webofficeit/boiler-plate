$(document).ready(function(){
	 
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      asNavFor: '.slider-nav',
      draggable: false,
      swipe: false
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      asNavFor: '.slider-for',
      dots: false,
      // centerMode: true,
      focusOnSelect: true
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
 $('textarea').ckeditor();
 
     $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});