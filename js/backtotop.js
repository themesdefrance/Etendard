jQuery(document).ready(function($) {
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
	})
});
