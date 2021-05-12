// Grafica de pastel usuarios
var configUsuarios = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
                2,
                1,
                1,
                1
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Mexico',
            'Puerto Rico',
            'Argentina',
            'Francia'
        ]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Usuarios registrados por pais'
        }
    }
};

// Grafica de barra 1
var color = Chart.helpers.color;
var barChartData1 = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    datasets: [{
        label: 'Postre',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [
            4,
            2
        ]
    }, {
        label: 'Comida',
        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [
            3,
            3,
            3
        ]
    }, {
        label: 'Botana',
        backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
        borderColor: window.chartColors.green,
        borderWidth: 1,
        data: [
            1,
            0,
            0,
            1
        ]
    }, {
        label: 'Ensalada',
        backgroundColor: color(window.chartColors.purple).alpha(0.5).rgbString(),
        borderColor: window.chartColors.purple,
        borderWidth: 1,
        data: [
            0,
            2,
            0,
            3
        ]
    }]

};

// Grafica de pastel platillos
var configPlatillos = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
                5,
                3,
                2,
                2
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Albóndigas a la boloñesa',
            'Carlota de chocolate',
            'Botana de jamón serrano',
            'Ensalada César'
        ]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Platillos más visitados en el año 2021'
        }
    }
};

// Grafica de barra 2
var barChartData2 = {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    datasets: [{
        label: 'Albóndigas a la boloñesa',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [
            2,
            1
        ]
    }, {
        label: 'Carlota de chocolate',
        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [
            0,
            2
        ]
    }]
};


window.onload = function() {
    // Grafica de usuarios
    if (document.getElementById('graficaUnoUsuario')) {

        // Grafica de pastel usuarios
        var ctx1 = document.getElementById('graficaUnoUsuario').getContext('2d');
        window.myPie = new Chart(ctx1, configUsuarios);
    }

    // Graficas de platillos
    if (document.getElementById('graficaUnoPlatillo')) {

        /* Grafica de barra1 */
        var ctx2 = document.getElementById('graficaUnoPlatillo').getContext('2d');
        window.myBar = new Chart(ctx2, {
            type: 'bar',
            data: barChartData1,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Tipo de platillos más visitados en el año 2021'
                }
            }
        });

        /* Grafica de pastel */
        var ctx3 = document.getElementById('graficaDosPlatillo').getContext('2d');
        window.myPie = new Chart(ctx3, configPlatillos);

        /* Grafica de barra2 */
        var ctx4 = document.getElementById('graficaTresPlatillo').getContext('2d');
        window.myBar = new Chart(ctx4, {
            type: 'bar',
            data: barChartData2,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Platillos más descargados en el año 2021'
                }
            }
        });
    }
};