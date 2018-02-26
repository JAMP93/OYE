<?php 

	function cabecera($tipo){
		if ($tipo == 'operario') {
			?>
			<nav class="navbar navbar-inverse navbar-top">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <div class="circle"> <a id="logo" href="../index.php">OYE!</a> </div>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="">
		        <ul class="nav navbar-nav navbar-left">
		          	<li><p class="navbar-text">"Interactúa con tu ciudad"</p></li>
		          </ul>
		          <ul class="nav navbar-nav navbar-right">
		          	<li><a class="md-trigger" data-modal="modal-12" href="inicio.php">Inicio</a></li>
		          	<li><a class="md-trigger" data-modal="modal-13" href="trabajos.php">Mis trabajos</a></li>
		          	<li><a class="md-trigger" data-modal="modal-13" href="perfil.php">Mi perfil</a></li>
		          	<li><a class="md-trigger" data-modal="modal-13" href="cerrar-sesion.php">Cerrar Sesión</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
		      </div>
		    </nav>

		    <br class="clearfix">
			<?php
		}

		if ($tipo == 'usuario') {
			?>
			<nav class="navbar navbar-inverse navbar-top">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <div class="circle"> <a id="logo" href="../index.php">OYE!</a> </div>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="">
		        <ul class="nav navbar-nav navbar-left">
		          	<li><p class="navbar-text">"Interactúa con tu ciudad"</p></li>
		          </ul>
		          <ul class="nav navbar-nav navbar-right">
		          	<li><a class="md-trigger" data-modal="modal-12" href="inicio.php">Inicio</a></li>
		          	<li><a class="md-trigger" data-modal="modal-13" href="trabajos.php">Mis peticiones</a></li>
		          	<li><a class="md-trigger" data-modal="modal-13" href="perfil.php">Mi perfil</a></li>
		          	<li><a class="md-trigger" data-modal="modal-13" href="cerrar-sesion.php">Cerrar Sesión</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
		      </div>
		    </nav>

		    <br class="clearfix">
			<?php
		}

		if (!isset($_SESSION)) {
	      	session_start();
	    }

		if ($tipo == 'administrador') {
				$nombre = "";
			if (isset($_COOKIE['maria'])) {
				session_decode($_COOKIE['maria']);
				$nombre = $_SESSION["nom_usu"];
				$nombre = "Está: $nombre";	
			}
			?>
			<div class="container">
				<header id="header" class="clearfix">
					<h1>Administración</h1>
					<span><?php echo "$nombre"; ?></span>
				</header><!-- /header -->
				<ul class="navbar-administrador">
		          	<li><div class="circle"> <a id="logo" href="inicio.php">OYE!</a></div></li>
		          	<li>
		          		<div class="contenedor">
			          		<a href="peticiones.php">
			          			<img src="../../img/icons/peticion.png" title="Peticiones" class="image">
			          			<div class="overlay">
			          				<div class="text">Peticiones</div>
			          			</div>
			          		</a>
			          	</div>
		          	</li>
		          	<li>
		          		<div class="contenedor">
			          		<a href="trabajos.php">
			          			<img src="../../img/icons/construccion.png" title="Trabajos" class="image">
			          			<div class="overlay">
			          				<div class="text">Trabajos</div>
			          			</div>
			          		</a>
			          	</div>
		          	</li>
		          	<li>
		          		<div class="contenedor">
			          		<a href="usuarios.php">
			          			<img src="../../img/icons/usuarios.png" title="Usuarios" class="image">
			          			<div class="overlay">
			          				<div class="text">Usuarios</div>
			          			</div>
			          		</a>
			          	</div>
		          	</li>
		          	<li>
		          		<div class="contenedor">
			          		<a href="trabajadores.php">
			          			<img src="../../img/icons/trabajador.png" title="Trabajadores" class="image">
			          			<div class="overlay">
			          				<div class="text">Trabajadores</div>
			          			</div>
			          		</a>
			          	</div>
		          	</li>
		          	<li>
		          		<div class="contenedor">
			          		<a href="configuracion.php">
			          			<img src="../../img/icons/configuracion.png" title="Configuración" class="image">
			          			<div class="overlay">
			          				<div class="text">Configuracion</div>
			          			</div>
			          		</a>
			          	</div>
		          	</li>
		          	<li>
		          		<div class="contenedor">
			          		<a href="cerrar-sesion.php">
			          			<img src="../../img/icons/logout.png" title="Cerrar Sesión" class="image">
			          			<div class="overlay">
			          				<div class="text">Cerrar Sesión</div>
			          			</div>
			          		</a>
			          	</div>
		          	</li>
		        </ul>
			</div>

		    <br class="clearfix">
			<?php
		}
	}
?>