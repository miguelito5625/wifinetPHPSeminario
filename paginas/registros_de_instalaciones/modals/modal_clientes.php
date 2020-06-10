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


       



    });
</script>