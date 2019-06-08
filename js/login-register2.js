
var repos = "modelo/common-login.php";
var repos_mail = "http://desarrollo.estoyseguro.cl/modelo/enviar.mail.contrasena.php";

$(document).ready(function()
	{
        $('.recuperar').hide();
        $('.modal-recuperar').hide();
				


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
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Registrarse');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
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


    