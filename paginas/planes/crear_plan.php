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


                            <h3>Creación de un nuevo plan</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre" class="bmd-label-floating">Nombre</label>
                                        <input type="text" autocomplete="off" name="nombre" class="form-control" id="idnombre" required>
                                        <span class="bmd-help">Escriba el nombre del plan</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="iddescripcion" class="bmd-label-floating">Descripción</label>
                                        <input type="text" autocomplete="off" name="descripcion" class="form-control" id="iddescripcion">
                                        <span class="bmd-help">Escriba una descripción para el plan (opcional)</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idprecio" class="bmd-label-floating">Precio</label>
                                        <input type="text" name="precio" class="form-control" id="idprecio">
                                        <span class="bmd-help">Escriba el precio del plan</span>
                                    </div>
                                </div>

                                



                            </div>

                            <br>

                            <div class="row">
                                <div class="col-lg-8 col-sm-4 mr-auto">
                                    <button class="btn btn-primary" name="crear_plan"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_planes.php"><i class="material-icons">cancel</i> Cancelar</a>
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