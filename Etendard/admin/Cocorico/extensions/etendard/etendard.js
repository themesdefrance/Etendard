(function($){
	$(function(){
		
		var template = '<tr valign="top"><th scope="row">Diaporama</th></tr><tr valign="top"><th scope="row"><label for="portfolio_diaporama-upload-0">Image</label></th><td><input value="" class="cocorico-upload" name="portfolio_diaporama[]" id="portfolio_diaporama-upload-0" type="text"><input class="button cocorico-upload-button" value="Sélectionner" type="button"><div class="cocorico-preview-wrapper attachment" style="float: none; ">		<div class="attachment-preview" style="width: 150px; height: 150px; cursor: auto;"><img src="" alt="portfolio_diaporama" class="cocorico-preview icon" style="max-width: 100%; max-height: 80%;"><div class="filename"><div class="submitbox"><a href="#" class="cocorico-remove submitdelete">Supprimer </a></div></div></div></div></td></tr><tr valign="top"><th scope="row"><label for="portfolio_diaporama-link-0">Lien</label></th><td><input value="" class="" name="portfolio_diaporama_lien[]" id="portfolio_diaporama-link-0" type="text"></td><th scope="row"><label for="portfolio_diaporama-title-0">Titre</label></th><td><input value="" class="" name="portfolio_diaporama_titre[]" id="portfolio_diaporama-title-0" type="text"></td><td><a href="#" class="submitdelete etendard-delete-diaporama" style="color: #A00;">Supprimer</a></td></tr>';
		
		$('.etendard-diaporama-add').click(function(){
			var $table = $(this).prev();
			var $newLines = $(template);
			
			$newLines.appendTo($table);
			
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