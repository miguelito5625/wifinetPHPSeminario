<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../menu.php'; ?>

        <?php if (isset($_GET['id_solicitud_aut'])): ?>

            <script>
            
            iziToast.info({
                    title: 'Desea autorizar este cambio?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    timeout: false,
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                var id_solicitud = "<?php echo $_GET['id_solicitud_aut']; ?>";
                                var estado = "AUTORIZADA";
                            window.location.replace("post.php?cambiar_estado="+id_solicitud+"&estado="+estado);


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


        <?php if (isset($_GET['id_solicitud'])): ?>

            <script>
            
            iziToast.info({
                    title: 'Desea cancelar este cambio?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    timeout: false,
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                var id_solicitud = "<?php echo $_GET['id_solicitud']; ?>";
                                var estado = "CANCELADA";
                            window.location.replace("post.php?cambiar_estado="+id_solicitud+"&estado="+estado);


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

                    <h2 class="title"> Peticiones de cambio de equipo por daño </h2>

                    <table id="tabla_solicitudes" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        //include '../../clases/Solicitud_cambio_equipo_danio.php';
                        include '../../clases/Solicitud_cambio_equipo_danio.php';
                        
                        $solicitud = new Solicitud_cambio_equipo_danio();

                        $result = $solicitud->Mostrar_solicitud_cambio_equipo_danio();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>Cliente</th>'
                            . '<th>Coordenadas</th>'
                            . '<th>Técnico</th>'
                            . '<th>Estado</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {
                                
                                $estado_ot = $row['estado'];
                                $tipo_usuario = $_SESSION['puesto'];

                                if ($tipo_usuario == 'Administrador') {

                                    if ($estado_ot == 'CANCELADA') {
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_solicitud"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '&id_cliente='. $row['id_cliente'] .'"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud_aut=' . $row['id_solicitud'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">compare_arrows</i> </a>
                                   </td>'
                                . '</tr>';
                                        
                                        
                                    }
                                    
                                    if ($estado_ot == 'PENDIENTE') {
                                        
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_solicitud"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '&id_cliente='. $row['id_cliente'] .'"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Cancelar" href="mostrar_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Autorizar" href="mostrar_solicitud.php?id_solicitud_aut=' . $row['id_solicitud'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="La solicitud esta pendiente" href="cambio_equipo.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">compare_arrows</i> </a>
                                   </td>'
                                . '</tr>';
                                        
                                        
                                        
                                    }
                                    
                                    
                                    if ($estado_ot == 'AUTORIZADA') {
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_solicitud"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '&id_cliente='. $row['id_cliente'] .'"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud_aut=' . $row['id_solicitud'] . '"> <i class="material-icons">check_circle_outline</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Registrar cambio de equipo" href="cambio_equipo.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">compare_arrows</i> </a>
                                   </td>'
                                . '</tr>';
                                        
                                        
                                    }
                                     
                                    
                                    
                                    }
                                    
                                    
                                     if ($tipo_usuario == 'Técnico') {

                                    if ($row['id_tecnico'] == $_SESSION['id_usuario']) {


                                        if ($estado_ot == 'CANCELADA') {
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_solicitud"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '&id_cliente='. $row['id_cliente'] .'"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">compare_arrows</i> </a>
                                   </td>'
                                . '</tr>';
                                        
                                        
                                    }
                                    
                                    if ($estado_ot == 'PENDIENTE') {
                                        
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_solicitud"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '&id_cliente='. $row['id_cliente'] .'"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Cancelar" href="mostrar_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="La solicitud esta pendiente" href="#id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">compare_arrows</i> </a>
                                   </td>'
                                . '</tr>';
                                        
                                        
                                        
                                    }
                                    
                                    
                                    if ($estado_ot == 'AUTORIZADA') {
                                        
                                        echo
                                '<tr>'
                                . '<td>' . $row["id_solicitud"] . '</td>'
                                . '<td>' . $row["nombre_cliente"] . '</td>'
                                . '<td> <a data-toggle="tooltip" title="Abrir en Google Maps" target="_blank" href="http://maps.google.com/?q=' . $row['coordenadas_cliente'] . '">' . $row["coordenadas_cliente"] . '</a> </td>'
                                . '<td>' . $row["nombre_tecnico"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '&id_cliente='. $row['id_cliente'] .'"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Accion no permitida" href="#?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">block</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_solicitud.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   <a data-toggle="tooltip" title="Registrar cambio de equipo" href="cambio_equipo.php?id_solicitud=' . $row['id_solicitud'] . '"> <i class="material-icons">compare_arrows</i> </a>
                                   </td>'
                                . '</tr>'; 
                                        
                                        
                                    }
                                        
                                        
                                        
                                        }
                                        
                                        }
                                    

                                
                            }
                            echo "</table>";
                        } else {
                            echo "0 resultados";
                            //<a data-toggle="tooltip" title="Cambiar Estado" href="post.php?id_cliente_estado=' . $row['id_cliente'] . '"> <i class="material-icons">block</i> </a>
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

                $('#tabla_solicitudes').DataTable({
                    responsive: true
                });

            });
        </script>

    </body>

</html>