
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
    <link href="css/footer.css?v=1" rel="stylesheet">
    <link href="css/zoom.css" rel="stylesheet">
    <link href="css/listevento.css" rel="stylesheet">
    <link href="css/tiempo.css" rel="stylesheet">
    
    
    <style>
      
      #map {
        width: 100%;
		    height: 500px; 
      }
    </style>

  
  </head>

<body >
    <?php include_once("header.php"); ?>
<!-- <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">                 
              <div class="col-md-3 col-sm-4 col-xs-6">   
                <img class="logo img-responsive" src="img/logotipo.png"/>
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
    
  </br></br></br></br></br></br></br></br></br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
          </br></br>
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

    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h3 style="color:orange;"><font face="Arial Black"> Encuentra tu clase mas cercana</h3>
          <div class="map-responsive" id="map"  onload="initMap()">
              </br>
            
          </div>
        </div>
        
        <div class="col-xs-6">
            <h3 style="color:orange;"><font  face="Arial Black"> Te estamos esperando</h3>
            <img src="img/zumba2.jpg" width="100%" height="100%" class="img-responsive"/>
        </div>
      </div>
    </div>
    

      <!-- <div class="container2">
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
              
              By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
              -->
              <!--</a><div id="awcc1526943803463" class="aw-widget-current"  data-locationkey="60425" data-unit="c" data-language="es" data-useip="false" data-uid="awcc1526943803463"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
            </div>
          </div>
        </div> -->


		<!--<aside id="accordion" class="social text-vertical-center">
			<div class="accordion-social">
				<ul class="panel-collapse collapse in nav nav-stacked" role="tabpanel" aria-labelledby="social-collapse" id="collapseOne">
					<li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
					<li><a href="https://www.plus.google.com/" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
				</ul>
			</div>
		</aside>-->
         </br>
    
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
        <?php require_once('footer.php'); ?>    


    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--Api de google -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&callback=initMap"></script>
    <script src="js/map-home.js"></script>
    
    <!-- <script src="js/localizacion.js"></script> -->
  </body>
</html>
