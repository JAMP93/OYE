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

  <link href="https://fonts.googleapis.com/css?family=Damion|Lato:300,400,700,900|Open+Sans:400,600,700,800|Pacifico|Quicksand:700|Yellowtail|Julius+Sans+One" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="../img/favicon/favicon-16x16.png" sizes="16x16" />
  
  <link rel="stylesheet" href="../css/font-awesome.css">

  <link rel="stylesheet" type="text/css" href="../css/form/component.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
  <link rel="stylesheet" type="text/css" href="../css/inicio-sesion.css" />
  <link rel="stylesheet" type="text/css" href="../css/footer.css" />
</head>
<body>

	  <nav class="navbar navbar-inverse navbar-fixed-top">
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
          	<li><a class="md-trigger" data-modal="modal-12" href="registrarse.php">REGISTRARSE</a></li>
          	<li><a class="md-trigger" data-modal="modal-13" href="#">INICIA SESIÓN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <br class="clearfix">
    
    <?php 
      if (isset($_GET['ur'])) {
        if ($_GET['ur']=='x') {
          echo "<div class='alert alert-info' role='alert'>Inicia sesión para entrar en <b><span>OYE!</span></b></div>";
        }
      }
    ?>

    <div class="formulario container" id="modal">
      <div class="contenido-modal">
        <h3>Introdúzca su Correo Electrónico y Contraseña</h3>
        <p>para entrar en la aplicación</p>
        <div>
          <form class="form-group cbp-mc-form" method="post" action="inicia-sesion.php">
            <div class="cbp-mc-column">   
              <div id="formemail" class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input class="form-control" type="text" id="email" name="email" placeholder="Correo Electrónico *" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
              </div>      
            </div>
            <div class="cbp-mc-column">
              <div id="formpass" class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control" type="password" id="pass" name="pass" placeholder="Contraseña *" required>
              </div>
            </div>
            <div class="check">
              <label class="concheck">Recuérdame
                <input type="checkbox" name="recuerdame">
                <span class="checkmark"></span>
              </label> 
            </div>
            <div class="cbp-mc-submit-wrap">
              <input class="cbp-mc-submit btnsubmit" type="submit" name="enviar" value="INICIA SESIÓN" id="enviar"/>
              <a class="md-close button" href="../index.php">Cerrar</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
      require_once 'conexion.php';
      $conexion = ConectarBD();
      require_once 'funciones/login.php';

      if (isset($_POST['enviar'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $recu = isset($_POST['recuerdame']) ? '1' : '0';

        login($conexion, $email, $pass, $recu);
      }
    ?>
  <br class="clearfix">
  <?php 
    include '../php/footer.php';
  ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>