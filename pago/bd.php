<?php 

define('DB_NAME', 'selahcl_korpovibro01');
define('DB_USER', 'selahcl_c');
define('DB_PASSWORD', 'korpovibro');
define('DB_HOST', 'localhost');

$mysql_host = DB_HOST;
$mysql_db = DB_NAME;
$mysql_user = DB_USER;
$mysql_pass = DB_PASSWORD;

$db = @mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die ("ERROR en la Conexión.");
      @mysql_select_db($mysql_db,$db) or die ("ERROR al Seleccionar la BD.");
      mysql_set_charset('utf8');

  session_start();
$conexion = mysqli_connect($mysql_host, $mysql_db, $mysql_user, $mysql_pass);

    if($conexion){
        echo 'Error al conectar al Servidor';
    }else{  
    }

?>