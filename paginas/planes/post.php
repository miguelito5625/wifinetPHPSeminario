<?php

include '../../clases/Plan.php';

if (isset($_POST['crear_plan'])) {
    
    $nombre = $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $precio = $_POST['precio'];
    
    $plan = new Plan();
    
    $plan->insertar($nombre, $descripcion, $precio);
}


