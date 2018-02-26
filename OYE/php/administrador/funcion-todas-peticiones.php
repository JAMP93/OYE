<?php
	function Peticiones()
	{
		include_once '../conexion.php';
		require_once '../funciones/convertirFecha.php';
		require_once '../funciones/addiconpeticiones.php';
		$conexion = ConectarBD();

		mysqli_set_charset($conexion,'UTF8');

		$sentencia = "SELECT * FROM denuncia WHERE estado != '' ORDER BY fecha_alta DESC ";
		$resultado = mysqli_query($conexion, $sentencia);
		$num_campos = mysqli_num_rows($resultado);
		
		while ($filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC)) {
			for ($i=0; $i < $num_campos; $i++) {
				$id = $filas[$i]["id"];
				$estado = $filas[$i]["estado"];
				echo "<tr>";
					if ($estado == "Pendiente") {
						$url = "mostrar-peticion-pendiente.php?pp=" . urlencode($id);
					}else{
						$url = "mostrar-peticion-estudiada.php?pe=" . urlencode($id);
					}

					echo "<td class='tit'>";
						echo $filas[$i]["titulo"];
					echo "</td>";
					echo "<td class='tipo'>";
						$tipo = $filas[$i]["tipo"];
						echo addIconPeticiones($tipo);
					echo "</td>";
					echo "<td class='estado'>";
						echo "<span class=\"$estado\">$estado</span>";
					echo "</td>";
					echo "<td class='fecha'>";
						$fecha = $filas[$i]["fecha_alta"];
						echo "<a href='#' class='button'>";
							echo convertirFecha($fecha);
						echo "</a>";
					echo "</td>";
					echo "<td class='accion'>";
					?>
						<form action="peticiones.php" method="POST">
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