<?php

require_once 'Conexion.php';

class Material {

    //funcion para insertar un material en la base de datos
    public function insertar_material($nombre_material, $existencia, $tipo_material, $unidad_de_medida, $descripcion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "crear_material.php?" . $conex .'" />';
            return;
        }

        $sql = "INSERT INTO `material` (`nombre_material`, `existencia`, `tipo_material`, `unidad_de_medida`, "
                . "`descripcion`) "
                . "VALUES ('$nombre_material', '$existencia', '$tipo_material', '$unidad_de_medida', "
                . "'$descripcion')";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "crear_material.php?" . $error .'" />';
            return;
        }
        
        $exito = "codigo_exito=1";
        header("Location: crear_material.php?" . $exito);
        
    }
    
    //Realiza una consulta en la tabla material
    public function MostrarMateriales() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_materiales.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `material`";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_materiales.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }
    
    
}
