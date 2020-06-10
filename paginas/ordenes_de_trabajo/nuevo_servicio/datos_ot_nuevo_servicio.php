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
        if (isset($_GET['id_ot_nuevo_servicio'])) {

            include '../../../clases/Ot_nuevo_servicio.php';

            $id_ot_nuevo_servicio = $_GET['id_ot_nuevo_servicio'];

            $id_cliente;
            $cui_cliente;
            $nombre_cliente;
            $id_tecnico;
            $nombre_tecnico;
            $fecha_instalacion;
            $descripcion;
            $id_plan;

            $ot = new Ot_nuevo_servicio();

            $result = $ot->buscar_para_actualizar($id_ot_nuevo_servicio);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_cliente = $row['id_cliente'];
                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $id_tecnico = $row['id_tecnico'];
                    $nombre_tecnico = $row['nombre_tecnico'];
                    $fecha_instalacion = $row['fecha_instalacion'];
                    $descripcion = $row['descripcion_ot'];
                    $id_plan = $row[id_plan];
                }
            }
            
            
            
        }else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_nuevo_servicio.php">';
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


                            <h3>Detalles OT de instalacion de servicio</h3>


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


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Técnico</h3>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $nombre_tecnico; ?>" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>

                        <form action="post.php" method="post">

                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-4">
                                            <textarea readonly class="form-control" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"> <?php echo $descripcion; ?> </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-3 col-sm-4">

                                    <h3>Plan de internet</h3>



<?php
if (isset($_GET['codigo_error'])) {

    return;
}

include '../../../clases/Plan.php';

$plan = new Plan();

$result = $plan->MostrarPlanes();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        
        

if ($row['id_plan'] == $id_plan) {

            echo '<input type="text" autocomplete="off" readonly id="id_plan" value="'.$row['nombre'].'" class="form-control datetimepicker">';
            
        } else {
                        
        }        
    }
}
?>


                                </div>
                            </div>



                            <br>

                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de instalación del servicio</label>
                                        <input type="text" name="fecha_instalacion" autocomplete="off" readonly id="idfecha_instalacion" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_instalacion_oculta" id="idfecha_instalacion_oculta" value="" />  
                                    </div>
                                </div>

                            </div>




                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
<!--                                    <a class="btn btn-primary" href="modificar_ot_nuevo_servicio.php?id_ot_nuevo_servicio=<?php echo $id_ot_nuevo_servicio; ?>"><i class="material-icons">edit</i> Editar</a>-->
                                    <a class="btn btn-primary" href="imprimir.php?id_ot_nuevo_servicio=<?php echo $id_ot_nuevo_servicio; ?>" target="_blank"><i class="material-icons">print</i> Imprimir</a>
                                    <a class="btn btn-primary" href="mostrar_ot_nuevo_servicio.php"><i class="material-icons">arrow_back</i> Regresar</a>
                                </div>




                        </form>




                    </div>


                </div>


            </div>

        </div>


<?php
include 'modals/modal_clientes.php';
include 'modals/modal_tecnicos.php';
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


                $("#idfecha_instalacion").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $('#idfecha_instalacion').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_instalacion; ?>",
                    format: 'DD MMMM YYYY',
                    //ignoreReadonly: true,
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