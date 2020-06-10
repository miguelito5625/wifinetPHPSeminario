<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">

        <?php
        if (isset($_GET['id_instalacion'])) {

            include '../../clases/Instalacion.php';

            $id_instalacion = $_GET['id_instalacion'];

            $cui_cliente;
            $nombre_cliente;
            $nombre_tecnico;
            $notas;

            $instalacion = new Instalacion();

            $result = $instalacion->BuscarInstalacion($id_instalacion);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $nombre_tecnico = $row['nombre_tecnico'];
                    $notas = $row['notas'];
                }
            }
        } else {

            //echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_nuevo_servicio.php">';
        }
        ?>



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


                            <h3>Detalles de la instalación</h3>


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

                        <!-- ------------------------------Tabla para equipos -----------------------------   -->

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Equipos Tecnológicos</h3>



                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_equipos_agregados" class="table table-striped table-bordered" style="width:100%">
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
                                        $result = $instalacion->Buscar_equipos_instalacion($id_instalacion);

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

                        <!---------------------------Fin tabla equipos -------------------------------------------->

                        <!-- ------------------------------Tabla para materiales -----------------------------   -->

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Materiales</h3>



                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_materiales_agregados" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Material</th>
                                            <th>Tipo</th>
                                            <th>Unidad</th>
                                            <th>Cantidad utilizada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $result = $instalacion->Buscar_materiales_instalacion($id_instalacion);

                                        if ($result->num_rows > 0) {


                                            // imprimiendo datos de cada columna con while
                                            while ($row = $result->fetch_assoc()) {

                                                echo
                                                '<tr>'
                                                . '<td>' . $row["id_material"] . '</td>'
                                                . '<td>' . $row["nombre_material"] . '</td>'
                                                . '<td>' . $row["tipo_material"] . '</td>'
                                                . '<td>' . $row["unidad_de_medida"] . '</td>'
                                                . '<td>' . $row["cantidad_usada"] . '</td>'
                                                . '</tr>';
                                            }
                                        }
                                        ?>
                                        
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Material</th>
                                            <th>Tipo</th>
                                            <th>Unidad</th>
                                            <th>Cantidad utilizada</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>

                        <!---------------------------Fin tabla materiales -------------------------------------------->


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Notas</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-4">
                                        <textarea class="form-control" readonly name="notas" id="id_notas" rows="5"><?php echo $notas; ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <br>

                        <div class="row">
                            <div class="col-lg-8 col-sm-4 mr-auto">
<!--                                <button class="btn btn-primary" id="btn_agregar_registro_de_instalacion"><i class="material-icons">save</i> Guardar</button>-->
                                <a class="btn btn-primary" href="mostrar_instalaciones.php"><i class="material-icons">arrow_back</i> Regresar</a>
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

                var tabla_equipos_agregados = $('#tabla_equipos_agregados').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": true,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});

                var tabla_materiales_agregados = $('#tabla_materiales_agregados').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": false,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});




            });





        </script>





    </body>

</html>