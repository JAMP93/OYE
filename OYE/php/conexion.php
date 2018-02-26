<?php
	function ConectarBD(){
		$conexion = mysqli_connect('localhost', 'root', '', 'oye');	
		//$conexion = mysqli_connect('mysql.hostinger.es', 'u699275743_admin', '2dawphp', 'u699275743_evtop');
		if (!$conexion) {
			include "php/error.php";
		}else{
			return $conexion;
		}
	}
?>