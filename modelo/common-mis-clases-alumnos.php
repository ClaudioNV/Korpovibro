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
							c.id as idc,
							c.latitud as latitud,
							c.longitud as longitud,
							m.id as mclase,
							m.tipo_de_clase as tipodeclase,
							m.id_instructor_de_la_clase as idinstructor,
							m.id_de_la_clase as idclaseins
							FROM misclases_alumnos as m
							left join registro_clase as r on r.id = m.id_de_la_clase
							left join coordenadas as c on r.id_coordenadas = c.id
							left join usuario as u on u.id = r.id_instructor_clase and u.id_tipo_usuario=1
							WHERE m.id_alumno_clase = '".$id_usuario."'
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
							t.nombre_clases as tipoclases
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

	case 'salirclase':

		$sql = mysql_query("DELETE FROM misclases_alumnos WHERE id_de_la_clase ='".$_GET["idmiclase"]."'");
		$out["sms"] = 'eliminando';

		echo(json_encode($out));

	break;

	case 'getfoto':


		$sql=mysql_query("SELECT foto FROM usuario WHERE id = '".$id_usuario."'");
		//$i=0;

		while($row=mysql_fetch_assoc($sql)){
						
			// $out["nombre"][] = $row["nombre"];
			// $out["apellido"][] = $row["apellido"];
			// $out["correo"][] = $row["correo"];
			// $out["telefono"][] = $row["telefono"];
			// $out["direccion"][] = $row["direccion"];
			// $out["password"][] = $row["password"];
			// $out["password2"][] = $row["password2"];
			// $out["sexo"][] = $row["sexo"];
			$out["foto"][] = $row["foto"];
			//$i++;
		}
		echo(json_encode($out));

	break;

	case 'ListarClases':

		$sql = @mysql_query("SELECT r.id as rid,
							r.nombre_clase_instructor as rnclase,
							r.horar_clase_inicio as rphora,
							r.hora_clase_fin as rfhora,
							r.direccion as rlugar,
							u.username as uinstructor,
							u.id as userid,
							u.nombre as rninstructor,
							c.id as idc,
							c.latitud as latitud,
							c.longitud as longitud,
							m.id as mclase,
							m.tipo_de_clase as mtipoclases,
							m.id_instructor_de_la_clase as idinstructor,
							m.id_de_la_clase as idclaseins,
							m.estado as estado,
							t.nombre_clases as tnombre
							FROM misclases_alumnos as m
							LEFT JOIN tipo_clases as t on m.tipo_de_clase = t.id
							left join registro_clase as r on r.id = m.id_de_la_clase
							left join coordenadas as c on r.id_coordenadas = c.id
							left join usuario as u on u.id = r.id_instructor_clase and u.id_tipo_usuario=1
							WHERE  m.estado != 'eliminada' AND m.id_alumno_clase = '".$id_usuario."'
							");

			while($row = mysql_fetch_array($sql)){

				$out['listaclass'][] = array(

					'rphora' => $row['rphora'],
					'rid' => $row['rid'],
					'rfhora' => $row['rfhora'],
					'rtipoclases' => $row['rtipoclases'],
					'rninstructor' => $row['rninstructor'],
					'rnclase' => $row['rnclase'],
					'tnombre' => $row['tnombre'],
					'tid' => $row['tid'],
					'iduser' => $row['iduser'],
					'rlugar' => $row['rlugar']
					
				);
			}						
			echo json_encode($out);
		
	break;
}

?>
