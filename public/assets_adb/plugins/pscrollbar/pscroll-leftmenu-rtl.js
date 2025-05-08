(function($) {
	"use strict";
	
	const ps = new PerfectScrollbar('.sidebar-left', {
	useBothWheelAxes:false,
	});
	
	const ps3 = new PerfectScrollbar('.app-sidebar', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	
})(jQuery);