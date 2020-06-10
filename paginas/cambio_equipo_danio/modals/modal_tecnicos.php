<!-- modal grande -->
<div class="modal fade bd-example-modal-lg" id="modal_tecnicos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="margin-bottom:1; line-height:1;">
                <h3 class="modal-title">Técnicos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>


            </div>

            <div class="modal-body">

                <div class="row">
                    <button class="btn btn-primary" id="btn_agregar_tecnico"><i class="material-icons">check</i> Seleccionar</button>
                </div>

                <br>
                
                <table id="tabla_tecnicos" class="table table-striped table-bordered" style="width:100%">
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


        document.getElementById("btn_agregar_tecnico").disabled = true;


        var tabla = $('#tabla_tecnicos').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "ajax/cargar_usuarios_tecnicos_ajax.php",
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



        $('#tabla_tecnicos tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                document.getElementById("btn_agregar_tecnico").disabled = true;
            } else {
                document.getElementById("btn_agregar_tecnico").disabled = false;
            }
        });

        var id_usuario;
        var nombre_tecnico;

        $('#tabla_tecnicos').on('click', 'tr', function () {
            var datos_fila = tabla.row(this).data();

            id_usuario = tabla.row(this).id();

            cui_cliente = datos_fila.cui;
            nombre_tecnico = datos_fila.nombre;

            //console.log(id_usuario);


        });


        $('#btn_agregar_tecnico').on('click', function () {

            document.getElementById("id_tecnico").value = id_usuario;


            document.getElementById("nombre_tecnico").focus();

            document.getElementById("nombre_tecnico").value = nombre_tecnico;
            $("#modal_tecnicos").modal("hide");



        });



    });
</script>