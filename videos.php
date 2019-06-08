
<?php 


session_start();
$user= $_SESSION["username"];
$tipo_usuario = $_SESSION['id_tipo_usuario'];

 if ($tipo_usuario == 1){
 	$redirec="http://korpovibro.cl/perfileinstructor.php";

 }else if  ($tipo_usuario == 2){
 	$redirec="http://korpovibro.cl/perfilealumno.php";


 }
 
include_once('/modelo/bd.php');
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
    <title>KorpoVibro Tutoriales</title>
    <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    
  
  </head>
  <body>
  <?php include_once("header.php");?>
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
  </br></br></br></br></br></br></br></br></br></br></br></br></br>
    <div class="container">
        <h1 align=center><font color=orange face="Arial Black"> Instructores destacados y tutoriales</h1>
        </br>
        </br>
        <div class="row">
            <div class="col-md-4">
                <h4><font color=black face="Arial Black">Elvis Aravena</h4>
                <p>
                    Destacado gracias al apoyo incondicional de sus alumnas tanto de Renca y Quilicura, ingresa a sus clases!
                </p><img src="img/slider/1.jpg" class="img-responsive center-block" alt="tv">
            
                <p>
                    <small>Image: <a href="https://www.facebook.com/profile.php?id=100010681544840" target="_blank">Zumba Renca</a><br>
                    <a href="https://www.facebook.com/profile.php?id=100010681544840">   </a></small>
                </p>
            
            </div><!--.col -->
        
            <div class="col-md-8">
                <div class="vid">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/2bu-y2_ZN8o" frameborder="2" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div><!--./vid -->
            
            </div><!--.col -->
        
            </br>
            </br>
            </br>
            </br>

            <div class="col-md-4">
                <h4><font color=black face="Arial Black">Jorge Zamora</h4>
                <p>
                    Destacado gracias a su simpatia, carisma y acercamiento hacia sus alumnas. Conocido como el negrito sabrozon! siguelo!
                </p><img src="img/slider/2.jpg" class="img-responsive center-block" alt="tv">
            
                <p>
                    <small>Image: <a href="https://www.facebook.com/ayz.zumba.1" target="_blank">AZ Zumba</a><br>
                    <a href="https://www.facebook.com/ayz.zumba.1">  </a></small>
               
                </p>
            
            </div><!--.col -->
        
            <div class="col-md-8">
                <div class="vid">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/00n6yL4kMZU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div><!--./vid -->
            
            </div><!--.col -->

            </br>
            </br>
            </br>
            </br>

            <div class="col-md-4">
                <h4><font color=black face="Arial Black">Felipe Leiva</h4>
                <p>
                    Destacado gracias a su simpatia y cariño hacia sus alumnas, mas conocido como el loquillo!
                </p><img src="img/slider/33.jpg" class="img-responsive center-block" alt="tv">
            
                <p>
                    <small>Image: <a href="https://www.facebook.com/zumbacon.felipeleiva" target="_blank">Felipe Leiva</a><br>
                    <a href="https://www.facebook.com/zumbacon.felipeleiva">  </a></small>
               
                </p>
            
            </div><!--.col -->
        
            <div class="col-md-8">
                <div class="vid">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/1VSqWp5DZiU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div><!--./vid -->
            
            </div><!--.col -->


            <div class="col-md-12">
                <h3><font color=orange face="Arial Black">Lo Nuevo</h3>
                <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/JMjkYayXLcA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div><!--./row -->
    
    </div><!--./container -->


    </br>
    </br>
    </br>
    </br>
    </br>
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
    <?php include_once("footer.php"); ?>    

    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
