<?php
session_start();
if ($_SESSION['usuario']->FkRol == 1) {
    include $templates_header_admin;
} else if ($_SESSION['usuario']->FkRol == 2) {
    include $templates_header_empleado;
} else if ($_SESSION['usuario']->FkRol == 3) {
    include $templates_header_cliente;
} else {
    include $templates_header;
}

// Implementando los modelos
include_once('./models/model.platillo.php');

// Cargando las recetas
function getDishes($platillo, $idCategorias, $delimitador)
{
    $platillos = [];
    $platillo->getDelimiter('FkCategoria=' . $idCategorias . ' AND FkSeguimiento=2', '', $delimitador);
    while ($row = $platillo->next()) {
        $platillos[] = $row;
    }
    return $platillos;
}

$platillosCat1 = getDishes($platillo, 1, 3); // comida
$platillosCat2 = getDishes($platillo, 2, 3); // postre
$platillosCat3 = getDishes($platillo, 3, 3); // desayuno
$platillosCat4 = getDishes($platillo, 4, 3); // ensalada
?>

<body class="d-flex flex-column h-100">
    <?php
    if ($_SESSION['usuario']->FkRol == 1) {
        include $templates_navbar_admin;
    } else if ($_SESSION['usuario']->FkRol == 2) {
        include $templates_navbar_empleado;
    } else if ($_SESSION['usuario']->FkRol == 3) {
        include $templates_navbar_cliente;
    } else {
        include $templates_navbar;
    }
    ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container-search mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-6 d-flex align-items-center pr-5">
                        <div class="content-description">
                            <h1 class="title-search">Deliciosas Recetas Estan Esperando Por TÍ</h1>
                            <a href="#" class="btn btn-dark-custom px-3 mt-4 mb-5 d-flex justify-content-between align-items-center"><span>Ver Más</span><i class="fas fa-long-arrow-alt-right"></i></a>
                            <div class="options d-flex align-items-center">
                                <a href="#" class="btn"><i class="fas fa-hamburger"></i></a>
                                <a href="#" class="btn ml-4"><i class="fas fa-stroopwafel"></i></a>
                                <a href="#" class="btn ml-4"><i class="fas fa-egg"></i></a>
                                <a href="#" class="btn ml-4"><i class="fas fa-carrot"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="bg-dish"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-recipes">
            <div class="container">
                <!-- Section comida-->
                <section>
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-12 col-lg-8">
                            <div class="row">

                                <?php foreach ($platillosCat1 as $item) : ?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4 mt-dish">
                                        <div class="card w-100 d-flex justify-content-center align-items-center" style="width: 18rem;">
                                            <img src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Desayuno">
                                            <div class="card-body">
                                                <h6 class="card-title mb-2"><?= $item->Platillo ?></h6>
                                                <p class="p-0 m-0 mb-1 text-muted"><i class="fas fa-user"></i> <?= $item->NombreUsuario ?></p>
                                                <p class="p-0 m-0 mb-2"><i class="fas fa-quote-left"></i> <?= $item->Categoria ?></p>
                                                <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-view-more"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h2 class="title-category">Comida</h2>
                            <p class="description-category">Nuestro apartado de comida contiene las comidas mas populares y queridos por los usuarios, aprende a crear des una galleta hasta hornear un pastel</p>
                            <div class="footer-more text-center">
                                <a href="?page=mas-platillos&id=1" class="btn btn-dark-custom">Ver más</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section postre-->
                <section>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <h2 class="title-category">Postre</h2>
                            <p class="description-category">Nuestro apartado de postres contiene los postres mas populares y queridos por los usuarios, aprende a crear des una galleta hasta hornear un pastel</p>
                            <div class="footer-more text-center">
                                <a href="?page=mas-platillos&id=2" class="btn btn-dark-custom">Ver más</a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">

                                <?php foreach ($platillosCat2 as $item) : ?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4 mt-dish">
                                        <div class="card w-100 d-flex justify-content-center align-items-center" style="width: 18rem;">
                                            <img src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Postre">
                                            <div class="card-body">
                                                <h6 class="card-title mb-2"><?= $item->Platillo ?></h6>
                                                <p class="p-0 m-0 mb-1 text-muted"><i class="fas fa-user"></i> <?= $item->NombreUsuario ?></p>
                                                <p class="p-0 m-0 mb-2"><i class="fas fa-quote-left"></i> <?= $item->Categoria ?></p>
                                                <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-view-more"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section desayunos-->
                <section>
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-12 col-lg-8">
                            <div class="row">

                                <?php foreach ($platillosCat3 as $item) : ?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4 mt-dish">
                                        <div class="card w-100 d-flex justify-content-center align-items-center" style="width: 18rem;">
                                            <img src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Desayuno">
                                            <div class="card-body">
                                                <h6 class="card-title mb-2"><?= $item->Platillo ?></h6>
                                                <p class="p-0 m-0 mb-1 text-muted"><i class="fas fa-user"></i> <?= $item->NombreUsuario ?></p>
                                                <p class="p-0 m-0 mb-2"><i class="fas fa-quote-left"></i> <?= $item->Categoria ?></p>
                                                <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-view-more"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h2 class="title-category">Desayuno</h2>
                            <p class="description-category">Nuestro apartado de desayuno contiene los desayunos mas populares y queridos por los usuarios, aprende a crear des una galleta hasta hornear un pastel</p>
                            <div class="footer-more text-center">
                                <a href="?page=mas-platillos&id=3" class="btn btn-dark-custom">Ver más</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section ensalada-->
                <section>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <h2 class="title-category">Ensalada</h2>
                            <p class="description-category">Nuestro apartado de ensalada contiene las ensaladas mas populares y queridos por los usuarios, aprende a crear des una galleta hasta hornear un pastel</p>
                            <div class="footer-more text-center">
                                <a href="?page=mas-platillos&id=4" class="btn btn-dark-custom">Ver más</a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">

                                <?php foreach ($platillosCat4 as $item) : ?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4 mt-dish">
                                        <div class="card w-100 d-flex justify-content-center align-items-center" style="width: 18rem;">
                                            <img src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Postre">
                                            <div class="card-body">
                                                <h6 class="card-title mb-2"><?= $item->Platillo ?></h6>
                                                <p class="p-0 m-0 mb-1 text-muted"><i class="fas fa-user"></i> <?= $item->NombreUsuario ?></p>
                                                <p class="p-0 m-0 mb-2"><i class="fas fa-quote-left"></i> <?= $item->Categoria ?></p>
                                                <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-view-more"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </section>
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
    } else {
        include $templates_footer;
    }
    ?>
</body>

</html>