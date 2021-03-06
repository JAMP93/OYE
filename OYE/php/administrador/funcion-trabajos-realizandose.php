<?php 

	require_once '../funciones/convertirFecha.php';
	require_once '../funciones/addIconOpyTr.php';

	function listarTrabajosRealizandose($conexion){
		mysqli_set_charset($conexion,'UTF8');

		$sentencia = "SELECT * FROM trabajo WHERE estado = 'Realizándose' ORDER BY fecha_fin DESC";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);
		
		echo "<table class='table'>";
		echo "<tr><th>Tipo</th><th>Título</th><th>Fecha Inicio</th></tr>";
		while ($filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC)) {
			for ($i=0; $i < $num_campos; $i++) { 
				$url = "http://localhost/oye/php/mostrar-trabajo.php?tr=" . urlencode($filas[$i]['id']);
				echo "<tr>";
					echo "<td class='tipo'>";
						$tipo = $filas[$i]["tipo"];
						echo "<a href='".$url."'>";
							echo addIconOpyTr($tipo);
						echo "</a>";
					echo "</td>";
					echo "<td class='titulo'>";
						echo "<a href='".$url."'>";
							echo $filas[$i]["titulo"];
						echo "</a>";
					echo "</td>";
					echo "<td class='fecha'>";
						$fecha = $filas[$i]["fecha_inicio"];
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
?>