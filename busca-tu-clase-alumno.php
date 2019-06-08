
<?php 
session_start();

// include_once('/modelo/bd.php');
$_SESSION["nombre"];
$_SESSION["foto"];
if(isset($_SESSION["username"])){
  echo "";
    //header("location:Login.php");
}else{
    echo '<script> window.location="index.php";</script>';
}
?>

<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>  -->
   <script src="js/jquery-3.3.1.min.map"></script> 

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        


     
  <head>
    <!-- NO olvidar insertar el ICONO del logo -->    
    <title>Busca tu clase</title>
    <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/perfile.css" rel="stylesheet">
    <style>
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
      #map {
        width: 100%;
		height: 600px; 
      }
      
      
    </style>
  </head>
  <body>
    <?php include_once("header.php");?>
   <!-- <div class="navbar navbar-default navbar-fixed-top">
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
           
            </div> 
            <div class="pull-right" align="right">
              <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION["nombre"]; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://korpovibro.cl/perfil-alumno.php"><i class="icon-cog"></i> Mi Perfil </a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="icon-off"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul>
            </div>

        </div>         
  </div> -->
  </br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        <div class="container">
            <div class="cuerpocompleto col-sm-12">
                <h3 style="color:orange;"><font face="Arial Black"> Busca tu clase</h3>
                <div id="cuerpo" class="col-sm-9"  >

                        <div class="row">

                            <div class="col-sm-6">
                                <input id="address" class="form-control" type="textbox" value=""  placeholder="Ingrese Direccion">

                            </div>

                            </br></br>

                            <div class="col-sm-6">
                                <select class="select-box" id ="optionClases">
                                    <option value="0" selected="selected">
                                    Clase
                                    </option>
                                    <option value="1">
                                    Zumba
                                    </option>
                                    <option value="2">
                                        Zumba Step
                                    </option>
                                    <option value="3">
                                    Zumba Kids
                                    </option>
                                    <option value="4">
                                    Strong
                                    </option>
                                    <option value="5">
                                    PoweRumba
                                    </option>
                                    <option value="6">
                                    Zumba in the Circuit
                                    </option>
                                </select>

                                </br>

                               <!-- <input  class="form-control" id="datetimepickerFecha" name="datetimepickerFecha" placeholder="Ingrese Fecha de clase" minlength="10" maxlength="10">-->


                                <!--<select class="select-box">
                                    <option value="0" selected="selected">
                                    Dias
                                    </option>
                                    <option value="1">
                                    Lunes
                                    </option>
                                    <option value="2">
                                    Martes 
                                    </option>
                                    <option value="3">
                                    Miercoles
                                    </option>
                                    <option value="4">
                                    Jueves
                                    </option>
                                    <option value="5">
                                    Viernes
                                    </option>
                                    <option value="6">
                                    Sabado
                                    </option>
                                    <option value="7">
                                    Domingo
                                    </option>
                                </select>-->
                            </div>
                        </div>
                            </br>
                            <div class="col-sm-3">
                               <!-- <button type="button" class="btn btn-primary btn-lg btn-block site-btn">-->
                                <button id="submit" value="Filtrar" type="button" class="btn btn-warning submit-button" >filtrar</button>
                                    <!--<i class="fa fa-search"> REVISAR PORQ</i>
                                Filtrar
                                </button>-->
                            </div>
                            </BR>
                            </br>
                </div>

            </div>

              
                </br></br></br></br></br></br></br></br>
                


                <div id="cuerpo2" align="right" class="col-sm-12">
            
                    <div id="map" class="col-md-4 col-sm-4 col-xs-12" align="center" onload="initMap()">
                            <!-- <input align="left" id="address" type="textbox" value="Sydney, NSW">
                            <input align="left"type="button" value="Encode" onclick="codeAddress()"> -->
                            

                            <!-- <img src="img/mapa.png" alt="mapa" width="600" height="400" class="img-responsive"/> -->
                                        

                            </br>
                            
                    </div>
                </div>
                    
        <!-- <div class="modal fade form-group col-md-12" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog form-group col-md-12 col-sm-1" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Informacion de la Clase</h4>
                    </div>
                    <div class="modal-body">
                        <input id="idclasemodal" name="idclasemodal" placeholder="Tipo de clase" class="form-control"  type="hidden">
                        
                        <label class="control-label">Tipo de clase</label>  
                        <select class="form-control" id="tipoclasemodal" name="tipoclases">
                            <option value="Seleccione">Tipo de clases</option>
                            <option value="1">Zumba</option>
                            <option value="2">Zumba Step</option>
                            <option value="3">Zumba Kids</option>
                            <option value="4">Strong</option>
                            <option value="5">Power Rumba</option>
                            <option value="6">Zumba in the Circuit</option>
                        </select>
                        <input id="idClase" name="idClase" class="form-control"  type="text">
                        <label class="control-label">Nombre Instructor</label> 
                        <input id="instructormodal" name="instructormodal" placeholder="Nombre de Instructor" class="form-control"  type="text">
                        <input id="idinstructor" name="idinstructor" class="form-control"  type="hidden">
                        <label class="control-label">Nombre de la Clase</label> 
                        <input id="nombreclasemodal" name="nombreclase" placeholder="Nombre de la Clase" class="form-control"  type="text">
                        <label class="control-label">Direccion de la clase</label> 
                        <input id="direccionmodal" name="direccionmodal" placeholder="Direccion" class="form-control"  type="text">
                        <label class="control-label">Fecha Inicio</label> 
                        <input  class="form-control" id="datetimepicker3" name="datetimepicker3" placeholder="Ingrese Fecha de Inicio" minlength="10" maxlength="10">
                        <label class="control-label">Fecha Termino</label> 
                            <input  class="form-control" id="datetimepicker4" name="datetimepicker4" placeholder="Ingrese Fecha de Termino" minlength="10" maxlength="10">

                        </br>
                        <div> 
                        <button id="tomar" value="tomar" type="button" class="btn btn-warning" >Tomar Clase</button>
                        
                        </div>

                        
                    </div>
                </div>
            </div>
        </div> -->

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
                
                    <label class="control-label">Tipo de clase</label>  
                    <select class="form-control" id="tipoclasemodal" name="tipoclases">
                        <option value="Seleccione">Tipo de clases</option>
                        <option value="1">Zumba</option>
                        <option value="2">Zumba Step</option>
                        <option value="3">Zumba Kids</option>
                        <option value="4">Strong</option>
                        <option value="5">Power Rumba</option>
                        <option value="6">Zumba in the Circuit</option>
                    </select>
                    <input id="idClase" name="idClase" class="form-control"  type="hidden">
                    <label class="control-label">Nombre Instructor</label> 
                    <input id="instructormodal" name="instructormodal" placeholder="Nombre de Instructor" class="form-control"  type="text">
                    <input id="idinstructor" name="idinstructor" class="form-control"  type="hidden">
                    <label class="control-label">Nombre de la Clase</label> 
                    <input id="nombreclasemodal" name="nombreclase" placeholder="Nombre de la Clase" class="form-control"  type="text">
                    <label class="control-label">Direccion de la clase</label> 
                    <input id="direccionmodal" name="direccionmodal" placeholder="Direccion" class="form-control"  type="text">
                    <label class="control-label">Fecha Inicio</label> 
                    <input  class="form-control" id="datetimepicker3" name="datetimepicker3" placeholder="Ingrese Fecha de Inicio" minlength="10" maxlength="10">
                    <label class="control-label">Fecha Termino</label> 
                        <input  class="form-control" id="datetimepicker4" name="datetimepicker4" placeholder="Ingrese Fecha de Termino" minlength="10" maxlength="10">

                    </br>
                    <div> 
                        <button id="tomar" value="tomar" type="button" class="btn btn-warning" >Tomar Clase</button>
                    <!-- <button id="borrar" value="borrar" type="button" class="btn btn-danger" >Borrar</button> -->
                    </div>
                </div>
                
            </div>
            </div>  
        </div>
        <!--MODAL CORREGIDO FIN-->
        
        </div>
        </div>

</br></br> </br></br></br> </br>
         
   


        

    <?php include_once("footer.php");?> 
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--Api de google -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw-k1pw29rHrRRK3Mhlnu-UodZG_uyksA&libraries=places&callback=initMap"></script>
    <script src="js/busca-tu-clase-alumno.js?v=53"></script>
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <!-- <script src="js/localizacion.js"></script> -->
  </body>
</html>

<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

	

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

