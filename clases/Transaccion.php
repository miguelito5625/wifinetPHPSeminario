<?php

/**
 * Description of Ot
 *
 * @author migue
 */
require_once 'Conexion.php';

class Transaccion {

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_fondos_caja_chica() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT fondos FROM `caja_chica`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para mostrar ot nuevo servicio
    public function Mostrar_transacciones() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `vista_transaccion`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //Funcion para guardar una ot para instalacion de nuevos servicios
    public function insertar_transaccion($id_usuario, $tipo, $descripcion, $cantidad, $fecha) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $conex . '" />';
            return;
        }


//-------------------- ------------------------------------------------------------------------------------

        $fondos_caja_chica;

        $sql = "SELECT * FROM `caja_chica` WHERE id_caja_chica = 1";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $error . '" />';
            return;
        }

        while ($row = $result->fetch_assoc()) {

            $fondos_caja_chica = $row['fondos'];
        }

        

        if ($tipo == "Ingreso") {

            $total_ingreso = $fondos_caja_chica + $cantidad;

            $sql = "UPDATE caja_chica set fondos = '$total_ingreso' WHERE id_caja_chica = 1";

            mysqli_query($conex, $sql);

            if (mysqli_error($conex)) {
                $error = 'codigo_error=' . mysqli_errno($conex);
                $conexion->desconectar();
                echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $error . '" />';
                return;
            }
        }

        if ($tipo == "Egreso") {
            
            if ($cantidad > $fondos_caja_chica) {

            $error = 'codigo_error=10';
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "crear.php?" . $error . '" />';

            return;
        }

            $total_egreso = $fondos_caja_chica - $cantidad;

            $sql = "UPDATE caja_chica set fondos = '$total_egreso' WHERE id_caja_chica = 1";

            mysqli_query($conex, $sql);

            if (mysqli_error($conex)) {
                $error = 'codigo_error=' . mysqli_errno($conex);
                $conexion->desconectar();
                echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $error . '" />';
                return;
            }
        }



//-------------------- ------------------------------------------------------------------------------------



        $sql = "INSERT INTO transaccion (id_usuario, id_caja_chica, tipo, descripcion, cantidad, fecha) VALUES "
                . "('$id_usuario', 1, '$tipo', '$descripcion', '$cantidad', '$fecha')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar.php?" . $exito);
    }

}
