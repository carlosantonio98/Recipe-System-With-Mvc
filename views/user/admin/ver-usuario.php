<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.usuario.php" ?>
<?php include $templates_header_admin ?>

<?php
    $id = $_GET['id'];
    $usuario->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_admin ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container">
            <h2><b><span class="color-red">Usuario</span> #<?= $usuario->data->IdUsuario ?></b></h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <td><?= $usuario->data->NombreUsuario ?></td>
                    </tr>
                    <tr>
                        <th>Apellido paterno</th>
                        <td><?= $usuario->data->Paterno ?></td>
                    </tr>
                    <tr>
                        <th>Apellido materno</th>
                        <td><?= $usuario->data->Materno ?></td>
                    </tr>
                    <tr>
                        <th>Nacimiento</th>
                        <td><?= $usuario->data->Nacimiento ?></td>
                    </tr>
                    <tr>
                        <th>Pais</th>
                        <td><?= $usuario->data->Pais ?></td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><?= $usuario->data->Correo ?></td>
                    </tr>
                    <tr>
                        <th>Rol</th>
                        <td><?= $usuario->data->Rol ?></td>
                    </tr>
                </table>
            </div>

            <a href="?page=listado-usuarios" class="btn btn-primary mb-3">Regresar</a>
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

    <?php include $templates_footer_admin ?>
</body>

</html>