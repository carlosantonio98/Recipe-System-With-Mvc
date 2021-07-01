<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 3) {
    header('location:?page=login');
}
?>

<?php include $templates_header_cliente ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_cliente ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container text-center">
            <h2 class="mb-4"><b><span class="color-black">Menu Cliente</span></b></h2>
            <div class="menu row m-0 p-0">
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <a href="?page=form-create-platillo-cliente">
                        <div class="card w-100">
                            <i class="fas fa-utensils p-5"></i>
                            <div class="card-body">
                                <div class="card-subtitle">
                                    <p>Crear nueva receta</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <a href="?page=mis-platillos-cliente">
                        <div class="card w-100">
                            <i class="fas fa-clipboard-list p-5"></i>
                            <div class="card-body">
                                <div class="card-subtitle">
                                    <p>Mis recetas</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
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