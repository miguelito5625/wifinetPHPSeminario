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
        if (isset($_GET['id_detalle_cobro_cliente'])) {

            include '../../clases/Cobro_cliente.php';

            $cobros = new Cobro_cliente();

            $result = $cobros->MostrarDetalleCobroParaPago($_GET['id_detalle_cobro_cliente']);

            $id_detalle_cobro_cliente;
            $nombre_cliente;
            $anio;
            $mes;
            $total;

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_detalle_cobro_cliente = $row['id_detalle_cobro_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $anio = $row['anio'];
                    $mes = $row['mes'];
                    $total = $row['total'];
                }
            }
        } else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar.php">';
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


                            <h3>Realizar pago</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idfecha_pago" class="bmd-label-floating">Fecha de pago</label>
                                        <input type="text" data-date-format="DD MMMM YYYY" class="form-control" id="idfecha_pago" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre" class="bmd-label-floating">Cliente</label>
                                        <input type="text" value="<?php echo $nombre_cliente; ?>" name="nombre_cliente" class="form-control" id="idnombre" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnorecibo" class="bmd-label-floating">No. Recibo</label>
                                        <input type="text" name="no_recibo" class="form-control" id="idnorecibo" required>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idanio" class="bmd-label-floating">Año</label>
                                        <input type="text" value="<?php echo $anio; ?>" name="anio" class="form-control" id="idanio" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idmes" class="bmd-label-floating">Mes</label>
                                        <input type="text" name="mes" class="form-control" id="idmes" readonly>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select class="selectpicker form-control show-tick" name="metodo_pago" data-style="btn btn-default" title="Metodo de pago" data-size="7" data-live-search="true">
                                            <option data-tokens="Cheque banco propio">Cheque banco propio</option>
                                            <option data-tokens="Cheque banco ajeno">Cheque banco ajeno</option>
                                            <option data-tokens="Efectivo">Efectivo</option>
                                            <option data-tokens="Tarjeta Crédito/Débito">Tarjeta Crédito/Débito</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idtotal" class="bmd-label-floating">Total</label>
                                        <input type="text" value="<?php echo $total; ?>" name="total" class="form-control" id="idtotal" readonly>
                                    </div>
                                </div>


                            </div> <!--final de la fila-->
                            
                            <input type="hidden" name="id_detalle_cobro_cliente" value="<?php echo $id_detalle_cobro_cliente; ?>"


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="realizar_pago"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="detalle.php"><i class="material-icons">cancel</i> Cancelar</a>
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

                document.getElementById("idfecha_pago").value = moment().format('D MMMM Y');
                document.getElementById("idfecha_pago").focus();

                document.getElementById("idmes").value = moment().month(<?php echo $mes-1; ?>).format('MMMM');
                document.getElementById("idmes").focus();

            });

        </script>




    </body>

</html>