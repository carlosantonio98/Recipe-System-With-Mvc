<?php 
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('location:?page=login');
    }
    
    if ($_SESSION['usuario']->FkRol == 1) {
        include $templates_header_admin;
    } else if ($_SESSION['usuario']->FkRol == 2) {
        include $templates_header_empleado;
    } else if ($_SESSION['usuario']->FkRol == 3) {
        include $templates_header_cliente;
    }
?>

<?php include $base_dir . "/models/model.platillo.php" ?> 
<?php include $base_dir . "/models/model.visita-platillo.php" ?> 
<?php
    $id = $_GET['id'];
    $visitaPlatillo->createVisit($id);
    $platillo->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php 
        if ($_SESSION['usuario']->FkRol == 1) {
            include $templates_navbar_admin;
        } else if ($_SESSION['usuario']->FkRol == 2) {
            include $templates_navbar_empleado;
        } else if ($_SESSION['usuario']->FkRol == 3) {
            include $templates_navbar_cliente;
        }
    ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container container-recipe">
            <div class="header-recipe row mb-4">
                <div class="col-12 col-md-8">
                    <img src="resources/img/platillos/<?= $platillo->data->ImagenPlatillo ?>" alt="albondigas a la boloñesa">
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <small class="color-red"><?= $platillo->data->Categoria ?></small>
                    <h3>Como preparar <?= $platillo->data->Platillo ?></h3>

                    <div class="dates row text-center mb-4">
                        <div class="user col-4">
                            <i class="fas fa-user circle-shadow"></i>
                            <small class="d-block mt-2"><span class="text-muted">Por</span> <?= $platillo->data->NombreUsuario ?></small>
                        </div>
                        <div class="date col-4">
                            <i class="fas fa-calendar-alt circle-shadow"></i>
                            <small class="text-muted d-block mt-2"><?= $platillo->data->FechaRegistro ?></small>
                        </div>

                        <div class="time col-4">
                            <i class="fas fa-clock circle-shadow"></i>
                            <small class="text-muted d-block mt-2"><?= $platillo->data->HoraRegistro ?></small>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="row">
                        <div class="col-6 p-1 m-0">
                            <a href="?page=platillo-pdf&id=<?= $platillo->data->IdPlatillo ?>" class="btn btn-success w-100"><i class="fas fa-file-download"></i> Descargar</a>
                        </div>
                        <div class="col-6 p-1 m-0">
                            <a href="?page=inicio" class="btn btn-link w-100"> Regresar al inicio</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-recipe row mb-5">
                <div class="col-12">
                    <h6>
                        Ingredientes:
                    </h6>
                    <p><?= $platillo->data->Ingrediente ?></p>
                </div>
                <div class="col-12">
                    <h6>
                        Preparación:
                    </h6>
                    <p><?= $platillo->data->Preparacion ?></p>
                </div>
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

    <?php 
        if ($_SESSION['usuario']->FkRol == 1) {
            include $templates_footer_admin;
        } else if ($_SESSION['usuario']->FkRol == 2) {
            include $templates_footer_empleado;
        } else if ($_SESSION['usuario']->FkRol == 3) {
            include $templates_footer_cliente;
        }
    ?>
</body>

</html>