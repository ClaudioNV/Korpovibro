<?php
require_once('bd.php');

$accion = $_GET["submit"];
$nameclass = $_GET["nombreclas"];
$horainicio = $_GET["horain"];
$horafin = $_GET["horafinal"];
$direccion = $_GET["direcname"];
$id_usuario =  $_SESSION["id"];
$tipoclases = $_GET["tipoclases"];
$idclases = $_GET["idclass"];
//coordenadas
$ltd = $_GET["Latitude1"];
$lng = $_GET["Longitude1"];

//$id_usuario =  $_SESSION["id"];
//echo $id_usuario;

switch ($_GET["op"]) {

	case 'Registrarclase':

			$sql1=@mysql_query("INSERT INTO coordenadas(latitud, longitud) VALUES ('".$ltd."','".$lng."')");
			
				$coordenadaid = mysql_insert_id($db) or die (mysql_error());
			$sql=@mysql_query("INSERT INTO registro_clase(nombre_clase_instructor, horar_clase_inicio, hora_clase_fin, direccion, id_tipo_clases, id_instructor_clase, id_coordenadas) VALUES ('".$nameclass."','".$horainicio."','".$horafin."','".$direccion."','".$tipoclases."','".$id_usuario."','".$coordenadaid."')");
			
		//$sql=@mysql_query("INSERT INTO coordenadas(latitud, longitud ) VALUES ('".$ltd."','".$lng."')");
			
			
		
		
			$out['id'] = "ok";
			echo(json_encode($out));
		
	break;

	case 'getmarker':


		$sql=mysql_query("SELECT
							r.id as id,
							u.username as instructor,
							c.latitud as latitud,
							u.id as userid,
							c.longitud as longitud,
							r.nombre_clase_instructor as nombre_clase,
							r.horar_clase_inicio as rihora,
							r.id_tipo_clases as ridtipo,
							r.id as idclase,
							t.id as tid,
							t.nombre_clases as tname
							FROM registro_clase as r
							left join coordenadas as c on r.id_coordenadas = c.id
							left join usuario as u on u.id = r.id_instructor_clase and u.id_tipo_usuario=1
							left join tipo_clases as t on t.id = r.id_tipo_clases
							WHERE u.id ='".$id_usuario."' and estado !='eliminada' ");
		 //$i=0;

		$rows = array();
		while($row = mysql_fetch_array($sql)){
						
			$rows[] = $row;
			
			//$i++;
		}
		echo(json_encode($rows));

	break;

	case 'gettipoclases':

	$sql=mysql_query("SELECT * FROM tipo_clases");
	while($row=mysql_fetch_array($sql)){
		$out["clases"][] = array("id"=>$row["id"], "nombre_clases"=>strtoupper($row["nombre_clases"]));
	}
	echo json_encode($out);

	
	
	break;

	case 'datosclases':

		$sql=mysql_query("SELECT 
							r.id as id,
							r.nombre_clase_instructor as nombreclases,
							r.horar_clase_inicio as hora1,
							r.hora_clase_fin as hora2,
							r.direccion as direccion,
							r.id_coordenadas as idCordenadas,

							u.username as instructor,
							u.id as userid,
							c.latitud as latitud,
							c.longitud as longitud,
							t.id as idtipo,
							t.nombre_clases as tipoclases
							FROM registro_clase as r
							left join tipo_clases as t on t.id = r.id_tipo_clases
							left join coordenadas as c on r.id_coordenadas = c.id
							left join usuario as u on u.id = r.id_instructor_clase and u.id_tipo_usuario=1
							WHERE r.id ='".$idclases."' ");
		 //$i=0;

		$rows = array();
		while($row = mysql_fetch_array($sql)){
						
			$rows[] = $row;
			
			
			//$i++;
		}
		echo(json_encode($rows));

	break;

	case 'upClase':

		$nameclase = $_GET["nombre"];
		$horain = $_GET["inicio"];
		$horaf = $_GET["fin"];
		$direccion = $_GET["direccion"];
		$idclases = $_GET["clase"];
		$idregistro = $_GET["idregistro"];
		$ltd = $_GET["newLatitud"];
		$lng = $_GET["newLongitud"];
		$idcoor = $_GET["idcoordenadas"];

		$sql=mysql_query("UPDATE registro_clase set nombre_clase_instructor = '".$nameclase."' , horar_clase_inicio = '".$horain."', hora_clase_fin = '".$horaf."' ,direccion = '".$direccion."'
		  WHERE id ='".$idclases."'");
		$sql_coordenadas = @mysql_query("UPDATE coordenadas set latitud = '".$ltd."', longitud = '".$lng."' WHERE id = '".$idcoor."'");
		$sql_clases_tomadas = @mysql_query("UPDATE misclases_alumnos set nombre_de_la_clase='".$nameclase."', hora_inicio_de_la_clase= '".$horain."', hora_fin_de_la_clase = '".$horaf."' WHERE id_de_la_clase ='".$idclases."'  ");

		$rows = array();
		while($row = mysql_fetch_array($sql)){
						
			$rows[] = $row;
			
			
			//$i++;
		}
		echo(json_encode($rows));

	break;
	
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
							c.longitud as longitud
							FROM registro_clase as r
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
							r.id_coordenadas as idCordenadas,
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

	case 'borrarclase':
	//$sql=mysql_query("DELETE FROM registro_clase WHERE id = '".$_GET["idmiclase"]."' ");
	// $sql=@mysql_query("UPDATE  registro_clase SET estado = 'eliminada' WHERe id = '".$_GET["idmiclase"]."'");
	$sql = mysql_query("UPDATE registro_clase 
						LEFT JOIN misclases_alumnos ON registro_clase.id = misclases_alumnos.id_de_la_clase SET registro_clase.estado = 'eliminada', misclases_alumnos.estado = 'eliminada' WHERE registro_clase.id = '".$_GET["idmiclase"]."'");
	echo(json_encode($sql));

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
									r.id_tipo_clases as rtipoclases,
									r.id_instructor_clase as ridins,
									r.id_coordenadas as ridc,
									r.estado as restado,
									t.id as tid,
									t.nombre_clases as tnombre,
									u.id as iduser,
									c.id as cid,
									c.latitud as ltd,
									c.longitud as lgd
									FROM registro_clase as r
									LEFT JOIN tipo_clases as t on r.id_tipo_clases = t.id
									LEFT JOIN usuario as u on r.id_instructor_clase = u.id
									LEFT JOIN coordenadas as c on r.id_coordenadas = c.id
									WHERE id_instructor_clase = '".$id_usuario."' and estado !='eliminada'
									ORDER BY r.horar_clase_inicio ASC");

			while($row = mysql_fetch_array($sql)){

				$out['listaclass'][] = array(

					'rphora' => $row['rphora'],
					'rid' => $row['rid'],
					'rfhora' => $row['rfhora'],
					'rtipoclases' => $row['rtipoclases'],
					'restado' => $row['restado'],
					'rnclase' => $row['rnclase'],
					'tnombre' => $row['tnombre'],
					'tid' => $row['tid'],
					'iduser' => $row['iduser'],
					'rlugar' => $row['rlugar']
					
				);
			}						
			echo json_encode($out);
		
	break;

	case 'getuser':
		
		$sql = @mysql_query("SELECT * FROM usuario WHERE id = '".$id_usuario."' ");

		while($row = mysql_fetch_array($sql)){
						
			$rows[] = $row;
			
			//$i++;
		}
		
		echo json_encode($row);

	break;
}






?>
