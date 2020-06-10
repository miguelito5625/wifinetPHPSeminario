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
        if (isset($_GET['id_solicitud'])) {

            include '../../clases/Solicitud_cambio_equipo_danio.php';

            $id_solicitud = $_GET['id_solicitud'];

            $cui_cliente;
            $nombre_cliente;
            $nombre_tecnico;
            
            //Equipo
            $modelo_equipo;
            $marca_equipo;
            $serie_equipo;
            $tipo_equipo;

            $descripcion;
            $fecha_solicitud;

            $solicitud = new Solicitud_cambio_equipo_danio();

            $result = $solicitud->buscar_para_actualizar($id_solicitud);
            
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $nombre_tecnico = $row['nombre_tecnico'];
                    $modelo_equipo = $row['modelo'];
                    $marca_equipo = $row['marca'];
                    $serie_equipo = $row['no_serie'];
                    $tipo_equipo = $row['tipo'];
                    $descripcion = $row['descripcion'];
                    $fecha_solicitud = $row['fecha_solicitud'];
                    
                   
                }
            }
        } else {

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


                            <h2 class="title">Datos de petición de cambio de equipo por daño</h2>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>

                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" value="<?php echo $cui_cliente; ?>" name="datos_cliente" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
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
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" value="<?php echo $nombre_tecnico; ?>" name="datos_cliente" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="row">

                            <div class="col-md-12">
                                <h3>Equipo</h3>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Modelo</label>
                                    <input type="text" value="<?php echo $modelo_equipo; ?>" class="form-control" id="modelo_equipo" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Marca</label>
                                    <input type="text" value="<?php echo $marca_equipo; ?>" class="form-control" id="marca_equipo" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">No. Serie</label>
                                    <input type="text" value="<?php echo $serie_equipo; ?>" class="form-control" id="serie_equipo" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Tipo</label>
                                    <input type="text" value="<?php echo $tipo_equipo; ?>" class="form-control" id="tipo_equipo" readonly required>
                                </div>
                            </div>
                        </div>
                 


                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea readonly class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"> <?php echo $descripcion; ?> </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <br>


                            <div class="row">

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de la solicitud</label>
                                        <input type="text" name="fecha_instalacion" autocomplete="off" data-date-format="DD MMMM YYYY" value="" readonly id="idfecha_instalacion" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_instalacion_oculta" id="idfecha_instalacion_oculta" value="" />  
                                    </div>
                                </div>

                            </div>




                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <input type="hidden" name="id_cliente" id="id_cliente">
                                    <input type="hidden" name="id_tecnico" id="id_tecnico">
                                    <input type="hidden" name="id_equipo" id="id_equipo">
<!--                                    <a class="btn btn-primary" href="modificar_solicitud.php?id_solicitud=<?php echo $id_solicitud; ?>" ><i class="material-icons">edit</i> Editar</a>-->
                                    <a class="btn btn-primary" href="mostrar_solicitud.php"><i class="material-icons">arrow_back</i> Regresar</a>
                                </div>
                            </div>


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
            
            $("#idfecha_instalacion").on('keydown paste', function (e) {
                e.preventDefault();
            });

            $('#idfecha_instalacion').datetimepicker({
                //format: 'DD/MM/YYYY'
                defaultDate: "<?php echo $fecha_solicitud; ?>",
                format: 'DD MMMM YYYY',
                //ignoreReadonly: true,
                allowInputToggle: true
            });

            //document.getElementById('idfecha_instalacion').value = '';

            $('#idfecha_instalacion_oculta').datetimepicker({
                //format: 'DD/MM/YYYY'
                defaultDate: "<?php echo $fecha_solicitud; ?>",
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