<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 2) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php
    $platillo->getAll('IdPlatillo DESC'); 
?>


<?php include $templates_header_empleado ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_empleado ?>

    <!-- Modal actualizar estatus -->
    <div class="modal fade" id="confirm-update" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Actualizar seguimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controllers/controller.platillo.php" method="POST" id="formUpdate">
                        <div class="form-group">
                            <label for="seguimiento">Seguimiento</label>
                            <select class="form-control custom-select" id="seguimiento" name="seguimiento">
                                <option disabled selected>Selecciona un seguimiento</option>
                                <option value="2">Aceptado</option>
                                <option value="3">Rechazado</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" id="inputId">
                        <input type="hidden" name="tipo" value="actualizarSeguimiento">
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-link">Cancelar</a>
                    <button type="submit" form="formUpdate" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin page content -->
    <main role="main">
        <div class="container">
            <h2><b><span class="color-red">Buzon</span> de platillos</b></h2>

            <!-- Filtro -->
            <div class="my-4">
                <form action="#">
                    <div class="form-row">
                        <div class="col-12 col-md-5 mb-3 mb-md-0">
                            <select class="form-control custom-select" id="pais">
                                <option disabled selected>Filtrar por...</option>
                                <option>Platillo</option>
                                <option>Fecha</option>
                                <option>Hora</option>
                                <option>Categoria</option>
                                <option>Seguimiento</option>
                                <option>Usuario</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-5 mb-3 mb-md-0">
                            <input type="text" class="form-control" id="filtro" placeholder="¿Qué desea buscar?">
                        </div>

                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="cards-group">

                <?php while($row = $platillo->next()): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: <?= $row->Categoria ?></small>
                            <?php if($row->FkSeguimiento == 1): ?>
                                <span class="badge bg-warning"><?= $row->Seguimiento ?></span>
                            <?php elseif($row->FkSeguimiento == 2): ?>
                                <span class="badge bg-success"><?= $row->Seguimiento ?></span>
                            <?php elseif($row->FkSeguimiento == 3): ?>
                                <span class="badge bg-danger"><?= $row->Seguimiento ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0"><?= $row->Platillo ?></h6>
                                    <p class="card-text">Escrito por <?= $row->NombreUsuario ?></p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo&id=<?= $row->IdPlatillo ?>" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="<?= $row->IdPlatillo ?>" data-target="#confirm-update" data-toggle="modal" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 17/3/2021 - 21:47:16</small>
                    </div>
                </div>
                <?php endwhile; ?>
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

    <?php include $templates_footer_empleado ?>
</body>

</html>