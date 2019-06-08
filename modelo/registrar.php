<?php 
require_once('bd.php');

$accion = $_GET["registrar"];
$user = $_GET["username"];
$run = $_GET["rut"];
$pw = $_GET["password"];
$pw2 = $_GET["password2"];
$name = $_GET["nombre"];
$lastname = $_GET["apellido"];
$e_mail = $_GET["correo"];
$address = $_GET["direccion"];
$phone = $_GET["telefono"];
$tipo_usuario = $_GET["tipo_usuario_id"];
$foto = $_GET["foto"];



if ($user == '' or $run == '' or $pw == '' or $pw2 == '' or $name == '' or $lastname =='' or $e_mail == '' or $address =='' or $phone ==''or $tipo_usuario=='')
{   
  echo '<script> alert("Faltan campos que completar!!"); </script>';
}else {
    $sql = mysql_query("SELECT * FROM usuario  WHERE = '".$user."'");
        if ($row=mysql_fetch_array($sql)){
            $out[$user] = $row['username'];
            /*$out["password"] = $row['password'];
            $out[""] = $row[''];
            $out[""] = $row[''];
            $out[""] = $row[''];
            $out[""] = $row[''];*/
        }else if(mysql_num_rows($sql) == 0){
            mysql_query("INSERT INTO usuario (username,rut_usuario, password, password2, nombre, apellido, correo, direccion, telefono, id_tipo_usuario) VALUES ('".$user."','".$run."','".$pw."','".$pw2."','".$name."','".$lastname."','".$e_mail."','".$address."','".$phone."','".$tipo_usuario."')");
            
            echo'<script> alert("Registrado exitosamente!"); </script>';  
            //header('location: ../Login.php');   
            $out['id'] = "ok";
        }
     
    echo json_encode($out);
}                  
        






?>