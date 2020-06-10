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

        <?php
        if (isset($_GET['id_ot_man_re'])) {

            include '../../../clases/Ot_mantenimiento_reparacion.php';

            $id_ot_mantenimiento_reparacion = $_GET['id_ot_man_re'];

            $id_cliente;
            $cui_cliente;
            $nombre_cliente;
            $id_tecnico;
            $nombre_tecnico;
            $fecha_man_re;
            $descripcion;
            $id_plan;

            $ot = new Ot_mantenimiento_reparacion();

            $result = $ot->buscar_para_actualizar($id_ot_mantenimiento_reparacion);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_cliente = $row['id_cliente'];
                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $id_tecnico = $row['id_tecnico'];
                    $nombre_tecnico = $row['nombre_tecnico'];
                    $fecha_man_re = $row['fecha_mantenimiento_reparacion'];
                    $descripcion = $row['descripcion_ot'];
                    $id_plan = $row[id_plan];
                }
            }
            
            
            
        }else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_man_re.php">';
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


                            <h2 class="title">Datos de OT de mantenimiento y reparación</h2>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>

                                


                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" value="<?php echo $cui_cliente; ?>" name="datos_cliente" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_cliente" class="bmd-label-floating">Nombre</label>
                                    <input type="text" value="<?php echo $nombre_cliente; ?>" name="datos_cliente" class="form-control" id="nombre_cliente" readonly required>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Técnico</h3>

                               

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" value="<?php echo $nombre_tecnico; ?>" name="datos_cliente" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <h3>Fecha</h3>
                            </div>
                        </div>                        

                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de instalación del servicio</label>
                                        <input type="text" name="fecha_man_re" autocomplete="off" data-date-format="DD MMMM YYYY" value="" readonly id="idfecha_man_re" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_man_re_oculta" id="idfecha_man_re_oculta" value="" />  
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-4">
                                            <textarea readonly class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"> <?php echo $descripcion; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
<!--                                    <a class="btn btn-primary" href="modificar_ot_man_re.php?id_ot_man_re=<?php echo $id_ot_mantenimiento_reparacion; ?>"><i class="material-icons">save</i> Guardar</a>-->
                                    <a class="btn btn-primary" href="imprimir.php?id_ot_man_re=<?php echo $id_ot_mantenimiento_reparacion; ?>" target="_blank"><i class="material-icons">print</i> Imprimir</a>
                                    <a class="btn btn-primary" href="mostrar_ot_man_re.php"><i class="material-icons">cancel</i> Cancelar</a>
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


                $("#idfecha_man_re").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $('#idfecha_man_re').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_man_re; ?>",
                    format: 'DD MMMM YYYY',
                    //ignoreReadonly: true,
                    allowInputToggle: true
                });

                //document.getElementById('idfecha_man_re').value = '';

                $('#idfecha_man_re_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_man_re; ?>",
                    format: 'YYYY/MM/DD'
                });

                $("#idfecha_man_re").on("dp.change", function (e) {
                    $('#idfecha_man_re_oculta').data("DateTimePicker").date(e.date);
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