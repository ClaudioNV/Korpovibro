<?php 

$tokenCambioPass = $_GET['fp_code'];
?>




<!DOCTYPE html>
<html>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <head>
  <title>Login KorpoVibro </title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  
        <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
  
  </head>
  
  <body>
    
  |<div class="navbar navbar-default navbar-fixed-top">
        <div class="container">                 
              <div class="col-md-3 col-sm-4 col-xs-6">   
                <a href="http://korpovibro.cl/index.php"> <img class="logo img-responsive" src="img/logotipo.png"/></a>
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
                       
                    <h1 style="margin-top: 3%" align=right><font color=orange size=6 face="Arial Black">Apasiónate y disfruta </font></h1>                   
                  </div>    
                <ul class="nav navbar-nav navbar-right">                  
                    <li><a href="http://korpovibro.cl/busca-tu-clase.php">Busca tu clase</a></li>
                    <li><a href="http://korpovibro.cl/videos.php">Videos</a></li>
                    <li><a href="http://korpovibro.cl/instructores.php">Instructores</a></li>
                    <li><a href="http://korpovibro.cl/pago.clase.php">Suscripción</a></li>
                    <li><a href="http://korpovibro.cl/contactanos.php">contactanos</a></li>               
                </ul>
           <!-- <button align="right" class="btn">Registrarse </button> --> 
            </div> 

        </div>
    </div>    
        
</br></br></br></br></br></br></br></br></br>

<div class= "container">
    <div class="omb_login">
        </br>
        <h3 class="omb_authTitle"><font face="Arial Black">Recuperación de contraseña </h3>

        <!--<div class="row omb_row-sm-offset-3 omb_socialButtons">
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
                    <i class="fa fa-facebook visible-xs"></i>
                    <span class="hidden-xs">Facebook</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="btn btn-lg btn-block omb_btn-twitter">
                    <i class="fa fa-twitter visible-xs"></i>
                    <span class="hidden-xs">Twitter</span>
                </a>
            </div>	
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="btn btn-lg btn-block omb_btn-google">
                    <i class="fa fa-google-plus visible-xs"></i>
                    <span class="hidden-xs">Google+</span>
                </a>
            </div>	
        </div>-->

        <div class="row omb_row-sm-offset-3 omb_loginOr">
            <div class="col-xs-12 col-sm-6">
                <hr class="omb_hrOr">
                <span class="omb_spanOr">o</span>
            </div>
        </div>
        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">	
                <div class="omb_loginForm"  autocomplete="off">
                <input id="tokenRecepcionado" type="hidden" class="form-control" name="tokenRecepcionado" value="<?php echo $tokenCambioPass ?>">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="password1" type="password" class="form-control" name="password1" placeholder="Ingresar nueva contraseña">
                    </div>
                    <span class="help-block"></span>
                                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="password2" type="password" class="form-control" name="password2" placeholder="Repetir nueva contraseña">
                    </div>
                        </br>
                    <!-- <span class="help-block">Error de Contraseña</span> -->
                    <button  class="btn btn-lg btn-primary btn-block btn btn-success" type="button"  onclick="CambiarPass()">Recuperar</button>
</div>
               
                <div class="modal-body">  
                          <div class="error"></div>
                          <div class="true"></div>
                          <div id="number"></div>
                          <div class="msg"></div>
                </div>
            </div>
        </div>
        <div class="row omb_row-sm-offset-3">
           
            
        </div>	    	
    </div>
</div>

    
    
 
       
</br>
</br>
</br>
</br>
</br>
        
    <?php include_once("footer.php"); ?>

    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/recuperar_pw.js"></script>
    <!-- <script src="js/localizacion.js"></script> -->
  </body>
</html>
