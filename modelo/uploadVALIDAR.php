<?php
include('bdflotas.php');
include('../c0nf19carga.php');

try{
   // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        if(isset($_FILES['auto_fact_cargar'])){
            if($db && $db_select){
                
                if(!is_dir("../imagenes/"))
                    mkdir("../imagenes/");

                $file = $_FILES['auto_fact_cargar']['name'];
                $perfil = $_SESSION['id']; 
                $fileTmp = $_FILES['auto_fact_cargar']['tmp_name'];
                $file_new = 'Documento'.'_'.$_POST['nom_validar'];
                $filePath = '../imagenes/'.$file_new;

               
                $query1 = "UPDATE usuario SET documento = 'http://korpovibro.cl/imagenes/".$file_new."' WHERE id = '".$perfil."'";
                
                if(!is_dir("../imagenes/"))
                    mkdir("../imagenes/");

                if (move_uploaded_file($fileTmp, $filePath)){
                    sleep(3);
                    rename($_POST['auto_fact_cargar'].$tipo_archivo);
                    $sql = mysql_query($query1, $db);
                    $archivo_id = mysql_insert_id($db) or die (mysql_error()); //$db
                    echo $tipo_archivo;
                    mysql_close($db);
                }

                if($sql){
                    $out['estado'] = 7;
                    $out['detalle'] = 'Exito';
                    $out['file'] = $file;
                    $out['archivo'] = $archivo_id;
                }else{
                    $out['estado'] = 5;
                    $out['detalle'] = 'Error al insertar datos:'.$query1;
                }
            }else{
                $out['estado'] = 6;
                $out['detalle'] = 'Error en la conexion o seleccion de bd';
            }
        }else{
            $out['estado'] = 10;
            $out['detalle'] = 'Archivo no existe.';
        }
   /* }else{
        $out['estado'] = 8;
        $out['detalle'] = 'Error datos no recibidos.';
    }*/
}catch(Exception $ex){
    $out['estado'] = 9;
    $out['detalle'] = 'Excepción: '.$ex->getMessage()."\n";
}

echo json_encode($out);
?>
