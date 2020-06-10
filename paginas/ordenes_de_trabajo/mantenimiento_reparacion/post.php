<?php

include '../../../clases/Ot_mantenimiento_reparacion.php';
include '../../../clases/Solicitud_cambio_equipo_danio.php';


if (isset($_POST['crear_solicitud_cambio_equipo'])) {

    $id_ot_man_re = $_POST['id_ot_man_re'];
    $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
    $id_equipo = $_POST['id_equipo'];
    $descripcion = $_POST['descripcion'];
//    $fecha_instalacion = $_POST['fecha_instalacion_oculta'];
    $fecha_solicitud = date("Y/m/d");
    
    $solicitud = new Solicitud_cambio_equipo_danio();
    $solicitud->insertar_solicitud_cambio_equipo_danio($id_ot_man_re, $id_cliente, $id_tecnico, $id_equipo, $descripcion, $fecha_solicitud);
    
}


if (isset($_GET['id_ot_man_re_cambiar_estado'])) {

    $id_ot_mantenimiento_reparacion = $_GET['id_ot_man_re_cambiar_estado'];
    $estado = $_GET['estado'];

    $ot_man_re = new Ot_mantenimiento_reparacion();
    $ot_man_re->cambiar_estado_ot_mantenimiento_reparacion($id_ot_mantenimiento_reparacion, $estado);
}


if (isset($_POST['crear_ot_man_re'])) {

    $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
//    $fecha_man_re = $_POST['fecha_man_re_oculta'];
    $fecha_man_re = date("Y/m/d");
    $descripcion = $_POST['descripcion'];
    
    $ot_man_re = new Ot_mantenimiento_reparacion();
    $ot_man_re->insertar_ot_mantenimiento_reparacion($id_cliente, $id_tecnico, $fecha_man_re, $descripcion);
    
    
}


if (isset($_POST['actualizar_ot_man_re'])) {

    $id_ot_mantenimiento_reparacion = $_POST['id_ot_man_re'];
    echo $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
//    $fecha_mantenimiento_reparacion = $_POST['fecha_man_re_oculta'];
    $fecha_mantenimiento_reparacion = date("Y/m/d");
    $descripcion = $_POST['descripcion'];

    
    $ot_man_re = new Ot_mantenimiento_reparacion();
    $ot_man_re->actualizar_ot_mantenimiento_reparacion($id_ot_mantenimiento_reparacion, $id_cliente, $id_tecnico, $fecha_mantenimiento_reparacion, $descripcion);
    
    
}