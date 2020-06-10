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

        <?php
        if (isset($_GET['id_deposito_bancario'])) {

            include '../../clases/Deposito_bancario.php';

            $id_deposito_bancario = $_GET['id_deposito_bancario'];

            $id_cobrador;
            $cui_cobrador;
            $nombre_cobrador;
            $fecha_deposito;
            $banco;
            $no_boleta;
            $descripcion;
            $total_depositado;

            $deposito_bancario = new Deposito_bancario();

            $result = $deposito_bancario->buscar_para_actualizar($id_deposito_bancario);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_cobrador = $row['id_cobrador'];
                    $cui_cobrador = $row['cui_cobrador'];
                    $nombre_cobrador = $row['nombre_cobrador'];
                    $fecha_deposito = $row['fecha_deposito'];
                    $banco = $row['banco'];
                    $no_boleta = $row['no_boleta'];
                    $descripcion = $row['descripcion'];
                    $total_depositado = $row['total_depositado'];
                }
            }
            
            
            
        }else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_deposito_bancario.php">';
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


                            <h2 class="title">Datos de Deposito Bancario</h2>


                        </div>




                        <div class="row">

                            <div class="col-md-12">
                                <h3>Cobrador</h3>

                                

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_cobrador" class="bmd-label-floating">Nombre del cobrador encargado</label>
                                    <input type="text" name="nombre_cobrador" value="<?php echo $nombre_cobrador;?>" class="form-control" id="nombre_cobrador" readonly required>
                                </div>
                            </div>
                        </div>


                        <br>
                            
                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha del deposito</label>
                                        <input type="text" name="fecha_deposito" autocomplete="off" data-date-format="DD MMMM YYYY" value="" readonly id="idfecha_deposito" class="form-control datetimepicker">
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
                                                <label for="idbanco" class="bmd-label-floating">Banco</label>
                                                <input type="text" readonly value="<?php echo $banco; ?>" required autocomplete="off" name="banco" class="form-control" id="idbanco">
                                                <span class="bmd-help">Escriba el número de la boleta</span>                                        </div>
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
                                                <input type="text" readonly value="<?php echo $no_boleta; ?>" required autocomplete="off" name="no_boleta" class="form-control" id="idno_boleta">
                                                <span class="bmd-help">Escriba el número de la boleta</span>                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Razon del deposito</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-4">
                                            <textarea class="form-control" readonly maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"><?php echo $descripcion;?></textarea>
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
                                                <input type="text" readonly value="<?php echo $total_depositado;?>" required autocomplete="off" name="deposito" class="form-control" id="iddeposito">
                                                <span class="bmd-help">Cantidad en Quetzales</span>                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <input type="hidden" name="id_cobrador" id="id_cobrador">
<!--                                    <a class="btn btn-primary" href="modificar_deposito_bancario.php?id_deposito_bancario=<?php echo $id_deposito_bancario;?>"><i class="material-icons">edit</i> Modificar</a>-->
                                    <a class="btn btn-primary" href="mostrar_deposito_bancario.php"><i class="material-icons">arrow_back</i> Regresar</a>
                                </div>
                            </div>



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
                


                $("#idfecha_deposito").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $('#idfecha_deposito').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_deposito; ?>",
                    format: 'DD MMMM YYYY',
                    //ignoreReadonly: true,
                    allowInputToggle: true
                });

                //document.getElementById('idfecha_deposito').value = '';

                $('#idfecha_deposito_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_deposito; ?>",
                    format: 'YYYY/MM/DD'
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