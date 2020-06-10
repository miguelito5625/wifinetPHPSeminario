<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Solicitud_cambio_equipo_danio {

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_solicitud_cambio_equipo_danio() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_solicitud.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_solicitud_cambio_equipo_danio`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_solicitud.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para instalacion de nuevos servicios
    public function insertar_solicitud_cambio_equipo_danio($id_ot_man_re, $id_cliente, $id_tecnico, $id_equipo, $descripcion, $fecha_solicitud) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/mostrar_ot_man_re.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `solicitud_cambio_equipo_danio` (id_ot_man_re, `id_cliente`, `id_tecnico`, `id_equipo`, `fecha_solicitud`, `descripcion`, `estado`) "
                . "VALUES ('$id_ot_man_re', '$id_cliente', '$id_tecnico', '$id_equipo', '$fecha_solicitud', '$descripcion', 'PENDIENTE')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/mostrar_ot_man_re.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/mostrar_ot_man_re.php?" . $exito);
    }

    //Funcion para cambiar el estado de las ots de instalacion de nuevos servicios
    public function cambiar_estado_solicitud_cambio_equipo_danio($id_solicitud, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_solicitud.php?" . $conex);
            return;
        }

        $sql = "UPDATE solicitud_cambio_equipo_danio SET estado = '$estado' "
                . "WHERE id_solicitud_cambio_equipo_danio = $id_solicitud";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_solicitud.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_solicitud.php?" . $exito);
    }

    //Funcion para buscar los datos de la ot de nuevo servicio
    public function buscar_para_actualizar($id_solicitud) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_solicitud.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_solicitud_cambio_equipo_danio` where id_solicitud ='$id_solicitud'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_solicitud.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de instalacion de nuevos servicios
    public function actualizar_solicitud_cambio_equipo_danio($id_solicitud, $id_cliente, $id_tecnico, $id_equipo, $descripcion, $fecha_solicitud) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_solicitud.php?" . $conex);
            return;
        }

        $sql = "UPDATE solicitud_cambio_equipo_danio SET id_cliente = '$id_cliente', id_tecnico = '$id_tecnico', "
                . "id_equipo = '$id_equipo', descripcion = '$descripcion', fecha_solicitud = '$fecha_solicitud' "
                . "WHERE id_solicitud_cambio_equipo_danio = '$id_solicitud'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_solicitud.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_solicitud.php?" . $exito);
    }

}
