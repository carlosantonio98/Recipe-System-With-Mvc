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
        <div class="container-search fondo mb-4">
            <form>
                <div class="form-row m-0 p-0">
                    <div class="col-10 col-md-6 m-auto search">
                        <input type="text" class="form-control p-3 rounded-0" id="search" placeholder="¿Qué quieres cocinar hoy?">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="col-10 col-md-7 m-auto">
                        <div class="d-flex flex-wrap justify-content-center">
                            <a href="#" class="btn btn-outline-white m-2">Comida</a>
                            <a href="#" class="btn btn-outline-white m-2">Postre</a>
                            <a href="#" class="btn btn-outline-white m-2">Desayuno</a>
                            <a href="#" class="btn btn-outline-white m-2">Ensalada</a>
                            <a href="#" class="btn btn-outline-white m-2">Botana</a>
                            <a href="#" class="btn btn-outline-white m-2">Entrada</a>
                            <a href="#" class="btn btn-outline-white m-2">Sopa</a>
                            <a href="#" class="btn btn-outline-white m-2">Guarnisión</a>
                            <a href="#" class="btn btn-outline-white m-2">Bebida</a>
                            <a href="#" class="btn btn-outline-white m-2">Papilla</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-recipes">
            <div class="container">
                <!-- Section comida-->
                <section class="mb-5">
                    <div class="header-title mb-4">
                        <h4 class="text-center">
                            Comidas
                        </h4>
                    </div>
                    <div class="row">

                        <?php foreach ($platillosCat1 as $item) : ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card w-100 text-center" style="width: 18rem;">
                                    <span class="badge badge-danger">Nuevo</span>
                                    <img class="card-img-top" src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Comida">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="card-title mb-0"><?= $item->Platillo ?></h5>
                                            <small class="card-subtitle color-red"><?= $item->Categoria ?></small>
                                        </div>
                                        <p class="card-text"><span class="text-muted">escrito por</span> <?= $item->NombreUsuario ?></p>
                                        <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-outline-primary btn-block">Ver receta</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="footer-more text-center">
                        <a href="?page=mas-platillos&id=1" class="btn btn-red">Ver más</a>
                    </div>
                </section>

                <!-- Section postre-->
                <section class="mb-5">
                    <div class="header-title mb-4">
                        <h4 class="text-center">
                            Postres
                        </h4>
                    </div>
                    <div class="row">

                        <?php foreach ($platillosCat2 as $item) : ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card w-100 text-center" style="width: 18rem;">
                                    <span class="badge badge-danger">Nuevo</span>
                                    <img class="card-img-top" src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Postre">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="card-title mb-0"><?= $item->Platillo ?></h5>
                                            <small class="card-subtitle color-red"><?= $item->Categoria ?></small>
                                        </div>
                                        <p class="card-text"><span class="text-muted">escrito por</span> <?= $item->NombreUsuario ?></p>
                                        <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-outline-primary btn-block">Ver receta</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="footer-more text-center">
                        <a href="?page=mas-platillos&id=2" class="btn btn-red">Ver más</a>
                    </div>
                </section>

                <!-- Section desayunos-->
                <section class="mb-5">
                    <div class="header-title mb-4">
                        <h4 class="text-center">
                            Desayunos
                        </h4>
                    </div>
                    <div class="row">

                        <?php foreach ($platillosCat3 as $item) : ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card w-100 text-center" style="width: 18rem;">
                                    <span class="badge badge-danger">Nuevo</span>
                                    <img class="card-img-top" src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Desayuno">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="card-title mb-0"><?= $item->Platillo ?></h5>
                                            <small class="card-subtitle color-red"><?= $item->Categoria ?></small>
                                        </div>
                                        <p class="card-text"><span class="text-muted">escrito por</span> <?= $item->NombreUsuario ?></p>
                                        <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-outline-primary btn-block">Ver receta</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="footer-more text-center">
                        <a href="?page=mas-platillos&id=3" class="btn btn-red">Ver más</a>
                    </div>
                </section>

                <!-- Section ensalada-->
                <section class="mb-5">
                    <div class="header-title mb-4">
                        <h4 class="text-center">
                            Ensaladas
                        </h4>
                    </div>
                    <div class="row">

                        <?php foreach ($platillosCat4 as $item) : ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card w-100 text-center" style="width: 18rem;">
                                    <span class="badge badge-danger">Nuevo</span>
                                    <img class="card-img-top" src="resources/img/platillos/<?= $item->ImagenPlatillo ?>" alt="Ensalada">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="card-title mb-0"><?= $item->Platillo ?></h5>
                                            <small class="card-subtitle color-red"><?= $item->Categoria ?></small>
                                        </div>
                                        <p class="card-text"><span class="text-muted">escrito por</span> <?= $item->NombreUsuario ?></p>
                                        <a href="?page=platillo&id=<?= $item->IdPlatillo ?>" class="btn btn-outline-primary btn-block">Ver receta</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="footer-more text-center">
                        <a href="?page=mas-platillos&id=4" class="btn btn-red">Ver más</a>
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