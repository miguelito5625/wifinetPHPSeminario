<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Ot_desinstalacion_mora {
    
    
    //Funcion para mostrar ot de desinstalacion por mora
    public function Mostrar_ot_desinstalacion_mora() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_desinstalacion_mora`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para desinstalacion por mora
    public function insertar_ot_desinstalacion_mora($id_cliente, $id_usuario, $fecha_desinstalacion, $descripcion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `ot_desinstalacion_mora`(`id_cliente`, `id_usuario`, `fecha_desinstalacion`, `descripcion`, `estado`) "
                . "VALUES ('$id_cliente', '$id_usuario', '$fecha_desinstalacion', '$descripcion', 'PENDIENTE')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_ot_desinstalacion_mora.php?" . $exito);
    }

    //Funcion para cambiar el estado de las ots de desinstalacion por mora
    public function cambiar_estado_ot_desinstalacion_mora($id_ot_desinstalacion_mora, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_desinstalacion_mora.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_desinstalacion_mora SET estado = '$estado' WHERE "
                . "id_ot_desinstalacion_mora = '$id_ot_desinstalacion_mora'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_desinstalacion_mora.php?" . $exito);
    }

    //Funcion para buscar los datos de la ot de desinstalacion por mora
    public function buscar_para_actualizar($id_ot_desinstalacion_mora) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_ot_desinstalacion_mora` where id_ot_desinstalacion_mora ='$id_ot_desinstalacion_mora'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_ot_desinstalacion_mora.php?" . $error);
            return;
        }

        $conexion->desconectar();
        return $result;
    }

    //Funcion para actualizar las ots de desinstalacion por mora
    public function actualizar_ot_desinstalacion_mora($id_ot_desinstalacion_mora, $id_cliente, $id_tecnico, $descripcion) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_ot_desinstalacion_mora.php?" . $conex);
            return;
        }

        $sql = "UPDATE ot_desinstalacion_mora SET id_cliente = '$id_cliente', id_usuario = '$id_tecnico', "
                . "descripcion = '$descripcion' "
                . "WHERE id_ot_desinstalacion_mora = '$id_ot_desinstalacion_mora'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_ot_desinstalacion_mora.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=3";
        header("Location: mostrar_ot_desinstalacion_mora.php?" . $exito);
    }

}
