<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">


        <?php include '../menu.php'; ?>

        <!--Notificaciones de errores y exitos en las operaciones-->
        <?php include '../control_errores.php'; ?>

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


                            <h3>Introduzca los datos del usuario test</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre1" class="bmd-label-floating">Primer nombre</label>
                                        <input type="text" autocomplete="off" name="nombre1" class="form-control" id="idnombre1" required>
                                        <span class="bmd-help">Escriba el primer nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre2" class="bmd-label-floating">Segundo nombre</label>
                                        <input type="text" autocomplete="off" name="nombre2" class="form-control" id="idnombre2">
                                        <span class="bmd-help">Escriba el segundo nombre del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido1" class="bmd-label-floating">Primer apellido</label>
                                        <input type="text" autocomplete="off" name="apellido1" class="form-control" id="idapellido1" required>
                                        <span class="bmd-help">Escriba el primer apellido del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idapellido2" class="bmd-label-floating">Segundo apellido</label>
                                        <input type="text" autocomplete="off" name="apellido2" class="form-control" id="idapellido2">
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
                                        <input type="text" name="fecha_nacimiento" autocomplete="off" data-date-format="DD MMMM YYYY" required id="idfecha_nacimiento" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_nacimiento_oculta" id="idfecha_nacimiento_oculta" value="" />  
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de inicio laboral</label>
                                        <input type="text" name="fecha_inicio_laboral" autocomplete="off" data-date-format="DD MMMM YYYY" value="" required id="idfecha_inicio_laboral" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_inicio_laboral_oculta" id="idfecha_inicio_laboral_oculta" value="" />  
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idcui" class="bmd-label-floating">CUI</label>
                                        <input type="text" pattern="^([0-9]){13}" required autocomplete="off" name="cui" class="form-control" id="idcui">
                                        <span class="bmd-help">Cui del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnit" class="bmd-label-floating">NIT</label>
                                        <input type="text" pattern="([0-9]{4,12})(-)([A-Z,0-9])" required autocomplete="off" name="nit" class="form-control" id="idnit">
                                        <span class="bmd-help">Nit del cliente</span>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="iddireccion" class="bmd-label-floating">Dirección</label>
                                        <input type="text" required autocomplete="off" name="direccion" class="form-control" id="iddireccion">
                                        <span class="bmd-help">Escriba la dirección del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idtelefono" class="bmd-label-floating">Teléfono</label>
                                        <input type="text" pattern="([0-9]){8}" autocomplete="off" name="telefono" class="form-control" id="idtelefono">
                                        <span class="bmd-help">Escriba el teléfono de contacto del cliente</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idusuario" class="bmd-label-floating">Usuario</label>
                                        <input type="text" required autocomplete="off" name="usuario" class="form-control" id="idusuario">
                                        <span class="bmd-help">Escriba el de usuario</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idpassword" class="bmd-label-floating">Contraseña</label>
                                        <input type="password" required name="password" class="form-control" id="idpassword">
                                        <span class="bmd-help">Escriba la contraseña</span>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select class="selectpicker show-tick" required name="puesto" data-style="btn btn-default" title="Seleccione el cargo" data-size="7" data-live-search="true">
                                            <option data-tokens="Administrador">Administrador</option>
                                            <option data-tokens="Técnico">Técnico</option>
                                            <option data-tokens="Cobrador">Cobrador</option>
                                        </select>


                                    </div>
                                </div>



                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-check">
                                        <br>
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="check_activo" type="checkbox" value="Activo">
                                            Activar
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>



                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="crear_usuario"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_usuarios.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>



                        </form>

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

        <script>


            $(document).ready(function () {
                //init DateTimePickers
                //materialKit.initFormExtendedDatetimepickers();


// ------------------ Desahabilitar el teclado en los campos de fechas ---------------------
                $("#idfecha_nacimiento").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $("#idfecha_inicio_laboral").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                
                
                $('#idfecha_nacimiento').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    minDate: (parseInt((new Date()).getFullYear()) - 60).toString(),
                    maxDate: '<?php echo date("Y")-18; ?>/<?php echo date("m"); ?>/<?php echo date("d"); ?>',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                document.getElementById('idfecha_nacimiento').value = '';

                $('#idfecha_nacimiento_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    date: '<?php echo date("Y/m/d"); ?>'
                });

                $("#idfecha_nacimiento").on("dp.change", function (e) {
                    $('#idfecha_nacimiento_oculta').data("DateTimePicker").date(e.date);
                });

                $('#idfecha_inicio_laboral').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    maxDate: '<?php echo date("Y/m/d"); ?>',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                document.getElementById('idfecha_inicio_laboral').value = '';

                $('#idfecha_inicio_laboral_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    date:'<?php echo date("Y/m/d"); ?>'
                });

                $("#idfecha_inicio_laboral").on("dp.change", function (e) {
                    $('#idfecha_inicio_laboral_oculta').data("DateTimePicker").date(e.date);
                });


                // Sliders Init
                //materialKit.initSliders();
            });


//            function scrollToDownload() {
//                if ($('.section-download').length != 0) {
//                    $("html, body").animate({
//                        scrollTop: $('.section-download').offset().top
//                    }, 1000);
//                }
//            }


            
            
        </script>


        

    </body>

</html>