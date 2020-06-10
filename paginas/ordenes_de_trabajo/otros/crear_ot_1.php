<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

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

                    <div id="inputs">
                        <div class="title">


                            <h3>Creación de orden de trabajo</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">


                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select name="tipo_ot" class="selectpicker form-control show-tick" data-style="select-with-transition" title="Seleccione el tipo de OT" data-size="5" data-live-search="true">

                                            <?php
                                            include '../../clases/Ot.php';

                                            $ot = new Ot();
                                            $result = $ot->Mostrar_tipos_ot();

                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {


                                                        echo "<option data-tokens=" . $row['id_tipo_ot'] . ">" . $row['tipo_ot']
                                                        . "</option>";
                                                    
                                                }
                                            }
                                            
                                            ?>


                                        </select>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <button id="btn_agregar_tipo_ot" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                            <i class="material-icons">search</i>
                                        </button>

                                    </div>
                                </div>


                            </div>
                            
                            <div class="row">
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select name="cliente" class="selectpicker form-control show-tick" data-style="select-with-transition" title="Seleccione un cliente" data-size="5" data-live-search="true">

                                            <?php
                                            include '../../clases/Cliente.php';
                                            
                                            $cliente = new Cliente();
                                            $result = $cliente->MostrarClientes();

                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {


                                                        echo "<option value=" . $row['id_cliente'] . ">" . 'CUI: ' . $row['cui'] . ' Nombre: ' . $row['primer_nombre'] . ' ' . $row['segundo_nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido']
                                                    . "</option>";
                                                    
                                                }
                                            }
                                            ?>


                                        </select>

                                    </div>
                                </div>
                                
                            </div>
                            

                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="crear_ot"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_ots.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>



                        </form>

                    </div>


                </div>


            </div>

        </div>




        <!-- modal grande -->
        <div class="modal fade bd-example-modal-lg" id="modal_mapa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Mapa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>

                     <!--<input id="pac-input" class="form-control" type="text" placeholder="Search Box">-->

                    <div class="form-group">
                        <label for="pac-input" class="bmd-label-floating">Buscar ubicación</label>
                        <input type="text" class="form-control" id="pac-input" placeholder="">
                    </div>

                    <div id="map" style="margin-top:1px">

                    </div>

                </div>
            </div>
        </div>
        <!--  fin de modal grande-->



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
                //init DateTimePickers
                //materialKit.initFormExtendedDatetimepickers();

                $('#btn_agregar_tipo_ot').on("click", function (e) {
                    e.preventDefault(); // <<-- required to stop the refresh
                    
                    window.location='crear_tipo_ot.php';

                });


            });


//            function scrollToDownload() {
//                if ($('.section-download').length != 0) {
//                    $("html, body").animate({
//                        scrollTop: $('.section-download').offset().top
//                    }, 1000);
//                }
//            }



        </script>





    </body>

</html>