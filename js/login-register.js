
var repos = "modelo/common-login.php";
var repos_mail = "http://desarrollo.estoyseguro.cl/modelo/enviar.mail.contrasena.php";

$(document).ready(function()
	{
        $('.recuperar').hide();
        $('.modal-recuperar').hide();
                
        $('#rut').Rut({ format_on: 'keyup' });

        document.getElementById('correo').addEventListener('input', function() {
            campo = event.target;
            valido = $.trim($('#correo').val());
                
            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
            if (emailRegex.test(campo.value)) {
                $('#emailError').hide();
                $('#emailOK').show()
                mensage = "Correcto";
                shakeModalVerificarC(mensage);

            }  else if(valido ==''){
               
                $('#emailOK').hide();
                $('#emailError').hide();

            }
            else {
                $('#emailOK').hide();
                $('#emailError').show();
                mensage = "Email Incorrecto";
                shakeModalVerificarCorreo(mensage);
            }
        });


	});


function openLoginModal() {
    showLoginForm();
    setTimeout(function () {
        $('#loginModal').modal('show');
    }, 230);

}
function openRegisterModal() {
    showRegisterForm();
    setTimeout(function () {
        $('#loginModal').modal('show');
    }, 230);

}

function showRegisterForm(){
    $('.social').hide();
    $('.division').hide();
    $('.reiniciarPass').hide();
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Registrarse');
    }); 
    $('.error').removeClass('alert alert-danger').html('');

    $('#tipo-user').change(function () {

        tipo_user = $('#tipo-user').val();
        if (tipo_user == 1) {
            //alert("Instructor");
            $('#modalInstructor').modal('show');
           
        } else  {
           // alert("Alumno");
           
        }
    });

       
}
function recuperarPass(){
 
  $('.content').hide();
  $('.modal-footer').hide();
  $('.recuperar').show();
  $('.modal-recuperar').show();
  $('.modal-title').hide();
  $('.reiniciarPass').hide();
       
}

function showLoginForm(){

    $('.social').show();
    $('.division').show();
    $('.reiniciarPass').show();
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        
        $('.modal-title').html('Iniciar Sesión');
    });       
     $('.error').removeClass('alert alert-danger').html(''); 
}

   /////////////////INGRESAR CON CUENTA GOOGLE ///////////////////////
function onSignIn(googleUser) {

    var profile = googleUser.getBasicProfile();
    var userID = profile.getId();
    var userName = profile.getName();
    var userPicture = profile.getImageUrl();
    var userEmail = profile.getEmail();
    var userToken = googleUser.getAuthResponse().id_token;


    if (userEmail !== '') {
        var dados = {
            userID: userID,
            userName: userName,
            userPicture: userPicture,
            userEmail: userEmail
        };
        $.post('valida.php', dados, function (retorna) {
            if (retorna === '"erro"') {
                // var msg = "Usuário no encontrado com esse e-mail";
                mensage = "Usuario Gmail no registrado en Korpovibro";
                shakeModalVerificar(mensage);

                //	document.getElementById('msg').innerHTML = msg;
            } else {
               
                //window.location.href = retorna;
                var n = 3;
                var l = document.getElementById("number");
                window.setInterval(function () {
                    l.innerHTML = n;
                    n--;
                }, 700);

                setTimeout(function () {

                    window.location.href = retorna;

                }, 2000);
                mensage = "Usuario Gmail validado en Korpovibro";
                shakeModalVerificarG(mensage);
            }

        });
    } else {
        var msg = "Usuário no encontrado!";
        //document.getElementById('msg').innerHTML = msg;

    }
}

   ///////////////// FIN INGRESAR CON CUENTA GOOGLE ///////////////////////


   ///////////////// INGRESAR CON CUENTA NORMAL ///////////////////////


