<?php
$carousel = get_post_meta($post->ID, 'etendard_portfolio_carousel', true);
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
				$('.etendard_carousel_one').first().clone().appendTo('.etendard_carousel_form');
				$('.etendard_carousel_one').last().find('[type="text"]').val('');
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
<table class="form-table etendard_carousel_form">
	<?php foreach ($carousel as $img){ ?>
	<tr class="etendard_carousel_one">
		<th scope="row">
			<label>
				<span><?php _e('Image', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" name="etendard_portfolio_carousel[]" value="<?php echo esc_attr($img); ?>" />
			<input type="button" class="button button-primary button-medium etendard_portfolio_upload_button" name="etendard_portfolio_carousel_button" value="<?php echo esc_attr(__('Charger', TEXT_TRANSLATION_DOMAIN)); ?>" />
		</td>
	</tr>
	<?php } ?>
</table>