<?php 
if (isset($_POST['etendard_contact_nonce']) && wp_verify_nonce($_POST['etendard_contact_nonce'], 'etendard_contact_nonce')){
	$nom = $_POST['etendard_contact_nom'];
	$email = $_POST['etendard_contact_email'];
	$sujet = $_POST['etendard_contact_sujet'];
	$message = $_POST['etendard_contact_message'];
	
	$to = get_bloginfo('admin_email');
	
	$subject = (trim($sujet) === '') ? __('Contact', TEXT_TRANSLATION_DOMAIN).' '.get_bloginfo('name') : $sujet;
	$from = $nom;
	$from_mail = (trim($sujet) === '') ? $to : $email;
	
	$headers = array();
	$headers[] = 'From: '.$from.' <'.$from_mail.'>';
	
	$contact = wp_mail($to, $subject, $message, $headers);
}
?>
<?php if (!isset($contact)){ ?>
<form method="post" class="contact-form">
	<?php wp_nonce_field('etendard_contact_nonce', 'etendard_contact_nonce'); ?>
	
	<div class="field">
		<label for="etendard_contact_nom">
			<?php _e('Nom'); ?>:
		</label>
		<input type="text" id="etendard_contact_nom" name="etendard_contact_nom" required />
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
		<textarea id="etendard_contact_message" name="etendard_contact_message" required></textarea>
	</div>
	
	<div class="submit">
		<input type="submit" value="<?php _e('Envoyer'); ?>" />
	</div>
</form>
<?php } else { ?>
	<div class="contact-feedback <?php echo ($contact) ? 'success' : 'error'; ?>">
	<?php
	if ($contact) _e('Votre message à été envoyé.');
	else _e("Une erreur est survenue lors de l'envoi de votre message, merci de réessayer ultérieurement.");
	?>
	</div>
<?php } ?>