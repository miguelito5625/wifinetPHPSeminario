<!-- modal grande -->
<div class="modal fade bd-example-modal-lg" id="modal_cobradores" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="margin-bottom:1; line-height:1;">
                <h3 class="modal-title">Cobradores</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>


            </div>

            <div class="modal-body">

                <div class="row">
                    <button class="btn btn-primary" id="btn_agregar_cobrador"><i class="material-icons">check</i> Seleccionar</button>
                </div>

                <br>
                
                <table id="tabla_cobradores" class="table table-striped table-bordered" style="width:100%">
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


        document.getElementById("btn_agregar_cobrador").disabled = true;


        var tabla = $('#tabla_cobradores').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "ajax/cargar_usuarios_cobradores_ajax.php",
            "columns": [
                {"data": "cui"},
                {"data": "nombre"},
            ],
            rowId: 'id_usuario',
            select: {
                style: 'single'
            },
            responsive: true
        });



        $('#tabla_cobradores tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                document.getElementById("btn_agregar_cobrador").disabled = true;
            } else {
                document.getElementById("btn_agregar_cobrador").disabled = false;
            }
        });

        var id_cobrador;
        var nombre_cobrador;

        $('#tabla_cobradores').on('click', 'tr', function () {
            var datos_fila = tabla.row(this).data();

            id_cobrador = tabla.row(this).id();

            nombre_cobrador = datos_fila.nombre;
            
            //console.log(id_cobrador);


        });


        $('#btn_agregar_cobrador').on('click', function () {

            document.getElementById("id_cobrador").value = id_cobrador;


            document.getElementById("nombre_cobrador").focus();

            document.getElementById("nombre_cobrador").value = nombre_cobrador;
            $("#modal_cobradores").modal("hide");



        });



    });
</script>