<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">


        <?php include '../../menu.php'; ?>

        <!--Notificaciones de errores y exitos en las operaciones-->
        <?php include '../control_errores.php'; ?>


        <?php
        if (isset($_GET['id_cliente'])) {

            include '../../../clases/Ot_mantenimiento_reparacion.php';

            $id_ot_man_re = $_GET['id_ot_man_re'];

            $cui_cliente;
            $nombre_cliente;
            $id_cliente;

            $ot_man_re = new Ot_mantenimiento_reparacion();

            $result = $ot_man_re->buscar_para_actualizar($id_ot_man_re);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $id_cliente = $row['id_cliente'];
                }
            }
        } else {

            // echo '<meta http-equiv="Refresh" content="0;URL=mostrar_clientes.php">';
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


                            <h3>Creación de petición de cambio de equipo por daño</h3>


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

                                <!--                                <div class="row">
                                
                                                                    <div class="col-lg-1 col-sm-12">
                                                                        <div class="form-group">
                                                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_tecnicos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                                                <i class="material-icons">search</i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                
                                                                    <div class="col-lg-8 col-sm-12">
                                                                        <h4>Buscar un técnico</h4>
                                                                    </div>
                                                                </div>-->

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" value="<?php echo $_SESSION['nombre_usuario']; ?>" name="datos_cliente" class="form-control" id="nombre_tecnico" readonly required>
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
                                        include '../../../clases/Instalacion.php';


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


                            </div>
                        </div>

                        

                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label for="nombre_tecnico" class="bmd-label-floating">Marca</label>
                                <input type="text" value=" " class="form-control" id="marca_equipo" readonly required>
                            </div>
                        </div>
                            
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Modelo</label>
                                    <input type="text" value=" " class="form-control" id="modelo_equipo" readonly required>
                                </div>
                            </div>



                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">No. Serie</label>
                                    <input type="text" value=" " class="form-control" id="serie_equipo" readonly required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Tipo</label>
                                    <input type="text" value=" " class="form-control" id="tipo_equipo" readonly required>
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




                            <br>


                            <div class="row">

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de la solicitud</label>
                                        <input type="text" readonly name="fecha_instalacion" autocomplete="off" data-date-format="DD MMMM YYYY" value="" required id="idfecha_solicitud" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_instalacion_oculta" id="idfecha_solicitud_oculta" value="" />  
                                    </div>
                                </div>

                            </div>




                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-12 mr-auto">
                                    <input type="hidden" value="<?php echo $_GET['id_cliente']; ?>" name="id_cliente" id="id_cliente">
                                    <input type="hidden" name="id_tecnico" id="id_tecnico" value="<?php echo $_SESSION['id_usuario']; ?>">
                                    <input type="hidden" name="id_equipo" id="id_equipo">
                                    <input type="hidden" value="<?php echo $id_ot_man_re; ?>" name="id_ot_man_re" id="id_ot_man_re">
                                    <button class="btn btn-primary" name="crear_solicitud_cambio_equipo"><i class="material-icons">save</i> Guardar</button>
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

                document.getElementById("idfecha_solicitud").value = moment().format('D MMMM Y');
                document.getElementById("idfecha_solicitud").focus();


//                $("#idfecha_solicitud").on('keydown paste', function (e) {
//                    e.preventDefault();
//                });
//                
//                 $('#idfecha_solicitud').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD',
//                    ignoreReadonly: true,
//                    allowInputToggle: true
//                });
//
//                document.getElementById('idfecha_solicitud').value = '';
//
//                $('#idfecha_solicitud_oculta').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD'
//                });
//
//                $("#idfecha_solicitud").on("dp.change", function (e) {
//                    $('#idfecha_solicitud_oculta').data("DateTimePicker").date(e.date);
//                });


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