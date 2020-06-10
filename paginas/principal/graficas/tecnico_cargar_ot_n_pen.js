var color_barras_ot_n_pen = Chart.helpers.color;
var barChartData_ot_n_pen = {
    labels: ['Pendiente', 'Cancelada', 'Finalizada'],
    datasets: [{
            label: 'Dataset 1',
            backgroundColor: color_barras_ot_n_pen(window.chartColors.blue).alpha(0.5).rgbString(),
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
//        data: barChartData_ot_n_pen,
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


function actualizacion_grafica_ot_n_pen() {

    $.ajax({
        url: 'graficas/tecnico_grafica_ot_n_pen.php',
        type: "POST",
        dataType: "json",
        success: function (data) {

            barChartData_ot_n_pen.datasets.forEach(function (dataset) {
                dataset.data = data;
            });

            window.myBar_ot_n_pen.update();


        }
    });
}

//window.setInterval(function () {
//    /// call your function here
//    actualizacion_grafica_ot_n_pen();
//}, 1000);


