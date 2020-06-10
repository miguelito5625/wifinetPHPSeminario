<?php

include '../../clases/Usuario.php';

if (isset($_POST['crear_usuario'])) {
    
    $primer_nombre = $_POST['nombre1'];
    $segundo_nombre = $_POST['nombre2'];
    $primer_apellido = $_POST['apellido1'];
    $segundo_apellido = $_POST['apellido2'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_oculta'];
    $fecha_inicio_laboral = $_POST['fecha_inicio_laboral_oculta'];
    $cui = $_POST['cui'];
    $nit = $_POST['nit'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $nombre_usuario = $_POST['usuario'];
    $password= $_POST['password'];
    $puesto = $_POST['puesto'];
    $estado = $_POST['check_activo'];
    
//    echo $fecha_nacimiento;
//    echo '<br>';
//    echo $fecha_inicio_laboral;
    
    if ($estado == "") {
        
        $estado = "Inactivo";
        
    }
    
    
    $usuario = new Usuario();
    
    $usuario->insertar($primer_nombre, $segundo_nombre, $primer_apellido, 
            $segundo_apellido, $fecha_nacimiento, $fecha_inicio_laboral, $cui, 
            $nit, $direccion, $telefono, $nombre_usuario, $password, $puesto, $estado);

    
}

if (isset($_POST['actualizar_usuario'])) {
    
    $id_usuario = $_POST['id_usuario'];
    $primer_nombre = $_POST['nombre1'];
    $segundo_nombre = $_POST['nombre2'];
    $primer_apellido = $_POST['apellido1'];
    $segundo_apellido = $_POST['apellido2'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_oculta'];
    $fecha_inicio_laboral = $_POST['fecha_inicio_laboral_oculta'];
    $cui = $_POST['cui'];
    $nit = $_POST['nit'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $nombre_usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $puesto = $_POST['puesto'];

//    echo $fecha_nacimiento;
//    echo '<br>';
//    echo $fecha_inicio_laboral;
    
    $usuario = new Usuario();

    $usuario->actualizar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, 
            $fecha_nacimiento, $fecha_inicio_laboral, $cui, $nit, $direccion, $telefono, 
            $nombre_usuario, $password, $puesto, $id_usuario);

   // header("Location: mostrar_clientes.php?codigo_exito=2");
}

if (isset($_GET['id_usuario_estado'])) {

    $id_usuario = $_GET['id_usuario_estado'];
    $usuario = new Usuario();
    $usuario->cambiar_estado($id_usuario);

    //header("Location: mostrar_clientes.php?succes_code=3");
    
}