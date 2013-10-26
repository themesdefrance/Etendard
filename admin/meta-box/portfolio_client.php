<?php
wp_nonce_field('etendard_portfolio_nonce', 'etendard_portfolio_nonce');
		
$client = get_post_meta($post->ID, 'etendard_portfolio_client', true);
$date = get_post_meta($post->ID, 'etendard_portfolio_date', true);
$role = get_post_meta($post->ID, 'etendard_portfolio_role', true);
$url = get_post_meta($post->ID, 'etendard_portfolio_url', true);
?>
<table class="form-table">
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_client">
				<span><?php _e('Client', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" id="etendard_portfolio_client" name="etendard_portfolio_client" value="<?php echo esc_attr($client); ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_date">
				<span><?php _e('Date', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" id="etendard_portfolio_date" name="etendard_portfolio_date" value="<?php echo esc_attr($date); ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_role">
				<span><?php _e('Rôle', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" id="etendard_portfolio_role" name="etendard_portfolio_role" value="<?php echo esc_attr($role); ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_portfolio_url">
				<span><?php _e('URL', TEXT_TRANSLATION_DOMAIN); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" id="etendard_portfolio_url" name="etendard_portfolio_url" value="<?php echo esc_attr($url); ?>" />
		</td>
	</tr>
</table>