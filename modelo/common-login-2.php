<?php 
//session_start();
require_once('bd.php');


switch ($_GET["op"]) {

 

        case 'loginKorp':
        
        $usuario = $_GET['user'];
            $pw = $_GET['pass'];
            
	// OBTENER DATOS COTIZANTE A PARTIR DEL RUT DESDE CLIENTE
	$sql = mysql_query("SELECT * FROM usuario WHERE username='$usuario' AND password='$pw'");
		if ($row=mysql_fetch_array($sql)){
			/*$out["sexo"] = $row['clie_sexo'];
			$out["fechnac"] = $row['clie_fechnac'];
			$out["email"] = $row['clie_email'];
			$out["telefono"] = $row['clie_telefono'];
			$out["celular"] = $row['clie_celular'];
            $out["estado_civil"] = $row['clie_estadocivil'];*/
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_tipo_usuario'] = $row['id_tipo_usuario']; 
            $_SESSION['nombre'] = $row['nombre'];
            $tipo_usuario = $row['id_tipo_usuario'];
            $_SESSION['id'] = $row['id']; // no borrar, id para obtener los datos del usuario
            
            $out["sms"] = "ok";
		}else {
            		$out['sms'] = "error";

        }

		

		echo json_encode($out);

	break;



}


?>