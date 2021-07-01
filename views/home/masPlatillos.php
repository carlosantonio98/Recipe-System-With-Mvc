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
include_once('./models/model.categoria.php');

$idCategoria = $_GET['id'];
$platillo->getWhere('FkCategoria=' . $idCategoria . ' AND FkSeguimiento=2');

$categoria->getOne($idCategoria);
$titulo = $categoria->data->Categoria;
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
                        Más recetas de <?= $titulo ?>
                    </h4>
                </div>
                <div class="row">

                    <?php 
                        $delay = 50; 
                        $duration = 1000; 

                        while ($row = $platillo->next()) :
                            $delay += 100; 
                            $duration += 150; 
                    ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 mt-lg-dish" data-aos="fade-down" data-aos-offset="200" data-aos-delay="<?= $delay ?>" data-aos-duration="<?=  $duration ?>">
                            <div class="card w-100 d-flex justify-content-center align-items-center" style="width: 18rem;">
                                <img src="resources/img/platillos/<?= $row->ImagenPlatillo ?>" alt="<?= $row->Categoria ?>">
                                <div class="card-body">
                                    <h6 class="card-title mb-2"><?= $row->Platillo ?></h6>
                                    <p class="p-0 m-0 mb-1 text-muted"><i class="fas fa-user"></i> <?= $row->NombreUsuario ?></p>
                                    <p class="p-0 m-0 mb-2"><i class="fas fa-quote-left"></i> <?= $row->Categoria ?></p>
                                    <a href="?page=platillo&id=<?= $row->IdPlatillo ?>" class="btn btn-view-more"><i class="fas fa-eye"></i></a>
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