<?php 
require_once('bd.php');

header("Access-Control-Allow-Headers : Content-Type"); 
header("Access-Control-Allow-Methods : POST, OPTIONS");
$accion = $_GET["registrar"];
$user = $_GET["username"];
$run = $_GET["rut"];
$pw = $_GET["passwordins"];
$pw2 = $_GET["password2ins"];
$name = $_GET["nombrecito"];
$lastname = $_GET["apellidoins"];
$e_mail = $_GET["correoins"];
$address = $_GET["direccionins"];
$phone = $_GET["telefonoins"];
$tipo_usuario = $_GET["tipo_usuario_id"];
$sexo = $_GET["sexoins"];
$id_usuario =  $_SESSION["id"];
$foto = $_GET["fotoins"];
//echo $id_usuario;

switch ($_GET["op"]) {

	case 'getalumno':


		$sql=mysql_query("SELECT nombre ,apellido, correo, telefono, direccion, password ,password2, sexo, foto FROM usuario WHERE id = '".$id_usuario."'");
		//$i=0;

		while($row=mysql_fetch_assoc($sql)){
						
			$out["nombre"][] = $row["nombre"];
			$out["apellido"][] = $row["apellido"];
			$out["correo"][] = $row["correo"];
			$out["telefono"][] = $row["telefono"];
			$out["direccion"][] = $row["direccion"];
			$out["password"][] = $row["password"];
			$out["password2"][] = $row["password2"];
			$out["sexo"][] = $row["sexo"];
			$out["foto"][] = $row["foto"];
			//$i++;
		}
		echo(json_encode($out));

	break;

	case 'actualiza':

		$sql = @mysql_query("UPDATE usuario SET nombre = '".$name."', apellido = '".$lastname."', correo = '".$e_mail."', telefono = '".$phone."',direccion ='".$address."', 
		password='".$pw."',password2 = '".$pw2."',sexo = '".$sexo."' WHERE id = '".$id_usuario."'");

		 $out["sms1"] = "ok";
		 $out['sms1'] = "ok";
		 echo json_encode("out");

		break;
}





?>