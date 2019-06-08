<?php 
//session_start();
require_once('bd.php');
date_default_timezone_set("Chile/Continental");
header('Access-Control-Allow-Origin: *');


switch ($_GET["op"]) {

 
		case 'getPago':
		$out['sms'] = 'error';

		$sql = mysql_query("SELECT mercado_pago FROM app_punto_pago WHERE punto_pago_transaccion = '".$_GET['trx_id']."' AND punto_pago_producto = '".$_GET['prod']."' AND punto_pago_cotizacion = '".$_GET['cot']."' AND punto_pago_monto = '".$_GET['monto']."'");
		if($row=mysql_fetch_array($sql)){
			$out['estado'] = $row["punto_pago_estado"];
			$out['sms'] = 'ok';
		}else{
			$out['sms'] = $sql;
		}
		echo json_encode($out);
	break;

}


?>