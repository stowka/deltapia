<?php
	$sent = false;
	if ( isset( $_POST['name'] ) 
	&& !empty( $_POST ) 
	&& isset( $_POST['email'] ) 
	&& !empty( $_POST['email']) 
	&& isset( $_POST['text'] ) 
	&& !empty( $_POST['text'] ) ):
		$name = $_POST['name'];
		$email = $_POST['email'];
		$text = $_POST['text'];

		require_once "lib/phpmailer.class.php";
		$mail = new PHPMailer();

		$mail->From = 'no-reply@deltapianotrio.com';
		$mail->FromName = '[Contact] Delta Piano Trio';

		$mail->AddAddress( $contact_email );

		$mail->WordWrap = 50;
		$mail->IsHTML( true );

		$mail->Subject = "New message from " . $name;
		$mail->Body = '<h3>Delta Piano Trio</h3><h4>Message from ' . utf8_decode( $name ) . ' (<a href="mailto:' . $email . '">' . $email . '</a>)</h4><p>' . nl2br( utf8_decode( $text ) ) . '</p>';

		if ( $mail->Send() )
			$sent = true;
	endif;

	include_once "views/contact.php";