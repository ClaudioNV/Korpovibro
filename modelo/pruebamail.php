<?php
$para      = 'neftali.chocano@gmail.com';
$titulo    = 'Prueba KorpoVibro';
$mensaje   = 'Hola Prueba';
$cabeceras = 'From: test@korpovibro.cl' . "\r\n" .
    'Reply-To: test@korpovibro.cl' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
?>