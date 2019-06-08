
<?php 
session_start();


$_SESSION["nombre"];
$_SESSION["apellido"];
$_SESSION["foto"];
$user= $_SESSION["username"];
$tipo_usuario = $_SESSION['id_tipo_usuario'];

if ($tipo_usuario == 1){
  $redirec="http://korpovibro.cl/perfil-instructor.php";

}else if  ($tipo_usuario == 2){
  $redirec="http://korpovibro.cl/perfil-alumno.php";


}


if(isset($_SESSION['username'])){
 echo "";
   //header("location:Login.php");
}else{
  echo '<script> window.location="index.php";</script>';
}

?>
<!DOCTYPE html>
<html>
  <head>
    <!-- NO olvidar insertar el ICONO del logo -->    

    <title>Mi Perfil</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="js/jquery-3.3.1.min.map"></script> -->
     <script src="https://code.jquery.com/jquery-3.0.0.js"></script> 
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->

    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/perfile.css" rel="stylesheet">
  
    <style>
      
      #map {
        width: 100%;
		    height: 700px; 
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
      .active{
      color: orange;
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
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION["nombre"]; ?> <b class="caret"></b></a>
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
          <li class="active"><a href="http://korpovibro.cl/mis-clases.php" >
            Mis Clases
            </a>
          </li>
          <li><a href="http://korpovibro.cl/ingresar-nueva-clase.php">
            Ingresar Nueva Clase
            </a>
          </li>
        </ul><!--nav-tabs close-->


        <div class="container2">
                <div class="cuerpocompleto col-sm-20">
                  <div id="cuerpo" class="col-sm-9" align="left">
                      <h3 style="color:orange;"><font face="Arial Black"> Mis clases</h3>
                      <input id="iduser" name="iduser" placeholder="iduser" class="form-control"  type="hidden">
                      <div>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <!-- <th scope="col">Iduser</th>
                              <th scope="col">Idclass</th> -->
                              <th class="col-sm-3" scope="col">Nombre Clase</th>
                              <th class="col-sm-3" scope="col">Tipo Clases</th>
                              <th class="col-sm-3" scope="col">Hora Inicio</th>
                              <th class="col-sm-3" scope="col">Hora Fin</th>
                              <th class="col-sm-3" scope="col">Direccion</th>
                              <th scope="col">Estado</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody id="clases">
                            
                          </tbody>
                        </table>
                      </div>  
                      <div> 
                        <button id="show" type="button" class="btn btn-success">Mostrar Mapa </button> 
                      </div>
                      <div id="map" class="col-sm-12" style="display:none;">
                        <!-- <img src="img/mapa.png" alt="mapa" width="600" height="400" class="img-responsive"/> -->
                                      

                        </br>
                        
                      </div> 
                      
                          <!--MODAL CORREGIDO -->
                          <div id="modal" class="modal fade" role="dialog">
                            <div class="modal-dialog mymodal">

                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Listado de clases </h4>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                  <input id="idclasemodal" name="idclasemodal" placeholder="Tipo de clase" class="form-control"  type="hidden">
                                  <input id="tipoclasecordenadas" name="tipoclasecordenadas" placeholder="Tipo de clase" class="form-control"  type="hidden">

                                  <label for="exampleInputEmail1">Tipo de clase</label>
                                      <select class="form-control" id="tipoclasemodal" name="tipoclasemodal">
                                          <option value="Seleccione">Tipo de clases</option>
                                          <option value="1">Zumba</option>
                                          <option value="2">Zumba Step</option>
                                          <option value="3">Zumba Kids</option>
                                          <option value="4">Strong </option>
                                          <option value="5">Power Rumba</option>
                                          <option value="6">Zumba in the Circuit</option>
                                      </select>
                                  </div>

                                  <div class="form-group">
                                  <label for="exampleInputPassword1">Nombre de la Clase</label>
                                      <input id="nombreclasemodal" name="nombreclase" placeholder="Nombre de la Clase" class="form-control"  type="text">
                                  </div>

                                  <div class="form-group">
                                  <label for="exampleInputPassword1">Direccion de la clase</label>
                                      <input id="direccionmodal" name="direccionmodal" placeholder="Direccion" class="form-control"  type="text">
                                          <small id="emailHelp" class="form-text text-muted">Actualiza tu direccion</small>
                                  </div>                                     


                                  <div class="form-group">
                                  <label for="exampleInputPassword1">Fecha Inicio</label>
                                      <input  class="form-control" id="datetimepicker3" name="datetimepicker3" placeholder="Ingrese Fecha de Inicio" minlength="10" maxlength="10">
                                  </div>

                                  <div class="form-group">
                                  <label for="exampleInputPassword1">Fecha Termino</label>
                                      <input  class="form-control" id="datetimepicker4" name="datetimepicker4" placeholder="Ingrese Fecha de Termino" minlength="10" maxlength="10">
                                  </div>

                                  <!-- <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                  </div> -->
                                  <button id="editarClase" type="submit" onClick="mapa.getCoords()"class="btn btn-primary">Editar</button>
                                  <button id="borrar" type="submit" class="btn btn-danger">Borrar</button> 
                                </div>
                                
                              </div>
                            </div>  
                          </div>
                          <!--MODAL CORREGIDO FIN-->
                    
                    
                  </div> <!--cuerpo-->
                      
                </div><!--cuerpoconpleto-->
        
        </div><!--container2-->
    </div><!--Sticky-->
  </section>
</br>
</br>
       
  <?php include_once("footer.php"); ?> 
  

    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--Api de google -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&callback=initMap"></script>

    <script src="js/mis-clases-instructor.js?v=72"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  
    <!-- <script src="js/localizacion.js"></script> -->
  </body>
</html>
