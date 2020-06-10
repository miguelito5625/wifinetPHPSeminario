<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">


        <?php include '../../menu.php'; ?>

        <!--Notificaciones de errores y exitos en las operaciones-->
        <?php include '../../control_errores.php'; ?>

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


                            <h3>Creación de OT de solicitud de desinstalación de servicio</h3>


                        </div>



                        <div class="row">

                            <div class="col-md-12 col-sm-12">

                                <h3>Cliente</h3>

                                <div class="row">
                                    <div class="col-lg-1 col-sm-1">
                                        <div class="form-group">

                                            <button id="btn_buscar_cliente" data-toggle="modal" data-target="#modal_clientes" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>

                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-8">
                                        <h4>Buscar un cliente</h4>
                                    </div>

                                </div>


                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" name="datos_cliente" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_cliente" class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="datos_cliente" class="form-control" id="nombre_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <br>
                        <form action="post.php" method="post">
                            <div class="row">

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de petición de desinstalación</label>
                                        <input type="text" name="fecha_desinstalacion" autocomplete="off" data-date-format="DD MMMM YYYY" value="" required id="idfecha_desinstalacion" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_desinstalacion_oculta" id="idfecha_desinstalacion_oculta" value="" />  
                                    </div>
                                </div>

                            </div>

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Técnico responsable</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-12">
                                        <div class="form-group">
                                            <button type="button" id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_tecnicos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12">
                                        <h4>Buscar un técnico para esta orden de trabajo</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" name="datos_cliente" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>


                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            




                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-12 mr-auto">
                                    <input type="hidden" name="id_cliente" id="id_cliente">
                                    <input type="hidden" name="id_usuario" id="id_usuario">
                                    <button class="btn btn-primary" name="crear_ot_desinstalacion"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_ot_desinstalacion.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>




                        </form>




                    </div>


                </div>


            </div>

        </div>


        <?php
        include 'modals/modal_clientes.php';
        include 'modals/modal_usuarios.php';
        ?>



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
                
 // ------------------ Desahabilitar el teclado en los campos de fechas ---------------------


                $("#idfecha_desinstalacion").on('keydown paste', function (e) {
                    e.preventDefault();
                });
                
                 $('#idfecha_desinstalacion').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    maxDate: '<?php echo date("Y/m/d"); ?>',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                document.getElementById('idfecha_desinstalacion').value = '';

                $('#idfecha_desinstalacion_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    date: '<?php echo date("Y/m/d"); ?>'
                });

                $("#idfecha_desinstalacion").on("dp.change", function (e) {
                    $('#idfecha_desinstalacion_oculta').data("DateTimePicker").date(e.date);
                });


//              Metodo para evitar activar el formulario post
//                $('#btn_buscar_cliente').on("click", function (e) {
//                    e.preventDefault(); // <<-- required to stop the refresh
//
//
//                });



            });






        </script>





    </body>

</html>