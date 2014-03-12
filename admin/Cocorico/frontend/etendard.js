(function($){
	$(function(){
		$('.etendard-diaporama-add').click(function(){
			var $table = $(this).prev();
			
			var $line = $table.find('tr').last().clone().appendTo($table);
			
			$line.find('input[type="text"]').val('');
			$line.find('.cocorico-preview-wrapper').hide();
			//@TODO: set new ids
		});
		
		$('.etendard-delete-diaporama').live('click', function(event){
			event.preventDefault();
			$(this).parentsUntil('tr').parent().remove();
		});
	});
})(jQuery);