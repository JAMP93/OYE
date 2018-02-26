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

    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700,800|Quicksand:300,400,500,700|Yellowtail|Julius+Sans+One" rel="stylesheet">

    <link rel="icon" type="image/png" href="../../img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../../img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="../../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../../css/inicio-administrador.css" />
	<link rel="stylesheet" type="text/css" href="../../css/mostrar.css" />
	<link rel="stylesheet" type="text/css" href="../../css/peticiones.css" />
</head>

<body>
	<?php 
		require '../funciones/cabecera.php';
		$t = 'administrador';
		cabecera($t);
	?>
	<div class="tit">
		<h2>Trabajos</h2>
	</div>
	<div id="contenido" class="container">
		<div class="menu menutr">
			<ul>
				<li>
					<div>
						<a href="mostrar-peticion-pendiente.php">
							<img src="../../img/icons/crear.png" title="Estudiar Peticiones" class="image">
							<span>Crear Trabajo</span>
						</a>
					</div>
			    </li>
				

			</ul>	
		</div>
		<br class="clearfix">
		<?php
			if (isset($_POST['eliminar'])) {
				$id = $_POST['id'];
				include_once '../conexion.php';
				$conexion = ConectarBD();
				mysqli_set_charset($conexion,'UTF8');

				echo "<div class='alert alert-danger petieli'>Ese trabajo <b>ha sido eliminado definitivamente</b></div>";
				$sentencia = "SELECT id_operario FROM tarea WHERE id_trabajo = $id";
				$res3 = mysqli_query($conexion, $sentencia);
				$num_campos = mysqli_num_rows($res3);

				while ($filas = mysqli_fetch_all($res3, MYSQLI_ASSOC)) {
					for ($i=0; $i < $num_campos; $i++) {
						$id_operario = $filas[$i]['id_operario'];
						$sentencia2 = "UPDATE operario SET estado = 'Libre' WHERE id = $id_operario";
						$res4 = mysqli_query($conexion, $sentencia2);
					}
				}

				$instancia = "DELETE FROM tarea WHERE id_trabajo = $id";
				$res = mysqli_query($conexion, $instancia);
				$instancia2 = "DELETE FROM trabajo WHERE id = $id";
				$res2 = mysqli_query($conexion, $instancia2);
				echo "<meta http-equiv='REFRESH' content='2;URL=trabajos.php'>";
			}
		?>
		<br class="clearfix">
		<div class="lista">
			<table id="tabla" class="table table-hover">
				<thead>
					<tr>
						<th>Título</th>
						<th>Tipo</th>
						<th>Estado</th>
						<th>Fecha Inicio</th>
						<th>Fecha de Finalización</th>
						<th>Trabajadores activos</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						include 'funcion-todos-trabajos.php';
						Trabajos();
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/jquery-latest.js"></script> 
	<script type="text/javascript" src="../../js/jquery.tablesorter.js"></script> 
    <script type="text/javascript">
    	$(document).ready(function() {
		    $('#tabla').tablesorter();
		} );
    </script>
</body>
</html>