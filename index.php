<?php 

header("Location: paginas/login");

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <!--  ---------------------- Estilos ----------------------------- -->
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="estilos/img/apple-icon.png">
        <link rel="icon" type="image/png" href="estilos/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            WIFINET
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->


        <link rel="stylesheet" type="text/css" href="estilos/css/iconos.css" />
        <link rel="stylesheet" href="estilos/css/fontawesome.css">
        <!-- CSS Files -->
        <link href="estilos/css/material-kit.css?v=2.0.4" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="estilos/demo/demo.css" rel="stylesheet" />




        <!-- -------------------------- Mis estilos --------------------------- -->
        <link rel="stylesheet" type="text/css" href="estilos/css/estilos_modificados.css" />

        <!-- ------------------------ Estilos de las tablas ------------------------------ -->
        <link href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="estilos/css/responsive.dataTables.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="estilos/css/iziToast.css" />
        <link rel="stylesheet" href="estilos/css/iziToast.css" />


        <!--<link rel="stylesheet" href="estilos/css/animate.css">-->




        <!--  ---------------------- Scripts ----------------------------- -->

        <!--   Core JS Files   -->
        <script src="estilos/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="estilos/js/core/popper.min.js" type="text/javascript"></script>
        <script src="estilos/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="estilos/js/plugins/moment.min.js"></script>
        <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
        <script src="estilos/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="estilos/js/plugins/nouislider.min.js" type="text/javascript"></script>
        <!--	Plugin for Sharrre btn -->
        <script src="estilos/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
        <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
        <script src="estilos/js/material-kit.js?v=2.0.4" type="text/javascript"></script>


        <!-- -------------------------- Scripts de las tablas -------------------------- -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="estilos/js/dataTables.responsive.min.js" type="text/javascript"></script>

        <script src="estilos/js/bootstrap-notify.js" type="text/javascript"></script>

<!--          <script src="estilos/js/bootstrap-notify.js" type="text/javascript"></script>-->


        <script src="estilos/js/iziToast.js"></script>





    </head>

    <body class="index-page sidebar-collapse">


        <nav class="navbar navbar-default  fixed-top navbar-expand-lg"  id="sectionsNav">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="#">
                        WIFINET </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">




<!--                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">account_circle</i> Usuario
                            </a>
                            <div class="dropdown-menu dropdown-with-icons">
                                <a href="#" class="dropdown-item">
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>-->


                    </ul>
                </div>
            </div>
        </nav>




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

                    <h2 class="title">Areas en desarrollo</h2>

                    <div id="buttons" class="cd-section">

                        <div class="title">
                            <h3>
                                <small>Clientes</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="paginas/clientes/crear_cliente.php" target="_blank">Crear Clientes</a>
                                <a class="btn btn-success btn-lg" href="paginas/clientes/mostrar_clientes.php" target="_blank" data-toggle="tooltip" title="Incluye: cambiar de estado y la modificacion de los registros">Mostrar Clientes</a>
                            </div>
                        </div>
                        
                        

                        <div class="title">
                            <h3>
                                <small>Usuarios</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="paginas/usuarios/crear_usuario.php" target="_blank">Crear Usuarios</a>
                                <a class="btn btn-success btn-lg" href="paginas/usuarios/mostrar_usuarios.php" data-toggle="tooltip" title="Incluye: cambiar de estado y la modificacion de los registros" target="_blank">Mostrar Usuarios</a>
                            </div>
                        </div>
                        
                        
                        <div class="title">
                            <h3>
                                <small>Ordenes de Trabajo instalacion de nuevos servicios</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="/paginas/ordenes_de_trabajo/nuevo_servicio/crear_ot_nuevo_servicio.php" target="_blank" >Crear OT</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/nuevo_servicio/mostrar_ot_nuevo_servicio.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar OT's</a>
                            
                            </div>
                        </div>
                        
                        <div class="title">
                            <h3>
                                <small>Gestión de equipo tecnológico</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-warning btn-lg" href="/paginas/equipo_tecnilogico/crear_equipo_tecnologico.php" target="_blank" >Crear</a>
                                <a class="btn btn-warning btn-lg" href="/paginas/equipo_tecnilogico/mostrar_equipos_tecnologicos.php"  target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>

                        
                        <div class="title">
                            <h3>
                                <small>Gestión de materiales</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-warning btn-lg" href="paginas/materiales/crear_material.php" target="_blank" >Crear</a>
                                <a class="btn btn-warning btn-lg" href="paginas/materiales/mostrar_materiales.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        <div class="title">
                            <h3>
                                <small>Registro de instalacion</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-warning btn-lg" href="https://wifinet.ga/paginas/registros_de_instalaciones/crear_registro_de_instalacion.php" target="_blank" >Crear</a>
                                <a class="btn btn-warning btn-lg" href="https://wifinet.ga/paginas/registros_de_instalaciones/mostrar.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        <div class="title">
                            <h3>
                                <small>Creación de OT de desinstalación de servicio por mora</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion_mora/crear_ot_desinstalacion_mora.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion_mora/mostrar_ot_desinstalacion_mora.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        <div class="title">
                            <h3>
                                <small>Creación de OT de solicitud de desinstalación de servicios</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion/crear_ot_desinstalacion.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion/mostrar_ot_desinstalacion.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="title">
                            <h3>
                                <small>Creación de OT de cobro a cliente</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/cobro_cliente/crear_ot_cobro_cliente.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/cobro_cliente/mostrar_ot_cobro_cliente.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="title">
                            <h3>
                                <small>Registro de depósitos bancarios</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/depositos_bancarios/crear_deposito_bancario.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/depositos_bancarios/mostrar_deposito_bancario.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        <div class="title">
                            <h3>
                                <small>Creación de OT de mantenimiento y Reparación a clientes</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/crear_ot_man_re.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/ordenes_de_trabajo/mantenimiento_reparacion/mostrar_ot_man_re.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        
                        <div class="title">
                            <h3>
                                <small>Petición de cambio de equipo por daño</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/cambio_equipo_danio/crear_solicitud.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/cambio_equipo_danio/mostrar_solicitud.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>
                        
                        <div class="title">
                            <h3>
                                <small>Caja chica</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/transacciones/crear.php" target="_blank" >Crear</a>
                                <a class="btn btn-success btn-lg" href="https://wifinet.ga/paginas/transacciones/mostrar.php" target="_blank" data-toggle="tooltip" title="(En desarrollo)Incluye: cambiar de estado y la modificacion de los registros">Mostrar</a>
                            
                            </div>
                        </div>


                </div>


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
                materialKit.initSliders();
            });


            function scrollToDownload() {
                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                        scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }



        </script>



    </body>

</html>