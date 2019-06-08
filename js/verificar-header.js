



$(document).ready(function () {
	//$('.perfil').hide();
	reciboSesion = $.trim($('#nomSesion').val());
	//alert(reciboSesion);
	vencimiento = $.trim($('#vencimiento').val());
	fechaActual = $.trim($('#fechaActual').val());

	if (reciboSesion != '' )
		{
	
		document.getElementById('oculto').style.display = 'block';
		document.getElementById('mostrar').style.display = 'none';
		if (reciboSesion == 1){
			document.getElementById('instruc').style.display = 'block';
		}else if (reciboSesion == 2){
			document.getElementById('alumn').style.display = 'block';
		}
		if(reciboSesion == 1){
			document.getElementById('buscar').style.display = 'none';
		}
		else if(reciboSesion == 2){
			document.getElementById('buscar').style.display = 'block';
		}else{
			document.getElementById('buscar').style.display = 'block';
		}
	}

	if(fechaActual > vencimiento ){

		swal({
			title: "Su periodo de prueba a finalizado!",
			text: "Debe suscribirse",
			icon: "success",
		});
		//document.getElementById('clases').style.display = 'none';
		document.getElementById('buscar').style.display = 'none';
		document.getElementById('nuevaClase').style.display = 'none';
		document.getElementById('vid').style.display = 'none';
		document.getElementById('instru').style.display = 'none'; 
		
		

	} else if (fechaActual <= vencimiento){
		//alert("bien");
		if(reciboSesion == 2){
			document.getElementById('nuevaClase').style.display = 'none';
			
			
		}
		/*else if(reciboSesion == 2){
			document.getElementById('buscar').style.display = 'block';
		}else{
			document.getElementById('buscar').style.display = 'block';
		}*/
	}
	
		
	//alert(reciboSesion);
	
});

