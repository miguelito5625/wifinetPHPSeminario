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


                            <h3>Introduzca los datos del equipo tecnológico</h3>


                        </div>


                        <form action="post.php" method="post">


                            <div class="row">

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idnombre" class="bmd-label-floating">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" id="idnombre" required>
                                        <span class="bmd-help">Escriba el nombre del equipo tecnológico</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idmarca" class="bmd-label-floating">Marca</label>
                                        <input type="text" name="marca" class="form-control" id="idmarca">
                                        <span class="bmd-help">Escriba la marca del equipo tecnológico</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">
                                        <label for="idno_serie" class="bmd-label-floating">Número de serie</label>
                                        <input type="text" name="no_serie" class="form-control" id="idno_serie">
                                        <span class="bmd-help">Escriba el numero de serie del equipo tecnológico</span>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-lg-3 col-sm-4">
                                    <div class="form-group">

                                        <select class="selectpicker form-control show-tick" name="tipo" data-style="btn btn-default" title="Tipo de equipo" data-size="7" data-live-search="true">
                                            <option data-tokens="antenas CPE">antenas CPE</option>
                                            <option data-tokens="antenas sector">antenas sector</option>
                                            <option data-tokens="antenas PTP">antenas PTP</option>
                                            <option data-tokens="routers">routers</option>
                                            <option data-tokens="switches">switches</option>
                                            <option data-tokens="Balanceadores de carga">Balanceadores de carga</option>
                                            <option data-tokens="Firewalls">Firewalls</option>
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
                                    <button class="btn btn-primary" name="crear_equipo_tecnologico"><i class="material-icons">save</i> Guardar</button>
                                    <a class="btn btn-primary" href="mostrar_equipos_tecnologicos.php"><i class="material-icons">cancel</i> Cancelar</a>
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