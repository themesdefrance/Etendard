jQuery(function($){
	$(function(){
		var stickyClass = 'sticky',
			isSticked = false,
			offsetTrigger = 68,
			menuTimeout = null;
		
		$(window).on('scroll', function(){
			isSticked = ($('.main-header.'+stickyClass).length >= 1) ? true : false;
			if ($(window).scrollTop() > offsetTrigger && !isSticked) $('.main-header').addClass(stickyClass);
			else if ($(window).scrollTop() <= 0 && isSticked) $('.main-header').removeClass(stickyClass);
		});
		
		
		$("#toggle-menu-icon").click(function() {
		  $('.top-level-menu').slideToggle(400);
		  return false;
		});
				
		
		/*$( window ).resize( function() {
			var browserWidth = $( window ).width();

			if ( browserWidth > 760 ) {
				$(".top-level-menu").show();
			}else{
				$(".top-level-menu").hide();
			}
		} );*/
		
		$( window ).resize( function() {
			if (menuTimeout) clearTimeout(menuTimeout);
			menuTimeout = setTimeout(recalculateMenuSize, 100);
		} );
		

		var recalculateMenuSize = function(){
			var browserWidth = $( window ).width();

			if ( browserWidth > 760 ) {
				$(".top-level-menu").show();
			}else{
				$(".top-level-menu").hide();
			}
		}
		
		
		
		
	});
});