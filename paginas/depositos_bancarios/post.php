<?php

include '../../clases/Deposito_bancario.php';


if (isset($_POST['crear_deposito_bancario'])) {

    
    $id_cobrador = $_POST['id_cobrador'];
    $fecha_deposito = $_POST['fecha_deposito_oculta'];
    $banco = $_POST['banco'];
    $no_boleta = $_POST['no_boleta'];
    $descripcion = $_POST['descripcion'];
    $total_depositado = $_POST['deposito'];

    
    
    $deposito_bancario = new Deposito_bancario();
    $deposito_bancario->insertar_deposito_bancario($id_cobrador, $fecha_deposito, $banco, $no_boleta, $descripcion, $total_depositado);
    
    
}


if (isset($_POST['actualizar_deposito_bancario'])) {
    
    $id_deposito_bancario = $_POST['id_deposito_bancario'];
    $id_cobrador = $_POST['id_cobrador'];
    $fecha_deposito = $_POST['fecha_deposito_oculta'];
    $banco = $_POST['banco'];
    $no_boleta = $_POST['no_boleta'];
    $descripcion = $_POST['descripcion'];
    $total_depositado = $_POST['deposito'];

    
    
    $deposito_bancario = new Deposito_bancario();
    $deposito_bancario->actualizar_deposito_bancario($id_deposito_bancario, $id_cobrador, $fecha_deposito, $banco, $no_boleta, $descripcion, $total_depositado);
    
}