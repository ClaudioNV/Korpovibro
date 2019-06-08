var repos = "http://korpovibro.cl/modelo/perfil-instructor.php";

var base_url =  "http://korpovibro.cl/";
var repos_uploadFACTURA = base_url + "modelo/uploadFACTURA.php";
var formData = null;
var subirArchivo = null;


var nombre = '';
var apellido = '';
var correo = '';
var password = '';
var password2 = '';
var direccion = '';
var telefono = '';
var sexo = '';
var foto = '';


$(document).ready(function () {

	$('.dropdown-toggle').dropdown();

   // obtener datos del instructor
    $.getJSON(repos, { op: 'getinstructor',})
        .done(function (data) {
            //dato = data.da                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   to;
            //alert(data.nombre);
            $("#nombre").val(data.nombre);
            $("#apellido").val(data.apellido);
            $("#correo").val(data.correo);
            $("#telefono").val(data.telefono);
            $("#direccion").val(data.direccion);
            $("#password").val(data.password);
            $("#password2").val(data.password2);
            $("#sexo").val(data.sexo);
            //$("#foto").val(data.foto);
            $('#foto').attr('src', data.foto);
    });  

        //actualizar los datos del instructor
    $('#actualizar').click(function (e) {
            e.preventDefault();
           
            
            username = $.trim($('#username').val());
            rut = $.trim($('#rut').val());
            nombre = $.trim($('#nombre').val());
            apellido = $.trim($('#apellido').val());
            correo = $.trim($('#correo').val());
            password = $.trim($('#password').val());
            password2 = $.trim($('#password2').val());
            direccion = $.trim($('#direccion').val());
            telefono = $.trim($('#telefono').val());
            sexo = $.trim($('#sexo option:selected').val());
            foto = $.trim($('#foto').val());
            
            //

        $.getJSON(repos, { op:'actualiza', nombrecito: nombre, apellidoins: apellido, correoins: correo, passwordins: password, password2ins: password2, direccionins: direccion, telefonoins: telefono, sexoins: sexo, fotoins: foto  })
                //nombre del get ej:(nombrecito= nombre clave -> nombre=variable)
            

            /*.done(function (data) {
                embajador_resultado = data.resultado;
                nombreEmbajador = data.embajadorNombre;
                mailEmbajador = data.embajadorMail;
                //alert(embajador_resultado);
                //alert(nombreEmbajador);
                //alert(mailEmbajador);
            })
            .fail(function (xhr, err) {
                //alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
                //alert("responseText: "+xhr.responseText);
                $.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Automotriz - Embajador (regCotiza)', aseguradora: '6', coderror: '', detalle: 'No se puede Guardar Codigo Embajador', cliente: auto_rut });
            });*/

            //alert("USUARIO REGISTRADO!");
            //window.location = '../home.php';
        });
    
    
});
      

/*
$(function() {
    // Botón para subir la firma
    var btn_firma = $('#addImage'), interval;
        new AjaxUpload('#addImage', {
            action: 'includes/uploadFile.php',
            onSubmit : function(file , ext){
                if (!(ext && /^(jpg|png|jpeg)$/.test(ext))){
                    // extensiones permitidas
                    alert('Sólo se permiten Imagenes .jpg o .png');
                    // cancela upload                                                                                                                                                                                                                                                                                                                               
                    return false;
                } else {
                    $('#loaderAjax').show();
                    btn_firma.text('Espere por favor');
                    this.disable();
                }
            },
            onComplete: function(file, response){

                // alert(response);
                
                btn_firma.text('Cambiar Imagen');
                
                respuesta = $.parseJSON(response);

                if(respuesta.respuesta == 'done'){
                    $('#foto').removeAttr('scr');
                    $('#foto').attr('src','images/' + respuesta.fileName);
                    $('#loaderAjax').show();
                    // alert(respuesta.mensaje);
                }
                else{
                    alert(respuesta.mensaje);
                }
                    
                $('#loaderAjax').hide();	
                this.enable();	
            }
        });
});*/


$(document).ready(function () {

	$('#form-proc-new').submit(function (e) {
		e.preventDefault();
		return false;
	});

	$('#btn-proc-guardar').click(function (e) {
		e.preventDefault();

		var nombre = $('#auto_fact_emisor').val();
		var carga = $('#auto_fact_cargar').val();
		if (nombre == '') {
			swal("Debes ingresar Nombre de foto perfil");
		} 
		else if (carga == '') {
			swal("Debes Cargar Foto perfil");
		}
		else {
			$('#modalCargandoFoto').modal('show');

			setTimeout(function () {

		var nombre = $('#auto_fact_emisor').val();
		var datos = '?';
		datos += 'nombre=' + $('#auto_fact_emisor').val();
		console.log('datos', datos);

		formData = new FormData(document.getElementById("form-proc-new"));

		SubirArchivo();

		if (subirArchivo) {
			/*swal("Guardado!",
				"La factura " + numero + " ha sido cargada.",
				"success");*/
			$('#modalCargandoFoto').modal('hide');
			$('#modalCargandoFactura').modal('hide');
			swal({
				title: "Foto Cargada!",
				text: "nombre  " + nombre,
				icon: "success",
			}).then(function () {
				location.reload();
			});
		} else {
			swal("Alerta!",
				"La Foto " + nombre + " ha sido creado,pero no se ha guardado el archivo.",
				"error");
		}
	}, 1000);
}

	});

	$(':file').change(function () {
		//obtenemos un array con los datos del archivo
		var file = $("#auto_fact_cargar")[0].files[0];
		//alert(file);
		//obtenemos el nombre del archivo
		var fileName = file.name;
		//alert(fileName);
		//obtenemos la extensión del archivo
		fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
		// alert(fileExtension);
		//obtenemos el tamaño del archivo
		var fileSize = file.size;
		// alert(fileSize);
		//obtenemos el tipo de archivo image/png ejemplo
		var fileType = file.type;
		// alert(fileType);
		//mensaje con la información del archivo
		$('#proc_url').val('files/' + $('#auto_fact_emisor').val() + '_' + fileName);
	});



});
function SubirArchivo() {
	$.ajax({
		async: false,
		url: repos_uploadFACTURA,
		type: 'POST',
		// Form data
		//datos del formulario
		data: formData,
		//necesario para subir archivos via ajax
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'html',
		//mientras se envia el archivo
		beforeSend: function () {
		},
		//una vez finalizado correctamente
		success: function (valor) {
			subirArchivo = true;
		},
		//si ha ocurrido un error
		error: function () {
			subirArchivo = false;
		},
		complete: function () {
			return subirArchivo;
		}
	});

}

$(function() {
    $(".nav > li").click(function() {
    //Busca todos los elementos del nav que tengan la clase active y los elimina
  $(this).closest('.nav').find('li').removeClass('active');
  //Al elemento seleccionado agrega la clase active
          $(this).addClass('active');
      });
});

