<!DOCTYPE html>
<html lang="en">

    <head>

        <?php include '../header.php';
        ?>

    </head>

    <body class="index-page sidebar-collapse">

        <?php
        if (isset($_GET['id_cliente'])) {

            include '../../../clases/Ot_desinstalacion.php';

            $id_ot_desinstalacion = $_GET['id_ot_desinstalacion'];

            $id_instalacion;
            $cui_cliente;
            $nombre_cliente;
            $nombre_tecnico;
            $id_cliente;

            $ot_desinstalacion = new Ot_desinstalacion();

            $result_otdesinstalacion = $ot_desinstalacion->buscar_para_actualizar($id_ot_desinstalacion);

            if ($result_otdesinstalacion->num_rows > 0) {

                while ($row = $result_otdesinstalacion->fetch_assoc()) {

                    $id_cliente = $row['id_cliente'];
                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $nombre_tecnico = $row['nombre_usuario'];
                }
            }
        } else {

            //echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_nuevo_servicio.php">';
        }
        ?>



<?php include '../../menu.php'; ?>

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

                    <div id="inputs">
                        <div class="title">


                            <h2>Recoger equipos de solicitud de desinstalación</h2>


                        </div>



                        <div class="row">

                            <div class="col-md-12">

                                <h3>Cliente</h3>

                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="cui_cliente" class="bmd-label-floating">CUI</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $cui_cliente; ?>" class="form-control" id="cui_cliente" readonly required>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12">
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
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_tecnico" class="bmd-label-floating">Nombre del técnico encargado</label>
                                    <input type="text" name="datos_cliente" value="<?php echo $nombre_tecnico; ?>" class="form-control" id="nombre_tecnico" readonly required>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <h3>Notas</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <textarea class="form-control" readonly name="notas" id="id_notas" rows="2">Si el equipo a recoger esta extraviado, seleccionelo de la siguiente lista</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- ------------------------------Tabla para equipos -----------------------------   -->

                        <div class="row">

                            <div class="col-md-12">
                                <h3>Equipos a recoger</h3>



                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_equipos_recogidos" class="table table-striped table-bordered" style="width:100%">
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

<?php
include '../../../clases/Instalacion.php';


$instalacion = new Instalacion();

$result = $instalacion->Buscar_equipos_instalacion_idcliente($id_cliente);

if ($result->num_rows > 0) {


    // imprimiendo datos de cada columna con while
    while ($row = $result->fetch_assoc()) {

        echo
        '<tr>'
        . '<td>' . $row["id_equipo_tecnologico"] . '</td>'
        . '<td>' . $row["no_serie"] . '</td>'
        . '<td>' . $row["marca"] . '</td>'
        . '<td>' . $row["modelo"] . '</td>'
        . '<td>' . $row["tipo"] . '</td>'
        . '</tr>';
    }
}
?>


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
                                <h3>Equipo no recogido o extraviado</h3>



                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                <table id="tabla_equipos_extraviados" class="table table-striped table-bordered" style="width:100%">
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

                        <!---------------------------Fin tabla materiales -------------------------------------------->





                        <br>

                        <div class="row">
                            <div class="col-lg-8 col-sm-12 mr-auto">
                                <button class="btn btn-primary" id="btn_recoger_equipo"><i class="material-icons">save</i> Guardar</button>
                                <a class="btn btn-primary" href="mostrar_ot_desinstalacion.php"><i class="material-icons">cancel</i> Cancelar</a>
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

                var tabla_equipos_recogidos = $('#tabla_equipos_recogidos').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": true,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});

                var tabla_equipos_extraviados = $('#tabla_equipos_extraviados').DataTable({"searching": false, "bPaginate": false,
                    "bLengthChange": false,
                    "responsive": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false});

                $('#tabla_equipos_recogidos tbody').on('click', 'tr', function () {

                    var fila_equipos_recogidos = [];
                    fila_equipos_recogidos = tabla_equipos_recogidos.row(this).data();
                    tabla_equipos_recogidos.row(this).remove().draw(false);


                    tabla_equipos_extraviados.row.add(fila_equipos_recogidos).draw(false);



                });


                $('#tabla_equipos_extraviados tbody').on('click', 'tr', function () {

                    var fila_equipos_extraviados = [];
                    fila_equipos_extraviados = tabla_equipos_extraviados.row(this).data();
                    tabla_equipos_extraviados.row(this).remove().draw(false);


                    tabla_equipos_recogidos.row.add(fila_equipos_extraviados).draw(false);



                });





// --------------- Clic en el boton Guardar ------------------------------------------------------------------

                $('#btn_recoger_equipo').click(function () {


                    var cliente_detalle = "De ";

                    cliente_detalle += document.getElementById("nombre_cliente").value;

                    cliente_detalle += " por solicitud de desinstalación";

                    waitingDialog.show("Procesando, espere");
                    document.getElementById("btn_recoger_equipo").disabled = true;


                    //var notas = document.getElementById("id_notas").value;

                    var contenido_equipos_recogidos = JSON.stringify(tabla_equipos_recogidos
                            .rows()
                            .data()
                            .toArray());

                    var contenido_equipos_extraviados = JSON.stringify(tabla_equipos_extraviados
                            .rows()
                            .data()
                            .toArray());

                    $.ajax({
                        type: "POST",
                        url: "post.php",
                        data: {
                            recoger_equipo: 'recoger_equipo',
                            cliente_detalle: cliente_detalle,
                            id_cliente: <?php echo $id_cliente; ?>,
                            id_ot_desinstalacion: <?php echo $_GET['id_ot_desinstalacion']; ?>,
                            equipos_recogidos: contenido_equipos_recogidos,
                            equipos_extraviados: contenido_equipos_extraviados
                        },
                        cache: false,

                        success: function (respuesta) {

                            setTimeout(function () {
                                waitingDialog.hide();
                                document.getElementById("btn_recoger_equipo").disabled = false;

                                iziToast.success({
                                    transitionOut: 'fadeOutDown',
                                    timeout: 2400,
                                    title: 'Operación exitosa',
                                    position: 'topCenter',
                                    message: '',
                                });

                                setTimeout(function () {

                                    window.location.href = "https://wifinet.ga/paginas/ordenes_de_trabajo/desinstalacion/mostrar_ot_desinstalacion.php";

                                }, 2500);


                            }, 1000);//Fin funcion de espera del metodo success del ajax



                        }// fin del metodo success
                    });


                });//Fin btn_agregar_registro_de_instalacion

// --------------- Fin boton Guardar ------------------------------------------------------------------




            });





        </script>





    </body>

</html>