(function($) {
	"use strict";
	
	/*----SideBar----*/
	$(".slide-menu li a").each(function() {
	  var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) { 
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	/*PMboYSIqMee+p4uAjskftSrErYaF9PDNDn+EGSzR9N2BspYI8=
feCz66HNQhyoUIndT6pXQpWta+PA3e1h3yExMyH1EsOo6f8PXnNPyHGLRfchOSF9WSX7exs=*/
	// ______________Full screen
	$("#fullscreen-button").on("click", function toggleFullScreen() {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})

	// ______________ PAGE LOADING
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})
	
	// ______________ BACK TO TOP BUTTON
	$(window).on("scroll", function(e) {
		if ($(this).scrollTop() > 0) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$("#back-to-top").on("click", function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	
	// ______________ COVER IMAGE
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});
	
	// ______________ RATING STAR
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);
	
	// ______________Skin-Theme-effcts
	$("a[data-theme]").on("click", function(e) {
		$("head link#theme").attr("href", $(this).data("theme"));
		$(this).toggleClass('active').siblings().removeClass('active');
	});
	
	
	// ______________Chart-circle
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);
			$this.circleProgress({
				fill: {
					color: $this.attr('data-color')
				},
				size: $this.height(),
				startAngle: -Math.PI / 4 * 2,
				emptyFill: '#e2e1ea',
				lineCap: 'round'
			});
		});
	}
	
	// ______________ GLOBAL SEARCH
	$(document).on("click", "[data-toggle='search']", function(e) {
		var body = $("body");

		if(body.hasClass('search-gone')) {
			body.addClass('search-gone');
			body.removeClass('search-show');
		}else{
			body.removeClass('search-gone');
			body.addClass('search-show');
		}
	});
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);
	
	/** Constant div card */
	const DIV_CARD = 'div.card';
	/** Initialize tooltips */
	$('[data-toggle="tooltip"]').tooltip();
	/** Initialize popovers */
	$('[data-toggle="popover"]').popover({
		html: true
	});
	
	// ______________ FUNCTION FOR REMOVE CARD
	$('[data-toggle="card-remove"]').on('click', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});
	
	// ______________ FUNCTIONS FOR COLLAPSED CARD
	$('[data-toggle="card-collapse"]').on('click', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	/*PMboYSIqMee+p4uAjskftSrErYaF9PDNDn+EGSzR9N2BspYI8=
feCz66HNQhyoUIndT6pXQpWta+PA3e1h3yExMyH1EsOo6f8PXnNPyHGLRfchOSF9WSX7exs=*/
	// ______________ CARD FULL SCREEN
	$('[data-toggle="card-fullscreen"]').on('click', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	
	
	// ______________ SWITCHER-toggle1
	
	/*Header Switcher*/
	$('#myonoffswitch').on("click", function(e) {   
		if (this.checked) {
			$('body').addClass('default-header');
			$('body').removeClass('header-style1');
			$('body').removeClass('header-style2');
			localStorage.setItem("default-header", "True");
		}
		else {
			$('body').removeClass('default-header');
			localStorage.setItem("default-header", "false");
		}
	});

	$('#myonoffswitch1').on("click", function(e) {   
		if (this.checked) {
			$('body').addClass('header-style1');
			$('body').removeClass('default-header');
			$('body').removeClass('header-style2');
			localStorage.setItem("header-style1", "True");
		}
		else {
			$('body').removeClass('header-style1');
			localStorage.setItem("header-style1", "false");
		}
	});	
	$('#myonoffswitch2').on("click", function(e) {   
		if (this.checked) {
			$('body').addClass('header-style2');
			$('body').removeClass('default-header');
			$('body').removeClass('header-style1');
			localStorage.setItem("header-style2", "True");
		}
		else {
			$('body').removeClass('header-style2');
			localStorage.setItem("header-style2", "false");
		}
	});	
	
	/*Leftmenu Styles*/
	$('#myonoffswitch3').on("click", function(e) {    
		if (this.checked) {
			$('body').addClass('default-menu');
			$('body').removeClass('dark-menu');
			$('body').addClass('leftmenu-style1');
			$('body').removeClass('leftmenu-style2');
			localStorage.setItem("default-menu", "True");
		}
		else {
			$('body').removeClass('default-menu');
			localStorage.setItem("default-menu", "false");
		}
	});
	$('#myonoffswitch4').on("click", function(e) {
		if (this.checked) {
			$('body').addClass('dark-menu');
			$('body').removeClass('default-menu');
			$('body').addClass('leftmenu-style1');
			$('body').removeClass('leftmenu-style2');
			localStorage.setItem("dark-menu", "True");
		}
		else {
			$('body').removeClass('dark-menu');
			localStorage.setItem("dark-menu", "false");
		}
	});
	
	/*Leftmenu Styles-2*/
	$('#myonoffswitch5').on("click", function(e) {   
		if (this.checked) {
			$('body').addClass('default-leftmenu');
			$('body').removeClass('dark-leftmenu');
			$('body').removeClass('leftmenu-style1');
			$('body').addClass('leftmenu-style2');
			localStorage.setItem("default-leftmenu", "True");
		}
		else {
			$('body').removeClass('default-leftmenu');
			localStorage.setItem("default-leftmenu", "false");
		}
	});
	$('#myonoffswitch6').on("click", function(e) {   
		if (this.checked) {
			$('body').addClass('dark-leftmenu');
			$('body').removeClass('default-leftmenu');
			$('body').removeClass('leftmenu-style1');
			$('body').addClass('leftmenu-style2');
			localStorage.setItem("dark-leftmenu", "True");
		}
		else {
			$('body').removeClass('dark-leftmenu');
			localStorage.setItem("dark-leftmenu", "false");
		}
	});
	
	
	/*Leftmenu Theme Styles*/
	$('#myonoffswitch7').on("click", function(e) {    
		if (this.checked) {
			$('body').addClass('leftmenu-style1');
			$('body').removeClass('leftmenu-style2');
			localStorage.setItem("lleftmenu-style1", "True");
		}
		else {
			$('body').removeClass('leftmenu-style1');
			localStorage.setItem("leftmenu-style1", "false");
		}
	});
	$('#myonoffswitch8').on("click", function(e) {   
		if (this.checked) {
			$('body').addClass('leftmenu-style2');
			$('body').removeClass('leftmenu-style1');
			localStorage.setItem("leftmenu-style2", "True");
		}
		else {
			$('body').removeClass('leftmenu-style2');
			localStorage.setItem("leftmenu-style2", "false");
		}
	});
	
})(jQuery);
