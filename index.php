

<!DOCTYPE html>
<html lang="en">
    
  <head>
 
    <title>KorpoVibro</title>

   

    <link href="css/footer.css" rel="stylesheet">
    <link href="css/zoom.css" rel="stylesheet">
    <link href="css/listevento.css" rel="stylesheet">
    <link href="css/tiempo.css" rel="stylesheet">
    <link href="css/header.css?v=1" rel="stylesheet">
    <link href="css/login-register.css" rel="stylesheet" />

    
    <style>body{padding-top: 60px;}</style>
	
    <link href="css/bootstrap.css" rel="stylesheet" />
 
	<link href="css/login-register.css" rel="stylesheet" />
	
	<script src="js/jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
  <!--<script src="https://apis.google.com/js/platform.js" async defer></script>

  <meta name="google-signin-client_id" content="759304386556-4rave86orpe7ohp9frjqod74fkptv84m.apps.googleusercontent.com">-->

    <style>
      
      #map {
        width: 100%;
        height: 500px;
        border: 3px solid rgb(255, 112, 0); 
      }
      
    </style>  
  </head>

<body>
<!--
<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '234949637182576',
          cookie     : true,
          xfbml      : true,
          version    : 'v3.1'
        });
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
       function statusChangeCallback(response){
         if(response.status === 'connected'){
           console.log('Logged in and authenticated');
           testAPI();
         } else {
           console.log('Not authenticated');
         }
       }
      function checkLoginState() {
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });
      }
      function testAPI(){
        FB.api('/me?fields=name,email,location', function(response){
          if(response && !response.error){
            email = response.email;
           if (email !== '') {
        var dados = {
      
            userEmail: email
        };
        $.post('valida.php', dados, function (retorna) {
            if (retorna === '"erro"') {
                mensage = "Usuario de Facebo no registrado en Korpovibro";
                shakeModalVerificar(mensage);
            } else {
                var n = 3;
                var l = document.getElementById("number");
                window.setInterval(function () {
                    l.innerHTML = n;
                    n--;
                }, 700);

                setTimeout(function () {

                    window.location.href = retorna;

                }, 2000);
                mensage = "Usuario de Facebook validado en Korpovibro";
                shakeModalVerificarG(mensage);
            }

        });
    } else {
        var msg = "Usuário no encontrado!";

    }
          }
       
        })
      }

   
      function logout(){
        FB.logout(function(response){
         // setElements(false);
        });
      }
