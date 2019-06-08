
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
  //$_SESSION["nombre"];
  //echo $_SESSION["username"];
    //header("location:Login.php");
}else{
  echo '<script> window.location="index.php";</script>';
}
?>
<!DOCTYPE html>
<html>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  
  <head>
    <!-- NO olvidar insertar el ICONO del logo -->    
    <title>Mi Perfil</title>
    <!-- archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme -->
    <meta charset="utf-8">

    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/perfile.css" rel="stylesheet">

    <link href="css/header.css?v=5" rel="stylesheet">
    
    <script src="js/jquery-1.7.2.min.js"> </script>
    <script src= "js/AjaxUpload.2.0.min.js"> </script>
  
    
  </head>
  <body>
    
   <?php include_once("header.php");?> 
 
  </br></br></br></br></br></br></br></br></br></br></br></br></br>
  <section>

    <div class="container" style="margin-top: 30px;">
      <div class="profile-head">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="text-center">
            <div class="col-md-2 col-sm-5 col-xs-12">
              <img src="" class="avatar img-circle img-thumbnail" alt="perfil" id="foto">
              </br>
            
            </div><!--col-md-4 col-sm-4 col-xs-12 close-->
            <div class="col-md-5 col-sm-5 col-xs-12">
              <h5><?php echo $_SESSION["nombre"]; ?></h5>
              
            </div><!--col-md-8 col-sm-8 col-xs-12 close-->
            

            
          </div>

        </div>

      </div><!--profile-head close-->
    </div><!--container close-->

    </br>
    <div id="sticky" class="container" style="margin-top: 30px;">
     
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-menu " role="tablist">
          <!--<li class="active">
            <a href="#profile" role="tab" data-toggle="tab">
              <i class="fa fa-male"></i> Profile
            </a>
          </li> -->
          <li class="active"><a href="http://korpovibro.cl/perfil-alumno.php">
            Perfil
            </a>
          </li>
          <li><a href="http://korpovibro.cl/mis-clases-alumno.php" >
            Mis Clases
            </a>
          </li>

            <li>
            <a href="http://korpovibro.cl/ingresar-nueva-clase.php"  id='nuevaClase'  style="display:block;">
              Ingresar Nueva Clase
            </a>
          </li>

        </ul><!--nav-tabs close-->

      </br>
      <div class="tab-content">        
        <div class="tab-pane fade active in" id="change">
          <div class="container fom-main">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="register"><font face="Arial Black" align="center" >Actualice su perfil para mayor seguridad</h2>
              </div><!--col-sm-12 close-->

            </div><!--row close-->
              <br/>
            <div class="row">

              <div class="form-horizontal main_form text-left" action=" " method=""  id="contact_form">
                <fieldset>

                    <div class="form-group col-md-12 col-sm-12">
                      <label class="col-md-10 col-sm-10 control-label">Nombre</label>  
                      <div class="col-md-12 col-sm-12 inputGroupContainer">
                        <div class="input-group">
                          <input id="nombre" name="nombre" placeholder="Nombre" class="form-control"  type="text">
                        </div>
                      </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-md-12 col-sm-12">
                      <label class="col-md-10 col-sm-10 control-label" >Apellido</label> 
                      <div class="col-md-12 col-sm-12 inputGroupContainer">
                        <div class="input-group">
                          <input id="apellido" name="apellido" placeholder="Apellido" class="form-control"  type="text">
                        </div>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group col-md-12 col-sm-12">
                      <label class="col-md-10 col-sm-10 control-label">E-Mail</label>  
                      <div class="col-md-12 col-sm-12 inputGroupContainer">
                        <div class="input-group">
                          <input id="correo" name="correo" placeholder="E-Mail" class="form-control"  type="text">
                        </div>
                      </div>
                    </div>
                    <!-- Text input-->
      
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-md-10 col-sm-10 control-label">Telefono</label>  
                    <div class="col-md-12 col-sm-12 inputGroupContainer">
                      <div class="input-group">
                        <input id="telefono" name="telefono" placeholder="(+56)9-xxxxxxxx" class="form-control" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Text input-->
        
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-md-10 col-sm-10 control-label">Dirección</label>
                    <div class="col-md-12 col-sm-12 inputGroupContainer">
                      <div class="input-group">
                        <input id="direccion" class="form-control" name="direccion" placeholder="Pasaje/Calle, Número, Comuna" type="text">
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-md-10 col-sm-10 control-label">Cambio de contraseña</label>  
                    <div class="col-md-12 col-sm-12 inputGroupContainer">
                      <div class="input-group">
                        <input  id="password" name="password" placeholder="Cambio contraseña" class="form-control"  type="password">
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-md-10 col-sm-10 control-label">Confirme contraseña</label>  
                    <div class="col-md-12 col-sm-12inputGroupContainer">
                      <div class="input-group">
                        <input  id="password2" name="password2" placeholder="Confiram Password" class="form-control"  type="password">
                      </div>
                    </div>
                  </div>

                  <!-- Select Genero -->
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-md-10 col-sm-10 control-label">Genero</label>
                    <div class="col-md-7 col-sm-7">
                      <select id="sexo" name="sexo" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                        <option value="seleccione">Sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="no informar">No informar</option>
                      </select>
                      
                    </div>
                  </div>
                  <!-- upload profile picture -->
                  <div class="col-md-12 col-sm-12 text-left">
                  </br>
                    <div >
                      <div class="body-form">

                        <form id="form-proc-new" class="form-horizontal form-label-left">

                          <div class="clearfix"></div>
                          <div id="div_auto_fact_emisor" class="form-group col-sm-6">
                            <label for="auto_fact_emisor">Nombre de Foto</label>
                            <input type="text" class="form-control" id="auto_fact_emisor" name="auto_fact_emisor" placeholder="Ingrese Nombre a su Foto" minlength="2" maxlength="100">
                          </div>
                       
                          <div id="div_auto_fact_cargar" class="form-group col-sm-6">
                            <label for="auto_fact_cargar">Cargar Foto</label>
                            <input type="file" class="form-control" id="auto_fact_cargar" name="auto_fact_cargar" style="border-radius: inherit; height: auto;">
                          </div>

                          <div class="form-group col-sm-2">
                            <label for="btn_auto_fact_cargar" class="messages" style="color: gray;">cargar antes....</label>
                            <button type="submit" id="btn-proc-guardar" class="form-control btn btn-primary btn-sm" value="CARGAR" style="border-radius: inherit;">Cargar Foto</button>
                          </div>
                          <div class="ln_solid"></div>
                        </form>

                        <div class="clearfix" style="padding-bottom: 3%;"></div>

                      </div>
                                   

                    </div><!--uplod-picture close-->
                  </div><!--col-md-12 close-->
                  
                  <!-- Button -->
                  <div class="form-group col-md-10 col-sm-10">
                    <div class="col-md-6 col-sm-6">
                      <button id="actualizar" value="actualizar" type="submit" class="btn btn-warning submit-button" >Guardar</button>
                      <button type="submit" class="btn btn-warning submit-button" >Cancelar</button>

                    </div>
                  </div>
                </fieldset>   
              </div>               
            </div><!--row close-->
          
          </div><!--container fom-main close -->
        </div><!--tab-pane-->
    </div>
  </section>
    </br>
    </br>

    <div class="modal fade col-sm-offset-3 col-sm-6" id="modalCargandoFoto" tabindex="-1" role="dialog" aria-hidden="true" style="height: 6500px;">
				<div class="modal-dialog">
					<div class="modal-content" style="height: 500px;">
						<div class="modal-header text-center">
							<button type="button" class="close" data-dismiss="modal" id="cerrarmodal" aria-hidden="true">&times;</button>
						</div>
					<div class="modal-body"> <!--MODAL-BODY-->
							 <div id="" align="center">
								<img src="<?= $base_url; ?>img/cargandofoto.gif" alt="Korpovibro.cl" style="height: 200; width: 200px; margin-top: 50px;">
								<h4>Subiendo foto...</h4>				
						
					</div> 
						</div>

					</div> <!--MODAL-BODY-->
				</div>
			</div>

    <?php include_once("footer.php");?>


    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--Api de google -->
    <!-- <script src="js/map.js"></script> -->
    <script src="js/perfil-alumno.js?v=8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
    <!-- <script src="js/localizacion.js"></script> -->
  </body>
</html>