<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">

        <?php
        if (isset($_GET['id_ot_nuevo_servicio'])) {

            include '../../clases/Ot_nuevo_servicio.php';

            $id_ot_nuevo_servicio = $_GET['id_ot_nuevo_servicio'];

            $id_cliente;
            $cui_cliente;
            $nombre_cliente;
            $id_tecnico;
            $nombre_tecnico;
            $fecha_instalacion;
            $descripcion;
            $id_plan;

            $ot = new Ot_nuevo_servicio();

            $result = $ot->buscar_para_actualizar($id_ot_nuevo_servicio);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_cliente = $row['id_cliente'];
                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $id_tecnico = $row['id_tecnico'];
                    $nombre_tecnico = $row['nombre_tecnico'];
                    $fecha_instalacion = $row['fecha_instalacion'];
                    $descripcion = $row['descripcion_ot'];
                    $id_plan = $row['id_plan'];
                }
            }
        } else {

            //echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_nuevo_servicio.php">';
        }
        ?>



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


                            <h3>Crear registro de instalación</h3>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>

                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $cui_cliente; ?>" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_cliente" class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $nombre_cliente; ?>" class="form-control" id="nombre_cliente" readonly required>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Técnico</h3>



                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-4">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $nombre_tecnico; ?>" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>

                        <!-- ------------------------------Tabla para equipos -----------------------------   -->

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Equipos Tecnológicos</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_equipos" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="Agregar nuevo tipo de orden de trabajo">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar equipos tecnológicos disponibles en bodega</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_equipos_agregados" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No. Serie</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>No. Serie</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>

                        <!---------------------------Fin tabla equipos -------------------------------------------->

                        <!-- ------------------------------Tabla para materiales -----------------------------   -->

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Materiales</h3>

                                <div class="row">

                                    <div class="col-lg-1 col-sm-4">
                                        <div class="form-group">
                                            <button id="btn_buscar_usuario" data-toggle="modal" data-target="#modal_materiales" class="btn btn-primary btn-fab btn-round" data-toggle="tooltip" title="">
                                                <i class="material-icons">search</i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-4">
                                        <h4>Buscar materiales</h4>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_materiales_agregados" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Material</th>
                                            <th>Tipo</th>
                                            <th>Unidad</th>
                                            <th>Cantidad a usar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Material</th>
                                            <th>Tipo</th>
                                            <th>Unidad</th>
                                            <th>Cantidad a usar</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>

                        <!---------------------------Fin tabla materiales -------------------------------------------->


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Notas</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-4">
                                        <textarea class="form-control" name="notas" id="id_notas" placeholder="Aquí puede escribir una breve descripción" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <br>

                        <div class="row">
                            <div class="col-lg-8 col-sm-4 mr-auto">
                                <button class="btn btn-primary" id="btn_agregar_registro_de_instalacion"><i class="material-icons">save</i> Guardar</button>
                                <a class="btn btn-primary" href="#"><i class="material-icons">cancel</i> Cancelar</a>
                            </div>
                        </div>








                    </div>


                </div>


            </div>

        </div>


        <?php
        include 'modals/modal_equipos.php';
        include 'modals/modal_materiales.php';
        include 'modals/modal_agregar_material.php';
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

                var tabla_equipos_agregados = $('#tabla_equipos_agregados').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": false,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});

                var tabla_materiales_agregados = $('#tabla_materiales_agregados').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": false,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});

                var tabla_equipos = $('#tabla_equipos').DataTable({
                    responsive: true
                });

                var tabla_materiales = $('#tabla_materiales').DataTable({
                    responsive: true
                });


                $('#tabla_equipos tbody').on('click', 'tr', function () {

                    var fila_tabla_equipos = [];
                    fila_tabla_equipos = tabla_equipos.row(this).data();
                    tabla_equipos.row(this).remove().draw(false);

                    //alert( fila_tabla1[2] );

                    tabla_equipos_agregados.row.add(fila_tabla_equipos).draw(false);

                });

                function isInt(n) {
                    return n % 1 === 0;
                }

                $('#btn_agregar_material').click(function () {

                    var fila_agregar_material = [];
                    cantidad_usar_material = document.getElementById('cantidad_material').value;
                    
                    
                    //Validacion si la cantidad es menor a 1 o no es un numero o no es un entero
                    if (cantidad_usar_material < 1 || isNaN(cantidad_usar_material) || !isInt(cantidad_usar_material)) {

                        iziToast.error({
                            transitionOut: 'fadeOutDown',
                            title: 'Error',
                            position: 'topCenter',
                            message: "Cantidad no permitida",

                        });
                        return;
                    }
                    
                    

                    if (Number(cantidad_usar_material) > Number(cantidad_material)) {

                        iziToast.error({
                            transitionOut: 'fadeOutDown',
                            title: 'Error',
                            position: 'topCenter',
                            message: "No hay suficientes materiales",

                        });
                        return;
                    }

                    fila_agregar_material.push(id_material);
                    fila_agregar_material.push(material);
                    fila_agregar_material.push(tipo_material);
                    fila_agregar_material.push(unidad_material);
                    fila_agregar_material.push(cantidad_usar_material);

                    tabla_materiales_agregados.row.add(fila_agregar_material).draw(false);

                    $('#modal_agregar_material').modal('hide');


                });//Fin btn_agregar_material

                $('#btn_cancelar_agregar_material').click(function () {

                    var fila_cancelar_agregar_material = [];

                    fila_cancelar_agregar_material.push(id_material);
                    fila_cancelar_agregar_material.push(material);
                    fila_cancelar_agregar_material.push(tipo_material);
                    fila_cancelar_agregar_material.push(unidad_material);
                    fila_cancelar_agregar_material.push(cantidad_material);

                    tabla_materiales.row.add(fila_cancelar_agregar_material).draw(false);



                });//Fin btn_cancelar_agregar_material



                var id_material;
                var material;
                var tipo_material;
                var unidad_material;
                var cantidad_material;
                var cantidad_usar_material;


                $('#tabla_materiales tbody').on('click', 'tr', function () {

                    $('#modal_agregar_material').modal({backdrop: 'static', keyboard: false});

                    var fila_tabla_materiales = [];

                    fila_tabla_materiales = tabla_materiales.row(this).data();

                    id_material = fila_tabla_materiales[0];
                    material = fila_tabla_materiales[1];
                    tipo_material = fila_tabla_materiales[2];
                    unidad_material = fila_tabla_materiales[3];
                    cantidad_material = fila_tabla_materiales[4];


                    tabla_materiales.row(this).remove().draw(false);

                    $('#modal_agregar_material').modal('show');

                });


                $('#tabla_materiales_agregados tbody').on('click', 'tr', function () {

                    //$('#modal_agregar_material').modal('show');

                    var fila_tabla_materiales_agregados = [];

                    fila_tabla_materiales_agregados = tabla_materiales_agregados.row(this).data();

                    var fila_regresar_material = [];

                    fila_regresar_material.push(fila_tabla_materiales_agregados[0]);
                    fila_regresar_material.push(fila_tabla_materiales_agregados[1]);
                    fila_regresar_material.push(fila_tabla_materiales_agregados[2]);
                    fila_regresar_material.push(fila_tabla_materiales_agregados[3]);
                    fila_regresar_material.push(cantidad_material);


                    tabla_materiales_agregados.row(this).remove().draw(false);

                    //$('#modal_agregar_material').modal('show');


                    //alert( fila_tabla1 );

                    tabla_materiales.row.add(fila_regresar_material).draw(false);

                });


                $('#tabla_equipos_agregados tbody').on('click', 'tr', function () {
                    //$(this).toggleClass('selected');

                    var fila = this;

                    //Valida si la tabla de los equipos agregados no esta vacia antes de preguntar
                    if (tabla_equipos_agregados.data().length !== 0) {
                        //console.log('no vacio');

                        iziToast.info({
                            //theme: 'dark',
                            timeout: false,
                            //backgroundColor: '#1287cc',
                            title: '¿Quitar el equipo de la lista?',
                            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                            buttons: [
                                ['<button>Si</button>', function (instance, toast) {

                                        var fila_tabla_equipos_agregados = [];
                                        fila_tabla_equipos_agregados = tabla_equipos_agregados.row(fila).data();
                                        tabla_equipos_agregados.row(fila).remove().draw(false);

                                        tabla_equipos.row.add(fila_tabla_equipos_agregados).draw(false);

                                        instance.hide({
                                            onClosing: function (instance, toast, closedBy) {
                                                //console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                                            }
                                        }, toast, 'buttonName');


                                    }, true], // true to focus
                                ['<button>No</button>', function (instance, toast) {
                                        instance.hide({
                                            onClosing: function (instance, toast, closedBy) {
                                                //console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
                                            }
                                        }, toast, 'buttonName');
                                    }]
                            ],
                            onOpening: function (instance, toast) {
                                //console.info('callback abriu!');
                            },
                            onClosing: function (instance, toast, closedBy) {
                                //console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                            }
                        });


                    }


//                    var fila_tabla_equipos_agregados = [];
//                    fila_tabla_equipos_agregados = tabla_equipos_agregados.row(this).data();
//                    tabla_equipos_agregados.row(this).remove().draw(false);
//
//                    //alert( fila_tabla1[2] );
//
//                    tabla_equipos.row.add(fila_tabla_equipos_agregados).draw(false);

                });





                $('#btn_agregar_registro_de_instalacion').click(function () {

                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_agregar_registro_de_instalacion").disabled = true;

                    var cliente_detalle = "A ";

                    cliente_detalle += document.getElementById("nombre_cliente").value;

                    var notas = document.getElementById("id_notas").value;

                    var contenido_tabla_equipos = JSON.stringify(tabla_equipos_agregados
                            .rows()
                            .data()
                            .toArray());

                    var contenido_tabla_materiales = JSON.stringify(tabla_materiales_agregados
                            .rows()
                            .data()
                            .toArray());

                    $.ajax({
                        type: "POST",
                        url: "post.php",
                        data: {
                            crear_registro_instalacion: 'crear_registro_instalacion',
                            cliente_detalle: cliente_detalle,
                            notas: notas,
                            id_cliente: <?php echo $id_cliente; ?>,
                            id_tecnico: <?php echo $id_tecnico; ?>,
                            id_plan: <?php echo $id_plan; ?>,
                            id_solicitud_instalacion: <?php echo $_GET['id_ot_nuevo_servicio']; ?>,
                            equipos: contenido_tabla_equipos,
                            materiales: contenido_tabla_materiales
                        },
                        cache: false,

                        success: function (respuesta) {
                            console.log(respuesta);

                            setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_agregar_registro_de_instalacion").disabled = false;


                                if (respuesta == 'equipos_vacios') {

                                    iziToast.error({
                                        transitionOut: 'fadeOutDown',
                                        position: 'topCenter',
                                        title: "Tiene que agregar al menos un equipo",

                                    });

                                }

                                if (respuesta == 'exito') {

                                    iziToast.success({
                                        transitionOut: 'fadeOutDown',
                                        timeout: 2400,
                                        title: 'Operación exitosa',
                                        position: 'topCenter',
                                        message: '',
                                    });

                                    setTimeout(function () {

                                        window.location.href = "https://wifinet.ga/paginas/ordenes_de_trabajo/nuevo_servicio/mostrar_ot_nuevo_servicio.php";

                                    }, 2500);
                                }

                            }, 1000);//Fin funcion de espera del metodo success del ajax



                        }// fin del metodo success
                    });


                });//Fin btn_agregar_registro_de_instalacion





            });





        </script>





    </body>

</html>