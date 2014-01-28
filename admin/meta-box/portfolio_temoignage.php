<?php
$nom = get_post_meta($post->ID, 'etendard_portfolio_temoin_nom', true);
$texte = get_post_meta($post->ID, 'etendard_portfolio_temoin_texte', true);
$portrait = get_post_meta($post->ID, 'etendard_portfolio_temoin_portrait', true);
?>
<script>
jQuery(function($){
	var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;

	$('#etendard_portfolio_temoin_portrait_button').click(function(e){
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if (_custom_media){
				$('#'+id).val(attachment.url);
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
});
</script>
<table class="form-table">
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_temoin_nom">
				<span><?php _e('Nom', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" id="etendard_portfolio_temoin_nom" name="etendard_portfolio_temoin_nom" value="<?php echo esc_attr($nom); ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_temoin_texte">
				<span><?php _e('Témoignage', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<textarea class="large-text" id="etendard_portfolio_temoin_texte" name="etendard_portfolio_temoin_texte"><?php echo esc_attr($texte); ?></textarea>
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_temoin_portrait">
				<span><?php _e('Portrait', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" id="etendard_portfolio_temoin_portrait" name="etendard_portfolio_temoin_portrait" value="<?php echo esc_attr($portrait); ?>" />
			<input type="button" class="button button-primary button-medium" name="etendard_portfolio_temoin_portrait_button" id="etendard_portfolio_temoin_portrait_button" value="<?php echo esc_attr(__('Charger', TEXT_TRANSLATION_DOMAIN)); ?>" />
		</td>
	</tr>
</table>