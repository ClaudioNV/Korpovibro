
<?php 
session_start();

include_once('/modelo/bd.php');
$_SESSION["nombre"];
$_SESSION["correo"];
if(isset($_SESSION["username"])){
  echo "";
    //header("location:Login.php");
}else{
  echo '<script> window.location="index.php";</script>';
}
?>
<!DOCTYPE html>
<html>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    
    

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-3.3.1.min.map"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>


  
  <head>
    <!-- NO olvidar insertar el ICONO del logo -->    
    <title>Ingresar Nueva Clase</title>
    <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->

    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/perfile.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">

    <style>
      
      #map {
        width: 100%;
		    height: 500px; 
      }
      .mymodal{
        position: fixed;
        left:0;
        right:0;
        top:0;
        bottom:0;
        margin:auto;
        display:table;

      }
      .mymodal > .modal-content{
        display: table-cell;
      }

    </style>
  
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

  </br></br></br></br></br></br></br></br></br></br></br></br>
  <section>

<div class="container" style="margin-top: 30px;">
  <div class="profile-head">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="text-center">
        <div class="col-md-2 col-sm-5 col-xs-12">
          <img src="" class="avatar img-circle img-thumbnail" alt="avatar" id="foto">
          </br>
        
        </div><!--col-md-4 col-sm-4 col-xs-12 close-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <h5><?php echo $_SESSION["nombre"]; ?></h5>
          
        </div><!--col-md-8 col-sm-8 col-xs-12 close-->
        

        
      </div>

    </div>

  </div><!--profile-head close-->
</div><!--container close-->

</br>
<div id="sticky" class="container">
 
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu " role="tablist">
      <!--<li class="active">
        <a href="#profile" role="tab" data-toggle="tab">
          <i class="fa fa-male"></i> Profile
        </a>
      </li> -->
      <li><a href="http://korpovibro.cl/perfil-instructor.php" >
        Perfil
        </a>
      </li>
      <li><a href="http://korpovibro.cl/mis-clases.php" >
        Mis Clases
        </a>
      </li>
      <li class="active"><a href="http://korpovibro.cl/ingresar-nueva-clase.php">
        Ingresar Nueva Clase
        </a>
      </li>

    </ul><!--nav-tabs close-->
    

 <div class="container2">
        <div class="cuerpocompleto col-sm-20" >
          <div id="cuerpo" class="col-sm-9" align="left">
            <div >  
               
            
            </div>
              <h3 style="color:orange;"><font face="Arial Black"> Mis clases</h3>

                <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Tipo de clase</label>  
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">

                        <select class="form-control" id="tipoclases" name="tipoclases">
						              <option value="Seleccione">Tipo de clases</option>
					              </select>
                        
                      </div>
                    </div>
                </div>
                                      <!-- nombre de la clase instructor -->
                <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Nombre de la Clase </label>  
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <input id="nombreclase" name="nombreclase" placeholder="Nombre de la Clase" class="form-control"  type="text">
                      </div>
                    </div>
                </div>
                      <!--  fin nombre de la clase instructor -->
                  
                  <div class="form-group col-md-12">
                      <label class="col-md-10 control-label">Hora inicio clase </label>  
                      <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                        							<input  class="form-control" id="datetimepicker1" name="datetimepicker1" placeholder="Ingrese Fecha de Inicio" minlength="10" maxlength="10">

                         <!-- <div class='input-group' id='datetimepicker1' name='datetimepicker1'>
                                    <input type='text' id="" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                          </div>-->
                           <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                        </div>
                      </div>
                  </div>
                 
                  <div class="form-group col-md-12">
                      <label class="col-md-10 control-label">Hora fin clase </label>  
                      <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                          <input  class="form-control" id="datetimepicker2" name="datetimepicker2" placeholder="Ingrese Fecha de Fin" minlength="10" maxlength="10">

                          <!--<div class='input-group date' id='datetimepicker2' name='datetimepicker2'>
                                    <input type='text' id="" class="form-control"/>-->
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                          <!--</div>-->
                        </div>
                      </div>
                  </div>
                   
                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Ubicación</label>        
                    <div class="col-md-12 inputGroupContainer">      
                      <div class="input-group">
                        <input id="address" class="form-control"type="textbox" value="">
                        <!--<input id="submit" type="button" value="Buscar">-->
                         
                        <button id="registrarClase" value="Guardar" type="button" class="btn btn-warning" >Guardar</button>
                      </div>
                    </div>  
                  </div>

                </br>
              <div id="map" class="col-sm-12" align="center">
                <!-- <input align="left" id="address" type="textbox" value="Sydney, NSW">
                <input align="left"type="button" value="Encode" onclick="codeAddress()"> -->
                

                 <!-- <img src="img/mapa.png" alt="mapa" width="600" height="400" class="img-responsive"/> -->
                               

                </br>
                
              </div>
              <!-- pruebaaaaa  -->
    <div id="modal" class="modal fade" role="dialog">
      <div class="modal-dialog mymodal">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Listado de clases </h4>
          </div>
          <div class="modal-body">
          <input id="idclasemodal" name="idclasemodal" placeholder="Tipo de clase" class="form-control"  type="hidden">
                 
                 <label class="control-label">Tipo de clase</label>  
                   <select class="form-control" id="tipoclasemodal" name="tipoclases">
                       <option value="Seleccione">Tipo de clases</option>
                        <option value="1">Zumba</option>
                         <option value="2">Zumba Step</option>
                          <option value="3">Zumba Kids</option>
                           <option value="4">Power Rumba</option>
                            <option value="5">Zumba in the Circuit</option>
                   </select>
               
               <label class="control-label">Nombre Instructor</label> 
               <input id="instructormodal" name="instructormodal" placeholder="Nombre de Instructor" class="form-control"  type="text">
               <label class="control-label">Nombre de la Clase</label> 
               <input id="nombreclasemodal" name="nombreclase" placeholder="Nombre de la Clase" class="form-control"  type="text">
               <label class="control-label">Direccion de la clase</label> 
               <input id="address" name="address" placeholder="Direccion" class="form-control"  type="text">
               <label class="control-label">Fecha Inicio</label> 
               <input  class="form-control" id="datetimepicker3" name="datetimepicker3" placeholder="Ingrese Fecha de Inicio" minlength="10" maxlength="10">
               <label class="control-label">Fecha Termino</label> 
               <input  class="form-control" id="datetimepicker4" name="datetimepicker4" placeholder="Ingrese Fecha de Termino" minlength="10" maxlength="10">
               </br>
               <div> 
                <!-- <button id="editar" value="editar" type="button" class="btn btn-warning" >Editar</button>
                <button id="borrar" value="borrar" type="button" class="btn btn-danger" >Borrar</button> -->
               </div>
          </div>
          
        </div>
      </div>  
    </div>



              

              
            <!-- <div class="col-sm-12" align="left">
              <h3>imagen</h3>
              <img src="img/zumba7.jpg" alt="zumba1"  width="600" height="600" class="img-responsive">
              <div class="col-sm-12"> -->
             
              
          </div>
         </div>
</div>
</div>
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
    <!--Api de google -->
    <script src="js/ingresa-clases.js?v=4"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&libraries=places&callback=initMap"></script>
    
    <!-- <script src="js/localizacion.js"></script> -->
  </body>
</html>

<!--<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			
	

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

