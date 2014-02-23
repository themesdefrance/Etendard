jQuery(function($){
	$(function(){
		var stickyClass = 'sticky',
			isSticked = false,
			offsetTrigger = 0;
		
		$(window).on('scroll', function(){
			isSticked = ($('.main-header.'+stickyClass).length > 0) ? true : false;
			if ($(window).scrollTop() > offsetTrigger && !isSticked) $('.main-header').addClass(stickyClass);
			else if ($(window).scrollTop() <= offsetTrigger && isSticked) $('.main-header').removeClass(stickyClass);
		});
	});
});