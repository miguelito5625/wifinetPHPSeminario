<?php

include '../../clases/Solicitud_cambio_equipo_danio.php';
include '../../clases/Equipo_tecnologico.php';
include '../../clases/Trazabilidad_equipos.php';
include '../../clases/Ot_mantenimiento_reparacion.php';




if (isset($_POST['realizar_cambio_equipo'])) {
    
    $id_ot_man_re = $_POST['id_ot_man_re'];
    $id_equipo_daniado = $_POST['id_equipo_daniado'];
    $id_equipo_instalar = $_POST['id_equipo_instalar'];
    $id_cliente = $_POST['id_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
    $fecha_cambio = date("Y/m/d");
    
    $equipo = new Equipo_tecnologico();
    $equipo->EquiposaAveriado($id_equipo_daniado);
    $equipo->EquiposaInstalado($id_equipo_instalar);
    $equipo->CambiarEquipoCliente($id_cliente, $id_equipo_daniado, $id_equipo_instalar);
    
    $trazabilidad = new Trazabilidad_equipos();
    $cliente_detalle_daniado = "De " . $nombre_cliente . " Por daño";
    $trazabilidad->Crear_registro_trazabilidad_equipos($id_equipo_daniado, $fecha, "Recogido", $cliente_detalle_daniado);
    
    
    $cliente_detalle_instalar = "A " . $nombre_cliente . " Por cambio de equipo";
    $trazabilidad->Crear_registro_trazabilidad_equipos($id_equipo_daniado, $fecha, "Instalado", $cliente_detalle_instalar);
    
    
    $ot_man_re = new Ot_mantenimiento_reparacion();
    $ot_man_re->cambiar_estado_ot_mantenimiento_reparacion($id_ot_man_re, "FINALIZADA");
    
    
    
    
}

if (isset($_GET['cambiar_estado'])) {

    $id_solicitud = $_GET['cambiar_estado'];
    $estado = $_GET['estado'];
    
    $solicitud = new Solicitud_cambio_equipo_danio();
    $solicitud->cambiar_estado_solicitud_cambio_equipo_danio($id_solicitud, $estado);
    
}


if (isset($_POST['crear_solicitud'])) {

    $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
    $id_equipo = $_POST['id_equipo'];
    $descripcion = $_POST['descripcion'];
//    $fecha_instalacion = $_POST['fecha_instalacion_oculta'];
    $fecha_instalacion = date("Y/m/d");
    
    $solicitud = new Solicitud_cambio_equipo_danio();
    $solicitud->insertar_solicitud_cambio_equipo_danio($id_cliente, $id_tecnico, $id_equipo, $descripcion, $fecha_instalacion);
    
}


if (isset($_POST['modificar_solicitud'])) {

    $id_solicitud = $_POST['id_solicitud'];
    $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
    $id_equipo = $_POST['id_equipo'];
    $descripcion = $_POST['descripcion'];
    $fecha_solicitud = $_POST['fecha_solicitud_oculta'];
    
    $solicitud = new Solicitud_cambio_equipo_danio();
    $solicitud->actualizar_solicitud_cambio_equipo_danio($id_solicitud, $id_cliente, $id_tecnico, $id_equipo, $descripcion, $fecha_solicitud);
    
}