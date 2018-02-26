<?php
    session_start();
    if(isset($_COOKIE["maria"]))
        session_decode($_COOKIE["maria"]);      
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	  <meta charset="UTF-8">
    <title>OYE! - 'Iteractúa con tu ciudad'</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5, CSS, MySQL, JavaScript, Bootstrap">
    <meta name="author" content="Juan Antonio Martín Palma">
    <meta name="description" content="OYE! 'Iteractúa con tu ciudad'" />

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Damion|Lato:300,400,700,900|Open+Sans:400,600,700,800|Pacifico|Quicksand:700|Yellowtail|Julius+Sans+One" rel="stylesheet">

    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="css/font-awesome.css">
	  <link rel="stylesheet" type="text/css" href="css/index.css" />
	  <link rel="stylesheet" type="text/css" href="css/footer.css" />
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
          <div class="circle"> <a id="logo" href="#">OYE!</a> </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="">
          <ul class="nav navbar-nav navbar-left">
          	<li><p class="navbar-text">"Interactúa con tu ciudad"</p></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a class="md-trigger" data-modal="modal-12" href="php/registrarse.php">REGISTRARSE</a></li>
          	<li><a class="md-trigger" data-modal="modal-13" href="php/inicia-sesion.php">INICIA SESIÓN</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <br class="clearfix">

    <div id="cuerpo" class="container">
      <div class="izq">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Últimas Peticiones Aceptadas</h3>
          </div>
          <div class="panel-body">
          <?php 
            include 'php/funciones/listarPeticionesAceptadas.php';
          ?>
          </div>
        </div>
      </div>
      <!-- <div class="cen">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Al</h3>
          </div>
          <div class="panel-body">
            <?php
              //include 'php/funciones/trabajosRealizandose.php';
            ?>
          </div>
        </div>
      </div> -->
      <div class="dec">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Últimos Trabajos Terminados</h3>
          </div>
          <div class="panel-body">
            <?php
              include 'php/funciones/listarTrabajos.php';
            ?>
          </div>
        </div>
      </div>
    </div>

    <br class="clearfix">

    <div id='mas'>
      <a href="php/sobre-oye.php">Más sobre <span>OYE!</span></a>
    </div>

    <br class="clearfix">
	  <?php 
		  include 'php/footer.php';
	  ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>

  </body>
</html>