function loginAjax(){
    
    userkorp = $.trim($('#usuario').val());
    passkorp = $.trim($('#password').val());

    if(userkorp =='')
        {
            mensage="Debes ingresar tu usuario";
            shakeModalVerificar(mensage);
        }
    else if (passkorp == ''){
        mensage = "Debes ingresar tu contraseña";
        shakeModalVerificar(mensage);

        } 
    else {

    $.getJSON(repos, { op: 'loginKorp', user: userkorp, pass: passkorp })
        .done(function (dataLogin) {

            if (dataLogin.sms == "error") {
                shakeModal();
            } else  if (dataLogin.sms == 1){

                conteoInstructor = dataLogin.conteo;
                idUser = dataLogin.id;
               // alert(conteoInstructor+idUser);
                //if (conteoInstructor <10){

                // $('#modalInstructorConteo').modal('show');
               /* $.getJSON(repos, { op: 'upConteo', cantidad: conteoInstructor, userId: idUser, })
                .done(function (dataLogin) {
                });*/

               /* swal({
                    title: "Su periodo de prueba a finalizado!", 
                    text: "Debe suscribirse", 
                    icon: "success",
                }).then(function () {*/
                    //location.reload();
                    shakeModalTrue();

                    var n = 3;
                    var l = document.getElementById("number");
                    window.setInterval(function () {
                        l.innerHTML = n;
                        n--;
                    }, 700);
                
                    setTimeout(function () {

                   window.location.replace("/perfil-instructor");    
                    
                    },2000);
               // });
            //}
           /* else if  (conteoInstructor ==10) {
                $.getJSON(repos, { op: 'upestadoUser', userId: idUser, })
                .done(function (dataLogin) {
                });
                swal({
                    title: "Estimado Instructor debe validar su cargo!", 
                    text: "cuenta" + " "+ userkorp +" "+ "Inactiva", 
                    icon: "success",
                }).then(function () {
                    //location.reload();
                    shakeModalTrue();

                    var n = 3;
                    var l = document.getElementById("number");
                    window.setInterval(function () {
                        l.innerHTML = n;
                        n--;
                    }, 700);
                
                    setTimeout(function () {

                   window.location.replace("/perfil-instructor");    
                    
                    },2000);
                });

            }*/
               
            } else if (dataLogin.sms == 2){
                shakeModalTrue();

                var n = 3;
                var l = document.getElementById("number");
                window.setInterval(function () {
                    l.innerHTML = n;
                    n--;
                }, 700);

                setTimeout(function () {

                    window.location.replace("/perfil-alumno");

                }, 2000);
            }
            else{
                shakeModal();
            }
        })
        .fail(function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
            //$.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Automotriz - Paso1 (getCliente)', aseguradora: '', coderror: '', detalle: 'Fail: No se puede obtener datos del cliente', cliente: $('#viajes_rut').val() });
        })
    }

}


function RegistrarAjax(){
    
    userkorp = $.trim($('#username').val());
    rutkorp = $.trim($('#rut').val());
    nomkorp = $.trim($('#nombre').val());
    apellidokorp = $.trim($('#apellido').val());
    correoKorp = $.trim($('#correo').val());
    direccionKorp = $.trim($('#direccion').val());
    telefonoKorp = $.trim($('#telefono').val());
    passkorp = $.trim($('#passwrd').val());
    passConfirmationkorp = $.trim($('#password_confirmation').val());
    tipouserkorp = $.trim($('#tipo-user').val());
   // alert(tipouserkorp);

    if(userkorp =='')
        {
            mensage="Debes ingresar tu usuario";
            shakeModalVerificar(mensage);
        }
        else if (rutkorp == ''){
            mensage = "Debes ingresar tu Rut";
            shakeModalVerificar(mensage);
    
            } 
            else if (nomkorp == ''){
                mensage = "Debes ingresar tu Nombre";
                shakeModalVerificar(mensage);

                }
                else if (apellidokorp == ''){
                    mensage = "Debes ingresar tu Apellido";
                    shakeModalVerificar(mensage);

                    } 
                    else if (correoKorp == ''){
                        mensage = "Debes ingresar tu Email";
                        shakeModalVerificar(mensage);
                
                        } 
                        else if (direccionKorp == ''){
                            mensage = "Debes ingresar tu Dirección";
                            shakeModalVerificar(mensage);

                            } 
                            else if (telefonoKorp == ''){
                                mensage = "Debes ingresar Numero de Telefono";
                                shakeModalVerificar(mensage);

                                } 

                        else if (passkorp == ''){
                            mensage = "Debes ingresar tu Contraseña";
                            shakeModalVerificar(mensage);

                            } 
                            else if (passConfirmationkorp == ''){
                                mensage = "Debes verificar la Contraseña";
                                shakeModalVerificar(mensage);

                                } 
                                else if (passConfirmationkorp != passkorp){
                                    mensage = "Contraseñas no coinciden";
                                    shakeModalVerificar(mensage);
    
                                    }
                                     else if (tipouserkorp == 'Seleccione'){
                                        mensage = "Debe seleccionar Tipo de usuario";
                                        shakeModalVerificar(mensage);
        
                                        } 
    else {
        $.getJSON(repos, { op: 'RegistrarKorp', user: userkorp, rut: rutkorp, nom: nomkorp, apellido: apellidokorp, correo: correoKorp, direccion: direccionKorp, telefono: telefonoKorp, pass: passkorp, tipoUser: tipouserkorp })
        .done(function (dataRegister) {

            if (dataRegister.sms == "error") {
                mensage = "Usuario no ha sido Creado";
                shakeModalVerificar(mensage);
            } else  {
                
                mensage = dataRegister.sms;
                shakeModalVerificarG(mensage);

                var n = 3;
                var l = document.getElementById("number");
                window.setInterval(function () {
                    l.innerHTML = n;
                    n--;
                }, 700);
               
                setTimeout(function () {

                   window.location.replace("/index");    
                 
                },2000);
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


    