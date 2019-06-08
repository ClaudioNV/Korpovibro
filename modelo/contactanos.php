<<?php
require_once '../includes/swiftmailer-5.x/lib/swift_required.php';
//require_once('c0nf19.php');

header('Access-Control-Allow-Origin: *');

$out = "";

$para = array();
$desdeEmail = "helpdesky@korpovibro.cl";
$desdeNombre = "korpovibro.cl";

$mensaje = $_GET["mensaje"];
$email =  $_GET["email"];
$nombre = $_GET["usernom"];
$fono = $_GET["fono"];
$admin = 'Claudio';
$dirigido='claudio.marcelo511@gmail.com';


// email, nombre, cotizacion
	array_push($para, $dirigido);
	$desdeNombre = "Korpovibro.cl - Contactanos ";

	$asunto = "Solicitud de contacto";
	//$adjunto1 = "hola";
	//$adjunto2 = "../pdf/emision/europ/PROCEDIMIENTO.pdf";
	$adjunto3 = "../pdf/emision/factura/factura_poliza_ddssdjpeg.pdf";

	

	$cuerpoHtml = "Estimado/a $admin<br /><br />
					Recientemente se envió una solicitud de contacto de <strong>$nombre</strong>, con el siguiente mensaje.<br /><br />
					<br/><strong>$mensaje</strong></a><br /><br />
					Su numero telefonico es: $fono <br /><br />
					Su Email es: $email <br /><br />
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