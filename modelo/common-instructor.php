<?php 
require_once('bd.php');

$id_usuario =  $_SESSION["id"];
//echo $id_usuario;

switch ($_GET["op"]) {

	case 'ListarInst':

		$sql = @mysql_query("SELECT u.id as idus,
									u.nombre as nomins,
									u.rut_usuario as rutins,
									u.apellido as apeins,
									u.sexo as sexins,
									u.correo as email,
									u.foto as fotoins,
									t.id as idt,
									t.tipo_usuario as tipus
									FROM usuario as u 
									LEFT JOIN tipo_usuario as t on u.id_tipo_usuario = t.id
									WHERE id_tipo_usuario ='1'");
		 
		while($row = mysql_fetch_array($sql)){
			
			$out['lista'][] = array(
				'idus' => $row['idus'],
				'rutins' => $row['rutins'],
				'nomins' => $row['nomins'],
				'apeins' => $row['apeins'],
				'sexins' => $row['sexins'],
				'email' => $row['email'],
				'fotoins' =>$row['fotoins'],
				'tipus' =>$row['tipus']


			);
		}
		echo json_encode($out);
		
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
									WHERE id_instructor_clase = '".$_GET['idus']."'
									 AND estado != 'eliminada' ");

			while($row = mysql_fetch_array($sql)){

				$out['listaclass'][] = array(

					'rphora' => $row['rphora'],
					'rfhora' => $row['rfhora'],
					'rtipoclases' => $row['rtipoclases'],
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