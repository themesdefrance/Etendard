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
		var menuHeight = $menu.height(),
			menuTimeout = null;
		
		if (!$('#menu-toggle').is(':checked')) $menu.css('height', '0');
		else $menu.css('height', menuHeight+'px');
		
		$(window).resize(function(){
			if (menuTimeout) clearTimeout(menuTimeout);
			menuTimeout = setTimeout(recalculateMenuSize, 100);
		});
		
		var recalculateMenuSize = function(){
			$menu.css('height', 'auto');
			menuHeight = $menu.height();
			$menu.css('height', '0');
		}
		
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