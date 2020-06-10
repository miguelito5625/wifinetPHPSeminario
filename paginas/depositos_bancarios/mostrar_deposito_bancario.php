<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../menu.php'; ?>

        


        <?php if (isset($_GET['id_deposito_bancario'])): ?>

            <script>
            var id_deposito_bancario = "<?php echo $_GET['id_deposito_bancario']; ?>";
            var estado;
            iziToast.info({
                timeout: false,
                close: true,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: '',
                message: 'Selecciona un estado',
                position: 'center',
                inputs: [
                    ['<select><option></option><option data-tokens="PENDIENTE">PENDIENTE</option><option data-tokens="FINALIZADA">FINALIZADA</option><option data-tokens="CANCELADA">CANCELADA</option></select>', 'change', function (instance, toast, select, e) {
                            //console.info(select.options[select.selectedIndex].value);
                            estado = select.options[select.selectedIndex].value;
                        }]
                ],
                buttons: [
                    ['<button>Seleccionar</button>', function (instance, toast) {

                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');

                            if (estado == null) {
                                
                                
                                return;
                            }

                            window.location.replace("post.php?id_ot_nuevo_cambiar_estado="+id_deposito_bancario+"&estado="+estado);
                            
                        }]
                ]
                
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

                    <h2 class="title">Depositos Bancarios</h2>

                    <table id="tabla_clientes" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        include '../../clases/Deposito_bancario.php';

                        $deposito_bancario = new Deposito_bancario();

                        $result = $deposito_bancario->Mostrar_deposito_bancario();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>CUI Cobrador</th>'
                            . '<th>Cobrador</th>'
                            . '<th>Banco</th>'
                            . '<th>No. Boleta</th>'
                            . '<th>Deposito</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {
                                
                                $tipo_usuario = $_SESSION['puesto'];

                                if ($tipo_usuario == 'Administrador') {
                                    
                                    echo
                                '<tr>'
                                . '<td>' . $row["id_deposito_bancario"] . '</td>'
                                . '<td>' . $row["cui_cobrador"] . '</td>'
                                . '<td>' . $row["nombre_cobrador"] . '</td>'
                                . '<td>' . $row["banco"] . '</td>'
                                . '<td>' . $row["no_boleta"] . '</td>'
                                . '<td>' . 'Q ' .$row["total_depositado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_deposito_bancario.php?id_deposito_bancario=' . $row['id_deposito_bancario'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_deposito_bancario.php?id_deposito_bancario=' . $row['id_deposito_bancario'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   </td>'
                                . '</tr>';
                                    
                                    
                                }
                                
                                if ($tipo_usuario == 'Cobrador') {
                                    
                                    if ($row['id_cobrador'] == $_SESSION['id_usuario']) {
                                        
                                         echo
                                '<tr>'
                                . '<td>' . $row["id_deposito_bancario"] . '</td>'
                                . '<td>' . $row["cui_cobrador"] . '</td>'
                                . '<td>' . $row["nombre_cobrador"] . '</td>'
                                . '<td>' . $row["banco"] . '</td>'
                                . '<td>' . $row["no_boleta"] . '</td>'
                                . '<td>' . 'Q ' .$row["total_depositado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_deposito_bancario.php?id_deposito_bancario=' . $row['id_deposito_bancario'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_deposito_bancario.php?id_deposito_bancario=' . $row['id_deposito_bancario'] . '"> <i class="material-icons">zoom_in</i> </a>
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

                $('#tabla_clientes').DataTable({
                    responsive: true
                });

            });
        </script>

    </body>

</html>