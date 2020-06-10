<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        include '../header.php';

        session_start();

        $usuario = $_SESSION['usuario'];
        ?>

        <script src="../../estilos/js/charts/Chart.js"></script>
        <script src="../../estilos/js/charts/Utils.js"></script>

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



                    <div class="title">

                        <h2 class="title">Bienvenido <?php echo $usuario; ?> </h2>

                    </div>

                    <!-- ------------------------- Inicio graficas administrador -------------------------------------- -->
                    <?php if ($_SESSION['puesto'] == "Administrador"): ?>    
                        <div class="row">
                            <div class="col-md-4">

                                <canvas id="id_grafica_equipos" width="400" height="400"></canvas>

                            </div>
                            <div class="col-md-4">

                                <canvas id="id_grafica_estado_cliente" width="400" height="400"></canvas>


                            </div>
                        </div>

                        <script src="graficas/cargar_grafica_equipos.js"></script>
                        <script src="graficas/cargar_grafica_estado_cliente.js"></script>
                        <script src="graficas/inicializar_graficas.js"></script>
                    <?php endif; ?>
                    <!-- ------------------------ Fin graficas administrador ------------------------------------------------ -->

                    <!-- ------------------------- Inicio graficas Tecnico -------------------------------------- -->
                    <?php if ($_SESSION['puesto'] == "Técnico"): ?>    
                        <div class="row">
                            <div class="col-md-4">

                                <canvas id="id_grafica_ot_n_pen" width="400" height="400"></canvas>

                            </div>
                            <div class="col-md-4">



                            </div>
                        </div>

                    <script src="graficas/tecnico_cargar_ot_n_pen.js"></script>
                    <script src="graficas/tecnico_inicializar_graficas.js"></script>
                    <?php endif; ?>
                    <!-- ------------------------ Fin graficas Tecnico ------------------------------------------------ -->

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







    </body>

</html>