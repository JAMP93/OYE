<?php 
	/* FUNCIÓN MOSTRAR TRABAJO*/

	require_once '../conexion.php';
	require_once '../funciones/convertirFecha.php';
	require_once '../funciones/addIconOpyTr.php';
	require_once '../funciones/addiconpeticiones.php';

	function mostrarTrabajo(){
		$conexion = ConectarBD();
		mysqli_set_charset($conexion,'UTF8');

		$id = $_GET['tr'];

		$sentencia = "SELECT * FROM trabajo WHERE id = $id";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);

		$fila = mysqli_fetch_array($resultado);

		$titulo = $fila['titulo'];
		$descripcion = $fila['descripcion'];
		$tipo = $fila['tipo'];
		$fecha = $fila['fecha_inicio'];
		$fecha2 = $fila['fecha_fin'];
		$fecha = convertirFechaMesLetra($fecha);
		$fecha2 = convertirFechaMesLetra($fecha2);
		$ruta_img = $fila['imagen'];

		$id_denuncia = $fila['id_denuncia'];
		/*Usuario*/
		$sentencia2 = "SELECT u.nombre, u.apellidos, d.titulo, d.tipo FROM denuncia d, usuario u WHERE d.id = ".$id_denuncia." AND d.id_usuario = u.id";
		$resultado2 = mysqli_query($conexion, $sentencia2);
		$num_campos2 = mysqli_num_rows($resultado2);

		$fila2 = mysqli_fetch_array($resultado2);

		$nombre = ucwords(mb_strtolower($fila2['nombre'], 'UTF8'));
		$apellidos = ucwords(mb_strtolower($fila2['apellidos'], 'UTF8'));
		$titulo_denuncia = $fila2['titulo'];
		$tipo_denuncia = $fila2['tipo'];
		
		mysqli_close($conexion);

		$info = array("$titulo", "$descripcion", "$tipo", "$fecha", "$fecha2", "$ruta_img", "$id_denuncia", "$nombre", "$apellidos", "$titulo_denuncia", "$tipo_denuncia");

		return $info;	
	}

	$info = mostrarTrabajo();

	$titulo = $info[0];
	$descripcion = $info[1];
	$tipo = $info[2];
	$fecha = $info[3];
	$fecha2 = $info[4];
	$img = $info[5];
	$id_denuncia = $info[6];
	$nombre = $info[7];
	$apellidos = $info[8];
	$titulo_denuncia = $info[9];
	$tipo_denuncia = $info[10];
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

    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700,800|Quicksand:300,400,500,700|Yellowtail|Julius+Sans+One" rel="stylesheet">

    <link rel="icon" type="image/png" href="../../img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../../img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="../../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../../css/inicio-administrador.css" />
	<link rel="stylesheet" type="text/css" href="../../css/mostrar.css" />
	<link rel="stylesheet" type="text/css" href="../../css/mostrar-peticion.css" />
</head>

