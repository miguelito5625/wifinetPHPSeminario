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


                            <h2 class="title">Registrar una transacción</h2>


                        </div>


                        <form id="form" action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <select class="selectpicker show-tick" name="tipo" data-style="btn btn-default" title="Tipo de transacción" data-size="7" data-live-search="true" required>
                                            <option value="Ingreso">Ingreso</option>
                                            <option value="Egreso">Egreso</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idcantidad" class="label-control">Cantidad</label>
                                        <input type="text" value="" name="cantidad" class="form-control" id="idcantidad" pattern="^[0-9]+(\.[0-9]{1,2})?$" required>
                                        <span class="bmd-help">En quetzales</span>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <label class="label-control">Fecha</label>
                                        <input type="text" name="fecha" autocomplete="off" data-date-format="DD MMMM YYYY" value="" required id="idfecha" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_oculta" id="idfecha_oculta" value="" />  

                                    </div>
                                </div>



                            </div>


                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Razon de la transacción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-4">
                                            <textarea class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Describa la razon de la transacción" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <input type="hidden" value="<?php echo $_SESSION['id_usuario']; ?>" name="id_usuario">
                                    <button class="btn btn-primary" name="crear"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar.php"><i class="material-icons">cancel</i> Cancelar</a>
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

                $("#idfecha").on('keydown paste', function (e) {
                    e.preventDefault();
                });


                var hoy = moment().format("YYYY/MM/DD");
                


                $('#idfecha').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    maxDate:'<?php echo date("Y/m/d"); ?>',
                    //minDate: hoy,
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                //document.getElementById('idfecha').value = '';

                $('#idfecha_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    date:'<?php echo date("Y/m/d"); ?>'
                });

                $("#idfecha").on("dp.change", function (e) {
                    $('#idfecha_oculta').data("DateTimePicker").date(e.date);
                });


            });
        </script>




    </body>

</html>