<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author migue
 */

include 'Conexion.php';


class Usuario {
    
    
    //Funcion para cambiar la password
    
    public function cambiar_pass($id_usuario, $nueva_pass){
        
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "index.php?" . $conex .'" />';
            return;
        }

        $sql = "UPDATE usuario set password = '$nueva_pass' WHERE id_usuario = '$id_usuario'";
        
        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "index.php?" . $error . '" />';
            return;
        }
        
        
        $conexion->desconectar();
        
        
        
    }
    
    
    //Funcion para buscar administrador por su nombre de usuario
    
    public function buscar_admin_por_user($admin){
        
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "index.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `usuario` WHERE usuario = '$admin' AND puesto = 'Administrador' ";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "index.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
        
    }
    
    
    //Funcion para buscar usuario por su nombre de usuario
    
    public function buscar_usuario_por_user($usuario){
        
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "index.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `usuario` WHERE usuario = '$usuario'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "index.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
        
    }




    //Funcion para verificar cantidad de usuarios administradores
    
    public function obtener_numero_administradores(){
        
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_usuarios.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT COUNT(*) AS administradores FROM `usuario` WHERE puesto = 'Administrador'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_usuarios.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
        
    }






    //funcion para realizar una busqueda para obtener los datos del usuario
    
    public function buscar_para_actualizar($id_usuario) {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_usuarios.php?" . $conex .'" />';
            return;
        }
        
        $sql = "SELECT * FROM `usuario` where id_usuario ='$id_usuario'";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_usuarios.php?" . $error);
            return;
        }
        
        $conexion->desconectar();
        return $result;
    }
    
    //Funcion para mostrar todos los registros
    
     public function MostrarUsuarios() {
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_usuarios.php?" . $conex .'" />';
            return;
        }

        $sql = "SELECT * FROM `usuario`";
        
        if (!$result = mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_usuarios.php?" . $error .'" />';
            return;
        }
        
        
        $conexion->desconectar();
        return $result;
    }
    
// Funcion para guardar la informacion del usuario en la base de datos
    public function insertar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $fecha_inicio_laboral, $cui, $nit, $direccion, $telefono, $usuario, $password, $puesto, $estado) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();

        if (substr($conex, 0, 12) == 'codigo_error') {
            echo '<meta http-equiv="refresh" content="0;url=' . "crear_cliente.php?" . $conex . '" />';
            return;
        }

        $sql = "INSERT INTO `usuario`(`primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, "
                . "`fecha_nacimiento`, `fecha_inicio_laboral`, `cui`, `nit`, `direccion`, `telefono`, `usuario`, "
                . "`password`, `puesto`, `estado`) "
                . "VALUES ('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido',"
                . "'$fecha_nacimiento', '$fecha_inicio_laboral', '$cui', '$nit', '$direccion', "
                . "'$telefono', '$usuario', '$password', '$puesto', '$estado')";

        mysqli_query($conex, $sql);

        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url=' . "crear_cliente.php?" . $error . '" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=1";
        header("Location: mostrar_usuarios.php?" . $exito);
    }
    
    
    
    //Funcion para cambiar estado del usuario
    
    public function cambiar_estado($id_usuario) {
        $error;
        $conexion = new Conexion();
        $conex = $conexion->conectar();
        $estado;


        if (substr($conex, 0, 12) == 'codigo_error') {
            $conexion->desconectar();
            header("Location: mostrar_usuarios.php?" . $conex);
            return;
        }


        $sql = "SELECT estado FROM `usuario` where id_usuario ='$id_usuario'";
        
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

        $sql = "UPDATE usuario SET estado = '$estado' WHERE id_usuario = $id_usuario";

        if (!mysqli_query($conex, $sql)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            header("Location: mostrar_usuarios.php?" . $error);
            return;
        }

        if (mysqli_query($conex, $sql)) {
            $conexion->desconectar();
            header("Location: mostrar_usuarios.php?codigo_exito=3");
            return;
        }
    }
    
    //Funcion para actualizar los datos de los usuario
    
    public function actualizar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $fecha_inicio_laboral, $cui, $nit, $direccion, $telefono, $nombre_usuario, $password, $puesto, $id_usuario) {

        $conexion = new Conexion();
        $conex = $conexion->conectar();
        
        if (substr($conex, 0, 12) == 'codigo_error') {
            header("Location: mostrar_clientes.php?" . $conex);
            return;
        }

        $sql = "UPDATE usuario SET primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', "
                . "primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido', "
                . "fecha_nacimiento = '$fecha_nacimiento', fecha_inicio_laboral = '$fecha_inicio_laboral', "
                . "cui = '$cui', nit = '$nit', "
                . "direccion = '$direccion', "
                . "telefono = '$telefono', usuario = '$nombre_usuario', password = '$password', "
                . "puesto = '$puesto' "
                . "WHERE id_usuario = $id_usuario";

        mysqli_query($conex, $sql);
        
        if (mysqli_error($conex)) {
            $error = 'codigo_error=' . mysqli_errno($conex);
            $conexion->desconectar();
            echo '<meta http-equiv="refresh" content="0;url='. "mostrar_usuarios.php?" . $error .'" />';
            return;
        }

        $conexion->desconectar();
        $exito = "codigo_exito=2";
        header("Location: mostrar_usuarios.php?" . $exito);
        
    }
    

}
