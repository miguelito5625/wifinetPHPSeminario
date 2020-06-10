<?php

/**
 * Description of Cliente
 *
 * @author migue
 */
require_once 'Conexion.php';

class Cliente {
    
    
    //funcion para la grafica de cliente y sus estados
    public function datos_grafica_estado_cliente() {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error en la conexion';
            return;
        }

        $sql = "SELECT * FROM `vista_grafica_estado_cliente`";

        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error en la consulta';
            return;
        }


        $conexion->desconectar();
        return $result;
    }
    
    
    // Realiza una consulta en la vista cliente activos
    public function MostrarClientesActivos() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `vista_cliente_activo`";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }

    // Realiza una consulta en la tabla clientes
    public function MostrarClientes() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `cliente`";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }

    //funcion para insertar un cliente en la base de datos
    public function insertar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $cui, $nit, $latitud, $longitud, $direccion, $telefono) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "crear_cliente.php?" . $conex .'" />';
            return;
        }

        $sql = "INSERT INTO `cliente`(`primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, "
                . "`fecha_nacimiento`, `cui`, `nit`, `latitud`, `longitud`, `direccion`, `telefono`, `estado`) "
                . "VALUES ('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido',"
                . "'$fecha_nacimiento', '$cui', '$nit', '$latitud', '$longitud', '$direccion', '$telefono', 'Inactivo')";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "crear_cliente.php?" . $error .'" />';
            return;
        }
        
        $exito = "codigo_exito=1";
        header("Location: mostrar_clientes.php?" . $exito);
        
    }

    //Funcion para obtener los datos del cliente para actualizarlos
    public function buscar_para_actualizar($id_cliente) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $conex .'" />';
            return;
        }
        
        $sql = "SELECT * FROM `cliente` where id_cliente ='$id_cliente'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_clientes.php?" . $error);
            return;
        }
        
        $conexion->desconectar();
        return $result;
    }

    
     //Funcion para cambiar el estado del cliente
    public function cambiar_estado_ajax($id_cliente, $estado) {
        $error;
        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo 'error de conexion';
            return;
        }


        $sql = "UPDATE cliente SET estado = '$estado' WHERE id_cliente = $id_cliente";

        if (!mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo 'error al cambiar estado del cliente';
            return;
        }

    }
    
    
    
    //Funcion para cambiar el estado del cliente
    public function cambiar_estado($id_cliente) {
        $error;
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        $estado;


        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            header("Location: mostrar_clientes.php?" . $conex);
            return;
        }


        $sql = "SELECT estado FROM `cliente` where id_cliente ='$id_cliente'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_clientes.php?" . $error);
            return;
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estado = $row['estado'];
            }
        } else {
            $error = 'codigo_error=1050';
            $conexion->desconectar();
            header("Location: mostrar_clientes.php?" . $error);
            return;
        }

        if ($estado == 'Activo') {
            $estado = 'Inactivo';
        } elseif ($estado == 'Inactivo') {
            $estado = 'Activo';
        }

        $sql = "UPDATE cliente SET estado = '$estado' WHERE id_cliente = $id_cliente";

        if (!mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_clientes.php?" . $error);
            return;
        }

        if (mysqli_query($conex, $sql)) {
            $conexion->desconectar();
            header("Location: mostrar_clientes.php?codigo_exito=3");
            return;
        }
    }

    //funcion para actualizar un registro de la tabla clientes
    public function actualizar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $cui, $nit, $latitud, $longitud, $direccion, $telefono, $id_cliente) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_clientes.php?" . $conex);
            return;
        }

        $sql = "UPDATE cliente SET primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', "
                . "primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido', "
                . "fecha_nacimiento = '$fecha_nacimiento', cui = '$cui', nit = '$nit', "
                . "latitud = '$latitud', longitud = '$longitud', direccion = '$direccion', "
                . "telefono = '$telefono' "
                . "WHERE id_cliente = $id_cliente";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_clientes.php?" . $error .'" />';
            return;
        }

        $exito = "codigo_exito=2";
        header("Location: mostrar_clientes.php?" . $exito);
        
    }

}
