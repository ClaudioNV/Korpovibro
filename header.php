<!-- NAVBAR -->
		<!--<nav class="navbar navbar-default navbar-fixed-top nav-fijo" role="navigation">
			<div class="navbar-header">
                <button button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
            </div>
				<div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">     
				<div id ="logo" class="collapse navbar-collapse navbar-responsive-collapse">
					<div class="col-sm-offset-1 col-sm-2" >
						<a href="http://korpovibro.cl/index.php"><img class="img-responsive" src="img/logotipopt.png" alt="Korpovibro.cl"  title="Korpovibro.cl"></a>
					</div>
					 <div id = "titulo" class="col-md-14 col-sm-15 col-xs-17">
                       		<h1 >Apasiónate y disfruta</h1>                   
                  	</div> 
					<ul id ="navbar" class="nav navbar-nav navbar-right">
						<li ><a href="http://korpovibro.cl/busca-tu-clase.php">Busca tu clase</a></li>
						<li ><a href="http://korpovibro.cl/videos.php">Videos</a></li>
						<li ><a href="http://korpovibro.cl/instructores.php">Instructores</a></li>
						<li ><a href="http://korpovibro.cl/pago-clase.php">Suscripción</a></li>
						<li ><a href="http://korpovibro.cl/contactanos.php">contactanos</a></li>
					</ul>
				</div>
				<ul id = "logreg" class="nav pull-right">
					<!--<a href="http://korpovibro.cl/Login.php">Inicia sesión o Registrate</a>-->

                 <a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Inicia sesión</a>
				  <a data-toggle="modal">o</a>  
                 <a  data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Registrarse</a>
				 
				</ul>
				<br><br>
			</div>
		</nav>
<!-- FIN NAVBAR -->

<script src="js/verificar-header.js"></script>

<div class="navbar navbar-default navbar-fixed-top">
        <div class="container">                 
              <div class="col-md-3 col-sm-4 col-xs-6">   
              <a href="http://korpovibro.cl/home.php"> <img class="logo img-responsive" src="img/logotipopt.png"/></a>
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
                      
                    <h1 style="margin-top: 5%" align=right><font color= "orange" size=6 face="Arial Black">Apasiónate y disfruta </font></h1>                   
                  </div>    
               <ul class="nav navbar-nav navbar-right">                  
                   <li id="buscar" style="display:none;"><a href="http://korpovibro.cl/busca-tu-clase-alumno.php">Busca tu clase</a></li>
                    <li><a href="http://korpovibro.cl/videos.php" style='display:block;' id='vid' >Videos</a></li>
                    <li><a href="http://korpovibro.cl/instructores-new.php"style='display:block;' id='instru' >Instructores</a></li>
                    <li id="pago"><a href="http://korpovibro.cl/pago-clase.php">Suscripción</a></li>
                    <li id="contact"><a href="http://korpovibro.cl/contactanos.php">contactanos</a></li>    
                        <!-- <div id="header">
                            <ul class="nav">
                                <li><a href="">Inicio</a></li>
                                <li><a href="">Clases</a>
                                    <ul>
                                        <li><a href="">Zumba</a></li>
                                        <li><a href="">Zumba Step</a></li>
                                        <li><a href="">Zumba Kids</a></li>
                                        <li><a href="">Stong</a>
                                        <li><a href="">PweRumba</a>
                                        <li><a href="">Zumba in the Circuit</a>
                                            <ul>
                                                <li><a href="">Submenu1</a></li>
                                                <li><a href="">Submenu2</a></li>
                                                <li><a href="">Submenu3</a></li>
                                                <li><a href="">Submenu4</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="">Planes</a>
                                    <ul>
                                        <li><a href="">Plan Anual</a></li>
                                        <li><a href="">Plan Semestral</a></li>
                                        <li><a href="">Plan PT</a></li>
                                        <li><a href="">Promociones</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Acerca de</a>
                                    <ul>
                                        <li><a href="">Vision</a></li>
                                        <li><a href="">Mision</a></li>
                                        <li><a href="">Valores</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Contacto</a></li>
                                  <li><a href="">Videos</a></li>
                            </ul>
                        </div>          -->
                </ul>
            
           <!-- <button align="right" class="btn">Registrarse </button> --> 
            </div> 
            <div class="pull-right inicio" align="right" style='display:block;' id='mostrar' >
              <ul class="nav pull-right">
               <a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Inicia sesión</a>
				  <a data-toggle="modal">o</a>  
                 <a  data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Registrarse</a>
                  <input id="nomSesion" type="hidden" value="<?php echo $_SESSION["id_tipo_usuario"]; ?>">
                    <input id="idtd" type="hidden" value="<?php echo $_SESSION["id"]; ?>">
                  <input id="vencimiento" type="hidden" value="<?php echo $_SESSION["vencimiento"]; ?>">
                  <input id="fechaActual" type="hidden" value="<?php echo $_SESSION["fechaActual"]; ?>">

              <br><br>
              </ul>
            </div>
            
            

            <div class="pull-right perfil" align="right"  id='oculto'  style="display:none;">
              <ul class="nav pull-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION["nombre"]; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                   
                          
                    <li id=alumn  style="display:none;"><a href="http://korpovibro.cl/perfil-alumno.php"><i class="icon-cog"></i> Mi Perfil </a></li>
                     
                    <li id=instruc  style="display:none;"><a href="http://korpovibro.cl/perfil-instructor.php"><i class="icon-cog"></i> Mi Perfil </a></li>
                           
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="icon-off"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul>
            </div>

        </div>         
</div>