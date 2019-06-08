

<?php 





session_start();

$user= $_SESSION["username"];

$tipo_usuario = $_SESSION['id_tipo_usuario'];



 if ($tipo_usuario == 1){

 	$redirec="http://korpovibro.cl/perfil-instructor.php";



 }else if  ($tipo_usuario == 2){

 	$redirec="http://korpovibro.cl/perfil-alumno.php";





 }

 

include_once('/modelo/bd.php');

if(isset($_SESSION['username'])){

  echo "";

    //header("location:Login.php");

}else{

  echo '<script> window.location="Login.php";</script>';

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

    <link href="css/footer.css" rel="stylesheet">

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

    

    

<div class="navbar navbar-default navbar-fixed-top">

        <div class="container">                 

              <div class="col-md-3 col-sm-4 col-xs-6">   

                <a href="http://korpovibro.cl/home-alumno.php"> <img class="logo img-responsive" src="img/logotipo.png"/></a>

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

                    <li><a href="http://korpovibro.cl/home-alumno.php">Home</a></li>                  

                    <li><a href="http://korpovibro.cl/busca-tu-clase-alumno.php">Busca tu clase</a></li>

                    <li><a href="http://korpovibro.cl/videos-alumno.php">Videos</a></li>

                    <li><a href="http://korpovibro.cl/instructores-alumno.php">Instructores</a></li>

                    <li><a href="http://korpovibro.cl/pago-clase-alumno.php">Suscripción</a></li>

                    <li><a href="http://korpovibro.cl/contactanos-alumno.php">contactanos</a></li>               

                </ul>

           <!-- <button align="right" class="btn">Registrarse </button> --> 

            </div> 

            <div class="pull-right" align="right">

              <ul class="nav pull-right">

                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION["username"]; ?> <b class="caret"></b></a>

                  <ul class="dropdown-menu">

                    <li><a href="http://korpovibro.cl/perfil-alumno.php"><i class="icon-cog"></i> Mi Perfil </a></li>

                    <li class="divider"></li>

                    <li><a href="/logout"><i class="icon-off"></i> Cerrar Sesión</a></li>

                  </ul>

                </li>

              </ul>

            </div>



        </div>         

  </div>

  </br></br></br></br></br></br></br></br></br></br></br></br></br>



<div class="container">

    <div class="row">



        <div class="col-xs-12 col-md-4">

        

        

            <!-- CREDIT CARD FORM STARTS HERE -->

            <div class="panel panel-default credit-card-box">

                <div class="panel-heading display-table" >

                    <div class="row display-tr" >

                   

                        <h3 class="panel-title display-td" >DETALLE DE PAGO</h3>

                        </br></br>



                        <div class="display-td" >                            

                            <img class="img-responsive pull-right" src="img/transbank.png">

                        </div>

                    </div>                    

                </div>

                <div class="panel-body">

                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">

                        <div class="row">

                            <div class="col-xs-12">

                                <div class="form-group">

                                    <label for="cardNumber">NUMERO DE TARJETA</label>

                                    <div class="input-group">

                                        <input 

                                            type="tel"

                                            class="form-control"

                                            name="cardNumber"

                                            placeholder="Valid Card Number"

                                            autocomplete="cc-number"

                                            required autofocus 

                                        />

                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>

                                    </div>

                                </div>                            

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-7 col-md-7">

                                <div class="form-group">

                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRACION</span><span class="visible-xs-inline">EXP</span> FECHA</label>

                                    <input 

                                        type="tel" 

                                        class="form-control" 

                                        name="cardExpiry"

                                        placeholder="MM / YY"

                                        autocomplete="cc-exp"

                                        required 

                                    />

                                </div>

                            </div>

                            <div class="col-xs-5 col-md-5 pull-right">

                                <div class="form-group">

                                    <label for="cardCVC">CODIGO CV</label>

                                    <input 

                                        type="tel" 

                                        class="form-control"

                                        name="cardCVC"

                                        placeholder="CVC"

                                        autocomplete="cc-csc"

                                        required

                                    />

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-12">

                                <div class="form-group">

                                    <label for="couponCode">CODIGO DE CUPON</label>

                                    <input type="text" class="form-control" name="couponCode" />

                                </div>

                            </div>                        

                        </div>

                        <div class="row">

                            <div class="col-xs-12">

                                <button class="subscribe btn btn-success btn-lg btn-block" type="button">iniciar suscripción</button>

                            </div>

                        </div>

                        <div class="row" style="display:none;">

                            <div class="col-xs-12">

                                <p class="payment-errors"></p>

                            </div>

                        </div>

                    </form>

                </div>

            </div>            

            <!-- CREDIT CARD FORM ENDS HERE -->

            

            

        </div>            

        

        <div class="col-xs-12 col-md-8" style="font-size: 12pt; line-height: 2em;">

            <p><h1>Suscribete a Korpovibro por tan solo $5.000 Anuales.</h1>

                <h5>Instructor:<h5>

                <ul>

                      <li>Sin limites, si eres instructor podras ingresar todas las clases que desees, cuando quieras y donde quieras. </li>

                      <li>Podras estar en nuestro Staff de Instructores. </li>

                </ul>

                <h5>Alumno:<h5>

                <ul>

                      <li>Mayor alcance, si eres alumno podras ver todas las clases que esten disponibles sin importar la distancia. </li>

                      <li>Tendras mayores oportunidades de busqueda.</li>

                   

                </ul>

            </p>

            <p>Se Realiza pago Unico Anualmente</p>

            

            <p> 

                

            </p>

        </div>

        

    </div>

</div>  





















</br></br></br></br></br></br></br></br></br></br></br></br>

</br>

</br>



         

    

         <div id="footer">

          <div class="row">

                  <!-- footer-about -->

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

           

        </div> 

        





    <!--Insertamos jQuery dependencia de Bootstrap-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!--Insertamos el archivo JS compilado y comprimido -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--Api de google -->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&callback=initMap"></script>

    <script src="js/map.js"></script>

    

    <!-- <script src="js/localizacion.js"></script> -->

  </body>

</html>

