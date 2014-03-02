jQuery(function($){
	$('.gallery').each(function(){
		var $gallery = $(this),
			galName = 'group-'+Math.round(Math.random()*1000);
		
		$gallery.filter('[id^="gallery"]').find('.gallery-item a').each(function(){
			$(this).attr('rel', galName);
		}).fancybox();
	});
});