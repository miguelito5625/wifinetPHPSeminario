<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">


        <?php include '../menu.php'; ?>

        <?php
        if (isset($_GET['id_usuario'])) {

            include '../../clases/Usuario.php';

            $id_usuario = $_GET['id_usuario'];

            $primer_nombre;
            $segundo_nombre;
            $primer_apellido;
            $segundo_apellido;
            $fecha_nacimiento;
            $fecha_inicio_laboral;
            $cui;
            $nit;
            $direccion;
            $telefono;
            $nombre_usuario;
            $password;
            $puesto;


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
                }
            }
        } else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_clientes.php">';
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


                            <h2 class="title">Modificar Usuario</h2>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre1" class="bmd-label-floating">Primer nombre</label>
                                        <input type="text" required name="nombre1" value="<?php echo $primer_nombre; ?>" class="form-control" id="idnombre1">
                                        <span class="bmd-help">Escriba el primer nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre2" class="bmd-label-floating">Segundo nombre</label>
                                        <input type="text" name="nombre2" value="<?php echo $segundo_nombre; ?>" class="form-control" id="idnombre2">
                                        <span class="bmd-help">Escriba el segundo nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido1" class="bmd-label-floating">Primer apellido</label>
                                        <input type="text" required name="apellido1" value="<?php echo $primer_apellido; ?>" class="form-control" id="idapellido1">
                                        <span class="bmd-help">Escriba el primer apellido del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido2" class="bmd-label-floating">Segundo apellido</label>
                                        <input type="text" name="apellido2" value="<?php echo $segundo_apellido; ?>" class="form-control" id="idapellido2">
                                        <span class="bmd-help">Escriba el segundo apellido del cliente</span>
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
                                        <input type="text" autocomplete="off" required name="fecha_nacimiento" id="idfecha_nacimiento" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_nacimiento_oculta" id="idfecha_nacimiento_oculta" value="" />  
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha inicio laboral</label>
                                        <input type="text" required autocomplete="off" name="fecha_inicio_laboral" id="idfecha_inicio_laboral" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_inicio_laboral_oculta" id="idfecha_inicio_laboral_oculta" value="" />  
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idcui" class="bmd-label-floating">CUI</label>
                                        <input type="text" pattern="^([0-9]){13}" required name="cui" value="<?php echo $cui; ?>" class="form-control" id="idcui">
                                        <span class="bmd-help">Cui del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnit" class="bmd-label-floating">NIT</label>
                                        <input type="text" pattern="([0-9]{4,12})(-)([A-Z,0-9])" required name="nit" value="<?php echo $nit; ?>" class="form-control" id="idnit">
                                        <span class="bmd-help">Nit del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="iddireccion" class="bmd-label-floating">Dirección</label>
                                        <input type="text" required name="direccion" value="<?php echo $direccion; ?>" class="form-control" id="iddireccion">
                                        <span class="bmd-help">Escriba la dirección del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idtelefono" class="bmd-label-floating">Teléfono</label>
                                        <input type="text" pattern="([0-9]){8}" name="telefono" value="<?php echo $telefono; ?>" class="form-control" id="idtelefono">
                                        <span class="bmd-help">Escriba el teléfono de contacto del cliente</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre_usuario" class="bmd-label-floating">Usuario</label>
                                        <input type="text" required name="usuario" value="<?php echo $nombre_usuario; ?>" class="form-control" id="idnombre_usuario">
                                        <span class="bmd-help">Escriba el nombre de usuario</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idpassword" class="bmd-label-floating">Contraseña</label>
                                        <input type="password" required name="password" value="<?php echo $password; ?>" class="form-control" id="idpassword">
                                        <span class="bmd-help">Escriba la contraseña del usuario</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <select name="puesto" class="selectpicker form-control show-tick" data-style="select-with-transition" title="Seleccione el puesto" data-size="5" data-live-search="true" required>
                                            <option data-tokens="Administrador">Administrador</option>
                                            <option data-tokens="Técnico">Técnico</option>
                                            <option data-tokens="Cobrador">Cobrador</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="actualizar_usuario"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_usuarios.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>

                        </form>

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

        <script>
            $(document).ready(function () {
                //init DateTimePickers
                //materialKit.initFormExtendedDatetimepickers();
                
                $('#idfecha_nacimiento').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'DD MMMM YYYY',
                    minDate: (parseInt((new Date()).getFullYear()) - 60).toString(),
                    maxDate: '<?php echo date("Y")-18; ?>/<?php echo date("m"); ?>/<?php echo date("d"); ?>',
                    date: "<?php echo $fecha_nacimiento ?>",
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                //$('#idfecha_nacimiento').data("DateTimePicker").maxDate((parseInt((new Date()).getFullYear()) - 18).toString());


                $('#idfecha_nacimiento_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_nacimiento ?>",
                    format: 'YYYY/MM/DD',
                });
                
                $("#idfecha_nacimiento").on("dp.change", function (e) {
                    $('#idfecha_nacimiento_oculta').data("DateTimePicker").date(e.date);
                });
                
                
                $('#idfecha_inicio_laboral').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    maxDate: '<?php echo date("Y/m/d"); ?>',
                    date: "<?php echo $fecha_inicio_laboral ?>",
                    format: 'DD MMMM YYYY',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });
                
                $('#idfecha_inicio_laboral_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_inicio_laboral ?>",
                    format: 'YYYY/MM/DD'
                });

                $("#idfecha_inicio_laboral").on("dp.change", function (e) {
                    $('#idfecha_inicio_laboral_oculta').data("DateTimePicker").date(e.date);
                });
                

                // Sliders Init
               // materialKit.initSliders();
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