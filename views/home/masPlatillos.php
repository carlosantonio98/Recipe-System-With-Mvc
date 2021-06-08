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
    
    
    include_once('./models/model.platillo.php');
    $idCategoria = $_GET['id'];
    $platillo->getWhere('FkCategoria=' . $idCategoria);

    // creando variable para el titulo
    $titulo = '';
    switch($idCategoria) {
        case 1:
            $titulo = 'comidas';
            break;
        case 2:
            $titulo = 'postres';
            break;
        case 3:
            $titulo = 'desayunos';
            break;
        case 4:
            $titulo = 'ensaladas';
            break;
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
            <!-- Section comida-->
            <section class="mb-5">
                <div class="header-title mb-4">
                    <h4 class="text-center">
                        Mas recetas de <?= $titulo ?>
                    </h4>
                </div>
                <div class="row">

                    <?php while($row = $platillo->next()): ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card w-100 text-center" style="width: 18rem;">
                            <img class="card-img-top" src="resources/img/platillos/<?= $row->ImagenPlatillo ?>" alt="<?= $row->Categoria ?>">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="card-title mb-0"><?= $row->Platillo ?></h5>
                                    <small class="card-subtitle color-red"><?= $row->Categoria ?></small>
                                </div>
                                <p class="card-text"><span class="text-muted">escrito por</span> <?= $row->NombreUsuario ?></p>
                                <a href="?page=platillo&id=<?= $row->IdPlatillo ?>" class="btn btn-outline-primary btn-block">Ver receta</a>
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