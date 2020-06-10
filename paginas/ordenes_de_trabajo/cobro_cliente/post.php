<?php

include '../../../clases/Ot_cobro_cliente.php';

if (isset($_GET['id_ot_cobro_cliente_cambiar_estado'])) {

    $id_ot_cobro_cliente = $_GET['id_ot_cobro_cliente_cambiar_estado'];
    $estado = $_GET['estado'];
    
    $ot_cobro_cliente = new Ot_cobro_cliente();
    $ot_cobro_cliente->cambiar_estado_ot_cobro_cliente($id_ot_cobro_cliente, $estado);
    
    
}


if (isset($_POST['crear_ot_cobro_cliente'])) {

    $id_cliente = $_POST['id_cliente'];
    $descripcion = $_POST['descripcion'];
    $total_cobrado = $_POST['total_cobrado'];
    $id_tecnico = $_POST['id_usuario'];

    
    
    $ot_cobro_cliente = new Ot_cobro_cliente();
    
    $ot_cobro_cliente->insertar_ot_cobro_cliente($id_cliente, $id_tecnico, $descripcion, $total_cobrado);
    
}


if (isset($_POST['actualizar_ot_cobro_cliente'])) {

    $id_ot_cobro_cliente = $_POST['id_ot_cobro_cliente'];
    $id_cliente = $_POST['id_cliente'];
    $descripcion = $_POST['descripcion'];
    $total_cobrado = $_POST['total_cobrado'];
    $id_cobrador = $_POST['id_usuario'];

    $ot_cobro_cliente = new Ot_cobro_cliente();
    $ot_cobro_cliente->actualizar_ot_cobro_cliente($id_ot_cobro_cliente, $id_cliente, $id_cobrador, $descripcion, $total_cobrado);
}