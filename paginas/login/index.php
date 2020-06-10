<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="login-page sidebar-collapse">

        <?php
        session_start();

        session_unset();
        session_destroy();
        ?>




        <?php if (isset($_GET['pass_cambiada'])): ?>

            <script>


                iziToast.success({
                    transitionOut: 'fadeOutDown',
                    title: 'Contraseña cambiada',
                    position: 'topCenter',
                });

            </script>


        <?php endif; ?>


        <div class="page-header header-filter" style="background-image: url('fondo.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="card card-login">
                            <!--<form class="form" method="post" action="post.php">-->
                            <div class="form">
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">Inicio de Sesión</h4>
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

                                    <br>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" autocomplete="off" id="idtxtusuario" class="form-control" placeholder="Usuario">
                                    </div>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" id="idtxtcontrasenia" class="form-control" placeholder="Contraseña">
                                    </div>

                                    <br>

                                    <div class="text-center">
                                        <button class="btn btn-primary" id="btn_iniciar_sesion"><i class="material-icons">exit_to_app</i> Ingresar</button>
                                    </div>


                                </div>
                                <div class="footer text-center">

                                    <a href="recuperar1.php"> Recuperar contraseña </a>

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

        <!--<script src="bootstrap-waitingfor.js"></script>-->


        <script>
            $(document).ready(function () {
                
                document.getElementById('idtxtusuario').focus();

                $("#idtxtcontrasenia").on('keyup', function (e) {
                    if (e.keyCode == 13) {
                        Iniciar_sesion();
                    }
                });


                $('#btn_iniciar_sesion').click(function () {
                    Iniciar_sesion();
                });

                function Iniciar_sesion() {



                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_iniciar_sesion").disabled = true;

                    var usuario = document.getElementById('idtxtusuario').value;
                    var contrasenia = document.getElementById('idtxtcontrasenia').value;

                    $.ajax({
                        type: 'POST',
                        url: 'post.php',
                        data: {
                            'iniciar_sesion': 'iniciar_sesion',
                            'usuario': usuario,
                            'contrasenia': contrasenia
                        },
                        success: function (msg) {

                            setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_iniciar_sesion").disabled = false;
                                document.getElementById("idtxtcontrasenia").focus();


                                if (msg == "no_encontrado") {

                                    var mensaje = 'El usuario "' + usuario + '" no existe'

                                    iziToast.error({
                                        transitionOut: 'fadeOutDown',
                                        title: 'Usuario o contraseña incorrecta, por favor verifique',
                                        position: 'topCenter',
                                        message: '',
                                    });

                                }

                                if (msg == "pass_erronea") {

                                    iziToast.error({
                                        transitionOut: 'fadeOutDown',
                                        title: 'Usuario o contraseña incorrecta, por favor verifique',
                                        position: 'topCenter',
                                        message: '',
                                    });



                                }

                                if (msg == "encontrado") {

                                    iziToast.success({
                                        transitionOut: 'fadeOutDown',
                                        timeout: 2400,
                                        title: 'Sesion iniciada',
                                        position: 'topCenter',
                                        message: '',
                                    });

                                    setTimeout(function () {

                                        window.location.href = "https://wifinet.ga/paginas/principal";

                                    }, 2500);

                                }

                            }, 1000);//Fin funcion de espera del metodo success del ajax





                        }//Fin del metodo success

                    }).fail(function (jqXHR, textStatus, errorThrown) {

                        setTimeout(function () {

                            waitingDialog.hide();
                            document.getElementById("btn_iniciar_sesion").disabled = false;

                            iziToast.error({
                                transitionOut: 'fadeOutDown',
                                title: 'Ha ocurrido un error',
                                position: 'topCenter',
                                message: '',
                            });


                        }, 1000);//Fin funcion de espera del metodo success del ajax


                    });//Fin ajax



                }//Fin Metodo iniciar sesion

            });//Fin ready document
        </script>


    </body>

</html>