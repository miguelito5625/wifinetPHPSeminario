<?php

include '../../clases/Cobro_cliente.php';

if (isset($_POST['realizar_pago'])) {

    $no_recibo = $_POST['no_recibo'];
    $metodo_pago = $_POST['metodo_pago'];
    $id_detalle_cobro_cliente = $_POST['id_detalle_cobro_cliente'];
    $fecha_pago = date("Y/m/d");
    
    $cobro = new Cobro_cliente();
    $cobro->RealizarPago($fecha_pago, $no_recibo, $metodo_pago, $id_detalle_cobro_cliente);
    
    
}