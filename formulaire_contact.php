<?php 
if (isset($_POST['etendard_contact_nonce'])){
	echo 'envois le mail.';
}
?>
<form method="post" class="contact-form">
	<?php wp_nonce_field('etendard_contact_nonce', 'etendard_contact_nonce'); ?>
	
	<div class="field">
		<label for="etendard_contact_nom">
			<?php _e('Nom'); ?>:
		</label>
		<input type="text" id="etendard_contact_nom" name="etendard_contact_nom" />
	</div>
	
	<div class="field">
		<label for="etendard_contact_email">
			<?php _e('Email'); ?>:
		</label>
		<input type="email" id="etendard_contact_email" name="etendard_contact_email" />
	</div>
	
	<div class="field">
		<label for="etendard_contact_sujet">
			<?php _e('Sujet'); ?>:
		</label>
		<input type="text" id="etendard_contact_sujet" name="etendard_contact_sujet" />
	</div>
	
	<div class="field">
		<label for="etendard_contact_message">
			<?php _e('Message'); ?>:
		</label>
		<textarea id="etendard_contact_message" name="etendard_contact_message"></textarea>
	</div>
	
	<div class="submit">
		<input type="submit" value="<?php _e('Envoyer'); ?>" />
	</div>
</form>