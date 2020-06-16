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

        <?php
        include '../../clases/Transaccion.php';

        $transaccion = new Transaccion();

        $fila = mysqli_fetch_assoc($transaccion->Mostrar_fondos_caja_chica());
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

                    <h2 class="title">Transacciones realizadas</h2>
                    <h4 class="title">Fondos en caja chica: Q<?php echo $fila['fondos']; ?></h4>

<!--                    <div class="row">
                        <div class="col-lg-8 col-sm-4 mr-auto">

                            <a class="btn btn-primary" href="crear.php"><i class="material-icons">add</i> Realizar Transacción</a>

                        </div>
                    </div>-->

                    <br>

                    <table id="tabla_transacciones" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }




                        $result = $transaccion->Mostrar_transacciones();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>Tipo</th>'
                            . '<th>Responsable</th>'
                            . '<th>Descripción</th>'
                            . '<th>Cantidad</th>'
                            . '<th>Fecha</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                echo
                                '<tr>'
                                . '<td>' . $row["id_transaccion"] . '</td>'
                                . '<td>' . $row["tipo"] . '</td>'
                                . '<td>' . $row["nombre_usuario"] . '</td>'
                                . '<td>' . $row["descripcion"] . '</td>'
                                . '<td>' . $row["cantidad"] . '</td>'
                                . '<td>' . $row["fecha"] . '</td>'
                                . '</tr>';
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

                $('#tabla_transacciones').DataTable({
                    responsive: true
                });

            });
        </script>


<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTafCnaDrXTFqaOOGbiFUC-FRUXcNlg20&libraries=places&callback=myMap"></script>-->



    </body>

</html>