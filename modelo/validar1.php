<?php 
session_start();
require_once('bd.php');



        
if(isset($_POST["login"])){
    $usuario = $_POST['username'];
    $pw = $_POST['passwd'];
    
    $logear = mysql_query("SELECT * FROM usuario WHERE username='$usuario' AND password='$pw'");
    if(mysql_num_rows($logear)>0){

        $row = mysql_fetch_array($logear);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_tipo_usuario'] = $row['id_tipo_usuario']; 
            $_SESSION['nombre'] = $row['nombre'];
            $tipo_usuario = $row['id_tipo_usuario'];
            $_SESSION['id'] = $row['id']; // no borrar, id para obtener los datos del usuario
        
        if ($tipo_usuario == 1) {
            echo 'Iniciando sesion para'.$_SESSION['username'].'<p>';
            echo '<script> window.location="../perfil-instructor.php";</script>';
            //  echo $tipo_usuario;
        }
        else if ($tipo_usuario == 2){
            echo 'Iniciando sesion para'.$_SESSION['username'].'<p>';
            echo '<script> window.location="../perfil-alumno.php";</script>';
            // echo $tipo_usuario;


        }
    }else{
        echo '<script> alert("Usuario o contraseña incorrectos");</script>';
        echo '<script> window.location="../Login.php";</script>';

    }
}

?>