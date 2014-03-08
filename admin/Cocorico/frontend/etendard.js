(function($){
	$(function(){
		var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;

		$('.etendard_portfolio_upload_button').live('click', function(e){
			var send_attachment_bkp = wp.media.editor.send.attachment;
			var button = $(this);
			var id = button.attr('name').replace('_button', '');
			_custom_media = true;
			wp.media.editor.send.attachment = function(props, attachment){
				if (_custom_media){
					button.prev().val(attachment.url);
					$('.etendard_diaporama_one').first().clone().appendTo('.etendard_diaporama_form');
					$('.etendard_diaporama_one').last().find('input[type="text"], input[type="url"]').val('');
					$('.etendard_diaporama_one').last().find('a.delete').remove();
				}
				else{
					return _orig_send_attachment.apply( this, [props, attachment] );
				};
			}

			wp.media.editor.open(button);
			return false;
		});

		$('.add_media').on('click', function(){
			_custom_media = false;
		});

		$('.etendard_diaporama_form a.delete').live('click', function(event){
			$(this).parents('.etendard_diaporama_one').remove();
			event.preventDefault();
		});
	});
})(jQuery);