</script>
    -->
	<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#f8f8f8;
				color:#777;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>

  <div id="menu">
		<?php
			require_once('header.php');
		?>
	</div>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
          
         
            <div class="item active">
              <img src="img/slider/1.jpg" alt="zumba1"  width="100%">
            </div>
            
            <div class="item ">
              <img src="img/slider/2.jpg" alt="zumba2"  width="100%">
            </div>
        
            <div class="item">
              <img src="img/slider/33.jpg" alt="zumba3" width="100%">
            </div>
        
          </div>
        
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
             
                
      <br/>
      <div class="container2">
        <div class="row" >
          <div class="col-md-6">
            <h3 style="color:orange;"><font face="Arial Black"> Encuentra tu clase mas cercana</h3>
            <div class="map-responsive" id="map"  onload="initMap()">
                </br>
             
            </div>
          </div>
          <div class="col-md-6">
            <h3 style="color:orange;"><font  face="Arial Black"> Te estamos esperando</h3>
            <img src="img/zumba2.jpg" width="100%" height="100%" class="img-responsive"/>
            <br>
          
          </div>
        </div>
      </div>
      
      <div class="container3">
        <div class="row" >
          <div class="col-md-6">
          <ul class="event-list">
          <li>
						<time datetime="2018-10-29">
							<span class="day">29</span>
							<span class="month">Oct</span>
							<span class="year">2018</span>
							<span class="time"></span>
						</time>
						<img alt="instructor-set" src="img/slider/33.jpg" />
						<div class="info">
							
							<div class="row">
								<div class="col-sm-12">
									<h2 class="title" align="center">Master class Renca</h2>
								</div>
	
							</div>
							<div class="row" >
								<div class="col-sm-3">Inicio:</div>
								<div class="col-sm-9">29 Oct 2018 (20:30)</div>
							</div>
							<div class="row">
								<div class="col-sm-3">Fin:</div>
								<div class="col-sm-9">30 Oct 2018 (23:00)</div>
							</div>
							<div class="row">
								<div class="col-sm-3">Direccion:</div>
								<div class="col-sm-9">Miraflores 334</div>
							</div>
							<div class="row">
								<div class="col-sm-3">Precio:</div>
								<div class="col-sm-9">$2.500</div>
							</div>							
						</div>
						<div class="socialr">
							<ul>
								<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
								<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
								<li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-soundcloud"></span></a></li>
							</ul>
						</div>
					</li>
          </ul>

        </div>
        <div class="container3">
          <div class="row" >
            <div class="col-md-6">
              <a href="https://www.accuweather.com/es/cl/renca/60425/weather-forecast/60425" class="aw-widget-legal">
              <!--
              By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
              -->
              </a><div id="awcc1526943803463" class="aw-widget-current"  data-locationkey="60425" data-unit="c" data-language="es" data-useip="false" data-uid="awcc1526943803463"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
            </div>
          </div>
        </div>

          
		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		            <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Iniciar Sesión </h4>
                        <h4 class="modal-recuperar">Recuperar Contraseña  </h4>
                    </div>

                   
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                              <!--  <div class="social">
                               
                                    <a class="circle-google">

                                        <i class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></i>
                                    </a>
                                 
                                    <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                        <i class="fa fa-facebook fa-fw" ></i>
                                        <fb:login-button
                                          id="fb-btn"
                                          scope="public_profile,email"
                                          onlogin="checkLoginState();">
                                        </fb:login-button>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>o</span>
                                    <div class="line r"></div>
                                </div>
                              -->
                                <div class="form loginBox">
                                    <form method="post" action="/login" accept-charset="UTF-8">
                                    <input id="usuario" class="form-control" type="text" placeholder="Usuario" name="usuario">
                                    <input id="password" class="form-control" type="password" placeholder="Contraseña" name="password">
                                    <input class="btn btn-default btn-login" type="button" value="Ingresar" onclick="loginAjax()">
                                    </form>
                                </div>
                                <div class="modal-body reiniciarPass">           
                                     <a id =reiniciarPass" style="align-content: center; padding-left: 30px;" 
                                     href="javascript: recuperarPass()">Reiniciar Contraseña?</a>
                               </div>   
                                
                                
                                  
                             </div>
                        </div>
                          <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
       
                                                <input id="username" class="form-control" type="text" placeholder="Usuario" name="username">
                                <input id="rut" class="form-control" type="text" placeholder="Rut" name="rut">
                                <input id="nombre" class="form-control" type="text" placeholder="Nombre" name="nombre">
                                <input id="apellido" class="form-control" type="text" placeholder="Apellido" name="apelllido">
                                <input id="correo" class="form-control" type="text" placeholder="E-mail" name="correo"> <div id="emailOK"></div> <div id="emailError"></div>
                                <input id="direccion" class="form-control" type="text" placeholder="Direccion" name="direccion">
                                <input id="telefono" class="form-control" type="text" placeholder="Telefono" name="telefono">
                                <input id="passwrd" class="form-control" type="password" placeholder="Contraseña" name="passwrd">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repetir contraseña" name="password_confirmation">
                                <select style="color: #9c9b9b; font-size" class="form-control" id="tipo-user" name="tipo-user">
                                  <option class="form-control" value="Seleccione">Seleccione Tipo de Usuario</option>
                                  <option class="form-control" value="1">Instructor</option>
                                  <option class="form-control" value="2">Alumno</option>					
                                </select>
                                <br>
                                <input class="btn btn-default btn-register" type="button" value="Crear Cuenta" onclick="RegistrarAjax()"name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal-body recuperar">
                                   
                          <input id="correo-verificar" class="form-control" type="text" placeholder="Ingrese su email" name="correo-verificar">

                          <input class="btn btn-default btn-login" type="button" value="Recuperar" onclick="RecuperarAjax()">
                       
                        </div>
                        <div class="modal-body">  
                          <div class="error"></div>
                          <div class="true"></div>
                          <div id="number"></div>
                          <div class="msg"></div>

                    </div>
                   
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>ir a 
                                 <a href="javascript: showRegisterForm();">Registrarse</a>
                            </span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Ya tienes una cuenta ?</span>
                             <a href="javascript: showLoginForm();">Iniciar Sesión</a>
                        </div>
                    </div>        
    		      </div>
		      </div>
		  </div>
         <br>
        <!-- <div id="footer">
          <div class="row">
                  
                  <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 ">
                      <div class="footer-widget ">
                          <div class="footer-title">Empresa</div>
                          <ul class="list-unstyled">
                              <li><a href="#">Acerca de</a></li>
                              <li><a href="#">Soporte</a></li>
                              <li><a href="#">Legal y Privacidad</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <div class="footer-widget ">
                        <div class="footer-title">Enlaces</div>
                        <ul class="list-unstyled">
                            <li><a href="#">Noticias</a></li>
                            <li><a href="#">Contáctenos</a></li>
                            <li><a href="#">Preguntas más frecuentes</a></li>
                        </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
                    <div class="footer-widget ">
                        <div class="footer-title">Redes sociales</div>
                        </br>
                        <div class="col-sm-2">
                          <img width="30" height="30" href="https://facebook.com/" src="img/logos/facebook.png" />
                        </div>
                        <div class="col-sm-2">
                          <img width="30" height="30" src="img/logos/twitter.png" />
                        </div>
                        <div class="col-sm-2">
                          <img width="30" height="30" src="img/logos/instagram.png" />
                        </div>
                        <div class="col-sm-2">
                          <img width="30    " height="30" src="img/logos/google.png" />
                        </div>
                      
                    </div>
                  </div>
                  
          </div>
          <div class="clearfix"></div>
                  <div align="center">
                    <h2>KorpoVibro</h2>
                  </div>
                  <div align="center">
                    <p >&copy; 2018 KorpoVibro</p>
                  
                  </div>
           
        </div>  -->
      <?php include_once("footer.php"); ?>
        <!-- Modal -->
<div class="modal fade" id="modalInstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-informacion" id="exampleModalLongTitle">Informacion Importante!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Para validar su cuenta de Instructor debe ingresar en su perfil certificado que acredite dicho cargo.</p>

        <p>Esta cuenta quedara activa temporalmente!. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalInstructorConteo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-informacion" id="exampleModalLongTitle">Estimado Instrcutor !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Recuerde que debe validar en su perfil certificado que acredite dicho cargo.</p>

        <p>Esta cuenta se encuentra activa temporalmente!. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
        
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!--Insertamos el archivo JS compilado y comprimido -->
  <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    <!--Api de google -->
     <!-- <script src="js/localizacion.js"></script> -->
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&callback=initMap"></script>
    <script src="js/map.js?v=3"></script>
    <script src="js/login-register.js"></script>
    <script src="js/jquery.Rut.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </body>
</html>
