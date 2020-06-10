<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <?php include 'modal_cambio_pass.php'; ?>


    <body class="index-page sidebar-collapse">


        <?php include '../menu.php'; ?>

        <?php
        include '../../clases/Usuario.php';

        $id_usuario = $_SESSION['id_usuario'];

        $primer_nombre;
        $segundo_nombre;
        $primer_apellido;
        $segundo_apellido;
        $fecha_nacimiento;
        $fecha_inicio_laboral;
        $cui;
        $nit;
        $latitud;
        $longitud;
        $direccion;
        $telefono;
        $estado;

        $usuario = new Usuario();

        $result = $usuario->buscar_para_actualizar($id_usuario);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $primer_nombre = $row['primer_nombre'];
                $segundo_nombre = $row['segundo_nombre'];
                $primer_apellido = $row['primer_apellido'];
                $segundo_apellido = $row['segundo_apellido'];
                $fecha_nacimiento = $row['fecha_nacimiento'];
                $fecha_inicio_laboral = $row['fecha_inicio_laboral'];
                $cui = $row['cui'];
                $nit = $row['nit'];
                $direccion = $row['direccion'];
                $telefono = $row['telefono'];
                $nombre_usuario = $row['usuario'];
                $password = $row['password'];
                $puesto = $row['puesto'];
                $estado = $row['estado'];
            }
        }
        ?>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <div class="main main-raised">

            <div class="section section-basic">
                <div class="container">

                    <div id="inputs">
                        <div class="title">


                            <h3>Datos completos del usuario</h3>


                        </div>


                        <div class="row">

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idnombre1" class="bmd-label-floating">Primer nombre</label>
                                    <input type="text" name="nombre1" value="<?php echo $primer_nombre; ?>" class="form-control" id="idnombre1" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idnombre2" class="bmd-label-floating">Segundo nombre</label>
                                    <input type="text" name="nombre2" value="<?php echo $segundo_nombre; ?>" class="form-control" id="idnombre2" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idapellido1" class="bmd-label-floating">Primer apellido</label>
                                    <input type="text" name="apellido1" value="<?php echo $primer_apellido; ?>" class="form-control" id="idapellido1" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idapellido2" class="bmd-label-floating">Segundo apellido</label>
                                    <input type="text" name="apellido2" value="<?php echo $segundo_apellido; ?>" class="form-control" id="idapellido2" disabled>
                                </div>
                            </div>

                            <!--           <div class="col-lg-3 col-sm-4">
                                          <div class="form-group">
                                            <label for="idfecha_nacimiento" class="bmd-label-floating">Fecha nacimiento</label>
                                            <input type="text" name="fecha_nacimiento" class="form-control" id="idfecha_nacimiento">
                                            <span class="bmd-help">Fecha de nacimientos del cliente</span>
                                          </div>
                                        </div>-->

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label class="label-control">Fecha de nacimiento</label>
                                    <input type="text" name="fecha_nacimiento" id="idfecha_nacimiento" class="form-control datetimepicker" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label class="label-control">Fecha de inicio laboral</label>
                                    <input type="text" name="fecha_inicio_laboral" id="idfecha_inicio_laboral" class="form-control datetimepicker" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idcui" class="bmd-label-floating">CUI</label>
                                    <input type="text" name="cui" value="<?php echo $cui; ?>" class="form-control" id="idcui" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idnit" class="bmd-label-floating">NIT</label>
                                    <input type="text" name="nit" value="<?php echo $nit; ?>" class="form-control" id="idnit" disabled>
                                </div>
                            </div>


                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="iddireccion" class="bmd-label-floating">Dirección</label>
                                    <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control" id="iddireccion" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idtelefono" class="bmd-label-floating">Teléfono</label>
                                    <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" id="idtelefono" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idusuario" class="bmd-label-floating">Usuario</label>
                                    <input type="text" name="usuario" value="<?php echo $nombre_usuario; ?>" class="form-control" id="idnombre_usuario" disabled>
                                </div>
                            </div>



                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idpuesto" class="bmd-label-floating">Puesto</label>
                                    <input type="text" name="puesto" value="<?php echo $puesto; ?>" class="form-control" id="idpuesto" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="idestado" class="bmd-label-floating">Estado</label>
                                    <input type="text" name="estado" value="<?php echo $estado; ?>" class="form-control" id="idestado" disabled>
                                </div>
                            </div>

                            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-8 col-sm-4 mr-auto">
