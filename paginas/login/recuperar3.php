<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <?php
    session_start();

    if (!isset($_SESSION['usuario_recuperar'])) {

        header("Location: index.php");
    }

    $usuario = $_SESSION['usuario_recuperar'];
    $id_usuario = $_SESSION['id_usuario'];
    ?>

    <body class="login-page sidebar-collapse">


        <div class="page-header header-filter" style="background-image: url('fondo.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="card card-login">
                            <!--<form class="form" method="post" action="post.php">-->
                            <div class="form">
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">Recuperar contraseña paso 3</h4>
                                    <div class="social-line">
                                        <a class="btn btn-just-icon btn-link">

                                        </a>
                                        <a class="btn btn-just-icon btn-link">

                                        </a>
                                        <a class="btn btn-just-icon btn-link">

                                        </a>
                                    </div>
                                </div>
                                <p class="description text-center"></p>
                                <div class="card-body">
                                    <p class="description text-center">Cree la nueva contraseña para el usuario: <a class="font-weight-bold">"<?php echo $usuario; ?>"</a></p>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" id="idcontrasenia1" class="form-control" placeholder="Escriba la nueva contraseña">
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" id="idcontrasenia2" class="form-control" placeholder="Repita la contraseña">
                                    </div>

                                    <br>

                                    <div class="text-center">
                                        <button class="btn btn-primary" id="btn_recuperar"><i class="material-icons">check</i> finalizar</button>
                                    </div>


                                </div>


                                <!--</form>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer" data-background-color="black">
                <div class="container">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a>

                                </a>
                            </li>
                            <li>
                                <a>

                                </a>
                            </li>
                            <li>
                                <a>

                                </a>
                            </li>
                            <li>
                                <a>

                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">


                    </div>
                </div>
            </footer>
        </div>

        <script src="bootstrap-waitingfor.js"></script>

        <script>
            $(document).ready(function () {


                $('#btn_recuperar').click(function () {

                    var contrasenia1 = document.getElementById('idcontrasenia1').value;
                    var contrasenia2 = document.getElementById('idcontrasenia2').value;
                    var id_usuario = <?php echo $id_usuario; ?>;

                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_recuperar").disabled = true;


                    if (contrasenia1 != contrasenia2) {
                        
                         setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_recuperar").disabled = false;

                        iziToast.error({
                            transitionOut: 'fadeOutDown',
                            title: 'Error',
                            position: 'topCenter',
                            message: 'Las contraseñas no coinciden',

                        });
                        
                         }, 1000);

                        return;

                    }


                    $.ajax({
                        type: 'POST',
                        url: 'post.php',
                        data: {
                            'recuperar3': 'recuperar3',
                            'id_usuario': id_usuario,
                            'nueva_pass': contrasenia2
                        },
                        success: function (msg) {
                            
                            setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_recuperar").disabled = false;

                            if (msg == "error") {

                                var msg_error = 'Ha ocurrido un error';

                                iziToast.error({
                                    transitionOut: 'fadeOutDown',
                                    title: 'Error',
                                    position: 'topCenter',
                                    message: msg_error,
                                });

                            }

                            if (msg == "exito") {

                                window.location.href = "index.php?pass_cambiada=1";

                            }
                            
                            }, 1000);
                            

                        }
                    });



                });


            });
        </script>


    </body>

</html>