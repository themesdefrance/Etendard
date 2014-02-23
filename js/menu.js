jQuery(function($){
	$(function(){
		var stickyClass = 'sticky',
			isSticked = false;
		
		$(window).on('scroll', function(){
			isSticked = ($('.main-header.'+stickyClass).length > 0) ? true : false;
			if ($(window).scrollTop() > 100 && !isSticked) $('.main-header').addClass(stickyClass);
			else if ($(window).scrollTop() < 100 && isSticked) $('.main-header').removeClass(stickyClass);
		});
	});
});