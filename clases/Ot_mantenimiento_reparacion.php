<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Ot_mantenimiento_reparacion {

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_ot_mantenimiento_reparacion() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_mantenimiento_reparacion.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_mantenimiento_reparacion`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_mantenimiento_reparacion.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para instalacion de nuevos servicios
    public function insertar_ot_mantenimiento_reparacion($id_cliente, $id_tecnico, $fecha_man_re,$descripcion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_man_re.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `ot_mantenimiento_reparacion` (`id_cliente`, `id_tecnico`, `fecha_mantenimiento_reparacion`, `descripcion`, `estado`) "
                . "VALUES ('$id_cliente', '$id_tecnico', '$fecha_man_re', '$descripcion', 'PENDIENTE')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_man_re.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_ot_man_re.php?" . $exito);
    }

    //Funcion para cambiar el estado de las ots de instalacion de nuevos servicios
    public function cambiar_estado_ot_mantenimiento_reparacion($id_ot_mantenimiento_reparacion, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_man_re.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_mantenimiento_reparacion SET estado = '$estado' "
                . "WHERE id_ot_mantenimiento_reparacion = $id_ot_mantenimiento_reparacion";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_man_re.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_man_re.php?" . $exito);
    }

    //Funcion para buscar los datos de la ot de nuevo servicio
    public function buscar_para_actualizar($id_ot_mantenimiento_reparacion) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_mantenimiento_reparacion.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_mantenimiento_reparacion` where id_ot_mantenimiento_reparacion ='$id_ot_mantenimiento_reparacion'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_ot_mantenimiento_reparacion.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de instalacion de nuevos servicios
    public function actualizar_ot_mantenimiento_reparacion($id_ot_mantenimiento_reparacion, $id_cliente, $id_tecnico, $fecha_mantenimiento_reparacion, $descripcion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_man_re.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_mantenimiento_reparacion SET id_cliente = '$id_cliente', id_tecnico = '$id_tecnico', "
                . "fecha_mantenimiento_reparacion = '$fecha_mantenimiento_reparacion', descripcion = '$descripcion' "
                . "WHERE id_ot_mantenimiento_reparacion = '$id_ot_mantenimiento_reparacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_man_re.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_man_re.php?" . $exito);
    }

}
