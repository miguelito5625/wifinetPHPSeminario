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
        $id_cliente = $row['id_cliente'];
        $anio = date("Y");
        $mes = date("m")-1;
        

        if ($row['primer_pago'] == 1) {
            //Acccion a realizar si es primer pago

            $precio_plan;

            $sql = "SELECT * FROM `plan` WHERE id_plan = " . $row['id_plan'];
            $result_plan = mysqli_query($conex, $sql);

            if ($result_plan->num_rows > 0) {

                while ($row_plan = $result_plan->fetch_assoc()) {

                    $precio_plan = $row_plan['precio'];
                }
            }

            //Calcular dias entre la fecha de instalacion y la actual

            $fecha_actual = time();
            $fecha_instalacion = strtotime($row['fecha_instalacion']);
            $diferencia_fechas = $fecha_actual - $fecha_instalacion;

            $dias_resultantes = round($diferencia_fechas / (60 * 60 * 24));

            //Calcular el precio del plan entre los dias restantes del mes

            $dias_mes_anterior = cal_days_in_month(CAL_GREGORIAN, date("m") - 1, date("Y"));

            $total_primer_pago = round($dias_resultantes * ($precio_plan / $dias_mes_anterior));

            $sql = "INSERT INTO detalle_cobro_cliente (id_cobro_cliente, id_cliente, anio, mes, estado, total) VALUES "
                    . "('$id_cobro_cliente', '$id_cliente', '$anio', '$mes', 'PENDIENTE', '$total_primer_pago')";
            mysqli_query($conex, $sql);


            $sql = "UPDATE cobro_cliente SET primer_pago = 0, deuda = '$total_primer_pago'  WHERE id_cobro_cliente = " . $row['id_cobro_cliente'];
            mysqli_query($conex, $sql);
            
        } else {
            //Accion a realizar si no es el primer pago
            
            $precio_plan;

            $sql = "SELECT * FROM `plan` WHERE id_plan = " . $row['id_plan'];
            $result_plan = mysqli_query($conex, $sql);

            if ($result_plan->num_rows > 0) {

                while ($row_plan = $result_plan->fetch_assoc()) {

                    $precio_plan = $row_plan['precio'];
                }
            }

            
            $sql = "INSERT INTO detalle_cobro_cliente (id_cobro_cliente, id_cliente, anio, mes, estado, total) VALUES "
                    . "('$id_cobro_cliente', '$id_cliente', '$anio', '$mes', 'PENDIENTE', '$precio_plan')";
            mysqli_query($conex, $sql);

            
            $sql_detalle = "SELECT * FROM `detalle_cobro_cliente` WHERE id_cobro_cliente = '$id_cobro_cliente' AND "
                    . "estado = 'PENDIENTE'";
            $result_detalle = mysqli_query($conex, $sql_detalle);
            
            $deuda_total = 0;

            if ($result_detalle->num_rows > 0) {

                while ($row_detalle = $result_detalle->fetch_assoc()) {

                    $deuda_total += $row_detalle['total'];
                }
            }
            
            

            $sql = "UPDATE cobro_cliente SET deuda = '$deuda_total'  WHERE id_cobro_cliente = " . $row['id_cobro_cliente'];
            mysqli_query($conex, $sql);
            
            $deuda_total = 0;
            
            //Fin de creacion de detalle cobro cliente
            
        }
    }
}

$conexion->desconectar();
