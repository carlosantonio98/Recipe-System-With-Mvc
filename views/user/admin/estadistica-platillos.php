<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 1) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_admin ?>
<?php
    $platillo->getDataGraficaBarra1('2021');
    $dataBarra1 = [];                    
    while($row = $platillo->next()) {
        $dataBarra1[] = $row;
    }

    $platillo->getDataGraficaBarra2('2021');
    $dataBarra2 = [];                    
    while($row = $platillo->next()) {
        $dataBarra2[] = $row;
    }
?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_admin ?>

    <!-- Modal print -->
    <div class="modal fade" id="print-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5>Impresion de graficas y estadisticas de los platillos</h5>
                </div>
                <div class="modal-body">
                    <iframe id="iframe-modal" src="" style="zoom:0.60" width="99.6%" height="750" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin page content -->
    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h2 class="m-0 p-0"><b><span class="color-red">Estadistica</span> de platillos</b></h2>
                </div>

                <!-- Filtro -->
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <form action="destino.php" method="GET">
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-3 mb-md-0">
                                <div class="form-row">
                                    <div class="col-4 d-flex align-items-center">
                                        <label for="year" class="m-0 p-0">Filtrar por año</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control custom-select" id="year">
                                            <option disabled selected>Seleccione un año</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-success btn-block"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabla de tipo de platillos mas Visitados -->
            <div class="table-responsive mt-4">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center bg-dark text-white">Tabla de tipo de platillos más visitados en el año 2021</th>
                        </tr>
                        <tr>
                            <th>Categoria</th>
                            <th>Numero de visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $platillo->getEstadisticaTipoPlatilloMasVisitado('2021');
                        while ($row = $platillo->next()) :
                        ?>
                            <tr>
                                <td><?= $row->Categoria ?></td>
                                <td><?= $row->Visitas ?></td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>

            <canvas id="graficaUnoPlatillo" class="grafica w-100"></canvas>

            <!-- Tabla del platillos mas Visitado -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center bg-dark text-white">Tabla de platillos más visitados en el año 2021</th>
                        </tr>
                        <tr>
                            <th>Platillo</th>
                            <th>Categoria</th>
                            <th>Numero de visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $labelsGrafica2 = [];
                        $numeroPlatillosVisitados = [];
                        $platillo->getEstadisticaPlatillosMasVisitados('2021');
                        while ($row = $platillo->next()) :
                        ?>
                            <tr>
                                <td><?= $row->Platillo ?></td>
                                <td><?= $row->Categoria ?></td>
                                <td><?= $row->NumeroVisita ?></td>
                            </tr>
                        <?php
                            $labelsGrafica2[]  = $row->Platillo;
                            $numeroPlatillosVisitados[] = $row->NumeroVisita;
                        endwhile; ?>
                    </tbody>
                </table>
            </div>

            <canvas id="graficaDosPlatillo" class="grafica w-100"></canvas>

            <!-- Tabla del platillos mas descargados -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center bg-dark text-white">Tabla de platillos más descargados en el año 2021</th>
                        </tr>
                        <tr>
                            <th>Platillo</th>
                            <th>Categoria</th>
                            <th>Numero de descargas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $platillo->getEstadisticaPlatillosMasDescargados('2021');
                        while ($row = $platillo->next()) :
                        ?>
                            <tr>
                                <td><?= $row->Platillo ?></td>
                                <td><?= $row->Categoria ?></td>
                                <td><?= $row->NumeroDescarga ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <canvas id="graficaTresPlatillo" class="grafica w-100"></canvas>

            <div class="text-center mb-4">
                <a href="?page=menu-admin" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="text-center">
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                </div>
                <span class="text-muted">Copyright &copy; Finder Food 2021</span>
            </div>
        </div>
    </footer>
    
   

    <?php include $templates_footer_admin ?>
    <script>
        // Grafica de barra 1
        var color = Chart.helpers.color;
        var barChartData1 = {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                <?php
                function returnValue($position, $value, $cadena) {
                    $valueString = explode(',', $cadena);
                    $valueString[$position-1] = $value;
                    $valueString = implode(',', $valueString);
                    return $valueString;
                }

                for($i = 0; $i < sizeof($dataBarra1); $i++) {

                    switch($dataBarra1[$i]->Mes) {
                        case 1:
                            $valueB1 = $dataBarra1[$i]->Visitas . ',0,0,0,0,0,0,0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 2:
                            $valueB1 = '0,' . $dataBarra1[$i]->Visitas .',0,0,0,0,0,0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 3:
                            $valueB1 = '0,0,' . $dataBarra1[$i]->Visitas .',0,0,0,0,0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 4:
                            $valueB1 = '0,0,0,' . $dataBarra1[$i]->Visitas .',0,0,0,0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 5:
                            $valueB1 = '0,0,0,0,' . $dataBarra1[$i]->Visitas .',0,0,0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 6:
                            $valueB1 = '0,0,0,0,0,' . $dataBarra1[$i]->Visitas .',0,0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 7:
                            $valueB1 = '0,0,0,0,0,0,' . $dataBarra1[$i]->Visitas .',0,0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 8:
                            $valueB1 = '0,0,0,0,0,0,0,' . $dataBarra1[$i]->Visitas .',0,0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 9:
                            $valueB1 = '0,0,0,0,0,0,0,0,' . $dataBarra1[$i]->Visitas .',0,0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 10:
                            $valueB1 = '0,0,0,0,0,0,0,0,0,' . $dataBarra1[$i]->Visitas .',0,0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 11:
                            $valueB1 = '0,0,0,0,0,0,0,0,0,0,' . $dataBarra1[$i]->Visitas .',0';
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                        case 12:
                            $valueB1 = '0,0,0,0,0,0,0,0,0,0,0,' . $dataBarra1[$i]->Visitas;
                            if($dataBarra1[$i]->Categoria == $itemTemp->Categoria) {
                                $valueB1 = returnValue($dataBarra1[$i]->Mes, $dataBarra1[$i]->Visitas, $valueB1Temp);
                            }
                            break;
                    }
                    
                    $itemTemp = $dataBarra1[$i];
                    $valueB1Temp = $valueB1;

                    if(isset($itemTemp->Categoria) && ($itemTemp->Categoria != $dataBarra1[$i+1]->Categoria)) {
                        $color = "rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ")";
                        $json = "{
                            label: '$itemTemp->Categoria',
                            backgroundColor: color('$color').alpha(0.5).rgbString(),
                            borderColor: color('$color'),
                            borderWidth: 1,
                            data: [
                                $valueB1Temp
                            ]
                        },";
                        echo $json;
                    }
                }
                ?>
            ]
        };

        // Grafica de pastel platillos
        var configPlatillos = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        <?= implode(',', $numeroPlatillosVisitados); ?>
                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                        window.chartColors.cyan,
                        window.chartColors.purple,
                        window.chartColors.pink,
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    <?php
                    foreach ($labelsGrafica2 as $item) {
                        echo "'" . $item . "',";
                    }
                    ?>
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
            datasets: [
                <?php
                function returnValue2($position, $value, $cadena) {
                    $valueString = explode(',', $cadena);
                    $valueString[$position-1] = $value;
                    $valueString = implode(',', $valueString);
                    return $valueString;
                }

                for($i = 0; $i < sizeof($dataBarra2); $i++) {

                    switch($dataBarra2[$i]->Mes) {
                        case 1:
                            $valueB2 = $dataBarra2[$i]->Descargas . ',0,0,0,0,0,0,0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 2:
                            $valueB2 = '0,' . $dataBarra2[$i]->Descargas .',0,0,0,0,0,0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 3:
                            $valueB2 = '0,0,' . $dataBarra2[$i]->Descargas .',0,0,0,0,0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 4:
                            $valueB2 = '0,0,0,' . $dataBarra2[$i]->Descargas .',0,0,0,0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 5:
                            $valueB2 = '0,0,0,0,' . $dataBarra2[$i]->Descargas .',0,0,0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 6:
                            $valueB2 = '0,0,0,0,0,' . $dataBarra2[$i]->Descargas .',0,0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 7:
                            $valueB2 = '0,0,0,0,0,0,' . $dataBarra2[$i]->Descargas .',0,0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 8:
                            $valueB2 = '0,0,0,0,0,0,0,' . $dataBarra2[$i]->Descargas .',0,0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 9:
                            $valueB2 = '0,0,0,0,0,0,0,0,' . $dataBarra2[$i]->Descargas .',0,0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 10:
                            $valueB2 = '0,0,0,0,0,0,0,0,0,' . $dataBarra2[$i]->Descargas .',0,0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 11:
                            $valueB2 = '0,0,0,0,0,0,0,0,0,0,' . $dataBarra2[$i]->Descargas .',0';
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                        case 12:
                            $valueB2 = '0,0,0,0,0,0,0,0,0,0,0,' . $dataBarra2[$i]->Descargas;
                            if($dataBarra2[$i]->Platillo == $itemTemp2->Platillo) {
                                $valueB2 = returnValue2($dataBarra2[$i]->Mes, $dataBarra2[$i]->Descargas, $valueB2Temp);
                            }
                            break;
                    }
                    
                    $itemTemp2 = $dataBarra2[$i];
                    $valueB2Temp = $valueB2;

                    if(isset($itemTemp2->Platillo) && ($itemTemp2->Platillo != $dataBarra2[$i+1]->Platillo)) {
                        $color = "rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ")";
                        $json = "{
                            label: '$itemTemp2->Platillo',
                            backgroundColor: color('$color').alpha(0.5).rgbString(),
                            borderColor: color('$color'),
                            borderWidth: 1,
                            data: [
                                $valueB2Temp
                            ]
                        },";
                        echo $json;
                    }
                }
                ?>
            ]
        };


        window.onload = function() {
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
    </script>
</body>

</html>