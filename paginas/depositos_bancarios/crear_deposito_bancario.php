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


                            <h3>Creación de Deposito Bancario</h3>


                        </div>




                        <div class="row">

                            <div class="col-md-12">
                                <h3>Cobrador</h3>

                                
                                

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_cobrador" class="bmd-label-floating">Nombre del cobrador encargado</label>
                                    <input type="text" value="<?php echo $_SESSION['nombre_usuario']; ?>" name="nombre_cobrador" class="form-control" id="nombre_cobrador" readonly required>
                                </div>
                            </div>
                        </div>


                        <br>

                        <form action="post.php" method="post">
                            
                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha del deposito</label>
                                        <input type="text" name="fecha_deposito" autocomplete="off" data-date-format="DD MMMM YYYY" value="" required id="idfecha_deposito" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_deposito_oculta" id="idfecha_deposito_oculta" value="" />  
                                    </div>
                                </div>

                            </div>





                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Banco</h3>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-4">
                                            <div class="form-group">
                                                <select class="selectpicker show-tick" name="banco" data-style="btn btn-default" title="Seleccione el Banco" data-size="7" data-live-search="true" required>
                                                    <option data-tokens="Banrural">Banrural</option>
                                                    <option data-tokens="G&T Continental">G&T Continental</option>
                                                    <option data-tokens="Banco Reformador">Banco Reformador</option>
                                                    <option data-tokens="Banco Internacional">Banco Internacional</option>
                                                    <option data-tokens="Banco AgroMercantil">Banco AgroMercantil</option>
                                                </select>                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Número de boleta</h3>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-4">
                                            <div class="form-group">
                                                <label for="idno_boleta" class="bmd-label-floating">No. Boleta</label>
                                                <input type="text" required autocomplete="off" name="no_boleta" class="form-control" id="idno_boleta">
                                                <span class="bmd-help">Escriba el número de la boleta</span>                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Razon del deposito</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Deposito</h3>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-4">
                                            <div class="form-group">
                                                <label for="iddeposito" class="bmd-label-floating">Total depositado</label>
                                                <input type="text" required autocomplete="off" name="deposito" class="form-control" id="iddeposito">
                                                <span class="bmd-help">Cantidad en Quetzales</span>                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-12 mr-auto">
                                    <input type="hidden" value="<?php echo $_SESSION['id_usuario']; ?>" name="id_cobrador" id="id_cobrador">
                                    <button class="btn btn-primary" name="crear_deposito_bancario"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_deposito_bancario.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>




                        </form>




                    </div>


                </div>


            </div>

        </div>


        <?php
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


                $("#idfecha_deposito").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $('#idfecha_deposito').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    maxDate: '<?php echo date("Y/m/d"); ?>',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                document.getElementById('idfecha_deposito').value = '';

                $('#idfecha_deposito_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    format: 'YYYY/MM/DD',
                    date: '<?php echo date("Y/m/d"); ?>'
                });

                $("#idfecha_deposito").on("dp.change", function (e) {
                    $('#idfecha_deposito_oculta').data("DateTimePicker").date(e.date);
                });


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