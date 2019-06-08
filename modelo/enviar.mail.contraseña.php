<?php
require_once '../includes/swiftmailer-5.x/lib/swift_required.php';

$out = "";

$para = array();
$desdeEmail = "noreply@conosurseguros.cl";
$desdeNombre = "EstoySeguro.cl";

$folio = '12132323';
$email = 'patricio.toro@conosurseguros.cl';
$rut = '15.361998-0';

// email, nombre, cotizacion
	array_push($para, $email);
	$desdeNombre = "EstoySeguro.cl - Seguro de Viajes";

	$asunto = "EstoySeguro.cl - Seguro de Viajes - ".$folio;
	$adjunto1 = "../pdf/emision/europ/certificados/certificado_".$folio."_".$rut.".pdf";
	$adjunto2 = "../pdf/emision/europ/PROCEDIMIENTO.pdf";
	$adjunto3 = "../pdf/emision/europ/CONDICIONES_GENERALES.pdf";

	

	$cuerpoHtml = "Estimado/a '.$nombre.'<br /><br />
					Bienvenido a <strong>EstoySeguro.cl</strong>!. Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.<br /><br />
					Para restablecer su contraseña, visite el siguiente enlace:
					Un cordial saludo,<br /><br />
					<a href='http://desarrollo.estoyseguro.cl'><strong>EstoySeguro.cl</strong></a><br /><br />
					E.: ​ventas_estoyseguro@conosurseguros.cl<br />
					D.: Los Conquistadores 1700, piso 23B, Providencia, Santiago de Chile<br />
					<a href='https://www.facebook.com/Estoysegurochile?fref=ts'><img src='http://".$_SERVER["SERVER_NAME"]."/img/mail_facebook.png'></a> <a href='https://twitter.com/estoyseguro_cl'><img src='http://".$_SERVER["SERVER_NAME"]."/img/mail_twitter.png'></a> <a href='https://vimeo.com/user20291701'><img src='http://".$_SERVER["SERVER_NAME"]."/img/mail_vimeo.png'></a> www.estoyseguro.cl / Hecho en Chile, bajo el alero de Cono Sur Corredores de Seguro
				";



// SE CREA INTANCIA DE CLASE
$transport = Swift_MailTransport::newInstance();

// SE CREA EMAIL
$message = Swift_Message::newInstance();
$message->setTo($para);
$message->addBcc('patricio.toro@conosurseguros.cl');
$message->setSubject($asunto); // ASUNTO
$message->setBody($cuerpoHtml, 'text/html'); // CUERPO
$message->addPart($cuerpoAlt, 'text/plain'); // CUERPO ALTERNATIVO
if($adjunto1 != '')
	$message->attach(Swift_Attachment::fromPath($adjunto1)); // CERTIFICADO ADJUNTO
	$message->attach(Swift_Attachment::fromPath($adjunto2)); // PROCEDIMIENTO ADJUNTO
	$message->attach(Swift_Attachment::fromPath($adjunto3)); // CONDICIONES GENERALES ADJUNTO
$message->setFrom(array($desdeEmail => $desdeNombre));
 
// ENVIO DE EMAIL
$mailer = Swift_Mailer::newInstance($transport);
if(!$mailer->send($message)){
	$out['error'] = 'NO se ha enviado E-Mail.';
}
?>