
var repos = "modelo/common-pago.php";


$(document).ready(function () {

	$('#mercadopago').click(function () {

		tipoUsuario = $.trim($('#nomSesion').val());
		idtd = $.trim($('#idtd').val());

		$('#iframe_pago').prop('src', 'http://korpovibro.cl/pago/mercadopagos.php?trx_id=1' + idtd + '&tipo=' + tipoUsuario+'&user='+idtd);

		$('#iframe_pago').load(function () {
		});

		$('#modalMercadoPago').modal('show');

			
			//$('#modalViajePuntoPago').modal('show');
			/*if (estado_pago != 'pagado')  {

				var intervalID = 0;
				var intervalID = window.setInterval(ConsultaPago, 2000)
			
				function ConsultaPago() {
					$.getJSON(repos, { op: 'getPago', trx_id: '5' + viajes_plan_emision + cotiza_viaje, prod: '5', cot: cotiza_viaje, monto: monto_pesos })
						.done(function (datapago) {
							//	console.log('llegue aqui');
							if (datapago.error) {
								console.log('error: ' + datapago.error);
							}

							else if (datapago.estado == 'pagado') {
								clearInterval(intervalID);
								estado_pago = datapago.estado;
								//console.log("Estado de pago"+datapago.estado);	

								$.getJSON(repos_avisar, { op: 'pagado', cotiza_id: viajes_cotiza1, mail: viajes_mail, cantidad_pasajeros: viajes_pasajeros, rut: viajes_rut, asegid: 'Europ Assistance', pagado: 'Mercado Pago', desde: desde })
									.done(function (dataavisar) {

										if (dataavisar.error) {
											alert('error');
											alert(dataavisar.error);
										} else {
											//	console.log('avisando al desarrollador el pago');
										}
									})

								$.getJSON(repos, { op: 'emitirViajes', oferta_id: cotiza_viaje, cotiza_id: viajes_cotiza1, pasajeros: viajes_pasajeros, plan: viajes_plan_emision, asegid: '27', salida: viajes_salida, regreso: viajes_regreso, rut: viajes_rut_juntos, nombres: viajes_nombre_juntos, apellidos: viajes_apellidos_juntos, fechaNac: viajes_nacimiento_juntos, ice: viajes_ice_juntos, fonoIce: viajes_fono_ice_juntos, email: viajes_mail_juntos, fonopasajero: viajes_telefono_juntos, Domicilio: viajes_direccion_juntos, comuna: viajes_comuna_juntos, ciudad: viajes_ciudad_juntos, vendedor: 'EstoySeguro' })
									.done(function (dataemision) {
										if (dataemision.error) {
											alert('error');
											alert(dataemision.error);
										} else {

											//	console.log('emision enviada',estado_pago);
											$('#modalViajeFinal').modal('hide');
											id_venta = dataemision.id;
											//	console.log(id_venta);
											viajes_id_venta = id_venta.replace('Datos Guardados OK idVenta ', '')
											id_venta = viajes_id_venta;
											$('#modalViajePago').modal('hide');
											$('#modalViajePuntoPago').modal('hide');
											$('#modalViajePagado').modal('show');
											$("#idventa").html('<span>Tu código de venta es ' + id_venta + '</span>');
											pdf = "/pdf/emision/europ/certificados/certificado_";
											pdf1 = "_";
											pdf2 = ".pdf";
											//console.log('pasajeros: '+viajes_pasajeros+' ,plan: '+viajes_plan_emision+' , salida: '+viajes_salida+' ,regreso: '+viajes_regreso+' , rut: '+viajes_rut_juntos+' , nombres: '+viajes_nombre_juntos+' apellidos: '+viajes_apellidos_juntos);
											$.getJSON(repos, { op: 'regEmision', oferta_id: cotiza_viaje, cotiza_id: viajes_cotiza1, plan: plan_obtenido, numero_emision: id_venta, pdf: pdf + id_venta + pdf1 + viajes_rut + pdf2, monto_pesos: monto_pesos, aseg_id: '27', cantidad_pasajeros: viajes_pasajeros, tipo_pago: 'Mercado Pago' })
												.done(function (dataregemision) {
													if (dataregemision.error) {
														alert('error');
														alert(dataregemision.error);
													} else {
														//	console.log('graba emision',dataregemision);

														$.getJSON(repos_avisar, {
															op: 'generado', cotiza_id: viajes_cotiza1, oferta_id: cotiza_viaje, venta: id_venta, cantidad_pasajeros: viajes_pasajeros, mail: viajes_mail, emision: dataregemision.id, rut: viajes_rut, rut2: viajes_rut1, rut3: viajes_rut2, rut4: viajes_rut3, rut5: viajes_rut4, asegid: 'Europ Assistance', desde: desde
														})
															.done(function (datagenerado) {
																if (datagenerado.error) {
																	alert('error');
																	alert(datagenerado.error);
																} else {
																	console.log('avisando al desarrollador lo generado');
																}
															})
													}
												})
												.fail(function (xhr, err) {
													alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
													alert("responseText: " + xhr.responseText);
													//$.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Viajes - paso2 (regCotiza)', aseguradora: '11', coderror: '', detalle: 'Excepcion al crear cotizacion', cliente: viajes_rut });
												})

										} //ELSE EMITIR VIAJES
									}) //EMITIR VIAJES
									.fail(function (xhr, err) {
										alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
										alert("responseText: " + xhr.responseText);
										//$.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Viajes - paso2 (regCotiza)', aseguradora: '11', coderror: '', detalle: 'Excepcion al crear cotizacion', cliente: viajes_rut });
									});
								//}, 10000);
							}


						})
						.fail(function (xhr, err) {
							//console.log("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
							//console.log("responseText: "+xhr.responseText);
						});
				}
			}*/
	
	});

	
});

