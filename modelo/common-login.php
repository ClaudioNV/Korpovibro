<?php 
//session_start();
require_once('bd.php');
date_default_timezone_set("Chile/Continental");
header('Access-Control-Allow-Origin: *');


switch ($_GET["op"]) {

 

        case 'loginKorp':
        
        $usuario = $_GET['user'];
            $pw = md5(sha1($_GET['pass']));
            
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
			$_SESSION['conteo'] = $row['conteo_ingresos'];
			$_SESSION['estado'] = $row['estado_user'];
			$_SESSION["suscripcion"] = $row['id_suscrip'];
			$_SESSION["vencimiento"] = $row['temporal_date'];
			$_SESSION["fechaActual"] = date('Y-m-d H:i:s');
            
			$out["sms"] = $row['id_tipo_usuario'];
			$out["id"] = $row['id'];
		}else {
            		$out['sms'] = "error";

        }

		echo json_encode($out);

	break;

	case 'verificarEmail':
        
		$correo = $_GET['email'];
		
					// VERIFICAR SI EXISTE EL EMAIL PARA ENVIAR A RENOVAR PASSWORD
		$sql = mysql_query("SELECT * FROM usuario WHERE correo='$correo'");
			if ($row=mysql_fetch_array($sql)){
				$out["nombre"] = $row['nombre'];

			}else 
				{

						$out['sms'] = "error";

			}

			echo json_encode($out);

	break;

	case 'upPassword':

			
		$token = bin2hex(openssl_random_pseudo_bytes(64));
		
        
		
		$newPass= $_GET['pass'];
		$tokValidado= $_GET['tok'];

		$sqlverificar = mysql_query("SELECT olvido_pass_iden FROM usuario WHERE olvido_pass_iden='".$tokValidado."' ");

		if ($row=mysql_fetch_array($sqlverificar)){
		
							// VERIFICAR SI EXISTE EL EMAIL PARA ENVIAR A insertar token PASSWORD
			//$sqlCambiar= @mysql_query("UPDATE usuario SET password = 'nuevo' AND password2 = 'nuevo' WHERE olvido_pass_iden = '41b775ba25a95e5aa5723814ba1c688e' ");
			$sql = @mysql_query("UPDATE  selahcl_korpovibro01.usuario SET  password =  '".$newPass."', password2 = '".$newPass."' WHERE  olvido_pass_iden = '".$tokValidado."';");
			
			//$sqlUpdate= @mysql_query("UPDATE usuario SET olvido_pass_iden = ".$token."  WHERE password = ".$newPass."");
			$sql2 = @mysql_query("UPDATE  selahcl_korpovibro01.usuario SET  olvido_pass_iden = '".$token."' WHERE   password  = '".$newPass."';");
			sleep(2);
			
			$out['sms'] = "Contraseña Actualizada";
		}else 
		{

				$out['sms'] = "errorToken";

		}
			echo json_encode($out);


	break;

	case 'insertToken':

			
		$token = bin2hex(openssl_random_pseudo_bytes(64));
		$out["sms"] = $token;
        
		$correo = $_GET['email'];
		
							// VERIFICAR SI EXISTE EL EMAIL PARA ENVIAR A insertar token PASSWORD
			$sql= @mysql_query("UPDATE usuario SET olvido_pass_iden = '".$token."'WHERE correo = '".$correo."'");
			
			
			echo json_encode($out);


	break;

	case'RegistrarKorp':

	$rut = $_GET['rut'];
	$user = $_GET['user'];
	$pass = md5(sha1($_GET['pass']));
	$nom = $_GET['nom'];
	$apellido = $_GET['apellido'];
	$correo = $_GET['correo'];
	$direccion = $_GET['direccion'];
	$telefono = $_GET['telefono'];
	$tipoUser = $_GET['tipoUser'];
	if($tipoUser == '1'){
		$estado= 'Temporal';
	}else {
		$estado = 'Activa';
	}
	$fechaActual= date('Y-m-d H:i:s');

$nuevafecha = strtotime ( '+30 day' , strtotime ( $fechaActual ) ) ;
$nuevafecha = date ( 'Y-m-j H:i:s' , $nuevafecha );

		try{
			$sql= @mysql_query("INSERT INTO usuario(rut_usuario, username, 
													password, password2, nombre, 
													apellido, correo, direccion, 
													telefono, id_tipo_usuario,estado_user,created_at,temporal_date) 
													VALUES (
													'".$rut."', '".$user."',  
													'".$pass."', '".$pass."', 
													'".$nom."' , '".$apellido."' , 
													'".$correo."' , '".$direccion."' , '".$telefono."', '".$tipoUser."', '".$estado."','".$fechaActual."','".$nuevafecha."')");
			
			//$out['sms']= $rut;
			$out['sms']= "Usuario creado satisfactoriamente";

		}catch(Exception $ex){
			throw new Exception("error ".$ex);
			$out['error'] = 'error';
		}
		echo json_encode($out);
	
	break;

	case 'upConteo':
	
	$id = $_GET['userId'];
	$loginIngresos = $_GET['cantidad'];
	$numero = $loginIngresos + 1;
	
						// VERIFICAR SI EXISTE EL EMAIL PARA ENVIAR A insertar token PASSWORD
		$sql= @mysql_query("UPDATE usuario SET conteo_ingresos = '".$numero."'WHERE id = '".$id."'");
		
		
		echo json_encode($out);


break;

		case 'upestadoUser':
			
		$id = $_GET['userId'];
		

							// VERIFICAR SI EXISTE EL EMAIL PARA ENVIAR A insertar token PASSWORD
			$sql= @mysql_query("UPDATE usuario SET estado_user = 'Inactiva 'WHERE id = '".$id."'");
			
			
			echo json_encode($out);


		break;
		
		case 'RegistrarMensajeKorp':

		$nom = $_GET["nom"];
		$mail = $_GET["correo"];
		$telefono = $_GET["telefono"];
		$tipo = $_GET["tipoUser"];
		$msje = $_GET["mensaje"];
		
		try{
			$sql = @mysql_query("INSERT INTO contactanos(nombre_contac, email_contac, fono_contac, tipo_contac,mensaje_contac) VALUES('".$nom."', '".$mail."',
							'".$telefono."','".$tipo."', '".$msje."')");
			$out['sms']= $mail;				
		}
		catch(Exception $e){
			throw new Exception("error ".$ex);
			$out['error'] = 'error';
		}
		echo json_encode($out);

		break;


}


?>