var color_barra_equipos = Chart.helpers.color;
var barChartData_equipos = {
    labels: ['En bodega', 'Instalado', 'Averiado', 'Extraviado'],
    datasets: [{
            label: 'Dataset 1',
            backgroundColor: color_barra_equipos(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [
                0, 0, 0
            ]
        }
    ]

};// fin datos grafica



//window.onload = function () {
//
//    var ctx_equipos = document.getElementById('id_grafica_equipos').getContext('2d');
//    window.myBar = new Chart(ctx_equipos, {
//        type: 'bar',
//        data: barChartData_equipos,
//        options: {
//            responsive: true,
//            legend: {
//                display: false
//                        //position: 'top',
//            },
//            scales: {
//                yAxes: [{
//                        ticks: {
//                            beginAtZero: true,
//                            userCallback: function (label, index, labels) {
//                                // when the floored value is the same as the value we have a whole number
//                                if (Math.floor(label) === label) {
//                                    return label;
//                                }
//
//                            },
//                        }
//                    }],
//            },
//            title: {
//                display: true,
//                text: 'Equipos Tecnológicos'
//            }
//        }
//    });
//
//}; // fin windows on load


function actualizacion_grafica_equipos() {

    $.ajax({
        url: 'graficas/grafica_equipos.php',
        type: "POST",
        dataType: "json",
        success: function (data) {

            barChartData_equipos.datasets.forEach(function (dataset) {
                dataset.data = data;
            });

            window.myBar_equipos.update();


        }
    });
}

//window.setInterval(function () {
//    /// call your function here
//    actualizacion_grafica_equipos();
//}, 1000);


