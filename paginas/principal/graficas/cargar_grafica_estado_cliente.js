var color_barra_estado_cliente = Chart.helpers.color;
var barChartData_estado_cliente = {
    labels: ['Activos', 'Inactivos'],
    datasets: [{
            label: 'Dataset 1',
            backgroundColor: color_barra_estado_cliente(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [
                0, 0, 0
            ]
        }
    ]

};// fin datos grafica






function actualizacion_grafica_estado_cliente() {

    $.ajax({
        url: 'graficas/grafica_estado_cliente.php',
        type: "POST",
        dataType: "json",
        success: function (data) {

            barChartData_estado_cliente.datasets.forEach(function (dataset) {
                dataset.data = data;
            });

            window.myBar_estado_cliente.update();


        }
    });
}

//window.setInterval(function () {
//    /// call your function here
//    actualizacion_grafica_estado_cliente();
//}, 1000);


