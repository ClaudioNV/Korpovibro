<?php

require_once "mercadopago.php";

 
$mp = new MP("3115370366748544", "J9jyZ3HfWEQKqzQJzRXsUoQdyZOGWuaJ");

if (!isset($_GET["id"], $_GET["topic"]) || !ctype_digit($_GET["id"])) {
    http_response_code(200);
    
    return;


}

// Get the payment and the corresponding merchant_order reported by the IPN.
//Obtenga el pago y el correspondiente merchant_order informado por el IPN.
if($_GET["topic"] == 'payment'){
	$payment_info = $mp->get("/collections/notifications/" . $_GET["id"]);
    $merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);

    
    
    
// Get the merchant_order reported by the IPN.
  //Obtener el merchant_order informado por el IPN.
} else if($_GET["topic"] == 'merchant_order'){
    $merchant_order_info = $mp->get("/merchant_orders/" . $_GET["id"]);
    
    
}

if ($merchant_order_info["status"] == 200) {
    // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items    
    // Si el monto de la transacción del pago es igual (o mayor) que el monto del merchant_order, puede liberar sus artículos

 /*   $to = "patricio.toro@conosurseguros.cl";
    $desde="Estoyseguro@hotmail.com";
    $subject = 'MP Si el monto de la transacción del pago es igual (o mayor) que el monto del merchant_order, puede liberar sus artículos. ('.$_REQUEST["id"].')-('.$external_reference.')';
    $mensaje='El codigo del aviso es el:'.$_REQUEST["id"].' y el pago se genero correctamente.';
    $headers = "From: ".$desde."\r\n" .
           'X-Mailer: PHP/' . phpversion() . "\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-Type: text/html; charset=iso-8859-1\r\n" .
           "Content-Transfer-Encoding: 7bit\r\n\r\n";
    mail($to, $subject, $mensaje, $headers);  */

	$paid_amount = 0;

	foreach ($merchant_order_info["response"]["payments"] as  $payment) {
		if ($payment['status'] == 'approved'){
            $paid_amount += $payment['transaction_amount'];            
            
		}	
	}

	if($paid_amount >= $merchant_order_info["response"]["total_amount"]){
		if(count($merchant_order_info["response"]["shipments"]) > 0) { // The merchant_order has shipments // El merchant_order tiene envíos
			if($merchant_order_info["response"]["shipments"][0]["status"] == "ready_to_ship"){
                print_r("Totalmente pagado. Imprima la etiqueta y suelte su artículo");

              /*  $to = "patricio.toro@conosurseguros.cl";
                $desde="Estoyseguro@hotmail.com";
                $subject = 'MP Totalmente pagado. Imprima la etiqueta y suelte su artículo. ('.$_REQUEST["id"].')-('.$external_reference.')';
                $mensaje='El codigo del aviso es el:'.$_REQUEST["id"].' y el pago se genero correctamente.';
                $headers = "From: ".$desde."\r\n" .
                       'X-Mailer: PHP/' . phpversion() . "\r\n" .
                       "MIME-Version: 1.0\r\n" .
                       "Content-Type: text/html; charset=iso-8859-1\r\n" .
                       "Content-Transfer-Encoding: 7bit\r\n\r\n";
                mail($to, $subject, $mensaje, $headers); */ 
                
			}
		} else { // The merchant_order don't has any shipments // El merchant_order no tiene envíos
            print_r("Totalmente pagado. Libere su artículo.");
            
           // $payment_info = $mp->get("/collections/notifications/" . $_REQUEST["id"]);
            //$merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);
           $external_reference=$payment_info["response"]['collection']['external_reference'];
            //$external_reference= $_GET["external_reference"];
                  
        
             /*$to = "patricio.toro@conosurseguros.cl";
                    $desde="Estoyseguro@hotmail.com";
                    $subject = 'MP Totalmente pagado. Libere su artículo.  ('.$_REQUEST["id"].')-('.$external_reference.')';
                    $mensaje='El codigo del aviso es el:'.$_REQUEST["id"].' y el pago se genero correctamente.';
                    $headers = "From: ".$desde."\r\n" .
                           'X-Mailer: PHP/' . phpversion() . "\r\n" .
                           "MIME-Version: 1.0\r\n" .
                           "Content-Type: text/html; charset=iso-8859-1\r\n" .
                           "Content-Transfer-Encoding: 7bit\r\n\r\n";
                    mail($to, $subject, $mensaje, $headers);  */ 
    mysql_query("UPDATE app_punto_pago SET punto_pago_estado = 'pagado', punto_pago_token =  '".$_GET["id"]."' WHERE punto_pago_transaccion = '".$external_reference."' AND punto_pago_estado = 'pendiente';");
                    
		}
	} else {
        print_r("Aún no se ha pagado. No suelte su artículo");
        
        /*$to = "patricio.toro@conosurseguros.cl";
        $desde="Estoyseguro@hotmail.com";
        $subject = 'MP Aún no se ha pagado. No suelte su artículo  ('.$_REQUEST["id"].')-('.$external_reference.')';
        $mensaje='El codigo del aviso es el:'.$_REQUEST["id"].' y el pago se genero correctamente.';
        $headers = "From: ".$desde."\r\n" .
               'X-Mailer: PHP/' . phpversion() . "\r\n" .
               "MIME-Version: 1.0\r\n" .
               "Content-Type: text/html; charset=iso-8859-1\r\n" .
               "Content-Transfer-Encoding: 7bit\r\n\r\n";
        mail($to, $subject, $mensaje, $headers);  */
	}
}
?>
