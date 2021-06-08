<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 2) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_empleado ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_empleado ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container container-recipes">
            <!-- Section mis platillos -->
            <section class="mb-5">
                <div class="header-title mb-4">
                    <h4 class="text-center">
                        Mis platillos
                    </h4>
                </div>
                <div class="row">
                    <?php 
                        $condition = 'FkUsuario='.$_SESSION['usuario']->IdUsuario;
                        $platillo->getWhere($condition);

                        while($row = $platillo->next()):
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <!-- Badget -->
                            <?php if($row->FkSeguimiento == 1): ?>
                                <span class="badge bg-warning"><?= $row->Seguimiento ?></span>
                            <?php elseif($row->FkSeguimiento == 2): ?>
                                <span class="badge bg-success"><?= $row->Seguimiento ?></span>
                            <?php elseif($row->FkSeguimiento == 3): ?>
                                <span class="badge bg-danger"><?= $row->Seguimiento ?></span>
                            <?php endif; ?>

                            <img class="card-img-top" src="resources/img/platillos/<?= $row->ImagenPlatillo ?>" alt="platillo">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0"><?= $row->Platillo ?></h5>
                                    <small class="card-subtitle color-red"><?= $row->Categoria ?></small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> <?= $row->NombreUsuario ?></p>
                                <a href="?page=platillo-empleado&id=<?= $row->IdPlatillo ?>" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>
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

    <?php include $templates_footer_empleado ?>
</body>

</html>