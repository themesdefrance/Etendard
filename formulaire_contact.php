<?php 
if (isset($_POST['etendard_contact_nonce']) && wp_verify_nonce($_POST['etendard_contact_nonce'], 'etendard_contact_nonce')){
	$nom = $_POST['etendard_contact_nom'];
	$email = $_POST['etendard_contact_email'];
	$sujet = $_POST['etendard_contact_sujet'];
	$message = $_POST['etendard_contact_message'];
	
	$to = get_bloginfo('admin_email');
	
	$subject = (trim($sujet) === '') ? __('Contact', 'etendard').' '.get_bloginfo('name') : $sujet;
	$from = $nom;
	$from_mail = (trim($email) === '') ? $to : $email;
	
	$headers = array();
	$headers[] = 'From: '.$from.' <'.$from_mail.'>';
	
	$contact = wp_mail($to, $subject, $message, $headers);
}
?>
<?php if (!isset($contact)): ?>
<form method="post" class="contact-form">
	<?php wp_nonce_field('etendard_contact_nonce', 'etendard_contact_nonce'); ?>
	
	<div class="field">
		<label for="etendard_contact_nom">
			<?php _e('Name *','etendard'); ?>:
		</label>
		<input type="text" id="etendard_contact_nom" name="etendard_contact_nom" required />
	</div>
	
	<div class="field">
		<label for="etendard_contact_email">
			<?php _e('Email *','etendard'); ?>:
		</label>
		<input type="email" id="etendard_contact_email" name="etendard_contact_email" required />
	</div>
	
	<div class="field">
		<label for="etendard_contact_sujet">
			<?php _e('Subject','etendard'); ?>:
		</label>
		<input type="text" id="etendard_contact_sujet" name="etendard_contact_sujet" />
	</div>
	
	<div class="field">
		<label for="etendard_contact_message">
			<?php _e('Message *','etendard'); ?>:
		</label>
		<textarea id="etendard_contact_message" name="etendard_contact_message" required></textarea>
	</div>
	
	<div class="submit">
		<input type="submit" value="<?php _e('Send','etendard'); ?>" />
	</div>
</form>
<?php else: ?>
	<div class="message <?php echo ($contact) ? 'succes' : 'erreur'; ?>">
	<?php
	if ($contact) _e('Succes ! You message was sent.','etendard');
	else _e('An error occured during sending, try again in a few minutes.', 'etendard');
	?>
	</div>
<?php endif; ?>