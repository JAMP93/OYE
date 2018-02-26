<?php
	function Trabajos()
	{

		include_once '../conexion.php';
		require_once '../funciones/convertirFecha.php';
		require_once '../funciones/addIconOpyTr.php';
		$conexion = ConectarBD();

		mysqli_set_charset($conexion,'UTF8');

		$sentencia = "SELECT * FROM trabajo ORDER BY fecha_inicio DESC ";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);
		
		while ($filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC)) {
			for ($i=0; $i < $num_campos; $i++) {
				$id = $filas[$i]["id"];
				$sentencia2 = "SELECT COUNT(ta.id_operario) as operarios FROM tarea ta WHERE ta.id_trabajo = $id";
				$resultado2 = mysqli_query($conexion, $sentencia2);
				$fila = mysqli_fetch_array($resultado2);
				$nOperarios = $fila['operarios'];

				if ($nOperarios == 0) {
					$nOperarios = "";
				}

				$estado = $filas[$i]["estado"];
				$fecha = $filas[$i]["fecha_inicio"];
				$fecha2 = $filas[$i]["fecha_fin"];

				if ($fecha == null) {
					
				}

				echo "<tr>";
					if ($estado == "Pendiente") {
						$url = "mostrar-trabajo-sinasignar.php?tsa=" . urlencode($id);
					}elseif ($estado == "Realizandose") {
						$url = "mostrar-trabajo-realizandose.php?tr=" . urlencode($id);
					}else{
						$url = "mostrar-trabajo-finalizado.php?tf=" . urlencode($id);
					}

					echo "<td class='tit'>";
						echo $filas[$i]["titulo"];
					echo "</td>";
					echo "<td class='tipo'>";
						$tipo = $filas[$i]["tipo"];
						echo addIconOpyTr($tipo);
					echo "</td>";
					echo "<td class='estado'>";
						echo "<span class=\"$estado\">$estado</span>";
					echo "</td>";
					echo "<td class='fecha'>";
						if ($fecha != null) {
						echo "<a href='#' class='button'>";
							echo convertirFecha($fecha);
						echo "</a>";
						}
					echo "</td>";
					echo "<td class='fecha'>";
						if ($fecha2 != null) {
						echo "<a href='#' class='button'>";
							echo convertirFecha($fecha2);
						echo "</a>";
						}
					echo "</td>";
					echo "<td class='nop'>";
						echo "<span>$nOperarios</span>";
					echo "</td>";
					echo "<td class='accion'>";
					?>
						<form action="trabajos.php" method="POST">
							<a href="<?php echo $url;?>" class="modif"><img src="../../img/icons/modificar.png"></a>
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="submit" class="elimi" name="eliminar" title="Eliminar" value="">
						</form>
					<?php
					echo "</td>";
				echo "</tr>";
			}
		}
	}
?>