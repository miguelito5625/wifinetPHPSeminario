<?php

include '../../../clases/Ot_nuevo_servicio.php';

if (isset($_GET['id_ot_nuevo_cambiar_estado'])) {

    $id_ot_nuevo_servicio = $_GET['id_ot_nuevo_cambiar_estado'];
    $estado = $_GET['estado'];
    
    $ot_nuevo_servicio = new Ot_nuevo_servicio();
    $ot_nuevo_servicio->cambiar_estado_ot_nuevo_servicio($id_ot_nuevo_servicio, $estado);
    
    
}



if (isset($_POST['crear_ot_nuevo_servicio'])) {

    $id_cliente = $_POST['id_cliente'];
    $id_usuario = $_POST['id_usuario'];
    $descripcion = $_POST['descripcion'];
    $id_plan = $_POST['id_plan'];
    $fecha_instalacion = $_POST['fecha_instalacion_oculta'];

    $ot_nueva_instalacion = new Ot_nuevo_servicio();
    
    $ot_nueva_instalacion->insertar_ot_nuevo_servicio($id_cliente, $id_usuario, $descripcion, $id_plan, $fecha_instalacion);
    
    
}


if (isset($_POST['actualizar_ot_nuevo_servicio'])) {

    $id_ot_nuevo_servicio = $_POST['id_ot_nuevo_servicio'];
    $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_usuario'];
    $descripcion = $_POST['descripcion'];
    $id_plan = $_POST['id_plan'];
    $fecha_instalacion = $_POST['fecha_instalacion_oculta'];

    $ot_nueva_instalacion = new Ot_nuevo_servicio();
    
    $ot_nueva_instalacion->actualizar_ot_nuevo_servicio($id_ot_nuevo_servicio, $id_cliente, 
            $id_tecnico, $descripcion, $id_plan, $fecha_instalacion);
    
}