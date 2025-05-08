(function($) {
	"use strict";
	
	//headerfixed
	$(window).on("scroll", function(e){
		if ($(window).scrollTop() >= 70) {
			$('.hor-menu').addClass('fixed-header');
			$('.hor-menu').addClass('visible-title');
		}
		else {
			$('.hor-menu').removeClass('fixed-header');
			$('.hor-menu').removeClass('visible-title');
		}
    });
})(jQuery);