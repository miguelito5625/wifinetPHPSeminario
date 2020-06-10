<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../../menu.php'; ?>

        
        <?php if (isset($_GET['id_cobro_finalizar'])): ?>

            <script>
                
                
                 iziToast.info({
                    title: 'Desea finalizar esta ot?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    timeout: false,
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                var id_ot_cobro_cliente = "<?php echo $_GET['id_cobro_finalizar']; ?>";
                                var estado = "FINALIZADA";
                                window.location.replace("post.php?id_ot_cobro_cliente_cambiar_estado=" + id_ot_cobro_cliente + "&estado=" + estado);


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



        <?php if (isset($_GET['id_ot_cobro_cliente'])): ?>

            <script>
                
                
                 iziToast.info({
                    title: 'Desea cancelar esta ot?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    timeout: false,
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                var id_ot_cobro_cliente = "<?php echo $_GET['id_ot_cobro_cliente']; ?>";
                                var estado = "CANCELADA";
                                window.location.replace("post.php?id_ot_cobro_cliente_cambiar_estado=" + id_ot_cobro_cliente + "&estado=" + estado);


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

                    <h2 class="title">OT's de cobro a clientes</h2>

                    <table id="tabla_clientes" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        include '../../../clases/Ot_cobro_cliente.php';

                        $ot_cobro_cliente = new Ot_cobro_cliente();

                        $result = $ot_cobro_cliente->Mostrar_ot_cobro_cliente();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>CUI Cliente</th>'
                            . '<th>Cliente</th>'
                            . '<th>Direccion</th>'
                            . '<th>Cobrador</th>'
                            . '<th>Deuda</th>'
                            . '<th>Estado</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                $estado_ot = $row['estado'];
                                $tipo_usuario = $_SESSION['puesto'];

                                if ($tipo_usuario == 'Administrador') {

                                    if ($estado_ot != 'PENDIENTE') {
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_ot_cobro_cliente"] . '</td>'
                                . '<td>' . $row["cui_cliente"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td>' . $row["direccion_cliente"] . '</td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . 'Q ' . $row["total_cobrado"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_cobro_cliente.php?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_cobro_finalizar=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                    </td>'
                                . '</tr>';
                                        
                                    }

                                    if ($estado_ot == 'PENDIENTE') {
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_ot_cobro_cliente"] . '</td>'
                                . '<td>' . $row["cui_cliente"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td>' . $row["direccion_cliente"] . '</td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . 'Q ' . $row["total_cobrado"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_ot_cobro_cliente.php?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Cancelar" href="mostrar_ot_cobro_cliente.php?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_cobro_cliente.php?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Finalizar" href="mostrar_ot_cobro_cliente.php?id_cobro_finalizar=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                   </td>'
                                . '</tr>';
                                        
                                        
                                    }
                                }



                                if ($tipo_usuario == 'Cobrador') {

                                    if ($row['id_cobrador'] == $_SESSION['id_usuario']) {


                                        if ($estado_ot != 'PENDIENTE') {
                                            
                                            echo
                                '<tr>'
                                . '<td>' . $row["id_ot_cobro_cliente"] . '</td>'
                                . '<td>' . $row["cui_cliente"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td>' . $row["direccion_cliente"] . '</td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . 'Q ' . $row["total_cobrado"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_cobro_cliente.php?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Acciono no permitida" href="#?id_cobro_finalizar=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                    </td>'
                                . '</tr>';
                                            
                                            
                                        }
                                        
                                        if ($estado_ot == 'PENDIENTE') {
                                            
                                            echo
                                '<tr>'
                                . '<td>' . $row["id_ot_cobro_cliente"] . '</td>'
                                . '<td>' . $row["cui_cliente"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td>' . $row["direccion_cliente"] . '</td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . 'Q ' . $row["total_cobrado"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_ot_cobro_cliente.php?id_ot_cobro_cliente=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Finalizar" href="mostrar_ot_cobro_cliente.php?id_cobro_finalizar=' . $row['id_ot_cobro_cliente'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                   </td>'
                                . '</tr>';
                                            
                                        }
                                        
                                        
                                    }
                                }





                                
                            }
                            echo "</table>";
                        } else {
                            echo "0 resultados";
                            //<a data-toggle="tooltip" title="Cancelar" href="post.php?id_cliente_estado=' . $row['id_cliente'] . '"> <i class="material-icons">block</i> </a>
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