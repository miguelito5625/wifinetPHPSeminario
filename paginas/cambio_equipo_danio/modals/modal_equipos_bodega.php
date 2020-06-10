<!-- modal grande -->
<div class="modal fade bd-example-modal-lg" id="modal_equipos_bodega" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="margin-bottom:1; line-height:1;">
                <h3 class="modal-title">Equipos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>


            </div>

            <div class="modal-body">

                <div class="row">
                    <button class="btn btn-primary" id="btn_agregar_equipo"><i class="material-icons">check</i> Seleccionar</button>
                </div>

                <br>
                
                <table id="tabla_equipos_bodega" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>No. Serie</th>
                        <th>Tipo</th>
                    </tr>
                </thead>


                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>No. Serie</th>
                        <th>Tipo</th>
                    </tr>
                </tfoot>
            </table>

            </div>

        </div>
    </div>
</div>
<!--  fin de modal grande-->

<script>
    $(document).ready(function () {


        document.getElementById("btn_agregar_equipo").disabled = true;


        var tabla_equipos_bodega = $('#tabla_equipos_bodega').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "ajax/cargar_equipos_bodega_ajax.php",
            "columns": [
                {"data": "id_equipo_tecnologico"},
                {"data": "modelo"},
                {"data": "marca"},
                {"data": "no_serie"},
                {"data": "tipo"},
            ],
            rowId: 'id_equipo_tecnologico',
            select: {
                style: 'single'
            },
            responsive: true
        });



        $('#tabla_equipos_bodega tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                document.getElementById("btn_agregar_equipo").disabled = true;
            } else {
                document.getElementById("btn_agregar_equipo").disabled = false;
            }
        });

        var id_equipo;
        var modelo_equipo;
        var marca_equipo;
        var serie_equipo;
        var tipo_equipo;

        $('#tabla_equipos_bodega').on('click', 'tr', function () {
            var datos_fila = tabla_equipos_bodega.row(this).data();

            id_equipo = tabla_equipos_bodega.row(this).id();
            

            modelo_equipo = datos_fila.modelo;
            marca_equipo = datos_fila.marca;
            serie_equipo = datos_fila.no_serie;
            tipo_equipo = datos_fila.tipo;



        });


        $('#btn_agregar_equipo').on('click', function () {

            document.getElementById("id_equipo_instalar").value = id_equipo;


            document.getElementById("modelo_equipo_instalar").focus();
            document.getElementById("marca_equipo_instalar").focus();
            document.getElementById("serie_equipo_instalar").focus();
            document.getElementById("tipo_equipo_instalar").focus();

            document.getElementById("modelo_equipo_instalar").value = modelo_equipo;
            document.getElementById("marca_equipo_instalar").value = marca_equipo;
            document.getElementById("serie_equipo_instalar").value = serie_equipo;
            document.getElementById("tipo_equipo_instalar").value = tipo_equipo;
            
            $("#modal_equipos_bodega").modal("hide");



        });



    });
</script>