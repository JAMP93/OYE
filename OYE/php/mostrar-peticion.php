<?php 
	/* FUNCIÓN MOSTRAR PETICIÓN*/

	require_once 'conexion.php';
	require_once 'funciones/convertirFecha.php';
	require_once 'funciones/addiconpeticiones.php';

	function mostrarPeticion(){
		$conexion = ConectarBD();
		mysqli_set_charset($conexion,'UTF8');

		$id = $_GET['pa'];

		$sentencia = "SELECT * FROM denuncia WHERE id = $id";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);

		$fila = mysqli_fetch_array($resultado);

		$titulo = $fila['titulo'];
		$descripcion = $fila['descripcion'];
		$tipo = $fila['tipo'];
		$fecha = $fila['fecha_alta'];

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
		$info = array("$titulo", "$descripcion", "$tipo", "$fecha", "$ruta_img", "$nombre", "$apellidos");

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

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700,800|Quicksand:300,400,500,700|Yellowtail|Julius+Sans+One" rel="stylesheet">

    <link rel="icon" type="image/png" href="../img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/mostrar.css" />
	<link rel="stylesheet" type="text/css" href="../css/footer.css" />
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
        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="padding-top: 0px;">
          <ul class="nav navbar-nav navbar-left">
          	<li><p class="navbar-text">"Interactúa con tu ciudad"</p></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a class="md-trigger" data-modal="modal-12" href="registrarse.php">REGISTRARSE</a></li>
          	<li><a class="md-trigger" data-modal="modal-13" href="inicia-sesion.php">INICIA SESIÓN</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br class="clearfix">

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
				</ul>
			</div>
		</div>
		<div class="descripcion">
			<h6>Descripción</h6>
			<?php echo $descripcion; ?>
		</div>
	</div>

    <br class="clearfix">
	<?php 
		include 'footer.php';
	?>
</body>
</html>