<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 3) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_cliente ?>

<?php
    $id = $_GET['id'];
    $platillo->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_cliente ?>

    <!-- Modal delete -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar borrado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que deseas borrar esta receta?</p>

                    <form action="controllers/controller.platillo.php" method="POST" id="formDelete">
                        <input type="hidden" name="id" id="inputId">
                        <input type="hidden" name="tipo" value="borrar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-ok" form="formDelete">Borrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin page content -->
    <main role="main">
        <div class="container container-recipe">
            <div class="header-recipe row mb-4">
                <div class="col-12 col-md-8">
                    <img src="resources/img/platillos/<?= $platillo->data->ImagenPlatillo ?>" alt="imagen platillo">
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <small class="color-red"><?= $platillo->data->Categoria ?></small>
                    <h3>Como preparar <?= $platillo->data->Platillo ?></h3>

                    <div class="dates row text-center mb-4">
                        <div class="user col-4">
                            <i class="fas fa-user circle-shadow"></i>
                            <small class="d-block mt-2"><span class="text-muted">Por</span> <?= $platillo->data->NombreUsuario ?></small>
                        </div>
                        <div class="date col-4">
                            <i class="fas fa-calendar-alt circle-shadow"></i>
                            <small class="text-muted d-block mt-2"><?= $platillo->data->FechaRegistro ?></small>
                        </div>

                        <div class="time col-4">
                            <i class="fas fa-clock circle-shadow"></i>
                            <small class="text-muted d-block mt-2"><?= $platillo->data->HoraRegistro ?></small>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="row">
                        <!-- Se activara cuando el seguimiento sea en proceso -->
                        <?php if($platillo->data->FkSeguimiento == 1): ?>
                            <div class="col-6 p-1 m-0">
                                <a href="?page=form-edit-platillo-cliente&id=<?= $id ?>" class="btn btn-primary w-100"><i class="fas fa-edit"></i> Actualizar</a>
                            </div>
                        <?php endif; ?>

                        
                        <div class="col-6 p-1 m-0">
                            <a href="<?= $id ?>" class="btn btn-danger w-100" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash-alt"></i> Eliminar</a>
                        </div>
                        <div class="col-6 p-1 m-0">
                            <a href="?page=platillo-pdf&id=<?= $platillo->data->IdPlatillo ?>" class="btn btn-success w-100"><i class="fas fa-file-download"></i> Descargar</a>
                        </div>
                        <div class="col-6 p-1 m-0">
                            <a href="?page=mis-platillos-cliente" class="btn btn-link w-100"> Regresar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-recipe row mb-5">
                <div class="col-12">
                    <h6>
                        Ingredientes:
                    </h6>
                    <p><?= $platillo->data->Ingrediente ?></p>
                </div>
                <div class="col-12">
                    <h6>
                        Preparación:
                    </h6>
                    <p><?= $platillo->data->Preparacion ?></p>
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