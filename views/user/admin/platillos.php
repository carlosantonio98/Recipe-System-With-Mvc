<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>

<?php include $base_dir . "/models/model.platillo.php" ?>
<?php include $templates_header_admin ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_admin ?>

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
                    <p>¿Seguro que deseas borrar este registro?</p>

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
        <div class="container">
            <h2><b><span class="color-red">Catalogo</span> de platillos</b></h2>

            <!-- Grupo de botones -->
            <div class="mb-4">
                <a href="?page=listado-platillos-pdf" class="btn btn-secondary">Imprimir listado</a>
            </div>

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

            <!-- Tabla de datos -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Platillo</th>
                            <th>Imagen</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Categoria</th>
                            <th>Seguimiento</th>
                            <th>Usuario</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $platillo->getAll('FechaRegistro');
                            
                            while($row = $platillo->next()):
                        ?>
                        <tr>
                            <td><?= $row->IdPlatillo ?></td>
                            <td><?= $row->Platillo ?></td>
                            <td class="text-center"><img src="<?= '/proyecto/resources/img/platillos/' . $row->ImagenPlatillo ?>" alt="imagen del platillo" width="50px" height="50px"></td>
                            <td><?= $row->FechaRegistro ?></td>
                            <td><?= $row->HoraRegistro ?></td>
                            <td><?= $row->Categoria ?></td>
                            <td><?= $row->Seguimiento ?></td>
                            <td><?= $row->NombreUsuario ?></td>
                            <td>
                                <a href="?page=ver-platillo&id=<?= $row->IdPlatillo ?>"><i class="fas fa-eye" data-toggle="tooltip" title="Ver"></i></a>
                                <a href="<?= $row->IdPlatillo ?>" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                <a href="?page=formato-platillo-pdf&id=<?= $row->IdPlatillo ?>"><i class="fas  fa-print" data-toggle="tooltip" title="Imprimir"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
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

    <?php include $templates_footer_admin ?>
</body>

</html>