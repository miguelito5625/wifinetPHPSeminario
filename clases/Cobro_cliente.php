<?php

require_once 'Conexion.php';

class Cobro_cliente {

    //Funion para realizar el pago
    public function RealizarPago($fecha_pago, $no_recibo, $metodo_pago, $id_detalle_cobro_cliente){
        
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $conex .'" />';
            return;
        }

        $sql = "UPDATE detalle_cobro_cliente SET fecha_pago = '$fecha_pago', no_recibo = '$no_recibo', "
                . "metodo_pago = '$metodo_pago', estado = 'PAGADO' WHERE id_detalle_cobro_cliente = '$id_detalle_cobro_cliente'";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $error .'" />';
            return;
        }
        
        $exito = "codigo_exito=1";
        header("Location: detalle.php?" . $exito);
        
    }
    
    //Funion para crear registro de cobro a clientes
    public function Crear_registro_cobro($id_cliente, $fecha_instalacion, $id_plan){
        
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo 'error_conexion';
            return;
        }

        $sql = "INSERT INTO cobro_cliente (id_cliente, fecha_instalacion, id_plan, estado, deuda, primer_pago) VALUES "
                . "('$id_cliente', '$fecha_instalacion', '$id_plan', 'AL DIA', 0, 1)";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $conexion->desconectar();
            echo 'error_sql';
            return;
        }
        
        
    }

    
    //Realiza una consulta en la tabla de cobro_cliente
    public function MostrarCobroCliente() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `vista_cobro_cliente`";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }
    
    //Realiza una consulta en la tabla de detalle_cobro_cliente
    public function MostrarDetalleCobroClientePorId($id_cobro_cliente) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `vista_detalle_cobro_cliente` WHERE id_cobro_cliente = '$id_cobro_cliente'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }
    
    
    
    //Realiza una consulta en la tabla de detalle_cobro_cliente para realizar pago
    public function MostrarDetalleCobroParaPago($id_detalle_cobro_cliente) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `vista_detalle_cobro_cliente` WHERE id_detalle_cobro_cliente = '$id_detalle_cobro_cliente'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }
    
    
    
    
    }
