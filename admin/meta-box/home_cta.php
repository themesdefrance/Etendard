<?php 
// On sort si on accède directement au fichier

if ( ! defined( 'ABSPATH' ) ) exit;
	
?>

<?php
$cta_url = get_post_meta($post->ID, 'etendard_home_cta_url', true);
$cta_text = get_post_meta($post->ID, 'etendard_home_cta_text', true);
$cta_bouton = get_post_meta($post->ID, 'etendard_home_cta_bouton', true);
?>
<?php wp_nonce_field('etendard_home_nonce', 'etendard_home_nonce'); ?>
<table class="form-table">
	<tr>
		<th scope="row">
			<label for="etendard_home_cta_url">
				<span><?php _e("Destination du call to action"); ?></span>:
			</label>
		</th>
		<td>
			<input type="url" name="etendard_home_cta_url" id="etendard_home_cta_url" value="<?php echo $cta_url; ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_home_cta_text">
				<span><?php _e("Texte d'accompagnement"); ?></span>:
			</label>
		</th>
		<td>
			<textarea id="etendard_home_cta_text" class="large-text" name="etendard_home_cta_text"><?php echo $cta_text; ?></textarea>
		</td>
	</tr>
	<tr>
		<th scope="row">
			<label for="etendard_home_cta_bouton">
				<span><?php _e("Texte du bouton"); ?></span>:
			</label>
		</th>
		<td>
			<input type="text" name="etendard_home_cta_bouton" id="etendard_home_cta_bouton" value="<?php echo $cta_bouton; ?>" />
		</td>
	</tr>
</table>