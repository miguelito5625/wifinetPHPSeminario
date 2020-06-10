<?php

include '../../clases/Material.php';

if (isset($_POST['crear_material'])) {
    
    $nombre_material = $_POST['nombre'];
    $existencia = $_POST['existencia'];
    $tipo_material = $_POST['tipo'];
    $unidad_de_medida = $_POST['unidad_de_medida'];
    $descripcion = $_POST['descripcion'];
    
    $material = new Material();
    
    $material->insertar_material($nombre_material, $existencia, $tipo_material, $unidad_de_medida, $descripcion);
    
}