<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Ot_cobro_cliente {

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_ot_cobro_cliente() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_cobro_cliente`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para instalacion de nuevos servicios
    public function insertar_ot_cobro_cliente($id_cliente, $id_tecnico, $descripcion, $total_cobrado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `ot_cobro_cliente`(`id_cliente`, id_tecnico, `descripcion`, `total_cobrado`, `estado` ) "
                . "VALUES ('$id_cliente', '$id_tecnico', '$descripcion', '$total_cobrado', 'PENDIENTE')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_ot_cobro_cliente.php?" . $exito);
    }

    //Funcion para cambiar el estado de las ots de instalacion de nuevos servicios
    public function cambiar_estado_ot_cobro_cliente($id_ot_cobro_cliente, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_cobro_cliente.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_cobro_cliente SET estado = '$estado' "
                . "WHERE id_ot_cobro_cliente = $id_ot_cobro_cliente";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_cobro_cliente.php?" . $exito);
    }

    //Funcion para buscar los datos de la ot de nuevo servicio
    public function buscar_para_actualizar($id_ot_cobro_cliente) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_cobro_cliente` where id_ot_cobro_cliente ='$id_ot_cobro_cliente'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_ot_cobro_cliente.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de instalacion de nuevos servicios
    public function actualizar_ot_cobro_cliente($id_ot_cobro_cliente, $id_cliente, $id_cobrador, $descripcion, $total_cobrado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_cobro_cliente.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_cobro_cliente SET id_cliente = '$id_cliente', id_cobrador = '$id_cobrador', "
                . "descripcion = '$descripcion', total_cobrado = '$total_cobrado' "
                . "WHERE id_ot_cobro_cliente = '$id_ot_cobro_cliente'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_cobro_cliente.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_cobro_cliente.php?" . $exito);
    }

}
