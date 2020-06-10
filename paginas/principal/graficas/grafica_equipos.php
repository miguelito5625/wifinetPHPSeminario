<?php

//$numeros = array(15,1,2);
//
//$myJSON = json_encode($numeros);
//
//echo $myJSON;

include '../../../clases/Equipo_tecnologico.php';

$equipos = new Equipo_tecnologico();

$result = $equipos->datos_grafica_equipos();

$datos_grafica = array();


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        array_push($datos_grafica, $row['en_bodega']);
        array_push($datos_grafica, $row['instalado']);
        array_push($datos_grafica, $row['averiado']);
        array_push($datos_grafica, $row['extraviado']);
        
    }
}

$json_datos_grafica = json_encode($datos_grafica);
echo $json_datos_grafica;
