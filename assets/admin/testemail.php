<?php 
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer(true);

	$mail->Host='ssl://smtp.gmail.com';
	$mail->Port=465;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='ssl';

	$mail->Username="b1gsouthluzon@gmail.com";
	$mail->Password="SinglesM123";

	$mail->setFrom("b1gsouthluzon@gmail.com", "Sample Mail");
	$mail->addAddress("reanderagulto29@gmail.com");
	$mail->addReplyTo("b1gsouthluzon@gmail.com", "Sample Mail");
	$mail->Subject="Sample PHP Mailer!";
	$mail->Body="Sample email!";

	if(!$mail->send())
	{
		echo "Not Sent!\n";
	}
	else
	{
		echo "Sent!\n";
	}

?>