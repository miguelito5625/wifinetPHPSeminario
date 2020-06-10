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
                                    <h4 class="card-title">Recuperar contraseña paso 2</h4>
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
                                    <p class="description text-center">Un usuario administrador debe aprovar la recuperación de la contraseña</p>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" autocomplete="off" id="administrador" class="form-control" placeholder="Usuario">
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" id="pass_admin" class="form-control" placeholder="Contraseña">
                                    </div>


                                    <br>

                                    <div class="text-center">
                                        <button class="btn btn-primary" id="btn_recuperar" name="recuperar2"><i class="material-icons">arrow_right</i> Siguiente</button>
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

                    var administrador = document.getElementById('administrador').value;
                    var pass_admin = document.getElementById('pass_admin').value;
                    
                    
                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_recuperar").disabled = true;
                    

                    $.ajax({
                        type: 'POST',
                        url: 'post.php',
                        data: {
                            'recuperar2': 'recuperar2',
                            'administrador': administrador, // <-- the $ sign in the parameter name seems unusual, I would avoid it
                            'pass_admin': pass_admin // <-- the $ sign in the parameter name seems unusual, I would avoid it
                        },
                        success: function (msg) {
                            
                            setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_recuperar").disabled = false;


                            if (msg == "no_encontrado") {

                                var msg_no_encontrado = 'El administrador "' + administrador + '" no existe';

                                document.getElementById('administrador').value = "";
                                document.getElementById('pass_admin').value = "";

                                iziToast.error({
                                    transitionOut: 'fadeOutDown',
                                    title: 'Error',
                                    position: 'topCenter',
                                    message: msg_no_encontrado,
                                });

                            }

                            if (msg == "pass_erronea") {

                                var msg_pass_erronea = 'Contraseña erronea, intente nuevamente';

                                document.getElementById('pass_admin').value = "";

                                iziToast.error({
                                    transitionOut: 'fadeOutDown',
                                    title: 'Error',
                                    position: 'topCenter',
                                    message: msg_pass_erronea,
                                });

                            }


                            if (msg == "encontrado") {
                                
                                iziToast.success({
                                    transitionOut: 'fadeOutDown',
                                    timeout: 2400,
                                    title: 'Cambio autorizado',
                                    position: 'topCenter',
                                    message: '',
                                });
                                
                                setTimeout(function () {
                                
                                window.location.href = "recuperar3.php";
                                
                                }, 2500);

                            }
                            
                             }, 1000);

                        }
                    });



                });


            });
        </script>


    </body>

</html>