<?php
if (isset($_POST['update_settings'])){
	$footer_gauche = $_POST['footer_gauche'];
	$footer_droite = $_POST['footer_droite'];
	
	update_option("etendard_footer_gauche", $footer_gauche);
	update_option("etendard_footer_droite", $footer_droite);
	
	$updated = true;
}
else{
	$footer_gauche = get_option("etendard_footer_gauche");
	$footer_droite = get_option("etendard_footer_droite");
}
?>
<div class="wrap">
	<h2>
		<?php _e('Configurer Étendard'); ?>
	</h2>
	<?php if (isset($updated) && $updated === true){ ?>
	<div id="message" class="updated">
		<?php _e('Changements enregistrés'); ?>
	</div>
	<?php } ?>
	<h3>
		<?php _e('Texte du footer'); ?>
	</h3>
	<form method="post" action="">
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