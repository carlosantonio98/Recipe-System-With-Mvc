<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.categoria.php" ?>
<?php include $templates_header_admin ?>

<?php
    $id = $_GET['id'];
    $categoria->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_admin ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container">
            <h2><b><span class="color-red">Categoria</span> #<?= $categoria->data->IdCategoria ?></b></h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Tipo</th>
                        <td><?= $categoria->data->Categoria ?></td>
                    </tr>
                </table>
            </div>

            <a href="?page=listado-categorias" class="btn btn-primary mb-3">Regresar</a>
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