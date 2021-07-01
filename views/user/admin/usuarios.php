<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>

<?php include $base_dir . "/models/model.usuario.php" ?>
<?php 
    $usuario->getAll('IdUsuario DESC');
?>


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

                    <form action="controllers/controller.usuario.php" method="POST" id="formDelete">
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
            <h2><b><span class="color-red">Catalogo</span> de usuarios</b></h2>

            <!-- Grupo de botones -->
            <div class="mb-4">
                <a href="?page=form-create-usuario" class="btn btn-primary"><i class="fas fa-user-plus"></i> Nuevo usuario</a>
                <a href="?page=listado-usuarios-pdf" class="btn btn-secondary">Imprimir listado</a>
            </div>

            <!-- Filtro -->
            <div class="my-4">
                <form action="#">
                    <div class="form-row">
                        <div class="col-12 col-md-5 mb-3 mb-md-0">
                            <select class="form-control custom-select" id="pais">
                                <option disabled selected>Filtrar por...</option>
                                <option>Nombre</option>
                                <option>Apellido paterno</option>
                                <option>Apellido materno</option>
                                <option>Pais</option>
                                <option>Rol</option>
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

            <!-- Table de datos -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Pais</th>
                            <th>Rol</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $usuario->next()): ?>
                        <tr>
                            <td><?= $row->IdUsuario ?></td>
                            <td><?= $row->NombreUsuario ?></td>
                            <td><?= $row->Paterno ?></td>
                            <td><?= $row->Materno ?></td>
                            <td><?= $row->Pais ?></td>
                            <td><?= $row->Rol ?></td>
                            <td>
                                <a href="?page=ver-usuario&id=<?= $row->IdUsuario ?>"><i class="fas fa-eye" data-toggle="tooltip" title="Ver"></i></a>
                                <a href="?page=form-edit-usuario&id=<?= $row->IdUsuario ?>"><i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i></a>
                                <a href="<?= $row->IdUsuario ?>" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                <a href="?page=formato-usuario-pdf&id=<?= $row->IdUsuario ?>"><i
                                    class="fas  fa-print" data-toggle="tooltip" title="Imprimir"></i></a>
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