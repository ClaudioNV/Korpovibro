<?php
require_once "mercadopago.php";
//require('../../../modelo/bd.php');
date_default_timezone_set("Chile/Continental");

			$trx_id = $_GET['trx_id'];
			$tipo = $_GET['tipo'];
			
	if($tipo == 1)
	{
			$monto = '5000';
	}else if ($tipo == 2)
	{
		$monto = '2500';
	}
	//$monto = /*$_GET['monto']*/'2500';
	$prod = '5';
	$cot = '100';
	$fecha = date("d-m-Y H:i:s");
	//echo ($monto);
 
//$mp = new MP("8126928274756072", "e0jMb1iqP9q0cSGCZgnRd0upS11djVIB");//PRODUCCION ESTOYSEGURO JJ
$mp = new MP("3115370366748544", "J9jyZ3HfWEQKqzQJzRXsUoQdyZOGWuaJ");// PRODUCCION PATRICIO



$preference_data = array(
	"items" => array(
		array(
			"id" => "1500",
			"title" => "Pago Suscrpción de Korpovibro.cl",
			"currency_id" => "$",
			"picture_url" =>"http://desarrollo.estoyseguro.cl/mobile/img/iconos/seguro-viajes.png",
			"description" => "Viajes",
			"category_id" => "Certificado de viajes",
			"quantity" => 1,
			"unit_price" => (float)$monto
		)
	),//"auto_return" => "approved",

	"payer" => array(
		"name" => "",
		"surname" => "",
		"email" => "",
		"date_created" => "2014-07-28T09:50:37.521-04:00",
		"phone" => array(
			"area_code" => "",
			"number" => ""
		),
		"identification" => array(
			"type" => "DNI",
			"number" => ""
		),
		"address" => array(
			"street_name" => "",
			"street_number" => "",
			"zip_code" => "820000"
		)
	),
	/*	"back_urls" => array(
		"success" => "http://desarrollo-es.estoyseguro.cl/pago/bien.php",
		"failure" => "http://www.failure.com",
		"pending" => "http://www.pending.com"
	),
	"auto_return" => "approved",*/
	"payment_methods" => array(
		"excluded_payment_methods" => array(
			array(
				"id" => "servipag",
			)
		),
		"excluded_payment_types" => array(
			array(
				"id" => "ticket"
			)
		),
		"installments" => 24,
		"default_payment_method_id" => null,
		"default_installments" => null,
	),
	/*"shipments" => array(
		"receiver_address" => array(
			"zip_code" => "",
			"street_number"=> ,
			"street_name"=> "",
			"floor"=> 4,
			"apartment"=> "C"
		)
	),*/
	"notification_url" => "http://desarrollo.estoyseguro.cl/pago/pruebamercado.php/ipn",
		//https://estoyseguro.cl/pago/mercadoipn.php
	"external_reference" => $trx_id,
	"expires" => false,
	"expiration_date_from" => null,
	"expiration_date_to" => null
);

$preference = $mp->create_preference($preference_data);
?>


<!doctype html>
<html>
	<head>
		<title>MercadoPago</title>
	<link href="../css/bootstrap.min_v3.3.4.css" rel="stylesheet">	
	</head>
	
	<body>

		<div class="form-group col-xs-offset-4 col-xs-4 col-sm-offset-5 col-sm-2">
							<br>
							<br>
							<br>
							<br>
							<br>
							<a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="lightblue-M-Ov-ArOn">Pagar Suscripción</a>
			</div>

		

			<!--<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>-->
		<script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
		
	</body>
</html>
