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


                            <h3>Creación de petición de cambio de equipo por daño</h3>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>

                                <div class="row">
                                    <div class="col-lg-1 col-sm-12">
                                        <div class="form-group">

                                            <button id="btn_buscar_cliente" data-toggle="modal" data-target="#modal_clientes" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>

                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12">
                                        <h4>Buscar un cliente</h4>
                                    </div>

                                </div>


                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" name="datos_cliente" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_cliente" class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="datos_cliente" class="form-control" id="nombre_cliente" readonly required>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Técnico</h3>

<!--                                <div class="row">

                                    <div class="col-lg-1 col-sm-12">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_tecnicos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12">
                                        <h4>Buscar un técnico</h4>
                                    </div>
                                </div>-->

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" value="<?php echo $_SESSION['nombre_usuario']; ?>" name="datos_cliente" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="row">

                            <div class="col-md-12">
                                <h3>Equipo</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-12">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_equipos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12">
                                        <h4>Buscar un equipo</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Modelo</label>
                                    <input type="text" class="form-control" id="modelo_equipo" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Marca</label>
                                    <input type="text" class="form-control" id="marca_equipo" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">No. Serie</label>
                                    <input type="text" class="form-control" id="serie_equipo" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Tipo</label>
                                    <input type="text" class="form-control" id="tipo_equipo" readonly required>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        
                        
                        
                        
                        
                        
                        

                        <form action="post.php" method="post">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea class="form-control" maxlength="200" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <br>


                            <div class="row">

                                <div class="col-lg-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="label-control">Fecha de la solicitud</label>
                                        <input type="text" readonly name="fecha_instalacion" autocomplete="off" data-date-format="DD MMMM YYYY" value="" required id="idfecha_solicitud" class="form-control datetimepicker">
                                        <input type="hidden" name="fecha_instalacion_oculta" id="idfecha_solicitud_oculta" value="" />  
                                    </div>
                                </div>

                            </div>




                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-12 mr-auto">
                                    <input type="hidden" name="id_cliente" id="id_cliente">
                                    <input type="hidden" name="id_tecnico" id="id_tecnico" value="<?php echo $_SESSION['id_usuario']; ?>">
                                    <input type="hidden" name="id_equipo" id="id_equipo">
                                    <button class="btn btn-primary" name="crear_solicitud"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_solicitud.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>




                        </form>




                    </div>


                </div>


            </div>

        </div>


        <?php
        include 'modals/modal_clientes.php';
        include 'modals/modal_tecnicos.php';
        include 'modals/modal_equipos.php';
        ?>



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

 // ------------------ Desahabilitar el teclado en los campos de fechas ---------------------
 
                document.getElementById("idfecha_solicitud").value = moment().format('D MMMM Y');
                document.getElementById("idfecha_solicitud").focus();
                

//                $("#idfecha_solicitud").on('keydown paste', function (e) {
//                    e.preventDefault();
//                });
//                
//                 $('#idfecha_solicitud').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD',
//                    ignoreReadonly: true,
//                    allowInputToggle: true
//                });
//
//                document.getElementById('idfecha_solicitud').value = '';
//
//                $('#idfecha_solicitud_oculta').datetimepicker({
//                    //format: 'DD/MM/YYYY'
//                    format: 'YYYY/MM/DD'
//                });
//
//                $("#idfecha_solicitud").on("dp.change", function (e) {
//                    $('#idfecha_solicitud_oculta').data("DateTimePicker").date(e.date);
//                });


//              Metodo para evitar activar el formulario post
//                $('#btn_buscar_cliente').on("click", function (e) {
//                    e.preventDefault(); // <<-- required to stop the refresh
//
//
//                });



            });





        </script>





    </body>

</html>