<?php

include '../../../clases/Ot_desinstalacion_mora.php';
include '../../../clases/Cliente.php';
include '../../../clases/Equipo_tecnologico.php';
include '../../../clases/Trazabilidad_equipos.php';
include '../../../clases/Instalacion.php';


if (isset($_POST['recoger_equipo'])) {


    $id_ot_desinstalacion_mora = $_POST['id_ot_desinstalacion_mora'];

    $equipos_recogidos = json_decode(stripslashes($_POST['equipos_recogidos']));
    $equipos_extraviados = json_decode(stripslashes($_POST['equipos_extraviados']));
    $id_cliente = $_POST['id_cliente'];

    $cliente_detalle = $_POST['cliente_detalle'];

    $equipos = new Equipo_tecnologico();
    $trazabilidad = new Trazabilidad_equipos();
    $instalacion = new Instalacion();


    $result_instalacion = $instalacion->BuscarInstalacionPorCliente($id_cliente);

    $id_instalacion;

    if ($result_instalacion->num_rows > 0) {

        while ($row_instalacion = $result_instalacion->fetch_assoc()) {

            $id_instalacion = $row_instalacion['id_instalacion'];
        }
    }


    if (!empty($equipos_recogidos)) {
        foreach ($equipos_recogidos as $fila) {

            $id_equipo_tecnologico = $fila[0];
            $equipos->EquiposaBodega($id_equipo_tecnologico);

            $trazabilidad->Crear_registro_trazabilidad_equipos($fila[0], date("Y/m/d"), "Recogido", $cliente_detalle);
        }
    }

    if (!empty($equipos_extraviados)) {
        foreach ($equipos_extraviados as $fila) {

            $id_equipo_tecnologico = $fila[0];
            $equipos->EquiposaExtraviado($id_equipo_tecnologico);

            $trazabilidad->Crear_registro_trazabilidad_equipos($fila[0], date("Y/m/d"), "Extraviado", $cliente_detalle);
        }
    }

    $cliente = new Cliente();
    $cliente->cambiar_estado($id_cliente);

    $ot_desinstalacion = new Ot_desinstalacion_mora();
    $ot_desinstalacion->cambiar_estado_ot_desinstalacion_mora($id_ot_desinstalacion_mora, "FINALIZADA");

    $instalacion->CambiarEstadoInstalacion($id_instalacion, "Inactivo");
    $instalacion->EliminarClienteEquipos($id_instalacion);
    $instalacion->EliminarClienteMateriales($id_instalacion);

    echo 'exito';
}




if (isset($_GET['id_ot_desintalacion_mora_cambiar_estado'])) {

    $id_ot_desintalacion_mora = $_GET['id_ot_desintalacion_mora_cambiar_estado'];
    $estado = $_GET['estado'];

    $ot_desinstalacion_mora = new Ot_desinstalacion_mora();
    $ot_desinstalacion_mora->cambiar_estado_ot_desinstalacion_mora($id_ot_desintalacion_mora, $estado);
}


if (isset($_POST['crear_ot_desinstalacion_mora'])) {

    $id_cliente = $_POST['id_cliente'];
    $id_usuario = $_POST['id_usuario'];
    //$fecha_desinstalacion = $_POST['fecha_desinstalacion_oculta'];
    $fecha_desinstalacion = date("Y/m/d");
    $descripcion = $_POST['descripcion'];

    $ot_desinstalacion_mora = new Ot_desinstalacion_mora();

    $ot_desinstalacion_mora->insertar_ot_desinstalacion_mora($id_cliente, $id_usuario, $fecha_desinstalacion, $descripcion);
}


if (isset($_POST['actualizar_ot_desinstalacion_mora'])) {

    $id_ot_desinstalacion_mora = $_POST['id_ot_desinstalacion_mora'];
    $id_cliente = $_POST['id_cliente'];
    $descripcion = $_POST['descripcion'];
    $id_tecnico = $_POST['id_usuario'];

    $ot_desinstalacion_mora = new Ot_desinstalacion_mora();

    $ot_desinstalacion_mora->actualizar_ot_desinstalacion_mora($id_ot_desinstalacion_mora, $id_cliente, $id_tecnico, $descripcion);
}