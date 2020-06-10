window.onload = function () {

    var ctx__estado_cliente = document.getElementById('id_grafica_estado_cliente').getContext('2d');
    window.myBar_estado_cliente = new Chart(ctx__estado_cliente, {
        type: 'bar',
        data: barChartData_estado_cliente,
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
                text: 'Clientes'
            }
        }
    });
    
    
    var ctx_equipos = document.getElementById('id_grafica_equipos').getContext('2d');
    window.myBar_equipos = new Chart(ctx_equipos, {
        type: 'bar',
        data: barChartData_equipos,
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
                text: 'Equipos Tecnológicos'
            }
        }
    });
    

}; // fin windows on load


window.setInterval(function () {
    /// call your function here
    actualizacion_grafica_estado_cliente();
    actualizacion_grafica_equipos();
    
}, 1000);