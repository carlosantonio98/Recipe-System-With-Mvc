<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>

<?php include $templates_header_admin ?>

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
                        <tr>
                            <td>Postre</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Comida</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td>Botana</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Ensalada</td>
                            <td>5</td>
                        </tr>
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
                        <tr>
                            <td>Albóndigas a la boloñesa</td>
                            <td>Comida</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Carlota de chocolate</td>
                            <td>Postre</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Botana de jamón serrano</td>
                            <td>Botana</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Ensalada César</td>
                            <td>Ensalada</td>
                            <td>2</td>
                        </tr>
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
                        <tr>
                            <td>Albóndigas a la boloñesa</td>
                            <td>Comida</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Carlota de chocolate</td>
                            <td>Postre</td>
                            <td>2</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <canvas id="graficaTresPlatillo" class="grafica w-100"></canvas>

            <div class="text-center mb-4">
                <a href="#" class="btn btn-primary" data-src="impresion3.pdf" data-toggle="modal" data-target="#print-modal"><i class="fas fa-print"></i> Imprimir</a>
                <a href="?page=menu-admin" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="text-center">
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-red mx-2 rounded-circle"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="btn btn-outline-red mx-2 rounded-circle"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-red mx-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                </div>
                <span class="text-muted">Copyright &copy; Finder Food 2021</span>
            </div>
        </div>
    </footer>

    <?php include $templates_footer_admin ?>
</body>

</html>