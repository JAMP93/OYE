<?php 
	require_once 'php/conexion.php';
	require_once 'convertirFecha.php';
	require_once 'addiconpeticiones.php';

	function listarPeticionesAceptadas(){
		$conexion = ConectarBD();
		mysqli_set_charset($conexion,'UTF8');

		$sentencia = "SELECT * FROM denuncia WHERE estado = 'Aceptada' ORDER BY fecha_alta DESC LIMIT 5";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);
		
		echo "<table class='table'>";
		echo "<tr><th>Tipo</th><th>Título</th><th></th></tr>";
		while ($filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC)) {
			for ($i=0; $i < $num_campos; $i++) { 
				echo "<tr>";
					$url = "http://localhost/oye/php/mostrar-peticion.php?pa=" . urlencode($filas[$i]['id']);
					echo "<td class='tipo'>";
						$tipo = $filas[$i]["tipo"];
						echo "<a href='".$url."'>";
							echo addIconPeticiones($tipo);
						echo "</a>";
					echo "</td>";
					echo "<td class='titulo'>";
						echo "<a href='".$url."'>";
							echo $filas[$i]["titulo"];
						echo "</a>";
					echo "</td>";
					echo "<td class='fecha'>";
						$fecha = $filas[$i]["fecha_alta"];
						echo "<a href='".$url."' class='button'>";
							echo convertirFecha($fecha);
						echo "</a>";
					echo "</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		mysqli_close($conexion);
	}

	listarPeticionesAceptadas();
?> 