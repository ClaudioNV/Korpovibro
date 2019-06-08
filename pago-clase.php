

<?php 

session_start();



// include_once('/modelo/bd.php');

$_SESSION["nombre"];

$_SESSION["apellido"];

$_SESSION["foto"];

$_SESSION['id'];

$_SESSION['estado'];

$estado = $_SESSION['estado'];

$tipo_usuario =  $_SESSION['id_tipo_usuario'];



if(isset($_SESSION["username"])){

  //echo $_SESSION["username"];

    //header("location:Login.php");

}else{

  echo '<script> window.location="index.php";</script>';

}



include_once('/modelo/bd.php');	

require_once "modelo/mercadopago.php";

    



?>

<!DOCTYPE html>

<html>

 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

   

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



    	<!--api mercadopago-->

	<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

	<!-- cdn numeral -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>

    

    

    <style>

      

      #map {

        width: 100%;

		    height: 500px; 

      }

    </style>

    <script>

        $(document).ready(function(){

            $('.dropdown-toggle').dropdown(); 

        });

    </script>

  

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

                     

          <li><a href="http://korpovibro.cl/mis-clases.php"  id='clases'  style="display:block;">

            Mis Clases

            </a>

          </li>

                      

          <li>

            <a href="http://korpovibro.cl/ingresar-nueva-clase.php"  id='nuevaClase'  style="display:block;">

              Ingresar Nueva Clase

            </a>

          </li>

              



			<div class="modal fade col-sm-9" id="modalMercadoPago" tabindex="-1" role="dialog" aria-hidden="true" style="height: 650px;">

				<div class="modal-fade" style="padding-left: 300px;padding-top: 60px;">

					<div class="modal-content" style="height: 550px;">

						<div class="modal-header text-center">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						</div>

						<div class="modal-body">						

						    <iframe id="iframe_pago" width="100%" height="475px"></iframe>

						</div>

					</div>

				</div>

            </div>

          

    

  </br></br></br></br></br></br></br></br></br>



<div class="container">

    <div class="row">

        <div class="col-xs-12 col-md-4">

        

        

            <div id="credito" class="form-group col-sm-4">

				<br>

					<label>Pago con: <!--Tarjeta de Crédito--></label>

						<a type="button" href="#" ><img class="img-responsive" src="<?= $base_url; ?>img/pago/mercado-pago.jpg" alt="Korpovibro.cl Viajes" id="mercadopago" style="

    						border-radius: 15px; max-width: 200%;"></a>

						</div>

            </div>            

        

        <div class="col-xs-12 col-md-8" style="font-size: 12pt; line-height: 2em;">

            <p><h1>Suscribete a Korpovibro por tan solo $5.000 Anuales.</h1>
			</br>

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

            <p>Se Realiza pago Unico Anualmente </p>

            

            <p> 

                

            </p>

        </div>



        

			



        

    </div>

</div>  





















</br></br></br></br></br></br></br></br></br></br></br></br>

</br>

</br>





    <?php include_once("footer.php"); ?>    





    <!--Insertamos jQuery dependencia de Bootstrap-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!--Insertamos el archivo JS compilado y comprimido -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--Api de google -->

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

             <script src="js/pagar.js?v=4"></script>





    

    <!-- <script src="js/localizacion.js"></script> -->

  </body>

</html>

