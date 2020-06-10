<!-- modal grande -->
<div class="modal fade bd-example-modal-lg" id="modal_materiales" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="margin-bottom:1; line-height:1;">
                <h3 class="modal-title">Materiales</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>


            </div>

            <div class="modal-body">

                <table id="tabla_materiales" class="table table-striped table-bordered" style="width:100%">

                        <?php
                        if (isset($_GET['codigo_error'])) {
                        
                            return;
                        }
                        
                        include '../../clases/Material.php';

                        $material = new Material();

                        $result = $material->MostrarMateriales();
                        
                        if ($result->num_rows > 0) {
                            echo
                            '<thead>'
                            . '<tr>'
                            . '<th>ID</th>'
                            . '<th>Material</th>'
                            . '<th>Tipo</th>'
                            . '<th>Unidad</th>'
                            . '<th>Existencia</th>'
                            . '</tr>'
                            . '</thead>';

                            // imprimiendo datos de cada columna con while
                            while ($row = $result->fetch_assoc()) {

                                echo
                                '<tr>'
                                . '<td>' . $row["id_material"] . '</td>'
                                . '<td>' . $row["nombre_material"] . '</td>'
                                . '<td>' . $row["tipo_material"] . '</td>'
                                . '<td>' . $row["unidad_de_medida"] . '</td>'
                                . '<td>' . $row["existencia"] . '</td>'
                                . '</tr>';
                            }
                            echo "</table>";
                            } else {
                            echo "0 resultados";
                            //<a data-toggle="tooltip" title="Cambiar Estado" href="post.php?id_cliente_estado=' . $row['id_cliente'] . '"> <i class="material-icons">repeat</i> </a>
                        }
                        
                        
                        
                        ?>
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