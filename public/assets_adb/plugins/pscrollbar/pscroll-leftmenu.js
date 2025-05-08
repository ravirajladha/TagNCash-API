(function($) {
	"use strict";
	
	const ps = new PerfectScrollbar('.sidebar-right', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	
	const ps3 = new PerfectScrollbar('.app-sidebar', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	
	
})(jQuery);