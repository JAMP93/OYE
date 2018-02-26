<?php 
	function addIconOpyTr($sector){
		switch ($sector) {
			case 'Electricista':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/electricista.png' title='Mantenimiento eléctrico'>";
				break;
			case 'Jardinería':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/jardineria.png' title='Jardinería'>";
				break;
			case 'Limpieza':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/suciedad.png' title='Limpieza'>";
				break;
			case 'Fontanería':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/fontaneria.png' title='Fontanería'>";
				break;
			case 'Construcción':
				$img = "<img class='media-object' src='http://localhost/oye/img/icons/construccion.png' title='Construcción'>";
				break;		
		}
		return $img;
	}
?>