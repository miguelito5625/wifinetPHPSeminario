<!DOCTYPE html>
<html lang="en">

    <head>

        <?php
        include '../header.php';

        session_start();

        $usuario = $_SESSION['usuario'];
        ?>

        <script src="../../estilos/js/charts/Chart.js"></script>
        <script src="../../estilos/js/charts/Utils.js"></script>

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



                    <div class="title">

                        <h2 class="title">Bienvenido <?php echo $usuario; ?> </h2>

                    </div>

                    <div class="row">
                        <div class="col-md-4">

                            <canvas id="myChart" width="400" height="400"></canvas>


                        </div>
                        <div class="col-md-4">

                            <canvas id="canvas" width="400" height="400"></canvas>

                            <button id="randomizeData">Actualizar grafica</button>

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

            var colores = ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"];
            var valores = [12, 19, 3, 5, 2, 3];

            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: colores,
                    datasets: [{
                            label: '# of Votes',
                            data: valores,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>



        <script>
      

            window.onload = function () {
                
                
                
                $.ajax({
                    url: 'prueba.php',
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        
                      var color = Chart.helpers.color;
            var barChartData = {
                labels: ['En bodega', 'Instalado', 'Averiado'],
                datasets: [{
                        label: 'Dataset 1',
                        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: data
                    }
                ]

            };// fin datos grafica  
                        
                        
                        
                        var ctx = document.getElementById('canvas').getContext('2d');
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                            //position: 'top',
                        },
                        scales: {
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        userCallback: function (label, index, labels) {
                                            // when the floored value is the same as the value we have a whole number
                                            if (Math.floor(label) === label) {
                                                return label;
                                            }

                                        },
                                    }
                                }],
                        },
                        title: {
                            display: true,
                            text: 'Estado de los equipos tecnológico'
                        }
                    }
                }); 
                        
                        
                        

                    }
                });
                
                
                
                
               

            }; // fin windows on load



            document.getElementById('randomizeData').addEventListener('click', function () {

                $.ajax({
                    url: 'prueba.php',
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        
                        console.log(data);

                        barChartData.datasets.forEach(function (dataset) {
                            dataset.data = data;
                        });

                        window.myBar.update();

                    }
                });


            });//Fin evento boton


//            function actualizacion_grafica_equipos() {
//
//                $.ajax({
//                    url: 'prueba.php',
//                    type: "POST",
//                    dataType: "json",
//                    success: function (data) {
//                        console.log(data);
//
//                        barChartData.datasets.forEach(function (dataset) {
//                            dataset.data = data;
//                        });
//
//                        window.myBar.update();
//
//
//                    }
//                });
//            }
//
//            window.setInterval(function () {
//                /// call your function here
//                actualizacion_grafica_equipos();
//            }, 1000);


        </script>




    </body>

</html>