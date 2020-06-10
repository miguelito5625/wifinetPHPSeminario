<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../menu.php'; ?>


        <?php
        if (isset($_GET['id_cobro_cliente'])) {

            include '../../clases/Cobro_cliente.php';

            $cobros = new Cobro_cliente();

            $result = $cobros->MostrarDetalleCobroClientePorId($_GET['id_cobro_cliente']);

            $nombre_cliente;

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $nombre_cliente = $row['nombre_cliente'];
                }
            }
        } else {

            echo '<meta http-equiv="Refresh" content="0;URL=mostrar.php">';
        }
        ?>


        <?php if (isset($_GET['id_cliente_estado'])): ?>

            <script type="text/javascript">
                iziToast.show({
                    theme: 'dark',
                    close: false,
                    icon: 'icon-person',
                    timeout: 10000,
                    message: '¿Desea cambiar el estado del cliente?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    progressBarColor: 'rgb(0, 255, 184)',
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                window.location = 'post.php?id_cliente_estado=<?php echo $_GET['id_cliente_estado']; ?>';

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
                    onOpening: function (instance, toast) {
                        console.info('callback abriu!');
                    },
                    onClosing: function (instance, toast, closedBy) {
                        console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                    }
                });
            </script> 

        <?php endif; ?>

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

                    <h2 class="title">Detalles de Cobros</h2>
                    <h2 class="title">Cliente : <?php echo $nombre_cliente; ?></h2>

                    <table id="tabla_equipos_tecnologicos" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        $result = $cobros->MostrarDetalleCobroClientePorId($_GET['id_cobro_cliente']);

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>Fecha de pago</th>'
                            . '<th>No. Recibo</th>'
                            . '<th>Año</th>'
                            . '<th>Mes</th>'
                            . '<th>Metodo de pago</th>'
                            . '<th>Estado</th>'
                            . '<th>Total</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                echo
                                '<tr>'
                                . '<td>' . $row["fecha_pago"] . '</td>'
                                . '<td>' . $row["no_recibo"] . '</td>'
                                . '<td>' . $row["anio"] . '</td>'
                                . '<td>' . $row["mes"] . '</td>'
                                . '<td>' . $row["metodo_pago"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td>' . $row["total"] . '</td>'
                                . '<td class="text-center">
                                   
                                  <a data-toggle="tooltip" title="Realizar pago" href="realizar_pago.php?id_detalle_cobro_cliente=' . $row['id_detalle_cobro_cliente'] . '"> <i class="material-icons">arrow_right_alt</i> </a>


                                   </td>'
                                . '</tr>';
                            }
                            echo "</table>";
                        } else {
                            
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