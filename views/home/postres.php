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
        <div class="container container-recipes">
            <!-- Section postre-->
            <section class="mb-5">
                <div class="header-title mb-4">
                    <h4 class="text-center">
                        Postres
                    </h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Carlota de chocolate</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Guadalupe Cristel</p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Arroz con leche</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Guadalupe Cristel</p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Alfajores</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Jesus Abelardo </p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <!-- Borrar lo de abajo-->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Carlota de chocolate</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Guadalupe Cristel</p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Arroz con leche</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Guadalupe Cristel</p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Alfajores</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Jesus Abelardo </p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Carlota de chocolate</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Guadalupe Cristel</p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Arroz con leche</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Guadalupe Cristel</p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <span class="badge badge-danger">Nuevo</span>
                            <img class="card-img-top" src="resources/img/fondo.jpg" alt="postre" width="100%">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Alfajores</h5>
                                    <small class="card-subtitle color-red">Postre</small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> Jesus Abelardo </p>
                                <a href="?page=platillo" class="btn btn-outline-primary btn-block">Ver receta</a>
                            </div>
                        </div>
                    </div>
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