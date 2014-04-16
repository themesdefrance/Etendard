jQuery(function($){
	$('.gallery').each(function(){
		var $gallery = $(this),
			galName = 'group-'+Math.round(Math.random()*1000);
		
		$gallery.filter('[id^="gallery"]').find('.gallery-item a').each(function(){
			$(this).attr('rel', galName);
			$(this).attr('title', this.title);
		}).fancybox();
	});
	
	$('article.post.type-post').find('a > img').each(function(){
		if($(this).parent().attr('title')== undefined){
			if($(this).attr('title') != undefined){
				$(this).parent().attr('title', $(this).attr('title'));
			}else{
				$(this).parent().attr('title', $(this).attr('alt'));
			}
		}
		$(this).parent().fancybox();
	});

});

