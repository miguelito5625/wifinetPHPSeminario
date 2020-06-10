<?php

session_start();

include '../../../clases/Ot_nuevo_servicio.php';

$ot_nuevo_servicio = new Ot_nuevo_servicio();

$result = $ot_nuevo_servicio->datos_grafica_ot_nuevo_servicio_pendiente($_SESSION['id_usuario']);

$datos_grafica = array();


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        array_push($datos_grafica, $row['pendiente']);
        array_push($datos_grafica, $row['cancelada']);
        array_push($datos_grafica, $row['finalizada']);
        
    }
}

$json_datos_grafica_ot_nuevo_servicio_pendiente = json_encode($datos_grafica);
echo $json_datos_grafica_ot_nuevo_servicio_pendiente;
