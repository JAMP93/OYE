<?php 
	function convertirFecha($fecha){
		$f = strtotime($fecha);
		$dia = date('d', $f);
		$mes = date('m', $f);
		$an = date('Y', $f);

		$fecha = "$dia/$mes/$an";

		return $fecha;
	}

	function convertirFechaMesLetra($fecha){
		setlocale(LC_ALL,"es_ES");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$f = strtotime($fecha);
		$dia = date('d', $f);
		$mes = date('n', $f);
		$mes = $meses[$mes-1];
		$an = date('Y', $f);

		$fecha = "$dia, $mes del $an";

		return $fecha;
	}
?>