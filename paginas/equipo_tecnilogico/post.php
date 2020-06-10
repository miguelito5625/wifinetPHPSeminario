<?php

include '../../clases/Equipo_tecnologico.php';

if (isset($_POST['crear_equipo_tecnologico'])) {

    $nombre_equipo = $_POST['nombre'];
    $marca = $_POST['marca'];
    $descripcion = $_POST['descripcion'];
    $no_serie = $_POST['no_serie'];
    $tipo = $_POST['tipo'];
    
    
    $equipo = new Equipo_tecnologico();
    $equipo->insertar_equipo_tecnologico($nombre_equipo, $marca, $descripcion, $no_serie, $tipo);
    
}

