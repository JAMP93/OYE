<?php 
function mayorEdad(){
    $hoy = date('d');
    $mes = date('m');
    $anio = date('Y')-18;

    echo "$anio-$mes-$hoy";
}

mayorEdad();
?>