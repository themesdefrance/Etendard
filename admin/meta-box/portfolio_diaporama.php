<?php
$diaporama = get_post_meta($post->ID, 'etendard_portfolio_diaporama', true);
$liens = get_post_meta($post->ID, 'etendard_portfolio_diaporama_lien', true);

if (!is_array($diaporama)) $diaporama = array('');
else if ($diaporama[count($diaporama)-1] != '') array_push($diaporama, '');

?>
<script>
jQuery(function($){
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
</script>
<table class="form-table etendard_diaporama_form">
	<?php foreach ($diaporama as $index=>$img){ ?>
	<tr class="etendard_diaporama_one">
		<th scope="row">
			<label>
				<span><?php _e('Image', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" name="etendard_portfolio_diaporama[]" value="<?php echo esc_attr($img); ?>" />
			<input type="button" class="button button-primary button-medium etendard_portfolio_upload_button" name="etendard_portfolio_diaporama_button" value="<?php echo esc_attr(__('Charger', TEXT_TRANSLATION_DOMAIN)); ?>" />
			<?php if ($index < count($diaporama)-1){ ?>
			<a href="#" class="delete">Supprimer</a>
			<?php } ?>
		</td>
		<th scope="row">
			<label>
				<span><?php _e('Lien (optionnel)', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="url" name="etendard_portfolio_diaporama_lien[]" value="<?php echo (isset($liens[$index])) ?  $liens[$index] : ''; ?>" />
		</td>
	</tr>
	<?php } ?>
</table>