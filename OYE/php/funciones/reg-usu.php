<?php

	function registrarUsuario($conexion, $nombre, $apellidos, $usuario, $contrasena, $telefono, $email, $fecha){
		$conexion = ConectarBD();
		mysqli_set_charset($conexion,'UTF8');

		$sentencia_email = "SELECT email FROM usuario WHERE email LIKE '%".$email."%' ";
		$resultado = mysqli_query($conexion, $sentencia_email);
		$num_email = mysqli_num_rows($resultado);

		$sentencia_usuario = "SELECT usuario FROM usuario WHERE usuario LIKE '%".$usuario."%' ";
		$resultado2 = mysqli_query($conexion, $sentencia_usuario);
		$num_usuario = mysqli_num_rows($resultado2);

		if ($num_email != 0) {
			echo "<div class='alert alert-warning' role='alert'>El <b>Correo Electrónico</b>: '<i>$email</i>' utilizado ya está en uso</div>";
		}elseif ($num_usuario != 0) {
			echo "<div class='alert alert-warning' role='alert'>El <b>usuario</b>: <i>$usuario</i> utilizado ya está en uso</div>";
		}else{
			$instancia = "INSERT INTO usuario(nombre, apellidos, usuario, contrasena, email, telefono, fecha_nacimiento) VALUES ('".$nombre."', '".$apellidos."', '".$usuario."', '".$contrasena."', '".$email."' , '".$telefono."' , '".$fecha_nacimiento."')";
      		$res = mysqli_query($conexion, $instancia);

      		if ($res==1) {
      			echo "<div class='alert alert-success' role='alert'>Enhorabuena <i>$nombre "."$apellidos</i> <b>Ya estás en <span>OYE!</span></b></div>";
      			echo "<meta http-equiv='REFRESH' content='2;URL=inicia-sesion.php?ur='x'>";
      		}else{
      			echo "<div class='alert alert-danger' role='alert'>El <b>usuario</b>: <i>$nombre "."$apellidos</i> no se ha podido insertar</div>";
      		}
		}
	}
?>