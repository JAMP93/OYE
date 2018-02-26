<?php 

	require_once 'php/conexion.php';
	require_once 'convertirFecha.php';
	require_once 'addIconOpyTr.php';

	function listarTrabajosFinalizados(){
		$conexion = ConectarBD();
		mysqli_set_charset($conexion,'UTF8');

		$sentencia = "SELECT * FROM trabajo WHERE estado = 'Finalizado' ORDER BY fecha_fin DESC LIMIT 5";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);
		
		echo "<table class='table'>";
		echo "<tr><th>Tipo</th><th>Título</th><th></th></tr>";
		while ($filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC)) {
			for ($i=0; $i < $num_campos; $i++) { 
				echo "<tr>";
					echo "<td class='tipo'>";
						$tipo = $filas[$i]["tipo"];
						$url = "http://localhost/oye/php/mostrar-trabajo.php?tt=" . urlencode($filas[$i]['id']);
						echo "<a href='".$url."'>";
							echo addIconOpyTr($tipo);
						echo "</a>";
					echo "</td>";
					echo "<td class='titulo'>";
						echo "<a href='".$url."'>";
							echo $filas[$i]["titulo"];
						echo "</a>";
					echo "</td>";
					echo "<td class='duracion'>";
						$fecha = strtotime($filas[$i]["fecha_inicio"]);
						$fecha2 = strtotime($filas[$i]["fecha_fin"]);
						$duracion = $fecha2 - $fecha;
						$duracion = floor($duracion/(60*60*24));
						echo "<a href='".$url."'>";
							echo "<span class=\"badge\" title='Duración en dias'>".$duracion."</span>";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		mysqli_close($conexion);
	}

	listarTrabajosFinalizados();
?>