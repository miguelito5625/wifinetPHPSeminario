<?php

include '../../clases/Cliente.php';

if (isset($_POST['crear_cliente'])) {
    
    $primer_nombre = $_POST['nombre1'];
    $segundo_nombre = $_POST['nombre2'];
    $primer_apellido = $_POST['apellido1'];
    $segundo_apellido = $_POST['apellido2'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_oculta'];
    $cui = $_POST['cui'];
    $nit = $_POST['nit'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    echo $fecha_nacimiento;
    
    $cliente = new Cliente();

    $cliente->insertar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $cui, $nit, $latitud, $longitud, $direccion, $telefono);

    //header("Location: crear_cliente.php");
}

if (isset($_POST['actualizar_cliente'])) {
    
    $id_cliente = $_POST['id_cliente'];
    $primer_nombre = $_POST['nombre1'];
    $segundo_nombre = $_POST['nombre2'];
    $primer_apellido = $_POST['apellido1'];
    $segundo_apellido = $_POST['apellido2'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_oculta'];
    $cui = $_POST['cui'];
    $nit = $_POST['nit'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $cliente = new Cliente();

    $cliente->actualizar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, 
            $fecha_nacimiento, $cui, $nit, $latitud, $longitud, $direccion, $telefono, 
            $id_cliente);

   // header("Location: mostrar_clientes.php?codigo_exito=2");
}

if (isset($_GET['id_cliente_estado'])) {

    $id_cliente = $_GET['id_cliente_estado'];
    $cliente = new Cliente();
    $cliente->cambiar_estado($id_cliente);

    //header("Location: mostrar_clientes.php?succes_code=3");
    
}