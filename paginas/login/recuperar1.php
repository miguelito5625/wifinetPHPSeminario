<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="login-page sidebar-collapse">


        <div class="page-header header-filter" style="background-image: url('fondo.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="card card-login">
                            <!--<form class="form" id="idformulario" method="post" action="post.php">-->

                            <div class="form">

                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">Recuperar contraseña paso 1</h4>
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
                                    <p class="description text-center">Escriba el usuario que desea recuperar la contraseña</p>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" autocomplete="off" id="idtxtusuario" class="form-control" placeholder="Usuario">
                                    </div>




                                    <br>

                                    <div class="text-center">
                                        <button class="btn btn-primary" id="btn_recuperar" name="recuperar1"><i class="material-icons">arrow_right</i> Siguiente</button>
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

                    var usuario = document.getElementById('idtxtusuario').value;
                    
                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_recuperar").disabled = true;
                    

                    $.ajax({
                        type: 'POST',
                        url: 'post.php',
                        data: {
                            'recuperar1': 'recuperar1',
                            'usuario': usuario 
                        },
                        success: function (msg) {
                            
                             setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_recuperar").disabled = false;


                            if (msg == "no_encontrado") {
                                
                                var msg_no_encontrado = 'El usuario "' + usuario + '" no existe';

                                iziToast.error({
                                    transitionOut: 'fadeOutDown',
                                    title: 'Error',
                                    position: 'topCenter',
                                    message: msg_no_encontrado,
                                });

                            }
                            
                            if (msg == "encontrado") {
                                
                                iziToast.success({
                                    transitionOut: 'fadeOutDown',
                                    timeout: 2400,
                                    title: 'Usuario encontrado',
                                    position: 'topCenter',
                                    message: '',
                                });
                                
                                setTimeout(function () {
                                
                                window.location.href = "recuperar2.php";
                                
                                }, 2500);
                                
                            }
                            
                            }, 1000);//Fin funcion de espera del metodo success del ajax

                            

                        }
                    });



                });


            });
        </script>

    </body>

</html>