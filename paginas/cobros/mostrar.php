<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../menu.php'; ?>


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

                    <h2 class="title">Cobros</h2>

                    <table id="tabla_equipos_tecnologicos" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        include '../../clases/Cobro_cliente.php';

                        $cobros = new Cobro_cliente();

                        $result = $cobros->MostrarCobroCliente();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>Cliente</th>'
                            . '<th>Fecha Instalacion</th>'
                            . '<th>Plan</th>'
                            . '<th>Estado</th>'
                            . '<th>Deuda</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                echo
                                '<tr>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td>' . $row["fecha_instalacion"] . '</td>'
                                . '<td>' . $row["nombre_plan"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td>' . $row["deuda"] . '</td>'
                                . '<td class="text-center">
                                   
                                  <a data-toggle="tooltip" title="Registros y detalles" href="detalle.php?id_cobro_cliente=' . $row['id_cobro_cliente'] . '"> <i class="material-icons">arrow_right_alt</i> </a>


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


<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTafCnaDrXTFqaOOGbiFUC-FRUXcNlg20&libraries=places&callback=myMap"></script>-->



    </body>

</html>