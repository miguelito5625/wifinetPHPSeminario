<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Deposito_bancario {

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_deposito_bancario() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_deposito_bancario.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_deposito_bancario`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_deposito_bancario.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para instalacion de nuevos servicios
    public function insertar_deposito_bancario($id_cobrador, $fecha_deposito, $banco, $no_boleta, $descripcion, $total_depositado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_deposito_bancario.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `deposito_bancario`(`id_cobrador`, `fecha_deposito`, `banco`, `no_boleta`, `descripcion`, `total_depositado`) "
                . "VALUES ('$id_cobrador', '$fecha_deposito', '$banco', '$no_boleta', '$descripcion', '$total_depositado')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_deposito_bancario.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_deposito_bancario.php?" . $exito);
    }

   

    //Funcion para buscar los datos de la ot de nuevo servicio
    public function buscar_para_actualizar($id_deposito_bancario) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_deposito_bancario.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_deposito_bancario` where id_deposito_bancario ='$id_deposito_bancario'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_deposito_bancario.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de instalacion de nuevos servicios
    public function actualizar_deposito_bancario($id_deposito_bancario, $id_cobrador, $fecha_deposito, $banco, $no_boleta, $descripcion, $total_depositado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_deposito_bancario.php?" . $conex);
            return;
        }

        $sql = "UPDATE deposito_bancario SET id_cobrador = '$id_cobrador', fecha_deposito = '$fecha_deposito', "
                . "banco = '$banco', no_boleta = '$no_boleta', descripcion = '$descripcion', total_depositado = '$total_depositado' "
                . "WHERE id_deposito_bancario = '$id_deposito_bancario'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_deposito_bancario.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_deposito_bancario.php?" . $exito);
    }

}
