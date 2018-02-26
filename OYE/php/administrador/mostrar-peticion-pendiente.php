<?php 
	/* FUNCIÓN MOSTRAR PETICIÓN*/

	require_once '../conexion.php';
	require_once '../funciones/convertirFecha.php';
	require_once '../funciones/addiconpeticiones.php';

	function mostrarPeticion(){
		$conexion = ConectarBD();
		mysqli_set_charset($conexion,'UTF8');

		$id = $_GET['pp'];

		$sentencia = "SELECT * FROM denuncia WHERE id = $id";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);

		$fila = mysqli_fetch_array($resultado);

		$titulo = $fila['titulo'];
		$descripcion = $fila['descripcion'];
		$tipo = $fila['tipo'];
		$fecha = $fila['fecha_alta'];
		$estado = $fila['estado'];

		$fecha = convertirFechaMesLetra($fecha);

		$ruta_img = $fila['imagen'];

		$usuario = $fila['id_usuario'];

		$sentencia2 = "SELECT nombre, apellidos FROM usuario WHERE id = $usuario";
		$resultado2 = mysqli_query($conexion, $sentencia2);
		$num_campos2 = mysqli_num_rows($resultado2);

		$fila2 = mysqli_fetch_array($resultado2);

		$nombre = ucwords(mb_strtolower($fila2['nombre'], 'UTF8'));
		$apellidos = ucwords(mb_strtolower($fila2['apellidos'], 'UTF8'));
		mysqli_close($conexion);
		$info = array("$titulo", "$descripcion", "$tipo", "$fecha", "$ruta_img", "$nombre", "$apellidos", "$estado");

		return $info;	
	}

	$info = mostrarPeticion();

	$titulo = $info[0];
	$descripcion = $info[1];
	$tipo = $info[2];
	$fecha = $info[3];
	$img = $info[4];
	$nombre = $info[5];
	$apellidos = $info[6];
	$estado = $info[7];

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
	<script src="../../js/ckeditor/ckeditor.js"></script>
</head>

<body>
	<?php 
		require '../funciones/cabecera.php';
		$t = 'administrador';
		cabecera($t);
	?>
	<div class="tit">
		<h2>Petición en estudio</h2>
	</div>
	<div id="contenido" class="container">
		
		<div class="imagen">
			<img src="https://dummyimage.com/600x400/000/fff" alt="">
		</div>
		<div class="cabecera">
			<div class="titulo"> 
				<h1><?php echo $titulo;?></h1>
			</div>
			<div class="datos">
				<ul>
					<li><p>Tipo: <?php echo addIconPeticiones($tipo)." <span>".$tipo; ?></span></p></li>
					<li>Fecha: <span><?php echo $fecha;?></span></li>
					<li>Autor: <span><?php echo $nombre ." ". $apellidos;?></span></li>
					<li>Estado: <span><?php echo $estado;?></span></span></li>
				</ul>
			</div>
		</div>
		
		<?php 
			require_once '../conexion.php';
			$conexion = ConectarBD();
			mysqli_set_charset($conexion,'UTF8');
			$id = $_GET['pp'];
			if (isset($_POST['confirmar'])) {
				$resolucion = $_POST['res'];
				$textarea = $_POST['textarea'];
				if ($resolucion == 'aceptada') {
					$instancia = "UPDATE denuncia SET estado = 'Aceptada' WHERE id = $id";
					$res = mysqli_query($conexion, $instancia);
					echo "<div class='alert alert-success'>La petición <b>ha sido aceptada</b> correctamente</div>";
					echo "<meta http-equiv='REFRESH' content='2;URL=inicio.php'>";
				}else{
					if ($resolucion == 'rechazada' && empty($textarea)){
						echo "<div class='alert alert-warning'>Se te olvidó incluir los <b>Motivos del Rechazo <i class=\"fa fa-level-up\"></i><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
  <span aria-hidden=\"true\">&times;</span>
</button></b></div>";
					}else{
						echo "<div class='alert alert-success'>Se ha emitido el rechazo correctamente</div>";
						$instancia = "UPDATE denuncia SET estado = 'Rechazada', detalles = '".$textarea."' WHERE id = $id";
						$res = mysqli_query($conexion, $instancia);
						echo "<meta http-equiv='REFRESH' content='2;URL=inicio.php'>";
					}
				}
			}else{
				if (isset($_POST['eliminar'])) {
					echo "<div class='alert alert-danger'>Esta petición <b>ha sido eliminada definitivamente</b></div>";
						$instancia = "DELETE FROM denuncia WHERE id = $id";
						$res = mysqli_query($conexion, $instancia);
					echo "<meta http-equiv='REFRESH' content='2;URL=inicio.php'>";
				}
			}
		?>

		<div class="acciones">
			<h6>Acciones</h6>
			<form action="#" method="POST">
				<div class="caja">
					<label for="estado">Resolución</label><br>
					<div class="check">
		              <label class="concheck">Aceptar
		                <input id="aceptar" type="radio" class="acep" name="res" value="aceptada" data-toggle="collapse" data-target="#collapseText" required>
		                <span class="checkmark"></span>
		              </label>
		              <label class="concheck">Rechazar
		                <input id="rechazar" type="radio" class="rech" name="res" value="rechazada" data-toggle="collapse" data-target="#collapseText" required>
		                <span class="checkmark"></span>
		              </label>
		            </div>
				</div>
				<div class="caja2">
					<input type="submit" class="btn" name="confirmar" value="Confirmar">
					<input type="submit" class="btn" name="eliminar" value="Eliminar">
				</div>
				<div class="detalles collapse" id="collapseText">
					<textarea id="txtArea" name="textarea"></textarea>
					<script>
						CKEDITOR.replace('txtArea', {
							languaje: 'es',
							uiColor: '#333333',
							placeholder: 'DETALLES'
						});
					</script>
				</div>
			</form>
		</div>
		<div class="descripcion">
			<h6>Descripción</h6>
			<?php echo $descripcion; ?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
		var yesRadio = $('#aceptar');
    	var noRadio = $('#rechazar');

		yesRadio.click(function () {
		  if(!$('#collapseText').hasClass('in')) {
		    return false;
		  }
		});

		noRadio.click(function () {
		  if($('#collapseText').hasClass('in')) {
		    return false;
		  }
		});
    </script>
</body>
</html>