<!-- modal grande -->
<div class="modal fade bd-example-modal-lg" id="modal_clientes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="margin-bottom:1; line-height:1;">
                <h3 class="modal-title">Clientes</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>


            </div>

            <div class="modal-body">

                <div class="row">
                    <button class="btn btn-primary" id="btn_agregar_cliente"><i class="material-icons">check</i> Seleccionar</button>
                </div>

                <br>
                
                <table id="tabla_clientes" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>CUI</th>
                        <th>Nombre</th>
                    </tr>
                </thead>


                <tfoot>
                    <tr>
                        <th>CUI</th>
                        <th>Nombre</th>

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


        document.getElementById("btn_agregar_cliente").disabled = true;


        var tabla = $('#tabla_clientes').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "ajax/cargar_clientes_ajax.php",
            "columns": [
                {"data": "cui"},
                {"data": "nombre_cliente"},
            ],
            rowId: 'id_cliente',
            select: {
                style: 'single'
            },
            responsive: true
        });



        $('#tabla_clientes tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                document.getElementById("btn_agregar_cliente").disabled = true;
            } else {
                document.getElementById("btn_agregar_cliente").disabled = false;
            }
        });

        var id_cliente;
        var nombre_cliente;

        $('#tabla_clientes').on('click', 'tr', function () {
            var datos_fila = tabla.row(this).data();

            id_cliente = tabla.row(this).id();

            cui_cliente = datos_fila.cui;
            nombre_cliente = datos_fila.nombre_cliente;

            //console.log(id_cliente);


        });


        $('#btn_agregar_cliente').on('click', function () {

            document.getElementById("id_cliente").value = id_cliente;
            //console.log(id_cliente);

            document.getElementById("cui_cliente").focus();
            document.getElementById("nombre_cliente").focus();

            document.getElementById("cui_cliente").value = cui_cliente;
            document.getElementById("nombre_cliente").value = nombre_cliente;
            $("#modal_clientes").modal("hide");



        });



    });
</script>