<body>
	<?php 
		require '../funciones/cabecera.php';
		$t = 'administrador';
		cabecera($t);
	?>

	<div id="contenido" class="container">
		<div class="imagen">
			<img src="https://dummyimage.com/600x400/000/fff" alt="">
		</div>
		<div class="cabecera">
			<div class="titulo"> 
				<h1><?php echo $titulo;?></h1>
			</div>
			<div class="datos datostr">
				<ul class="ultr">
					<li><p>Tipo del trabajo: <?php echo addIconOpyTr($tipo);?></p></li>
					<?php
					if ($fecha != '01, Enero del 1970') {
					?>
						<li>Fecha de inicio: <span><?php echo $fecha;?></span></li>
					<?php
					}
					if ($fecha2 != '01, Enero del 1970') {
					?>	
					<li>Fecha de finalización: <span><?php echo $fecha2;?></span></li>
					<?php
					} 
					$url = "http://localhost/oye/php/mostrar-peticion.php?pa=" . urlencode($id_denuncia);
					?>
					<li><p>Tipo de la petición: <?php /*echo $tipo_denuncia;*/ echo addIconPeticiones($tipo_denuncia);?></p></li>
					<li>Título de la petición: <a href="<?php echo $url; ?>"><span><?php echo $titulo_denuncia;?></span></a></li>
					<li>Autor: <span><?php echo $nombre ." ". $apellidos;?></span></li>		
				</ul>
			</div>
		</div>
		<div class="acc">
			<div class="derecha">
			    <a id="add" data-toggle="collapse" role="button" href="#collapse" class="add"><img src="../../img/icons/crear.png"> Asignar trabajadores</a>
			    <div class="check2 collapse" id="collapse">
			    	<form action="#" method="POST">
						<div>
			    	<?php 
			    		$conexion = ConectarBD();
			    		mysqli_set_charset($conexion,'UTF8');
			    		$sentencia3 = "SELECT * FROM operario WHERE estado = 'Libre'";
						$resultado3 = mysqli_query($conexion, $sentencia3);
						$num_campos3 = mysqli_num_rows($resultado3);
						
						while ($filas3 = mysqli_fetch_all($resultado3, MYSQLI_ASSOC)) {
							for ($i=0; $i < $num_campos3; $i++) {
								$nombre_operario = ucwords(mb_strtolower($filas3[$i]['nombre'], 'UTF8'));
								$apellidos_operario = ucwords(mb_strtolower($filas3[$i]['apellidos'], 'UTF8'));
								$sector = $filas3[$i]['sector'];
								$id_operario = $filas3[$i]['id'];

								$info_operario = "$nombre_operario "."$apellidos_operario";
					?>		
								<label class="checklabel">
					        		<!-- <input type="hidden" name="id_operario" value="<?php //echo $id_operario; ?>"> -->
					        		<input type="checkbox" name="id_operario[]" value="<?php echo $id_operario; ?>">
					        		<span class="checkspan"></span> <?php echo $info_operario." - <span>".$sector."</span>"; ?>
					        	</label>
					<?php
							}
						}
				    ?>
				    	</div>
					    <div>
					        <input type="submit" name="enviar" value="Asignar">	
					    </div>
					</form>
		        </div>
			</div>
			<?php 
				if (isset($_POST['enviar'])) {
					$conexion = ConectarBD();
					$ids_operario = $_POST['id_operario'];
					$id_trabajo = $_GET['tsa'];
					$hoy = date('Y-m-d');
					if (empty($ids_operario)) {
						echo "<div id='alert' class='alert alert-warning'>Debes elegir al menos un/a trabajador/a</div>";
						echo "<meta http-equiv='REFRESH' content='2;URL=trabajos.php'>";
					}else{
						$n = count($ids_operario);
						for ($i=0; $i < $n; $i++) {
							$id = $ids_operario[$i];
							$instancia = "INSERT INTO tarea VALUES ($id, $id_trabajo, '$hoy')";
							$instancia3 = "UPDATE operario SET estado = 'Ocupado' WHERE id = $id";
							$insercion = mysqli_query($conexion, $instancia);
							$insercion = mysqli_query($conexion, $instancia3);
						}

						$instancia2 = "UPDATE trabajo SET estado = 'Realizandose', fecha_inicio = '$hoy' WHERE id = $id_trabajo";
						$insercion2 = mysqli_query($conexion, $instancia2);

						echo "<div id='alert' class='alert alert-success'>Los trabajadores <b>han sido asignados</b> correctamente</div>";
						echo "<meta http-equiv='REFRESH' content='2;URL=trabajos.php'>";
					}
				}
			?>
		</div>
		<div class="acc">
			<div class="derecha">
			    <a id="add" data-toggle="collapse" role="button" href="#collapse2" class="add"><img src="../../img/icons/eliminar.png"> Retirar trabajadores</a>
			    <div class="check2 collapse" id="collapse2">
			    	<form action="#" method="POST">
						<div>
			    	<?php 
			    		$conexion = ConectarBD();
			    		mysqli_set_charset($conexion,'UTF8');
			    		$id_trabajo = $_GET['tr'];
			    		$sentencia4 = "SELECT DISTINCT op.nombre, op.apellidos, op.sector, op.id FROM trabajo tr, tarea ta, operario op WHERE ta.id_trabajo = $id_trabajo AND op.id = ta.id_operario ";
						$resultado4 = mysqli_query($conexion, $sentencia4);
						$num_campos4 = mysqli_num_rows($resultado4);
						
						while ($filas4 = mysqli_fetch_all($resultado4, MYSQLI_ASSOC)) {
							for ($i=0; $i < $num_campos4; $i++) {
								$nombre_operario2 = ucwords(mb_strtolower($filas4[$i]['nombre'], 'UTF8'));
								$apellidos_operario2 = ucwords(mb_strtolower($filas4[$i]['apellidos'], 'UTF8'));
								$sector2 = $filas4[$i]['sector'];
								$id_operario2 = $filas4[$i]['id'];

								$info_operario2 = "$nombre_operario2 "."$apellidos_operario2";
					?>		
								<label class="checklabel">
					        		<!-- <input type="hidden" name="id_operario" value="<?php //echo $id_operario; ?>"> -->
					        		<input type="checkbox" name="id_operario_quitar[]" value="<?php echo $id_operario2; ?>">
					        		<span class="checkspan"></span> <?php echo $info_operario2." - <span>".$sector2."</span>"; ?>
					        	</label>
					<?php
							}
						}
				    ?>
				    	</div>
					    <div>
					        <input type="submit" name="quitar" value="Retirar">	
					    </div>
					</form>
		        </div>
			</div>
			<?php 
				if (isset($_POST['quitar'])) {
					$conexion = ConectarBD();
					$ids_operario2 = $_POST['id_operario_quitar'];
					$id_trabajo = $_GET['tr'];
					if (empty($ids_operario2)) {
						echo "<div id='alert' class='alert alert-warning'>Debes elegir al menos un/a trabajador/a</div>";
						echo "<meta http-equiv='REFRESH' content='2;URL=trabajos.php'>";
					}else{
						$n = count($ids_operario2);
						for ($i=0; $i < $n; $i++) {
							$id = $ids_operario2[$i];
							$instancia5 = "UPDATE operario SET estado = 'Libre' WHERE id = $id";
							$instancia6 = "DELETE FROM `tarea` WHERE id_operario = $id";
							$insercion5 = mysqli_query($conexion, $instancia5);
							$insercion6 = mysqli_query($conexion, $instancia6);
						}
						echo "<div id='alert' class='alert alert-success'>Los trabajadores <b>han liberados</b> correctamente</div>";
						echo "<meta http-equiv='REFRESH' content='2;URL=trabajos.php'>";
					}
				}
			?>
		</div>
		<div class="descripcion">
			<h6>Descripción</h6>
			<?php echo $descripcion; ?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		/*$(document).ready(function() {
		    var max_fields      = 5; //maximum input boxes allowed
		    var wrapper         = $(".derecha"); //Fields wrapper
		    var add_button      = $(".add_field_button"); //Add button ID
		   
		    var x = 1; //initlal text box count
		    $(add_button).click(function(e){ //on add input button click
		        e.preventDefault();
		        if(x < max_fields){ //max input box allowed
		            x++; //text box increment
		            $(wrapper).append('<div class=\'izquierda\'><input type="text" name="mytext[]"/><a href="#" class="remove_field"> Remove </a></div>'); //add input box
		        }
		    });
		   
		    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		        e.preventDefault(); $(this).parent('div').remove(); x--;
		    })
		});*/
	</script>
</body>
</html>