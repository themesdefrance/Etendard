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
		
		var $menu = $('.top-level-menu');
		$menu.css('max-height', '100%');
		var menuHeight = $menu.height();
		
		if (!$('#menu-toggle').is(':checked')) $menu.css('height', '0');
		else $menu.css('height', menuHeight+'px');
		
		$('#menu-toggle').change(function(){
			if ($(this).is(':checked')){
				$menu.css('height', menuHeight+'px');
			}
			else{
				$menu.css('height', '0');
			}
		});
	});
});