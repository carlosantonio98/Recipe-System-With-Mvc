<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol <> 2) {
    header('location:?page=login');
}
?>


<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_empleado ?>

<?php
    $id = $_GET['id'];
    $platillo->getOne($id);
?>

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
            <div class="mb-3">
                <a href="?page=buzon-platillos" class="btn btn-primary">Regresar</a>
                <a href="<?= $platillo->data->IdPlatillo ?>" data-target="#confirm-update" data-toggle="modal" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i> Actualizar seguimiento</a>
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