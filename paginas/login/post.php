<?php

include '../../clases/Usuario.php';

session_start();

if (isset($_POST['iniciar_sesion'])) {

    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $id_usuario;
    $contrasenia_actual;
    $puesto;
    $nombre_usuario;

    $iniciar_sesion = new Usuario();
    $result = $iniciar_sesion->buscar_usuario_por_user($usuario);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            
            $nombre_usuario = $row['primer_nombre'] . " " . $row['segundo_nombre'] . " " . $row['primer_apellido'] . " " . $row['segundo_apellido'];
            
            $id_usuario = $row['id_usuario'];
            $contrasenia_actual = $row['password'];
            $puesto = $row['puesto'];
        }

        if ($contrasenia != $contrasenia_actual) {

            echo 'pass_erronea';
            return;
        }

        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['puesto'] = $puesto;

        echo 'encontrado';
        return;
    }

    echo 'no_encontrado';
}

if (isset($_POST['recuperar1'])) {

    $usuario = $_POST['usuario'];
    $id_usuario;

    $recuperar = new Usuario();
    $result = $recuperar->buscar_usuario_por_user($usuario);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $id_usuario = $row['id_usuario'];
        }

        $_SESSION['usuario_recuperar'] = $usuario;
        $_SESSION['id_usuario'] = $id_usuario;

        echo 'encontrado';
        return;
    }

    echo 'no_encontrado';
}



if (isset($_POST['recuperar2'])) {


    $administrador = $_POST['administrador'];
    $pass_admin_ingresada = $_POST['pass_admin'];
    $pass_admin_actual;


    $recuperar = new Usuario();
    $result = $recuperar->buscar_admin_por_user($administrador);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $pass_admin_actual = $row['password'];
        }


        if ($pass_admin_ingresada != $pass_admin_actual) {

            echo 'pass_erronea';
            return;
        }


        echo 'encontrado';
        return;
    }

    echo 'no_encontrado';
}


if (isset($_POST['recuperar3'])) {

    $id_usuario = $_POST['id_usuario'];
    $nueva_pass = $_POST['nueva_pass'];

    $recuperar = new Usuario();
    $recuperar->cambiar_pass($id_usuario, $nueva_pass);

    session_unset();
    session_destroy();

    echo 'exito';
}

if (isset($_POST['cambio_pass'])) {


    $patron_pass = $_POST['patron_pass'];




    $pass_actual = $_POST['pass_actual'];
    $nueva_pass = $_POST['pass2'];

    $id_usuario = $_SESSION['id_usuario'];
    $pass_actual_guardada;

    $cambio_pass = new Usuario();
    $result = $cambio_pass->buscar_para_actualizar($id_usuario);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $pass_actual_guardada = $row['password'];
        }//fin del while

        if ($pass_actual != $pass_actual_guardada) {

            echo 'error_pass_actual';
            return;
        }//fin validacion de la password actual


        if ($patron_pass == "false") {

            echo 'error_patron';
            return;
        }//fin validacion del minimo de caracteres
    }//fin del if del result


    $cambio_pass->cambiar_pass($id_usuario, $nueva_pass);

    echo 'pass_cambiada';
}