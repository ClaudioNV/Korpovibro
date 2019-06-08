
var repos = "modelo/common-login.php";
var repos_avisar = "http://korpovibro.cl/modelo/contactanos.php";

$(document).ready(function()
	{
        $('.dropdown-toggle').dropdown();
        
        
        reciboSesion = $.trim($('#nomSesion').val());
     
        if (reciboSesion == 1){
            $('#tipo-user').val("Instructor");
        }else if (reciboSesion ==2){
            $('#tipo-user').val("Alumno");
         
        }else{
            $('#tipo-user').val('Usuario sin registro');
        
        }

	});

function MensajeAjax(){
 
    
    nomkorp = $.trim($('#name').val());
    correoKorp = $.trim($('#email').val());
    menasajeKorp = $.trim($('#textarea').val());
    telefonoKorp = $.trim($('#phone').val());
    tipouserkorp = $.trim($('#tipo-user').val());

    
             if (nomkorp == ''){
                mensage = "Debes ingresar tu Nombre";
                shakeModalVerificar(mensage);

                } 
                    else if (correoKorp == ''){
                        mensage = "Debes ingresar tu Email";
                        shakeModalVerificar(mensage);
                
                        } 
                            else if (telefonoKorp == ''){
                                mensage = "Debes ingresar Numero de Telefono";
                                shakeModalVerificar(mensage);

                                } 
                            else if (tipouserkorp == ''){
                                mensage = "Debes verificar tipo usuario";
                                shakeModalVerificar(mensage);

                                } 
                              
                                    else if (menasajeKorp == ''){
                                        mensage = "Debe ingresar mensaje";
                                        shakeModalVerificar(mensage);
        
                                        } 
    else {

    $.getJSON(repos, { op: 'RegistrarMensajeKorp',nom: nomkorp, correo: correoKorp, telefono: telefonoKorp,tipoUser: tipouserkorp ,mensaje: menasajeKorp })
        .done(function (dataMensaje) {

            if (dataMensaje.sms == "error") {
                mensage = "Mensaje no enviado";
                shakeModalVerificar(mensage);
            } else  {
                       
                            $.getJSON(repos_avisar, { mensaje: menasajeKorp, email: correoKorp, usernom: nomkorp, fono:telefonoKorp})
                                .done(function (data) {
                                    console.log('hecho estado: ' + data.estado);
                                })
                                .fail(function (xhr, err) {
                                    console.log("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                                    console.log("responseText: " + xhr.responseText);
                                   // console.log('falla estado: ' + data.estado);
                                    //console.log(responseText);
                                });
                
                swal({
                    title: "Mensaje enviada ",
                    text: "tu solicitud será atendido dentro de 48 horas!",
                    icon: "success",
                }).then(function () {
                    location.reload();
                });
         } 
            
        })
        .fail(function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
            //$.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Automotriz - Paso1 (getCliente)', aseguradora: '', coderror: '', detalle: 'Fail: No se puede obtener datos del cliente', cliente: $('#viajes_rut').val() });
        })
    }

}


/////////////////// RECUPERAR CONTRASEÑA

function RecuperarAjax(){
    
    emailKorp = $.trim($('#correo-verificar').val());

    if(emailKorp =='')
        {
            mensage="Debes ingresar tu Email";
            shakeModalVerificar(mensage);
        }
  
    else {

    $.getJSON(repos, { op: 'verificarEmail', email: emailKorp })
        .done(function (dataVerificar) {

            if (dataVerificar.sms == "error") {

                mensage="Email no se encuentra registrado en nuestro sistema";
                shakeModalVerificar(mensage);
            } else  {
                nomCambio = dataVerificar.nombre;

                $.getJSON(repos, { op: 'insertToken', email: emailKorp })
        .done(function (dataToken) {

            token = dataToken.sms;
            /*alert(token);
            alert(emailKorp);
            alert(nomCambio);*/
            setTimeout(function () {
                $.getJSON(repos_mail, { tokenGenerado: token, email: emailKorp, usernom: nomCambio})
                    .done(function (data) {
                        console.log('hecho estado: ' + data.estado);
                    })
                    .fail(function (xhr, err) {
                        console.log("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
                        console.log("responseText: " + xhr.responseText);
                       // console.log('falla estado: ' + data.estado);
                        //console.log(responseText);
                    }, 1000);
            });
            

        }).fail(function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
            //$.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Automotriz - Paso1 (getCliente)', aseguradora: '', coderror: '', detalle: 'Fail: No se puede obtener datos del cliente', cliente: $('#viajes_rut').val() });
        });
                mensage="Por favor revise su correo electrónico, hemos enviado un enlace de restablecimiento de contraseña a su correo electrónico registrado.";
                shakeModalVerificarG(mensage);

                var n = 3;
                var l = document.getElementById("number");
                window.setInterval(function () {
                    l.innerHTML = n;
                    n--;
                }, 700);
               
                setTimeout(function () {

                   window.location.replace("/index");    
                 
                },3000);
               
            }
        })
        .fail(function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
            //$.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Automotriz - Paso1 (getCliente)', aseguradora: '', coderror: '', detalle: 'Fail: No se puede obtener datos del cliente', cliente: $('#viajes_rut').val() });
        })
    }

}

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Datos Invalidos usuario/contraseña", );
    
             $('.error').fadeTo(3000, 500).slideUp(500, function () {
        $('.error').slideUp(500);
                });
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

function shakeModalTrue() {
    $('#loginModal .modal-dialog').addClass('');
    $('.true').addClass('alert alert-success').html("Datos Correcto! redireccionando...");

    $('.true').fadeTo(3000, 500).slideUp(500, function () {
        $('.true').slideUp(500);
    });
    $('input[type="password"]').val('');
    setTimeout(function () {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}


function shakeModalVerificar() {
    $('#loginModal .modal-dialog').addClass('shake');
    $('.error').addClass('alert alert-danger').html(mensage);

    $('.error').fadeTo(3000, 500).slideUp(500, function () {
        $('.error').slideUp(500);
    });
    $('input[type="password"]').val('');
    setTimeout(function () {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}

function shakeModalVerificarCorreo() {
    $('#loginModal .modal-dialog').addClass('');
    $('#emailError').addClass('alert alert-danger').html(mensage);

    /*$('#emailError').fadeTo(300, 500).slideUp(500, function () {
        $('#emailError').slideUp(500);
    });*/
    $('input[type="password"]').val('');
    setTimeout(function () {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}


function shakeModalVerificarG() {
    $('#loginModal .modal-dialog').addClass('');
    $('.true').addClass('alert alert-success').html(mensage);

    $('.true').fadeTo(3000, 500).slideUp(500, function () {
        $('.true').slideUp(500);
    });
    $('input[type="password"]').val('');
    setTimeout(function () {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}
function shakeModalVerificarC() {
    $('#loginModal .modal-dialog').addClass('');
    $('#emailOK').addClass('alert alert-success').html(mensage);

    $('#emailOK').fadeTo(200, 500).slideUp(500, function () {
        $('#emailOK').slideUp(500);
    });
    $('input[type="password"]').val('');
    setTimeout(function () {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}


    