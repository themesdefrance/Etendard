(function($){
	$(function(){
		$('.etendard-text-list').each(function(){
			var $list = $(this).parentsUntil('ul').parent();
			
			$list.on('keyup', '.etendard-text-list', function(){
				if ($(this).parent().is(':last-child') && $(this).val() != ''){
					var $clone = $(this).parent().clone();
					$clone.find('input').val('');
					$list.append($clone);
				}
			});
			
			$list.on('blur', '.etendard-text-list', function(){
				if (!$(this).parent().is(':last-child') && $(this).val() === ''){
					$(this).parent().remove();
				}
			});
			
			$list.on('click', '.etendard-text-list-delete', function(){
				$(this).parent().remove();
			});
		});
	});
})(jQuery);