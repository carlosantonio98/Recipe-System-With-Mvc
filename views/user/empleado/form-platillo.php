<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 2) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $base_dir . "/models/model.categoria.php" ?>
<?php include $templates_header_empleado ?>

<?php
    $id = $_GET['id'];
    $platillo->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_empleado ?>

    <!-- Begin page content -->
    <main role="main" class="mb-4">
        <div class="container">

            <?php if($_GET['page'] == 'form-create-platillo-empleado'): ?>
                <h2><b><span class="color-red">Crear</span> platillo</b></h2>
            <?php else: ?>
                <h2><b><span class="color-red">Editar</span> platillo</b></h2>
            <?php endif; ?>

            <form action="controllers/controller.platillo.php" method="POST"enctype="multipart/form-data" accept=".png, .jpeg, .jpg">
                <div class="form-group">
                    <label for="platillo">Platillo</label>
                    <input type="text" class="form-control" id="platillo" name="platillo" placeholder="Ingrese platillo" value="<?= $platillo->data->Platillo ?>">
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="ingrediente">Ingredientes</label>
                            <textarea class="form-control" id="ingrediente" name="ingrediente" cols="5" placeholder="Ingrese ingredientes" style="resize: none;"><?= $platillo->data->Ingrediente ?></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="preparacion">Preparación</label>
                            <textarea class="form-control" id="preparacion" name="preparacion" cols="5" placeholder="Ingrese preparación" style="resize: none;"><?= $platillo->data->Preparacion ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="imagenPlatillo">Imagen</label>
                            <input type="file" class="custom-file form-control" id="imagenPlatillo" name="imagenPlatillo" value="<?= $platillo->data->ImagenPlatillo ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group ">
                            <label for="categoria">Categoria</label>
                            <select class="form-control custom-select " id="categoria" name="categoria">
                                <option disabled selected>Selecciona categoria</option>
                                
                                <!-- Cargando la lista de categorias-->
                                <?php 
                                    $categoria->getAll();
                                    $platillo->insertItemCategoriasDropdown($categoria, $platillo->data->FkCategoria);
                                ?>
                    
                            </select>
                        </div>
                    </div>
                </div>

                <?php if($_GET['page'] == 'form-create-platillo-empleado'): ?>
                    <input type="hidden" name="tipo" value="nuevo">
                <?php else: ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="tipo" value="actualizar">
                <?php endif; ?>               

                <div class="form-group">
                    <a href=<?= ($_GET['page'] == 'form-create-platillo-empleado') ? "?page=menu-empleado":"?page=platillo-empleado&id=$id" ?> class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success"><?= ($_GET['page'] == 'form-create-platillo-empleado') ? 'Crear platillo':'Guardar cambios' ?></button>
                </div>
            </form>
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

    <?php include $templates_footer_empleado ?>
</body>

</html>