window.onload = function () {

    var ctx_ot_n_pen = document.getElementById('id_grafica_ot_n_pen').getContext('2d');
    window.myBar_ot_n_pen = new Chart(ctx_ot_n_pen, {
        type: 'bar',
        data: barChartData_ot_n_pen,
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
                text: 'OT Nuevos Servicios'
            }
        }
    });
    
    

}; // fin windows on load


window.setInterval(function () {
    /// call your function here
    actualizacion_grafica_ot_n_pen();
    
}, 1000);