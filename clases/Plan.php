<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plan
 *
 * @author migue
 */

require_once 'Conexion.php';

class Plan {

    public function MostrarPlanes() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `plan`";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }
    
    //funcion para insertar un plan en la base de datos
     public function insertar($nombre,$descripcion,$precio) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "crear_plan.php?" . $conex .'" />';
            return;
        }

        $sql = "INSERT INTO `plan`(`nombre`, `descripcion`, `precio`) "
                . "VALUES ('$nombre', '$descripcion', '$precio')";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "crear_plan.php?" . $error .'" />';
            return;
        }
        
        $exito = "codigo_exito=1";
        header("Location: mostrar_planes.php?" . $exito);
        
    }
    
    
}
