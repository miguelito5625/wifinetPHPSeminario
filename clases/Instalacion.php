<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registros_Equipos_Materiales
 *
 * @author migue
 */
require_once 'Conexion.php';

class Instalacion {
    
    //Eliminar cliente_materiales
    public function EliminarClienteMateriales($id_instalacion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error_conexion';
            return;
        }

        $sql = "DELETE FROM cliente_materiales WHERE id_instalacion = '$id_instalacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error_sql';
            return;
        }
    }
    
     //Eliminar cliente_equipos
    public function EliminarClienteEquipos($id_instalacion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error_conexion';
            return;
        }

        $sql = "DELETE FROM cliente_equipos WHERE id_instalacion = '$id_instalacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error_sql';
            return;
        }
    }
    

    //Funciones para buscar los materiales de una instalacion
    public function Buscar_materiales_instalacion($id_instalacion) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_meteriales_instalacion` WHERE id_instalacion = '$id_instalacion'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    
    //Funciones para buscar los equipos de una instalacion
    public function Buscar_equipos_instalacion_idcliente($id_cliente) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_equipos_instalacion` WHERE id_cliente = '$id_cliente'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }
    
    
    
    //Funciones para buscar los equipos de una instalacion
    public function Buscar_equipos_instalacion($id_instalacion) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_equipos_instalacion` WHERE id_instalacion = '$id_instalacion'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funciones para buscar los datos de una instalacion
    public function BuscarInstalacionPorCliente($id_cliente) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_instalaciones` WHERE id_cliente = '$id_cliente'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funciones para buscar los datos de una instalacion
    public function BuscarInstalacion($id_instalacion) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_instalaciones` WHERE id_instalacion = '$id_instalacion'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funciones para obtener los registros de instalaciones creados
    public function MostrarInstalaciones() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_instalaciones`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_instalaciones.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    
     //Funion para cambiar el estado de la instalacion
    public function CambiarEstadoInstalacion($id_instalacion, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error_conexion';
            return;
        }

        $sql = "UPDATE instalacion set estado = '$estado' WHERE id_instalacion = '$id_instalacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error_sql';
            return;
        }
    }
    
    
    
    //Funion para crear registro de instalacion
    public function Crear_registro_instalacion($id_solicitud_instalacion, $id_cliente, $id_tecnico, $notas, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error_conexion';
            return;
        }

        $sql = "INSERT INTO instalacion (id_instalacion, id_cliente, id_tecnico, notas, estado) "
                . "VALUES ('$id_solicitud_instalacion', '$id_cliente', '$id_tecnico', '$notas', '$estado')";

        mysqli_query($conex, $sql);

        $sql = "UPDATE ot_nuevo_servicio SET estado = 'FINALIZADA' WHERE id_ot_nuevo_servicio = '$id_solicitud_instalacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error_sql';
            return;
        }
    }

    public function Registrar_cliente_equipos($id_instalacion, $id_cliente, $id_equipo) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if ($conex->connect_error) {
            die("Connection failed: " . $conex->connect_error);
        }

        $sql = "INSERT INTO cliente_equipos (`id_instalacion`, `id_cliente`, `id_equipo`) VALUES "
                . "('$id_instalacion', '$id_cliente', '$id_equipo')";

        if ($conex->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . " = " . $conex->error;
        }

// Cambio de estado a los equipos seleccionados

        $sql = "UPDATE `equipo_tecnologico` SET `estado` = 'INSTALADO' "
                . "WHERE `id_equipo_tecnologico` = '$id_equipo' ";

        if ($conex->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . " = " . $conex->error;
        }

        $conexion->desconectar();
    }

    public function Registrar_cliente_materiales($id_instalacion, $id_cliente, $id_material, $cantidad_usuada) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if ($conex->connect_error) {
            die("Connection failed: " . $conex->connect_error);
        }

        $sql = "INSERT INTO cliente_materiales (`id_instalacion`, `id_cliente`, `id_material`, `cantidad_usada`) VALUES "
                . "('$id_instalacion', '$id_cliente', '$id_material', '$cantidad_usuada')";

        if ($conex->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conex->error;
        }


//Actualizar la cantidad de materiales en bodega
        $sql = "SELECT existencia FROM material WHERE id_material = '$id_material'";
        $result = $conex->query($sql);
        $material_en_bodega;

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $material_en_bodega = $row['existencia'];
            }
        }

        $material_restante = $material_en_bodega - $cantidad_usuada;

        $sql = "UPDATE `material` SET `existencia` = '$material_restante' "
                . "WHERE `id_material` = '$id_material' ";

        if ($conex->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . " = " . $conex->error;
        }


        $conexion->desconectar();
    }

   
}
