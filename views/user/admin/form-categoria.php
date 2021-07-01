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
    <main role="main" class="mb-4">
        <div class="container">

            <?php if($_GET['page'] == 'form-create-categoria'): ?>
                <h2><b><span class="color-red">Crear</span> categoria</b></h2>
            <?php else: ?>
                <h2><b><span class="color-red">Editar</span> categoria #<?= $id ?></b></h2>
            <?php endif; ?>

            <form action="controllers/controller.categoria.php" method="POST">
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text" class="form-control" name="categoria" placeholder="Ingrese categoria" value="<?= $categoria->data->Categoria ?>">
                        </div>
                    </div>
                </div>
                
                <?php if($_GET['page'] == 'form-create-categoria'): ?>
                    <input type="hidden" name="tipo" value="nuevo">
                <?php else: ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="tipo" value="actualizar">
                <?php endif; ?>

                
                <div class="form-group">
                    <a href="?page=listado-categorias" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success"><?= ($_GET['page'] == 'form-create-categoria') ? 'Crear categoria':'Guardar cambios' ?></button>
                </div>
            </form>
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