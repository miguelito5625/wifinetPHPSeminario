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


                            <h3>Introduzca los datos del material</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre" class="bmd-label-floating">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" id="idnombre" required>
                                        <span class="bmd-help">Escriba del material</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idexistencia" class="bmd-label-floating">Existencia</label>
                                        <input type="text" name="existencia" class="form-control" id="idexistencia">
                                        <span class="bmd-help">Indique la existencia actual del material</span>
                                    </div>
                                </div>

                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select class="selectpicker form-control show-tick" name="tipo" data-style="btn btn-default" title="Tipo de material" data-size="7" data-live-search="true">
                                            <option data-tokens="Cable UTP">Cable UTP</option>
                                            <option data-tokens="Alambre de amarre">Alambre de amarre</option>
                                            <option data-tokens="Abrazaderas metálicas">Abrazaderas metálicas</option>
                                            <option data-tokens="Extensores de altur">Extensores de altura</option>
                                        </select>


                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select class="selectpicker form-control show-tick" name="unidad_de_medida" data-style="btn btn-default" title="Unidad de medida" data-size="7" data-live-search="true">
                                            <option data-tokens="Unidades">Unidades</option>
                                            <option data-tokens="Metros">Metros</option>
                                        </select>

                                    </div>
                                </div>

                            </div> <!--final de la fila-->
                            
                            <div class="row">
                                
                                 <div class="col-md-12">
                                    <h3>Descripción</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-4">
                                            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Aquí puede escribir una breve descripción" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            

                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="crear_material"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_materiales.php"><i class="material-icons">cancel</i> Cancelar</a>
                                </div>
                            </div>



                        </form>

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
                

            });
            
        </script>


        

    </body>

</html>