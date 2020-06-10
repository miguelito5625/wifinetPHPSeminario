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
        if (isset($_GET['id_ot_desinstalacion'])) {

            include '../../../clases/Ot_desinstalacion.php';

            $id_ot_desinstalacion = $_GET['id_ot_desinstalacion'];

            $id_cliente;
            $cui_cliente;
            $nombre_cliente;
            $id_usuario;
            $nombre_usuario;
            $fecha_instalacion;
            $descripcion;

            $ot = new Ot_desinstalacion();

            $result = $ot->buscar_para_actualizar($id_ot_desinstalacion);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_cliente = $row['id_cliente'];
                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $id_usuario = $row['id_usuario'];
                    $nombre_usuario = $row['nombre_usuario'];
                    $fecha_instalacion = $row['fecha_desinstalacion'];
                    $descripcion = $row['descripcion'];
                }
            }
        } else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_desinstalacion.php">';
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


                            <h3>Modificar OT de instalacion de servicio</h3>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>

                                <div class="row">
                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">

                                            <button id="btn_buscar_cliente" data-toggle="modal" data-target="#modal_clientes" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>

                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar un cliente</h4>
                                    </div>

                                </div>


                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $cui_cliente; ?>" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_cliente" class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $nombre_cliente; ?>" class="form-control" id="nombre_cliente" readonly required>
                                </div>
                            </div>

                        </div>


                        <br>
                        <form action="post.php" method="post">

                        <div class="row">

                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label class="label-control">Fecha de instalación del servicio</label>
                                    <input type="text" name="fecha_instalacion" autocomplete="off" required id="idfecha_instalacion" class="form-control datetimepicker">
                                    <input type="hidden" name="fecha_instalacion_oculta" id="idfecha_instalacion_oculta" value="" />  
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Técnico</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">
                                            <button type="button" id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_tecnicos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar un técnico para esta orden de trabajo</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $nombre_usuario; ?>" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>


                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-4">
                                            <textarea class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"> <?php echo $descripcion; ?> </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <input type="hidden" value="<?php echo $id_ot_desinstalacion; ?>" name="id_ot_desinstalacion" id="id_ot_desinstalacion">
                                    <input type="hidden" value="<?php echo $id_cliente; ?>" name="id_cliente" id="id_cliente">
                                    <input type="hidden" value="<?php echo $id_usuario; ?>" name="id_usuario" id="id_usuario">
                                    <button class="btn btn-primary" name="actualizar_ot_desinstalacion"><i class="material-icons">save</i> Guardar</button>
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
                
                


                $("#idfecha_instalacion").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $('#idfecha_instalacion').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_instalacion; ?>",
                    format: 'DD MMMM YYYY',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                //document.getElementById('idfecha_instalacion').value = '';

                $('#idfecha_instalacion_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_instalacion; ?>",
                    format: 'YYYY/MM/DD'
                });

                $("#idfecha_instalacion").on("dp.change", function (e) {
                    $('#idfecha_instalacion_oculta').data("DateTimePicker").date(e.date);
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