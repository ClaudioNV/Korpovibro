
<?php 
session_start();
$user= $_SESSION["username"];
$tipo_usuario = $_SESSION['id_tipo_usuario'];

 if ($tipo_usuario == 1){
 	$redirec="http://korpovibro.cl/perfil-instructor.php";

 }else if  ($tipo_usuario == 2){
 	$redirec="http://korpovibro.cl/perfil-alumno.php";


 }
 
// include_once('/modelo/bd.php');
if(isset($_SESSION['username'])){
  echo "";
    //header("location:Login.php");
}else{
  echo '<script> window.location="index.php";</script>';
}

?>
<!DOCTYPE html>
<html>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <head>
    <!-- NO olvidar insertar el ICONO del logo -->    
    <title>KorpoVibro</title>
    <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/zoom.css" rel="stylesheet">
    <link href="css/listevento.css" rel="stylesheet">
    <link href="css/tiempo.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    
  <!--  <style>
      
      #map {
        width: 100%;
		    height: 500px; 
      }
    </style>
-->
  
  </head>

<body >
    <?php  include_once("header.php");?>
<!-- <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">                 
              <div class="col-md-3 col-sm-4 col-xs-6">   
              <a href="http://korpovibro.cl/home.php"> <img class="logo img-responsive" src="img/logotipo.png"/></a>
              </div>
            <div class="navbar-header">
                <button button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
            </div>
            <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">                                        
                  <div class="col-md-14 col-sm-15 col-xs-17">
                    <class="titulo">   
                    <h1 style="margin-top: 3%" align=right><font color=orange size=6 face="Arial Black">Apasiónate y disfruta </font></h1>                   
                  </div>    
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://korpovibro.cl/home.php">Home</a></li>                   
                    <li><a href="http://korpovibro.cl/busca-tu-clase.php">Busca tu clase</a></li>
                    <li><a href="http://korpovibro.cl/videos.php">Videos</a></li>
                    <li><a href="http://korpovibro.cl/instructores.php">Instructores</a></li>
                    <li><a href="http://korpovibro.cl/pago-clase.php">Suscripción</a></li>
                    <li><a href="http://korpovibro.cl/contactanos.php">contactanos</a></li>               
                </ul>
           
            </div> 
            <div class="pull-right" align="right">
              <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION["username"]; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://korpovibro.cl/perfil-instructor.php"><i class="icon-cog"></i> Mi Perfil </a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="icon-off"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul>
            </div>

        </div>         
  </div> -->
               
          <li><a href="http://korpovibro.cl/mis-clases.php"  id='clases'  style="display:block;">
            Mis Clases
            </a>
          </li>
                      
          <li>
            <a href="http://korpovibro.cl/ingresar-nueva-clase.php"  id='nuevaClase'  style="display:block;">
              Ingresar Nueva Clase
            </a>
          </li>
              
    
  </br></br></br></br></br></br></br></br></br></br> 

<div class="contact-pageheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-caption">
                        <h1 class="contact-title"><font size=5 >KorpoVibro te atenderá!!</font></h1>
                        <p class="contact-text">Puedes ponerte en contacto con KorpoVibro, envianos un correo, y llena el formulario a continuacion. 
                        </p>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <h3 class="contact-info-title">Contáctenos</h3>
                        <div class="row">
                            <form>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Name"></label>
                                        <input id="name" type="text" placeholder="Nombre" class="form-control1" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="email"></label>
                                        <input id="email" type="text" placeholder="Email" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Phone"></label>
                                        <input id="phone" type="text" placeholder="Telefono celular" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required sr-only" for="select"></label>
                                        <input id= "tipo-user" type="text"class="form-control" disabled= "disabled">
                                     </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control pdt20" id="textarea" name="textarea" rows="4" placeholder="Mensaje"></textarea>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                    <div class="form-group">  
                                        <div class="error"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <input class="btn btn-primary btn-lg enviar " type="button" value="Enviar mensaje" onclick="MensajeAjax()"name="commit">
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    

</br>
</br></br></br></br></br></br></br></br></br>

         
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
                          <img width="30" height="30" href="http://facebook.com/" src="img/logos/facebook.png" />
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

    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--Api de google -->
   <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&callback=initMap"></script>
    <script src="js/map.js"></script>-->
    
    <script src="js/contactanos.js?v=1"></script>
  </body>
</html>
