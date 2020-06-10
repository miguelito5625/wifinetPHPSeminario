<?php

require_once 'Conexion.php';

//$fecha = date("Y/m/d");

$conexion = new Conexion();
$conex = $conexion->conectar();

$sql = "SELECT * FROM `cobro_cliente`";

$result = mysqli_query($conex, $sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $id_cobro_cliente = $row['id_cobro_cliente'];


//////////Buscando si tiene algun pago pendiente en la tabla de detalle/////////////////////////////
        $sql = "SELECT * FROM `detalle_cobro_cliente` WHERE id_cobro_cliente = '$id_cobro_cliente' AND "
                . "estado = 'PENDIENTE'";

        $result_detalle = mysqli_query($conex, $sql);

        if ($result_detalle->num_rows > 0) {

            $sql = "UPDATE cobro_cliente SET estado = 'MOROSO' WHERE id_cobro_cliente = '$id_cobro_cliente'";

            mysqli_query($conex, $sql);
            
        }//fin if
        
//////////Fin de busqueda de pago pendiente///////////////////////////////////////////////////////        
    }
}

$conexion->desconectar();