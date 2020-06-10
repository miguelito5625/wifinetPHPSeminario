<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- --------------- Estilos y Javascripts -->
        <?php include '../header.php'; ?>

    </head>

    <body class="index-page sidebar-collapse">



        <?php include '../menu.php'; ?>


        <?php if (isset($_GET['id_usuario_estado'])): ?>

            <script type="text/javascript">
                iziToast.show({
                    theme: 'dark',
                    close: false,
                    icon: 'icon-person',
                    timeout: 10000,
                    message: '¿Desea cambiar el estado del usuario?',
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    progressBarColor: 'rgb(0, 255, 184)',
                    buttons: [
                        ['<button>Si</button>', function (instance, toast) {

                                window.location = 'post.php?id_usuario_estado=<?php echo $_GET['id_usuario_estado']; ?>';

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

                    <h2 class="title">Usuarios</h2>

                    <table id="tabla_usuarios" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {

                            return;
                        }

                        include '../../clases/Usuario.php';

                        $usuario = new Usuario();

                        $result = $usuario->MostrarUsuarios();

                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>CUI</th>'
                            . '<th>Nombre</th>'
                            . '<th>Puesto</th>'
                            . '<th>Dirección</th>'
                            . '<th>Teléfono</th>'
                            . '<th>Usuario</th>'
                            . '<th>Estado</th>'
                            . '<th>Acciones</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                if ($row['puesto'] == "Administrador") {

                                    echo
                                    '<tr>'
                                    . '<td>' . $row["cui"] . '</td>'
                                    . '<td>' . $row["primer_nombre"] . ' ' . $row["segundo_nombre"] . ' ' . $row["primer_apellido"] . ' ' . $row["segundo_apellido"] . '</td>'
                                    . '<td>' . $row["puesto"] . '</td>'
                                    . '<td>' . $row["direccion"] . '</td>'
                                    . '<td>' . $row["telefono"] . '</td>'
                                    . '<td>' . $row["usuario"] . '</td>'
                                    . '<td>' . $row["estado"] . '</td>'
                                    . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_usuario.php?id_usuario=' . $row['id_usuario'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Cambiar Estado" href="mostrar_usuarios.php?id_administrador_estado=' . $row['id_usuario'] . '"> <i class="material-icons">repeat</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_usuario.php?id_usuario=' . $row['id_usuario'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   </td>'
                                    . '</tr>';

                                    continue;
                                }

                                echo
                                '<tr>'
                                . '<td>' . $row["cui"] . '</td>'
                                . '<td>' . $row["primer_nombre"] . ' ' . $row["segundo_nombre"] . ' ' . $row["primer_apellido"] . ' ' . $row["segundo_apellido"] . '</td>'
                                . '<td>' . $row["puesto"] . '</td>'
                                . '<td>' . $row["direccion"] . '</td>'
                                . '<td>' . $row["telefono"] . '</td>'
                                . '<td>' . $row["usuario"] . '</td>'
                                . '<td>' . $row["estado"] . '</td>'
                                . '<td class="text-center">
                                   <a data-toggle="tooltip" title="Modificar Registro" href="modificar_usuario.php?id_usuario=' . $row['id_usuario'] . '"> <i class="material-icons">edit</i> </a>
                                   <a data-toggle="tooltip" title="Cambiar Estado" href="mostrar_usuarios.php?id_usuario_estado=' . $row['id_usuario'] . '"> <i class="material-icons">repeat</i> </a>
                                   <a data-toggle="tooltip" title="Ver datos completos" href="datos_usuario.php?id_usuario=' . $row['id_usuario'] . '"> <i class="material-icons">zoom_in</i> </a>
                                   </td>'
                                . '</tr>';
                            }
                            echo "</table>";
                        } else {
                            echo "0 resultados";
                        }
                        ?>
                    </table>


                </div>


            </div>

        </div>


        <?php if (isset($_GET['id_administrador_estado'])): ?>


            <?php
            $id_administrador = $_GET['id_administrador_estado'];

            $pass;
            $usuario_encontrado;


            $usuario = new Usuario();

            $result = $usuario->buscar_para_actualizar($id_administrador);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $pass = $row['password'];
                    $usuario_encontrado = $row['usuario'];
                }
            }
            ?>


            <?php if ($usuario_activo == $usuario_encontrado): ?>

                <script>

                    iziToast.error({
                        transitionOut: 'fadeOutDown',
                        title: 'Error, No puede cambiar el estado del usuario que utilizo para iniciar sesion',
                        position: 'topCenter',
                    });

                </script>


            <?php endif; ?>



            <?php if ($usuario_activo != $usuario_encontrado): ?>

                <script type="text/javascript">

                    var pass = "<?php echo $pass; ?>";
                    var txtconfirmacion;

                    iziToast.info({
                        timeout: false,
                        overlay: true,
                        displayMode: 'once',
                        id: 'inputs',
                        zindex: 999,
                        title: 'Escriba la contraseña del administrador que cambiara de estado',
                        position: 'center',
                        drag: false,
                        inputs: [
                            ['<input type="password">', 'keyup', function (instance, toast, input, e) {
                                    console.info(input.value);
                                    txtconfirmacion = input.value;
                                }, true],
                        ],
                        buttons: [
                            ['<button>Aceptar</button>', function (instance, toast) {

                                    // alert(txtconfirmacion);

                                    if (txtconfirmacion == pass) {

                                        instance.hide({
                                            transitionOut: 'fadeOutUp',
                                            onClosing: function (instance, toast, closedBy) {
                                                console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                                            }
                                        }, toast, 'buttonName');


                                        window.location = 'post.php?id_usuario_estado=<?php echo $_GET['id_administrador_estado']; ?>';


                                    } else if (txtconfirmacion != pass) {

                                        iziToast.error({
                                            transitionOut: 'fadeOutDown',
                                            title: 'Error',
                                            position: 'topCenter',
                                            message: 'Contraseña incorrecta, intente nuevamente',

                                        });

                                    }





                                }, true],
                        ]
                    });


                </script> 

            <?php endif; ?>


        <?php endif; ?>




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

                $('#tabla_usuarios').DataTable({
                    responsive: true
                });

            });
        </script>





    </body>

</html>