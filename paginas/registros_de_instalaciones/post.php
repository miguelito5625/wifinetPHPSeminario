<?php

include '../../clases/Instalacion.php';
include '../../clases/Cobro_cliente.php';
include '../../clases/Trazabilidad_equipos.php';
include '../../clases/Cliente.php';

//include '../../clases/Equipo_tecnologico.php';

if (isset($_POST['crear_registro_instalacion'])) {
        
    $id_solicitud_instalacion = $_POST['id_solicitud_instalacion'];
    $notas = $_POST['notas'];
    
    $equipos = json_decode(stripslashes($_POST['equipos']));
    $materiales = json_decode(stripslashes($_POST['materiales']));
    $id_plan = $_POST['id_plan'];
    $id_cliente = $_POST['id_cliente'];
    $id_tecnico = $_POST['id_tecnico'];
    
    $cliente_detalle = $_POST['cliente_detalle'];
    
    
    $registrar = new Instalacion();
    $trazabilidad = new Trazabilidad_equipos();
    
    if(empty($equipos)){
        echo 'equipos_vacios';
        return;
    }
    
    $registrar->Crear_registro_instalacion($id_solicitud_instalacion, $id_cliente, $id_tecnico, $notas, "Activo");
    
    
   if(!empty($equipos)){
    foreach ($equipos as $fila) {
        
        $registrar->Registrar_cliente_equipos($id_solicitud_instalacion, $id_cliente, $fila[0]);
        $trazabilidad->Crear_registro_trazabilidad_equipos($fila[0], date("Y/m/d"), "Instalado", $cliente_detalle);
        
    }
   }
    
   if(!empty($materiales)){
    foreach ($materiales as $fila) {
        
        $registrar->Registrar_cliente_materiales($id_solicitud_instalacion, $id_cliente, $fila[0], $fila[4]);
        
    }
   }
   
   $cliente = new Cliente();
   $cliente->cambiar_estado_ajax($id_cliente, "Activo");
   
   $cobro_cliente = new Cobro_cliente();
   
   $fecha_instalacion = date("Y/m/d");
   
   $cobro_cliente->Crear_registro_cobro($id_cliente, $fecha_instalacion, $id_plan);
   
    echo 'exito';
    
}