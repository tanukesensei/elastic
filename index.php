<?php 

require 'bootstrap.php';
require 'mailer.php';

use bubbstore\Correios\CorreiosTracking;
use bubbstore\Correios\Exceptions\CorreiosTrackingException;

try {

	$tracking = new CorreiosTracking('OA016913717BR');
	$result = $tracking->find();

	

		//Recipients
		$mail->setFrom('no-reply@tanukesensei.me', 'Ratreio teste');
		$mail->addAddress('luanvs.hack@gmail.com', 'Luan');     // Add a recipient
		// $mail->addAddress('ellen@example.com');               // Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');
	
		// Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	
		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Here is the subject';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		$html = '<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		</head>
		<body>
		<div class="container">
		<dl class="row">
		<dt class="col-sm-3">Codigo de rastreio:</dt>
		<dd class="col-sm-9">'. $result[code] .'</dd>
		<dt class="col-sm-3">Ultima atualização:</dt>
		<dd class="col-sm-9">'. $result[last_status] .'</dd>
		<dt class="col-sm-3">Data e hora:</dt>
		<dd class="col-sm-9">'. $result[last_date] .'</dd>
		<dt class="col-sm-3">Localidade:</dt>
		<dd class="col-sm-9">'. $result[last_locale] .'</dd>
		</dl>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		</body>
		</html>';
		
		
		$mail->Body = $html;
		$mail->send();
		echo 'Mensagem enviada com Sucesso.';

exit();

} catch (CorreiosTrackingException $e) {
	echo $e->getMessage();
	
} catch (Exception $e) {
	echo "erro interno do sistema. {$e->getMessage()}";
}
?>