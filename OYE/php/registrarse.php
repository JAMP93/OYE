<?php
    session_start();
    if(isset($_COOKIE["maria"]))
        session_decode($_COOKIE["maria"]);
        
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>OYE! - 'Iteractúa con tu ciudad'</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5, CSS, MySQL, JavaScript, Bootstrap">
    <meta name="author" content="Juan Antonio Martín Palma">
    <meta name="description" content="OYE! 'Iteractúa con tu ciudad'" />

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700,800|Pacifico|Quicksand:700|Yellowtail|Julius+Sans+One" rel="stylesheet">

    <link rel="icon" type="image/png" href="../img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/form/component.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/registrarse.css" />
  	<link rel="stylesheet" type="text/css" href="../css/footer.css" />

	<script src="../js/js-webshim/minified/polyfiller.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script scr="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="../js/jquery.mask.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
</head>
<body>

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
          	<li><a class="md-trigger" data-modal="modal-12" href="#">REGISTRARSE</a></li>
          	<li><a class="md-trigger" data-modal="modal-13" href="inicia-sesion.php">INICIA SESIÓN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <br class="clearfix">
	
	<div class="formulario container" id="modal">
		<div class="contenido-modal">
			<h3>Rellene el formulario para completar el registro</h3>
			<p>Estos datos son necesarios para un correcto funcionamiento de la aplicación</p>
			<div>
				<form class="form-group cbp-mc-form" method="post" action="registrarse.php">
					<div class="cbp-mc-column">
		  				<div id="formnom" class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
						  	<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre *" minlength="3" pattern="[A-Za-z]+" required>
						</div>
						<div id="formape" class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
						  	<input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos *" pattern="[A-Za-z]+" required>
						</div>
						<div id="formusu" class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
						  	<input class="form-control" type="text" id="user" name="user" placeholder="Usuario *" >
						</div>
						<div id="formpass" class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
						  	<input class="form-control" type="password" id="pass" name="pass" placeholder="Contraseña *" required>
						</div>
		  			</div>
		  			<div class="cbp-mc-column">
		  				<div id="formtel" class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						  	<input class="form-control" type="text" id="telefono" name="telefono" maxlength="9" pattern="/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/" placeholder="Teléfono">						  	
						</div>
						<div id="formemail" class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						  	<input class="form-control" type="text" id="email" name="email" placeholder="Correo Electrónico *" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
						 
						</div>
						<div id="formdate" class="input-group margin-bottom-sm">
		  					<input type="date" name="fecha" class="disable-weekends hide-spinbtns" data-date-start-view="2" data-date='{"startView": 2, "openOnMouseFocus": true}' max="<?php include 'funciones/funcionMayorEdad.php';?>" id="date" placeholder="Fecha de Nacimiento" required/><span>* Debes ser mayor de edad</span>
		  				</div>
		  			</div>
		  			<div class="cbp-mc-submit-wrap">
		  				<input class="cbp-mc-submit btnsubmit" name="guardar" type="submit" value="Guardar" id="enviar"/>
		  				<a class="md-close button" href="../index.php">Cerrar</a>
		  			</div>
				</form>
			</div>
		</div>
	</div>

	<?php 
		require_once 'conexion.php';
		$conexion = ConectarBD();
		require_once 'funciones/reg-usu.php';

		if (isset($_POST['guardar'])) {
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$usuario = $_POST['user'];
			$contrasena = $_POST['pass'];
			$telefono = $_POST['telefono'];
			$email = $_POST['email'];
			$fecha = $_POST['fecha'];

			registrarUsuario($conexion, $nombre, $apellidos, $usuario, $contrasena, $telefono, $email, $fecha);
		}
	?>

	<br class="clearfix">

	<?php 
		include '../php/footer.php';
	?>
	<script type="text/javascript">
		webshim.polyfill('forms forms-ext');

		$(function () {
		    //valuevalidation was renamed to "validatevalue"
		    $('input.disable-weekends').on('validatevalue', function (e, data) {
		        //check wether data.valueAsDate is provided
		        if (data.valueAsDate) {
		            var day = data.valueAsDate.getDay();
		            return !day || day == 6 ?
		                "Please enter only weekdays. {%value} is a weekend." : false;
		        }
		    });

		});

		$("#telefono").mask('999 99 99 99');

	</script>
</body>
</html>