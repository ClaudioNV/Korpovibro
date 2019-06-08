<?php
require_once('bd.php');

$accion = $_GET["submit"];
$nameclass = $_GET["nombreclas"];
$horainicio = $_GET["horain"];
$horafin = $_GET["horafi"];
$direccion = $_GET["direcname"];
$id_usuario =  $_SESSION["id"];
$tipoclases = $_GET["tipoclases"];
//coordenadas
$ltd = $_GET["Latitude1"];
$lng = $_GET["Longitude1"];
$class = $_GET["idclass"];
//$id_usuario =  $_SESSION["id"];
//echo $id_usuario;

switch ($_GET["op"]) {

	
	case 'getclases':


		$sql=mysql_query("SELECT
							r.id as id,
							r.nombre_clase_instructor as nombreclases,
							r.horar_clase_inicio as hora1,
							r.hora_clase_fin as hora2,
							r.direccion as direccion,
							u.username as instructor,
							u.id as userid,
							c.latitud as latitud,
							c.longitud as longitud,
							t.id as idtipo,
							t.nombre_clases as tipoclases,
							u.id as iInstructor
							FROM registro_clase as r
							left join tipo_clases as t on t.id = r.id_tipo_clases

							left join coordenadas as c on r.id_coordenadas = c.id
							left join usuario as u on u.id = r.id_instructor_clase and u.id_tipo_usuario=1 WHERE horar_clase_inicio >= '".date('Y-m-d H:i:s')."' AND id_tipo_clases = '".$_GET["idClase"]."'
							");
		 //$i=0;

		$rows = array();
		while($row = mysql_fetch_array($sql)){
						
			$rows[] = $row;
			
			//$i++;
		}
		echo(json_encode($rows));

	break;
	
	case 'muestradatosclases':

		$sql=mysql_query("SELECT 
							r.id as id,
							r.nombre_clase_instructor as nombre_clases,
							r.horar_clase_inicio as hora1,
							r.hora_clase_fin as hora2,
							r.direccion as direccion,
							u.username as instructor1,
							u.id as userid,
							c.latitud as latitud,
							c.longitud as logitud,
							t.id as idtipo,
							t.nombre_clases as tipoclases,
							u.id as iInstructor
							FROM registro_clase as r
							left join tipo_clases as t on t.id = r.id_tipo_clases
							left join coordenadas as c on r.id_coordenadas = c.id
							left join usuario as u on u.id = r.id_instructor_clase and u.id_tipo_usuario=1
							WHERE r.id = '".$class."'");

					$rows = array();
					while($row = mysql_fetch_array($sql)){
						$rows[] = $row;
					}
					echo(json_encode($rows));
	break;

	
	case 'tomarclases';
	try{
		$sql=mysql_query("INSERT INTO misclases_alumnos(nombre_de_la_clase, hora_inicio_de_la_clase, hora_fin_de_la_clase, direccion_clase, tipo_de_clase, id_alumno_clase, id_instructor_de_la_clase, id_de_la_clase) VALUES ( '".$_GET["nombreclasemodal"]."' , '".$_GET["horain"]."', '".$_GET["horafin"]."', '".$_GET["direccionmodal"]."', '".$_GET["tipoclasemodal"]."', '".$id_usuario."', '".$_GET["idIns"]."', '".$_GET["idClase"]."') ");
		
		$out['sms'] = "Clase Tomada";


	}catch(Exception $ex){
		$out['error'] = 'NO se ha registrado Log';
	}
	echo json_encode($out);
		
	break;
	
}

?>
