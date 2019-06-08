<?php
require_once('../PHPMailer/class.phpmailer.php');
require_once('../PHPMailer/class.smtp.php');

	include("bd.php");

		$idClase = $_GET['clase'];

		$query_Tabla = "SELECT * FROM usuario u, registro_clase r, misclases_alumnos m WHERE r.id = m.id_de_la_clase and u.id = m.id_alumno_clase and m.id_de_la_clase = '".$idClase."'"; 
   $Tabla = mysql_query($query_Tabla) or die(mysql_error()); 

   $i=0;

  $losemails=""; 
  while ($row_Tabla=mysql_fetch_assoc($Tabla)) { 
	  $instructor =($row_Tabla['nombre']);
	  $nomClase =($row_Tabla['nombre_clase_instructor']);
	  $inicioClase =($row_Tabla['horar_clase_inicio']); 
	  $FinClase =($row_Tabla['hora_clase_fin']); 
    $direccion =($row_Tabla['direccion']); 
    $idinstructor =($row_Tabla['id_instructor_clase']); 

   $losemails.=($row_Tabla['correo'].", "); 
     } 
   $recup_NomInstructor = "SELECT * FROM usuario  WHERE id = '".$idinstructor."'"; 
   $sqlRecup = mysql_query($recup_NomInstructor) or die(mysql_error()); 

   while ($row_Tabla=mysql_fetch_assoc($sqlRecup)) { 
	  $instructorName.=($row_Tabla['nombre'].", ");
        } 
  $largo=strlen($losemails); 
   if ($largo>2) 
{ 
   $losemails=substr($losemails,0,$largo-2); 
} 
else 
{ 
   echo "No hay destinatarios!"; 
   die(); 
}; 
// se definen los argumentos de mail( ): 
$asunto='Informacion de clase'; 
$mensaje='<html> 
<head> 
   <title>Inormacion de Clase de  '.$nomClase.'</title> 
</head> 
<body> 
   <p>Datos de la clase</p> 
   <table> 
    <tr> 
   <th>Instructor '.$instructorName.'</th> 
   </tr> 
  <tr> 
   <td>Clase</td><td>'.$nomClase.'</td>
  </tr> 
  <tr> 
    <td> Fue Cancelada</td>
  </tr> 
  <tr> 
   <td></td>
  </tr> 
  </table> 
</body> 
</html>'; 

$envia='Korpovibro.cl'; 
$remite='Profesor'; 

mail(null, $asunto, $mensaje, "MIME-Version: 1.0 
Content-type: text/html; charset=iso-8859-1 
From: $envia <$remite> 
Bcc: $losemails" . "\r\n") or die("Error al Enviar el Email"); 
echo "Mensaje Enviado con Éxito!"; // 

   mysql_free_result($Tabla); 
   mysql_close($mi_conexion); 
?>

