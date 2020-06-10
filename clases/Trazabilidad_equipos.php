<?php

require_once 'Conexion.php';

class Trazabilidad_equipos {
    
    
    // Realiza una consulta en la tabla trazabilidad equipos
    public function MostrarTrazabilidadPorIdEquipo($id_equipo) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_equipos_tecnologicos.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `vista_trazabilidad_equipos` WHERE id_equipo = '$id_equipo' ORDER BY id_trazabilidad_equipo ASC";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_equipos_tecnologicos.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }

    //Guardar en tabla trazabilidad equipos
    public function Crear_registro_trazabilidad_equipos($id_equipo, $fecha, $estado, $cliente_detalle) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "https://wifinet.ga/paginas/principal/index.php?" . $conex .'" />';
            return;
        }

        $sql = "INSERT INTO trazabilidad_equipo (id_equipo, fecha, estado, descripcion) "
                . "VALUES ('$id_equipo', '$fecha', '$estado', '$cliente_detalle')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "https://wifinet.ga/paginas/principal/index.php?" . $error .'" />';
            return;
        }
    }

}
