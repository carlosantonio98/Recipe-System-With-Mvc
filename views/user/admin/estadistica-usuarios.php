<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.usuario.php" ?>
<?Php 
    $usuario->getEstadisticaUsuariosRegistrados();
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
                    <h5>Impresion de graficas y estadisticas de usuarios</h5>
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
            <h2 class="m-0 p-0"><b><span class="color-red">Estadistica</span> de usuarios por pais</b></h2>

            <!-- Table de datos -->
            <div class="table-responsive mt-4">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center bg-dark text-white">Tabla de usuarios registrados por pais</th>
                        </tr>
                        <tr>
                            <th>Paises</th>
                            <th>Usuarios registrados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $paises = [];
                            $numeroUsuariosRegistrados = [];
                            while($row = $usuario->next()): 
                        ?>
                        <tr>
                            <td><?= $row->Pais ?></td>
                            <td><?= $row->Cantidad ?></td>
                        </tr>
                        <?php 
                            $paises[] = $row->Pais;
                            $numeroUsuariosRegistrados[] = $row->Cantidad;
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Grafica -->
            <canvas id="graficaUnoUsuario" class="grafica w-100"></canvas>

            <div class="text-center mb-4">
                <a href="#" class="btn btn-primary" data-src="impresion4.pdf" data-toggle="modal" data-target="#print-modal"><i class="fas fa-print"></i> Imprimir</a>
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
    <script>
        // Grafica de pastel usuarios
        var configUsuarios = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        <?= implode(',', $numeroUsuariosRegistrados) ?>
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
                        foreach ($paises as $pais) {
                            echo "'" . $pais . "',";
                        }
                    ?>
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

        window.onload = function() {
            // Grafica de usuarios
            if (document.getElementById('graficaUnoUsuario')) {

                // Grafica de pastel usuarios
                var ctx1 = document.getElementById('graficaUnoUsuario').getContext('2d');
                window.myPie = new Chart(ctx1, configUsuarios);
            }
        };
    </script>
</body>

</html>