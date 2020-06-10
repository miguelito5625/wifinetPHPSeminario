<?php

require_once 'Conexion.php';

class Equipo_tecnologico {
    
    //funcion para cambiar el equipo de un cliente
    public function CambiarEquipoCliente($id_cliente, $id_equipo_daniado, $id_equipo_instalar) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo "error conexion";
            return;
        }

        $sql = "UPDATE cliente_equipos SET id_equipo = '$id_equipo_instalar' "
                . "WHERE id_cliente = '$id_cliente' AND id_equipo = '$id_equipo_daniado'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            echo "error sql";
            return;
        }

        $conexion->desconectar();
    }
    
    
    //funcion para cambiar el estado el equipo a instalado
    public function EquiposaInstalado($id_equipo_tecnologico) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo "error conexion";
            return;
        }

        $sql = "UPDATE equipo_tecnologico SET estado = 'INSTALADO' WHERE id_equipo_tecnologico = '$id_equipo_tecnologico'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            echo "error sql";
            return;
        }

        $conexion->desconectar();
    }
    
    
    //funcion para cambiar el estado el equipo a averiado
    public function EquiposaAveriado($id_equipo_tecnologico) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo "error conexion";
            return;
        }

        $sql = "UPDATE equipo_tecnologico SET estado = 'AVERIADO' WHERE id_equipo_tecnologico = '$id_equipo_tecnologico'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            echo "error sql";
            return;
        }

        $conexion->desconectar();
    }

    //funcion para cambiar el estado el equipo a extraviado
    public function EquiposaExtraviado($id_equipo_tecnologico) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo "error conexion";
            return;
        }

        $sql = "UPDATE equipo_tecnologico SET estado = 'EXTRAVIADO' WHERE id_equipo_tecnologico = '$id_equipo_tecnologico'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            echo "error sql";
            return;
        }

        $conexion->desconectar();
    }
    
    
    //funcion para mandar equipos a bodega
    public function EquiposaBodega($id_equipo_tecnologico) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo "error conexion";
            return;
        }

        $sql = "UPDATE equipo_tecnologico SET estado = 'EN BODEGA' WHERE id_equipo_tecnologico = '$id_equipo_tecnologico'";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            echo "error sql";
            return;
        }

        $conexion->desconectar();
    }

    //funcion para la grafica de equipos tecnologico
    public function datos_grafica_equipos() {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error en la conexion';
            return;
        }

        $sql = "SELECT * FROM `vista_datos_grafica_equipos`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error en la consulta';
            return;
        }


        $conexion->desconectar();
        return $result;
    }

    //funcion para insertar un equipo en la base de datos
    public function insertar_equipo_tecnologico($nombre_equipo, $marca, $descripcion, $no_serie, $tipo) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "crear_equipo_tecnologico.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `equipo_tecnologico` (`modelo`, `marca`, `descripcion`, `no_serie`, "
                . "`tipo`, `estado`) "
                . "VALUES ('$nombre_equipo', '$marca', '$descripcion', '$no_serie', "
                . "'$tipo', 'EN BODEGA')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "crear_equipo_tecnologico.php?" . $error . '" />';
            return;
        }

        $exito = "codigo_exito=1";
        header("Location: crear_equipo_tecnologico.php?" . $exito);
    }

    //Realiza una consulta en la tabla de equipos tecnologicos
    public function MostrarEquiposTecnologicos() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_equipos_tecnologicos.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `equipo_tecnologico`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_equipos_tecnologicos.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }
    
    
    //Realiza una busqueda del equipo por id
    public function BuscarEquipoPorId($id_equipo){
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_equipos_tecnologicos.php?" . $conex . '" />';
            return;
        }

        $sql = "SELECT * FROM `equipo_tecnologico` WHERE id_equipo_tecnologico = '$id_equipo'";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "mostrar_equipos_tecnologicos.php?" . $error . '" />';
            return;
        }


        $conexion->desconectar();
        return $result;
    }
    

}
