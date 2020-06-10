<?php

//$numeros = array(15,1,2);
//
//$myJSON = json_encode($numeros);
//
//echo $myJSON;

include '../../../clases/Cliente.php';

$cliente = new Cliente();

$result = $cliente->datos_grafica_estado_cliente();

$datos_grafica_estaod_cliente = array();


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        array_push($datos_grafica_estaod_cliente, $row['activo']);
        array_push($datos_grafica_estaod_cliente, $row['inactivo']);
        
    }
}

$json_datos_grafica_estado_cliente = json_encode($datos_grafica_estaod_cliente);
echo $json_datos_grafica_estado_cliente;
