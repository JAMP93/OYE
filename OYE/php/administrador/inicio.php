<?php 
	//echo "<h1>ADMINISTRADOR</h1>";
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
  	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<link rel="icon" type="image/png" href="../../img/favicon/favicon-16x16.png" sizes="16x16" />
  
  	<link rel="stylesheet" href="../../css/font-awesome.css">

  	<link rel="stylesheet" type="text/css" href="../../css/form/component.css" />
  	<link rel="stylesheet" type="text/css" href="../../css/inicio-administrador.css" />
</head>
<body>
	<?php 
		require '../funciones/cabecera.php';
		$tipo = 'administrador';
		cabecera($tipo);
	?>

	<div id="cuerpo" class="container">
		<div class="izq">
	        <div class="panel panel-default">
	          <div class="panel-heading">
	            <h3 class="panel-title">Peticiones Pendientes</h3>
	          </div>
	          <div class="panel-body">
	          <?php 
	            include "../funciones/listarPeticionesSinAceptar.php";
	            require_once '../conexion.php';
	            $conexion = ConectarBD();
	            listarPeticionesPendientes($conexion);
	          ?>
	          </div>
	        </div>
      	</div>

      	<div class="cen">
	        <div class="panel panel-default">
	          <div class="panel-heading">
	            <h3 class="panel-title">Trabajos sin Asignar</h3>
	          </div>
	          <div class="panel-body">
	          <?php 
	            include "funcion-trabajos-sin-asignar.php";
	            require_once '../conexion.php';
	            $conexion = ConectarBD();
	            listarTrabajossinAsignar($conexion);
	          ?>
	          </div>
	        </div>
      	</div>

      	<div class="dec">
	        <div class="panel panel-default">
	          <div class="panel-heading">
	            <h3 class="panel-title">Trabajos Realizandose</h3>
	          </div>
	          <div class="panel-body">
	          <?php 
	            include "funcion-trabajos-realizandose.php";
	            require_once '../conexion.php';
	            $conexion = ConectarBD();
	            listarTrabajosRealizandose($conexion);
	          ?>
	          </div>
	        </div>
      	</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>