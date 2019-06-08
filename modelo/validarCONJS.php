<?php 
session_start();
require_once('bd.php');



        
switch ($_GET["op"]) {

    case 'login':

        $usuario = $_GET['user'];
        $pw = $_GET['passwd'];

    
        $sql = mysql_query("SELECT * FROM usuario WHERE username = '$usuario' AND password = '$pw'");

        if(mysql_num_rows($sql)>0){

            $row = mysql_fetch_array($sql);

            $_SESSION['username'] = $row['username'];
            $_SESSION['id_tipo_usuario'] = $row['id_tipo_usuario']; 
            $_SESSION['nombre'] = $row['nombre'];
            $tipo_usuario = $row['id_tipo_usuario'];
            $_SESSION['id'] = $row['id']; // no borrar, id para obtener los datos del usuario

         //   $out["tipo"] = $row['id_tipo_usuario']; 
            if ($tipo_usuario == 1) {
                unset($_SESSION['username']);
                $out["tipo"] = 1;
            }else if($tipo_usuario == 2){
                unset($_SESSION['username']);
                $out["tipo"] = 2;
            }else{

            }

        }
        else{
            $out["tipo"] = "error";
        }
        
        echo json_encode($out);  

    break;    
}

?>