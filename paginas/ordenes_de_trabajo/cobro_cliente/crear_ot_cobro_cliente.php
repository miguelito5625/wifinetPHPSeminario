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


                            <h2>OT Cobro a cliente</h2>


                        </div>




                        <div class="row">

                            <div class="col-md-12">
                                <h3>Cliente</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-12">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_clientes" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12">
                                        <h4>Buscar un cliente</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_cliente" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_cliente" readonly required>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="direccion_cliente" class="bmd-label-floating">Dirección</label>
                                    <input type="text" class="form-control" id="direccion_cliente" readonly required>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Cobrador</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_tecnicos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar un cobrador para esta orden de trabajo</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del cobrador encargado</label>
                                    <input type="text" name="datos_cliente" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <form action="post.php" method="post">
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
                        
                        

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Total a Cobrar</h3>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="idtotal_cobrado" class="bmd-label-floating">Total a cobrar</label>
                                                <input type="text" required autocomplete="off" name="total_cobrado" class="form-control" id="idtotal_cobrado">
                                                <span class="bmd-help">Cantidad en Quetzales</span>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-12 mr-auto">
                                    <input type="hidden" name="id_cliente" id="id_cliente">
                                    <input type="hidden" name="id_usuario" id="id_usuario">
                                    <button class="btn btn-primary" name="crear_ot_cobro_cliente"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_ot_cobro_cliente.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>




                        </form>




                    </div>


                </div>


            </div>

        </div>


        <?php
        include 'modals/modal_clientes.php';
        include 'modals/modal_cobradores.php';
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
                //init DateTimePickers
                //materialKit.initFormExtendedDatetimepickers();

 // ------------------ Desahabilitar el teclado en los campos de fechas ---------------------


//                $("#idfecha_instalacion").on('keydown paste', function (e) {
//                    e.preventDefault();
//                });
//                
//                 $('#idfecha_instalacion').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD',
//                    ignoreReadonly: true,
//                    allowInputToggle: true
//                });
//
//                document.getElementById('idfecha_instalacion').value = '';
//
//                $('#idfecha_instalacion_oculta').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD'
//                });
//
//                $("#idfecha_instalacion").on("dp.change", function (e) {
//                    $('#idfecha_instalacion_oculta').data("DateTimePicker").date(e.date);
//                });


//              Metodo para evitar activar el formulario post
//                $('#btn_buscar_cliente').on("click", function (e) {
//                    e.preventDefault(); // <<-- required to stop the refresh
//
//
//                });



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