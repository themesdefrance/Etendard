(function($){
	$(function(){
		$('.etendard-diaporama-add').click(function(){
			var $table = $(this).prev();
			
			var $lines = $table.find('tr');
			$lines = $lines.slice($lines.length-3);
			var $newLines = $lines.clone().appendTo($table);
			
			$newLines.find('input[type="text"]').val('');
			$newLines.find('.cocorico-preview-wrapper').hide();
		});
		
		$('.etendard-delete-diaporama').live('click', function(event){
			event.preventDefault();
			var $row = $(this).parentsUntil('tr').parent();
			$row.add($row.prev()).add($row.prev().prev()).remove();
		});
	});
})(jQuery);