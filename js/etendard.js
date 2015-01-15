(function($){
$(function(){

	$(document).ready(function(){
		
		// Fitvids
	    $('.post-video, .widget-video, .entry-content').fitVids();
	
		// Menu
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
		
		$( window ).resize( function() {
			if (menuTimeout) clearTimeout(menuTimeout);
			menuTimeout = setTimeout(recalculateMenuSize, 100);
		} );

		var recalculateMenuSize = function(){
			var browserWidth = $( window ).width();

			if ( browserWidth > 760 ) {
				$(".top-level-menu").show();
			}
		}
		
		// Show or hide the sticky footer button
		$(window).scroll(function() {
			if ($(this).scrollTop() > 200) {
				$('#remonter').fadeIn();
			} else {
				$('#remonter').fadeOut();
			}
		});
		
		// Animate the scroll to top
		$('#remonter').click(function(event) {
			event.preventDefault();
			
			$('html, body').animate({scrollTop: 0}, 300);
		});
		
		// Fancybox galleries
		$('.gallery').each(function(){
			var $gallery = $(this),
				galName = 'group-'+Math.round(Math.random()*1000);
			
			$gallery.filter('[id^="gallery"]').find('.gallery-item a').each(function(){
				$(this).attr('rel', galName);
				$(this).attr('title', this.title);
			}).fancybox();
		});
		
		// Fancybox on links with the fancybox class
		$('.fancybox').fancybox();
		
	});
});
})(jQuery);