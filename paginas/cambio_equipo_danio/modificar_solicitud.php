<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">


        <?php include '../menu.php'; ?>

        <!--Notificaciones de errores y exitos en las operaciones-->
        <?php include '../../control_errores.php'; ?>

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

                    
                    $id_cliente = $row['id_cliente'];
                    $id_tecnico = $row['id_tecnico'];
                    $id_equipo = $row['id_equipo'];
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


                            <h3>Modificar petición de cambio de equipo por daño</h3>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>
                                
<!--                                <div class="row">
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

                                </div>-->

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

<!--                                <div class="row">

                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_tecnicos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar un técnico</h4>
                                    </div>
                                </div>-->

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
                                <h3>Equipos instalados</h3>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_equipos_recogidos" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No. Serie</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../../clases/Instalacion.php';


                                        $instalacion = new Instalacion();

                                        $result = $instalacion->Buscar_equipos_instalacion_idcliente($_GET['id_cliente']);

                                        if ($result->num_rows > 0) {


                                            // imprimiendo datos de cada columna con while
                                            while ($row = $result->fetch_assoc()) {

                                                echo
                                                '<tr>'
                                                . '<td>' . $row["id_equipo_tecnologico"] . '</td>'
                                                . '<td>' . $row["no_serie"] . '</td>'
                                                . '<td>' . $row["marca"] . '</td>'
                                                . '<td>' . $row["modelo"] . '</td>'
                                                . '<td>' . $row["tipo"] . '</td>'
                                                . '</tr>';
                                            }
                                        }
                                        ?>


                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>No. Serie</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>  
                        
                        
                        
                        
                        <div class="row">

                            <div class="col-md-12">
                                <h3>Equipo</h3>

<!--                                <div class="row">

                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_equipos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar un equipo</h4>
                                    </div>
                                </div>-->

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
                 

                        <form action="post.php" method="post">

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

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de la solicitud</label>
                                        <input type="text" name="fecha_solicitud" autocomplete="off" data-date-format="DD MMMM YYYY" value="" readonly id="idfecha_solicitud" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_solicitud_oculta" id="idfecha_solicitud_oculta" value="" />  
                                    </div>
                                </div>

                            </div>




                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <input type="hidden" value="<?php echo $id_solicitud; ?>" name="id_solicitud" id="id_solicitud">
                                    <input type="hidden" value="<?php echo $id_cliente; ?>" name="id_cliente" id="id_cliente">
                                    <input type="hidden" value="<?php echo $id_tecnico; ?>" name="id_tecnico" id="id_tecnico">
                                    <input type="hidden" value="<?php echo $id_equipo; ?>" name="id_equipo" id="id_equipo">
                                    <button class="btn btn-primary" name="modificar_solicitud"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_solicitud.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>

                            </form>

                    </div>


                </div>


            </div>

        </div>


<?php
include 'modals/modal_clientes.php';
include 'modals/modal_tecnicos.php';
include 'modals/modal_equipos.php';
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
                
                
                 var tabla_equipos_recogidos = $('#tabla_equipos_recogidos').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": true,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});

                $('#tabla_equipos_recogidos tbody').on('click', 'tr', function () {

                    var fila_equipos_recogidos = [];
                    fila_equipos_recogidos = tabla_equipos_recogidos.row(this).data();
//                    tabla_equipos_extraviados.row.add(fila_equipos_recogidos).draw(false);   
//                    tabla_equipos_recogidos.row(this).remove().draw(false);
//                    
//                    
//                    //                    console.log();
                    


//                    document.getElementById("marca_equipo").focus();
//                    document.getElementById("modelo_equipo").focus();
//                    document.getElementById("serie_equipo").focus();
//                    document.getElementById("tipo_equipo").focus();
                    
                    document.getElementById("marca_equipo").value = fila_equipos_recogidos[2];
                    document.getElementById("modelo_equipo").value = fila_equipos_recogidos[3];
                    document.getElementById("serie_equipo").value = fila_equipos_recogidos[1];
                    document.getElementById("tipo_equipo").value = fila_equipos_recogidos[4];
                    
                    document.getElementById("id_equipo").value = fila_equipos_recogidos[0];
                    


                });
                
                

                // ------------------ Desahabilitar el teclado en los campos de fechas ---------------------


                $("#idfecha_solicitud").on('keydown paste', function (e) {
                    e.preventDefault();
                });

                $('#idfecha_solicitud').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_solicitud; ?>",
                    format: 'DD MMMM YYYY',
                    ignoreReadonly: true,
                    allowInputToggle: true
                });

                //document.getElementById('idfecha_solicitud').value = '';

                $('#idfecha_solicitud_oculta').datetimepicker({
                    //format: 'DD/MM/YYYY'
                    defaultDate: "<?php echo $fecha_solicitud; ?>",
                    format: 'YYYY/MM/DD'
                });

                $("#idfecha_solicitud").on("dp.change", function (e) {
                    $('#idfecha_solicitud_oculta').data("DateTimePicker").date(e.date);
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