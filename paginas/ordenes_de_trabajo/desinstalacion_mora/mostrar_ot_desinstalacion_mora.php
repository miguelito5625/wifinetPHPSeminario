<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../../menu.php'; ?>




        <?php if (isset($_GET['id_ot_desinstalacion_mora'])): ?>

            <script>
               
                iziToast.info({
                    title: 'Desea cancelar esta ot?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    timeout: false,
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                var id_ot_desinstalacion_mora = "<?php echo $_GET['id_ot_desinstalacion_mora']; ?>";
                                var estado = "CANCELADA";
                                window.location.replace("post.php?id_ot_desintalacion_mora_cambiar_estado=" + id_ot_desinstalacion_mora + "&estado=" + estado);


                            }, true], // true to focus
                        ['<button>No</button>', function (instance, toast) {
                                instance.hide({
                                    transitionOut: 'fadeOutUp',
                                    onClosing: function (instance, toast, closedBy) {
                                        console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                                    }
                                }, toast, 'buttonName');
                            }]
                    ],

                });



            </script>

        <?php endif; ?>

        <!--Notificaciones de errores y exitos en las operaciones-->
        <?php include '../../control_errores.php'; ?>

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

                    <h2 class="title">OT's de desinstalaciones por mora</h2>

                    <table id="tabla_clientes" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        include '../../../clases/Ot_desinstalacion_mora.php';

                        $ot_desinstalacion_mora = new Ot_desinstalacion_mora();

                        $result = $ot_desinstalacion_mora->Mostrar_ot_desinstalacion_mora();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>CUI Cliente</th>'
                            . '<th>Cliente</th>'
                            . '<th>Técnico</th>'
                            . '<th>Coordenadas</th>'
                            . '<th>Dirección</th>'
                            . '<th>Estado</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                if ($_SESSION['puesto'] == 'Administrador') {

                                    if ($row['estado_ot'] != 'PENDIENTE') {

                                        echo
                                        '<tr>'
                                        . '<td>' . $row["id_ot_desinstalacion_mora"] . '</td>'
                                        . '<td>' . $row["cui_cliente"] . '</td>'
                                        . '<td>' . $row["nombre_cliente"] . '</td>'
                                        . '<td>' . $row["nombre_usuario"] . '</td>'
                                        . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                        . '<td>' . $row["direccion_cliente"] . '</td>'
                                        . '<td>' . $row["estado_ot"] . '</td>'
                                        . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Operacion no permitida" href="#?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Operacion no permitida" href="#?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_desinstalacion_mora.php?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Operacion no permitida" href="#?id_cliente=' . $row['id_cliente'] . '&id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">arrow_right_alt</i> </a>
                                   </td>'
                                        . '</tr>';
                                    }

                                    if ($row['estado_ot'] == 'PENDIENTE') {

                                        echo
                                        '<tr>'
                                        . '<td>' . $row["id_ot_desinstalacion_mora"] . '</td>'
                                        . '<td>' . $row["cui_cliente"] . '</td>'
                                        . '<td>' . $row["nombre_cliente"] . '</td>'
                                        . '<td>' . $row["nombre_usuario"] . '</td>'
                                        . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                        . '<td>' . $row["direccion_cliente"] . '</td>'
                                        . '<td>' . $row["estado_ot"] . '</td>'
                                        . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_ot_desinstalacion_mora.php?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Cancelar ot" href="mostrar_ot_desinstalacion_mora.php?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_desinstalacion_mora.php?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Recoger equipos" href="recoger_equipo.php?id_cliente=' . $row['id_cliente'] . '&id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">arrow_right_alt</i> </a>
                                   </td>'
                                        . '</tr>';
                                    }
                                }



                                if ($_SESSION['puesto'] == 'Técnico') {

                                    if ($row['id_usuario'] == $_SESSION['id_usuario']) {

                                        if ($row['estado_ot'] != 'PENDIENTE') {

                                            echo
                                            '<tr>'
                                            . '<td>' . $row["id_ot_desinstalacion_mora"] . '</td>'
                                            . '<td>' . $row["cui_cliente"] . '</td>'
                                            . '<td>' . $row["nombre_cliente"] . '</td>'
                                            . '<td>' . $row["nombre_usuario"] . '</td>'
                                            . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                            . '<td>' . $row["direccion_cliente"] . '</td>'
                                            . '<td>' . $row["estado_ot"] . '</td>'
                                            . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_desinstalacion_mora.php?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Operacion no permitida" href="#?id_cliente=' . $row['id_cliente'] . '&id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">arrow_right_alt</i> </a>

                                   </td>'
                                            . '</tr>';
                                        }




                                        if ($row['estado_ot'] == 'PENDIENTE') {

                                            echo
                                            '<tr>'
                                            . '<td>' . $row["id_ot_desinstalacion_mora"] . '</td>'
                                            . '<td>' . $row["cui_cliente"] . '</td>'
                                            . '<td>' . $row["nombre_cliente"] . '</td>'
                                            . '<td>' . $row["nombre_usuario"] . '</td>'
                                            . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                            . '<td>' . $row["direccion_cliente"] . '</td>'
                                            . '<td>' . $row["estado_ot"] . '</td>'
                                            . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_desinstalacion_mora.php?id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Recoger equipos" href="recoger_equipo.php?id_cliente=' . $row['id_cliente'] . '&id_ot_desinstalacion_mora=' . $row['id_ot_desinstalacion_mora'] . '"> <i class="material-icons">arrow_right_alt</i> </a>

                                   </td>'
                                            . '</tr>';
                                        }
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

                $('#tabla_clientes').DataTable({
                    responsive: true
                });

            });
        </script>

    </body>

</html>