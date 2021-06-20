<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_admin ?>

<?php
    $id = $_GET['id'];
    $platillo->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_admin ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container">
            <h2><b><span class="color-red">Platillo</span> #<?= $platillo->data->IdPlatillo ?></b></h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Platillo</th>
                        <td><?= $platillo->data->Platillo ?></td>
                    </tr>
                    <tr>
                        <th>Imagen</th>
                        <td><img src="<?= '/proyecto/resources/img/platillos/' . $platillo->data->ImagenPlatillo; ?>" alt="imagen del platillo" width="100px" height="100px" style="object-fit: cover;"></td>
                    </tr>
                    <tr>
                        <th>Ingrediente</th>
                        <td><?= $platillo->data->Ingrediente ?></td>
                    </tr>
                    <tr>
                        <th>Preparación</th>
                        <td><?= $platillo->data->Preparacion ?></td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td><?= $platillo->data->FechaRegistro ?></td>
                    </tr>
                    <tr>
                        <th>Hora</th>
                        <td><?= $platillo->data->HoraRegistro ?></td>
                    </tr>
                    <tr>
                        <th>Categoria</th>
                        <td><?= $platillo->data->Categoria ?></td>
                    </tr>
                    <tr>
                        <th>Seguimiento</th>
                        <td><?= $platillo->data->Seguimiento ?></td>
                    </tr>
                    <tr>
                        <th>Usuario</th>
                        <td><?= $platillo->data->NombreUsuario ?></td>
                    </tr>
                </table>
            </div>

            <a href="?page=listado-platillos" class="btn btn-primary mb-3">Regresar</a>
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
</body>

</html>