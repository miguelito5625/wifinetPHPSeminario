<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

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

                    <h2 class="title">Servicios Instalados</h2>

                    <table id="tabla_equipos_tecnologicos" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        include '../../clases/Instalacion.php';

                        $instalaciones = new Instalacion();

                        $result = $instalaciones->MostrarInstalaciones();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>Cliente</th>'
                            . '<th>Tecnico</th>'
                            . '<th>Estado</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                if ($_SESSION['puesto'] == "Administrador") {
                                    
                                    echo
                                        '<tr>'
                                        . '<td>' . $row["id_instalacion"] . '</td>'
                                        . '<td>' . $row["nombre_cliente"] . '</td>'
                                        . '<td>' . $row["nombre_tecnico"] . '</td>'
                                        . '<td>' . $row["estado"] . '</td>'
                                        . '<td class="text-center">
                                    
                                   <a data-toggle="tooltip" title="Mostrar detalles" href="detalle_instalacion.php?id_instalacion=' . $row['id_instalacion'] . '"> <i class="material-icons">zoom_in</i> </a>


                                   </td>'
                                        . '</tr>';
                                    
                                }

                                if ($_SESSION['puesto'] == "Técnico") {

                                    if ($row['id_tecnico'] == $_SESSION['id_usuario']) {

                                        echo
                                        '<tr>'
                                        . '<td>' . $row["id_instalacion"] . '</td>'
                                        . '<td>' . $row["nombre_cliente"] . '</td>'
                                        . '<td>' . $row["nombre_tecnico"] . '</td>'
                                        . '<td>' . $row["estado"] . '</td>'
                                        . '<td class="text-center">
                                    
                                   <a data-toggle="tooltip" title="Mostrar detalles" href="detalle_instalacion.php?id_instalacion=' . $row['id_instalacion'] . '"> <i class="material-icons">zoom_in</i> </a>


                                   </td>'
                                        . '</tr>';
                                    }
                                }
                            }
                            echo "</table>";
                        } else {
                            echo "0 resultados";
                            //<a data-toggle="tooltip" title="Cambiar Estado" href="post.php?id_cliente_estado=' . $row['id_cliente'] . '"> <i class="material-icons">repeat</i> </a>
                        }
                        ?>
                    </table>


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


                // Inicializacion de los Sliders
                //materialKit.initSliders();
            });


            function scrollToDownload() {
                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                        scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }



        </script>



        <script>
            $(document).ready(function () {

                $('#tabla_equipos_tecnologicos').DataTable({
                    responsive: true
                });

            });
        </script>


<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-CXtFICDTkaC389rWouYTmpM5LWNMKlg&libraries=places&callback=myMap"></script>-->



    </body>

</html>