<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Ot_desinstalacion {

    //Funcion para mostrar ot de desinstalacion de servicio
    public function Mostrar_ot_desinstalacion() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_desinstalacion`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para desinstalacion de servicios
    public function insertar_ot_desinstalacion($id_cliente, $id_usuario, $descripcion, $fecha_desinstalacion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `ot_desinstalacion`(`id_cliente`, `id_usuario`, `descripcion`, `fecha_desinstalacion`, `estado`) "
                . "VALUES ('$id_cliente', '$id_usuario', '$descripcion', '$fecha_desinstalacion', 'PENDIENTE')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_ot_desinstalacion.php?" . $exito);
    }

    //Funcion para cambiar el estado de las ots de desinstalacion de servicios
    public function cambiar_estado_ot_desinstalacion($id_ot_desinstalacion, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_desinstalacion.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_desinstalacion SET estado = '$estado' "
                . "WHERE id_ot_desinstalacion = '$id_ot_desinstalacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_desinstalacion.php?" . $exito);
    }

    //Funcion para buscar los datos de la ot de desinstalacion de servicio
    public function buscar_para_actualizar($id_ot_desinstalacion) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_desinstalacion` where id_ot_desinstalacion ='$id_ot_desinstalacion'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_ot_desinstalacion.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de instalacion de desinstalacion de servicios
    public function actualizar_ot_desinstalacion($id_ot_desinstalacion, $id_cliente, $id_usuario, $fecha_desinstalacion, $descripcion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_desinstalacion.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_desinstalacion SET id_cliente = '$id_cliente', id_usuario = '$id_usuario', "
                . "descripcion = '$descripcion', fecha_desinstalacion = '$fecha_desinstalacion' "
                . "WHERE id_ot_desinstalacion = '$id_ot_desinstalacion'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_desinstalacion.php?" . $exito);
    }

}
