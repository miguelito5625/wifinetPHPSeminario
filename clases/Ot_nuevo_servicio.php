<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Ot_nuevo_servicio {

    //funcion para la grafica de ot estados segun id usuario
    public function datos_grafica_ot_nuevo_servicio_pendiente($id_usuario) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error en la conexion';
            return;
        }

        $sql = "SELECT
    (SELECT COUNT(*) FROM ot_nuevo_servicio WHERE estado='PENDIENTE' AND id_usuario = '$id_usuario') as pendiente,
        (SELECT COUNT(*) FROM ot_nuevo_servicio WHERE estado='CANCELADA' AND id_usuario = '$id_usuario') as cancelada,
        (SELECT COUNT(*) FROM ot_nuevo_servicio WHERE estado='FINALIZADA' AND id_usuario = '$id_usuario') as finalizada
FROM ot_nuevo_servicio LIMIT 1";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error en la consulta';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_ot_nuevo_servicio() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_nuevo_servicio`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para instalacion de nuevos servicios
    public function insertar_ot_nuevo_servicio($id_cliente, $id_usuario, $descripcion, $id_plan, $fecha_instalacion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `ot_nuevo_servicio`(`id_cliente`, `id_usuario`, `descripcion`, `id_plan`, `fecha_instalacion`, `estado`) "
                . "VALUES ('$id_cliente', '$id_usuario', '$descripcion', '$id_plan', '$fecha_instalacion', 'PENDIENTE')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_ot_nuevo_servicio.php?" . $exito);
    }

    //Funcion para cambiar el estado de las ots de instalacion de nuevos servicios
    public function cambiar_estado_ot_nuevo_servicio($id_ot_nuevo_servicio, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_nuevo_servicio.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_nuevo_servicio SET estado = '$estado' "
                . "WHERE id_ot_nuevo_servicio = $id_ot_nuevo_servicio";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_nuevo_servicio.php?" . $exito);
    }

    //Funcion para buscar los datos de la ot de nuevo servicio
    public function buscar_para_actualizar($id_ot_nuevo_servicio) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_nuevo_servicio` where id_ot_nuevo_servicio ='$id_ot_nuevo_servicio'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_ot_nuevo_servicio.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de instalacion de nuevos servicios
    public function actualizar_ot_nuevo_servicio($id_ot_nuevo_servicio, $id_cliente, $id_tecnico, $descripcion, $id_plan, $fecha_instalacion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_nuevo_servicio.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_nuevo_servicio SET id_cliente = '$id_cliente', id_usuario = '$id_tecnico', "
                . "id_plan = '$id_plan', descripcion = '$descripcion', fecha_instalacion = '$fecha_instalacion' "
                . "WHERE id_ot_nuevo_servicio = '$id_ot_nuevo_servicio'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_nuevo_servicio.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_nuevo_servicio.php?" . $exito);
    }

}
