<?php
require_once '../includes/swiftmailer-5.x/lib/swift_required.php';
//require_once('c0nf19.php');

header('Access-Control-Allow-Origin: *');

$out = "";

$para = array();
$desdeEmail = "helpdesky@korpovibro.cl";
$desdeNombre = "korpovibro.cl";

$token = $_GET["tokenGenerado"];
$email =  $_GET["email"];
$nombre = $_GET["usernom"];
$resetPassLink = 'http://korpovibro.cl/recuperacion-pw?fp_code='.$token;

// email, nombre, cotizacion
	array_push($para, $email);
	$desdeNombre = "Korpovibro.cl - Recuperacion de Contraseña ";

	$asunto = "Solicitud de actualización  de contraseña";
	//$adjunto1 = "hola";
	//$adjunto2 = "../pdf/emision/europ/PROCEDIMIENTO.pdf";
	$adjunto3 = "../pdf/emision/factura/factura_poliza_ddssdjpeg.pdf";

	

	$cuerpoHtml = "Estimado/a $nombre<br /><br />
					Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.<br /><br />
					<br/>Para restablecer su contraseña, visite el siguiente enlace: <a href=$resetPassLink><strong>Renovar Contraseña</strong></a><br /><br />
					Un cordial saludo,<br /><br />
					<a href='http://korpovibro.cl'><strong>Korpovibro.cl</strong></a><br /><br />
					E.: ​helpdesk@korpovibro.cl<br />
					D.: Los Conquistadores 1700, piso 23B, Providencia, Santiago de Chile<br />";



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
//$message->attach(Swift_Attachment::fromPath($adjunto1)); // CERTIFICADO ADJUNTO
//	$message->attach(Swift_Attachment::fromPath($adjunto2)); // PROCEDIMIENTO ADJUNTO
	$message->attach(Swift_Attachment::fromPath($adjunto3)); // CONDICIONES GENERALES ADJUNTO
$message->setFrom(array($desdeEmail => $desdeNombre));
 
// ENVIO DE EMAIL
$mailer = Swift_Mailer::newInstance($transport);
if(!$mailer->send($message)){
	$out['error'] = 'NO se ha enviado E-Mail.';
}else{
	$out['estado'] = "Mensaje enviado";
}
echo json_encode($out);
?>