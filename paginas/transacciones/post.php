<?php

include '../../clases/Transaccion.php';

if (isset($_POST['crear'])) {
    
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha_oculta'];
    $id_usuario = $_POST['id_usuario'];
    
    $transaccion = new Transaccion();
    $transaccion->insertar_transaccion( $id_usuario, $tipo, $descripcion, $cantidad, $fecha);
    
    }
