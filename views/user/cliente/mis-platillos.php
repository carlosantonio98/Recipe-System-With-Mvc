<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 3) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_cliente ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_cliente ?>

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
                    $condition = 'FkUsuario=' . $_SESSION['usuario']->IdUsuario;
                    $platillo->getWhere($condition);

                    while ($row = $platillo->next()) :
                    ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 mt-lg-dish">
                            <div class="card w-100 d-flex justify-content-center align-items-center" style="width: 18rem;">
                                <img src="resources/img/platillos/<?= $row->ImagenPlatillo ?>" alt="<?= $row->Categoria ?>">
                                <div class="card-body">
                                    <h6 class="card-title mb-2"><?= $row->Platillo ?></h6>
                                    <p class="p-0 m-0 mb-1 text-muted"><i class="fas fa-user"></i> <?= $row->NombreUsuario ?></p>
                                    <p class="p-0 m-0 mb-2"><i class="fas fa-quote-left"></i> <?= $row->Categoria ?></p>
                                    <a href="?page=platillo-cliente&id=<?= $row->IdPlatillo ?>" class="btn btn-view-more"><i class="fas fa-eye"></i></a>
                                    <div class="badget-category">
                                        <!-- Badget -->
                                        <?php if ($row->FkSeguimiento == 1) : ?>
                                            <span class="badge bg-warning"><?= $row->Seguimiento ?></span>
                                        <?php elseif ($row->FkSeguimiento == 2) : ?>
                                            <span class="badge bg-success"><?= $row->Seguimiento ?></span>
                                        <?php elseif ($row->FkSeguimiento == 3) : ?>
                                            <span class="badge bg-danger"><?= $row->Seguimiento ?></span>
                                        <?php endif; ?>
                                    </div>
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
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                </div>
                <span class="text-muted">Copyright &copy; Finder Food 2021</span>
            </div>
        </div>
    </footer>

    <?php include $templates_footer_cliente ?>
</body>

</html>