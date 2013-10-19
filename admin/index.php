<?php
if (isset($_POST['update_settings'])){
	$cta_text = $_POST['cta_text'];
	$cta_bouton = $_POST['cta_bouton'];
	$cta_url = $_POST['cta_url'];
	$footer_gauche = $_POST['footer_gauche'];
	$footer_droite = $_POST['footer_droite'];
	
	update_option("etendard_cta_texte", $cta_text);
	update_option("etendard_cta_bouton", $cta_bouton);
	update_option("etendard_cta_url", $cta_url);
	update_option("etendard_footer_gauche", $footer_gauche);
	update_option("etendard_footer_droite", $footer_droite);
	
	$updated = true;
}
else{
	$cta_text = get_option("etendard_cta_texte");
	$cta_bouton = get_option("etendard_cta_bouton");
	$footer_gauche = get_option("etendard_footer_gauche");
	$footer_droite = get_option("etendard_footer_droite");
}
?>
<div class="wrap">
	<h2>
		<?php _e('Configurer Étendard', TEXT_TRANSLATION_DOMAIN); ?>
	</h2>
	<?php if (isset($updated) && $updated === true){ ?>
	<div id="message" class="updated">
		<?php _e('Changements enregistrés'); ?>
	</div>
	<?php } ?>
	<form method="post" action="">
		<h3>
			<?php _e('Call to action'); ?>
		</h3>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="cta_url">
						<span><?php _e("Destination du call to action"); ?></span>:
					</label>
				</th>
				<td>
					<input type="url" name="cta_url" id="cta_url" value="<?php echo $cta_url; ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="cta_text">
						<span><?php _e("Texte d'accompagnement"); ?></span>:
					</label>
				</th>
				<td>
					<textarea id="cta_text" class="large-text code" name="cta_text"><?php echo $cta_text; ?></textarea>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="cta_bouton">
						<span><?php _e("Texte du bouton"); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" name="cta_bouton" id="cta_bouton" value="<?php echo $cta_bouton; ?>" />
				</td>
			</tr>
		</table>
		
		<h3>
			<?php _e('Texte du footer'); ?>
		</h3>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="footer_gauche">
						<span><?php _e('Partie gauche'); ?></span>:
					</label>
				</th>
				<td>
					<textarea id="footer_gauche" class="large-text code" name="footer_gauche"><?php echo $footer_gauche; ?></textarea>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="footer_droite">
						<span><?php _e('Partie droite'); ?></span>:
					</label>
				</th>
				<td>
					<textarea id="footer_droite" class="large-text code" name="footer_droite"><?php echo $footer_droite; ?></textarea>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" class="button button-primary menu-save" name="update_settings" value="<?php _e('Enregistrer'); ?>" />
		</p>
	</form>
</div>