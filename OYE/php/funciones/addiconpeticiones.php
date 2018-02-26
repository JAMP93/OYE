<?php 
	function addIconPeticiones($tipo){
		switch ($tipo) {
			case 'Agua':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/agua.png' title='Agua'>";
				break;
			case 'Patrimonio':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/patrimonio.png' title='Patrimonio'>";
				break;
			case 'Acerado':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/acerado.png' title='Acerado'>";
				break;
			case 'Accesibilidad':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/accesibilidad.png' title='Accesibilidad'>";
				break;
			case 'Electrónico':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/electronico.png' title='Electrónico'>";
				break;
			case 'Iluminación':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/iluminacion.png' title='Iluminación'>";
				break;
			case 'Suciedad':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/suciedad.png' title='Limpieza'>";
				break;
			case 'Queja':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/queja.png' title='Queja formal'>";
				break;
			case 'Observación':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/observacion.png' title='Observación'>";
				break;		
		}
		//if (isset($img)) {
			return $img;
		//}
	}
?>