<!--                                    <a class="btn btn-primary" name="actualizar_usuario" href="modificar_usuario.php?id_usuario=<?php echo $id_usuario; ?>"><i class="material-icons">edit</i> Editar</a>
                                <a class="btn btn-primary" href="mostrar_usuarios.php"><i class="material-icons">arrow_back</i> Regresar</a>-->
                                <button id="btn_cambio_pass" class="btn btn-primary"><i class="material-icons"></i> Cambiar Contraseña</button>
                            </div>
                        </div>

                    </div>


                </div>


            </div>

        </div>




        <!-- modal grande -->
        <div class="modal fade bd-example-modal-lg" id="modal_mapa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Mapa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>

                     <!--<input id="pac-input" class="form-control" type="text" placeholder="Search Box">-->

                    <div class="form-group">
                        <label for="pac-input" class="bmd-label-floating">Buscar ubicación</label>
                        <input type="text" class="form-control" id="pac-input" placeholder="">
                    </div>

                    <div id="map" style="margin-top:1px">

                    </div>

                </div>
            </div>
        </div>
        <!--  fin de modal grande-->



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

        <script src="bootstrap-waitingfor.js"></script>


        <script>

            $(document).ready(function () {

                $('#btn_cambio_pass').click(function () {

//                    waitingDialog.show();
//                    setTimeout(function () {
//                        waitingDialog.hide();
//                    }, 3000);

                    $('#modal_cambio_pass').modal('show');


                });


                $('#btn_guardar_pass').click(function () {

                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_guardar_pass").disabled = false;

                    var pass_actual = document.getElementById('idtxtcontrasenia_actual').value;
                    var pass1 = document.getElementById('idtxtcontrasenia1').value;
                    var pass2 = document.getElementById('idtxtcontrasenia2').value;

                    var er = /.{5,}/g;
                    var patron_pass = "true";


                    if (er.test(pass1) == false) {

                        patron_pass = "false";

                    }//Fin validacion minimo caracteres de la nueva contrasenia


                    if (pass1 != pass2) {

                        setTimeout(function () {

                            iziToast.error({
                                transitionOut: 'fadeOutDown',
                                title: 'Error',
                                position: 'topCenter',
                                message: 'Las contraseñas no coinciden',

                            });


                            document.getElementById("btn_guardar_pass").disabled = false;
                            waitingDialog.hide();
                        }, 2000);

                        return;

                    }


                    $.ajax({
                        type: 'POST',
                        url: 'post.php',
                        data: {
                            'cambio_pass': 'cambio_pass',
                            'pass_actual': pass_actual,
                            'pass1': pass1,
                            'pass2': pass2,
                            'patron_pass': patron_pass
                        },
                        success: function (msg) {

                            //waitingDialog.hide();



                            setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_guardar_pass").disabled = false;


                                if (msg == "error_pass_actual") {

                                    iziToast.error({
                                        transitionOut: 'fadeOutDown',
                                        title: 'Error en su contraseña actual',
                                        position: 'topCenter',
                                        message: '',
                                    });

                                    document.getElementById('idtxtcontrasenia_actual').value = "";
                                    return;

                                }


                                if (msg == "error_patron") {

                                    iziToast.error({
                                        transitionOut: 'fadeOutDown',
                                        title: 'La nueva contraseña debe tener un mínimo de 5 caracteres',
                                        position: 'topCenter',
                                        message: '',

                                    });

                                    return;

                                }



                                if (msg == "pass_cambiada") {

                                    $('#modal_cambio_pass').modal('hide');

                                    iziToast.success({
                                        transitionOut: 'fadeOutDown',
                                        timeout: 2400,
                                        title: 'Contraseña cambiada',
                                        position: 'topCenter',
                                        message: '',
                                    });


                                    setTimeout(function () {

                                        window.location.href = "https://wifinet.ga/paginas/login";

                                    }, 2500);


                                    return;

                                }

                                iziToast.error({
                                    transitionOut: 'fadeOutDown',
                                    title: 'Ha ocurrido un error',
                                    position: 'topCenter',
                                    message: '',
                                });

                            }, 1000);//Fin funcion de espera del metodo success del ajax


                        }//Fin del metodo success

                    }).fail(function (jqXHR, textStatus, errorThrown) {

                        setTimeout(function () {

                            waitingDialog.hide();
                            document.getElementById("btn_guardar_pass").disabled = false;

                            iziToast.error({
                                transitionOut: 'fadeOutDown',
                                title: 'Ha ocurrido un error',
                                position: 'topCenter',
                                message: '',
                            });


                        }, 1000);//Fin funcion de espera del metodo success del ajax


                    });//Fin ajax cambiar pass



                });//Funcion click boton guardar pass


                var fecha_nacimiento;

                if (moment('<?php echo $fecha_nacimiento; ?>', 'YYYY-MM-DD', 'es').format("YYYY") < 2000) {

                    fecha_nacimiento = moment('<?php echo $fecha_nacimiento; ?>', 'YYYY-MM-DD', 'es').format("DD MMMM") + " de " + moment('<?php echo $fecha_nacimiento; ?>', 'YYYY-MM-DD', 'es').format("YYYY");

                } else {

                    fecha_nacimiento = moment('<?php echo $fecha_nacimiento; ?>', 'YYYY-MM-DD', 'es').format("DD MMMM") + " del " + moment('<?php echo $fecha_nacimiento; ?>', 'YYYY-MM-DD', 'es').format("YYYY");

                }


                var fecha_inicio_laboral;

                if (moment('<?php echo $fecha_inicio_laboral; ?>', 'YYYY-MM-DD', 'es').format("YYYY") < 2000) {

                    fecha_inicio_laboral = moment('<?php echo $fecha_inicio_laboral; ?>', 'YYYY-MM-DD', 'es').format("DD MMMM") + " de " + moment('<?php echo $fecha_nacimiento; ?>', 'YYYY-MM-DD', 'es').format("YYYY");

                } else {

                    fecha_inicio_laboral = moment('<?php echo $fecha_inicio_laboral; ?>', 'YYYY-MM-DD', 'es').format("DD MMMM") + " del " + moment('<?php echo $fecha_inicio_laboral; ?>', 'YYYY-MM-DD', 'es').format("YYYY");

                }

                document.getElementById('idfecha_nacimiento').value = fecha_nacimiento;
                document.getElementById('idfecha_inicio_laboral').value = fecha_inicio_laboral;


//                $('#idfecha_nacimiento').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD',
//                    ignoreReadonly: true,
//                    allowInputToggle: true
//                });
//                
//                 $('#idfecha_inicio_laboral').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD',
//                    ignoreReadonly: true,
//                    allowInputToggle: true
//                });


            });


            function scrollToDownload() {
                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                        scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }


            $(document).ready(function () {

                $('#facebook').sharrre({
                    share: {
                        facebook: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    },
                    template: '<i class="fab fa-facebook-f"></i> Facebook',
                    url: 'https://demos.creative-tim.com/material-kit/index.html'
                });

                $('#googlePlus').sharrre({
                    share: {
                        googlePlus: true
                    },
                    enableCounter: false,
                    enableHover: false,
                    enableTracking: true,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    },
                    template: '<i class="fab fa-google-plus"></i> Google',
                    url: 'https://demos.creative-tim.com/material-kit/index.html'
                });

                $('#twitter').sharrre({
                    share: {
                        twitter: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    buttons: {
                        twitter: {
                            via: 'CreativeTim'
                        }
                    },
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    },
                    template: '<i class="fab fa-twitter"></i> Twitter',
                    url: 'https://demos.creative-tim.com/material-kit/index.html'
                });

            });
        </script>




    </body>

</html>