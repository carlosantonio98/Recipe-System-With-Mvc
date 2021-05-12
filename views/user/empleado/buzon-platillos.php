<?php include $templates_header_empleado ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_empleado ?>

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
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-ok">Borrar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Comida</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Linguini&nbsp;con&nbsp;camarón</h6>
                                    <p class="card-text">Escrito por Jesus&nbsp;Abelardo&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 17/3/2021 - 21:47:16</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Postre</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <h6 class="card-title mb-0">Alfajores</h6>
                                <p class="card-text">Escrito por Jesus&nbsp;Abelardo&nbsp;</p>
                            </div>
                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 3/3/2021 - 20:45:09</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Postre</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Empanadas&nbsp;de&nbsp;calabaza</h6>
                                    <p class="card-text">Escrito por Jesus&nbsp;Abelardo&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 4/3/2021 - 16:49:10</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Ensalada</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Ensalada&nbsp;César</h6>
                                    <p class="card-text">Escrito por Jesus&nbsp;Abelardo&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 8/3/2021 - 17:08:50</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Botana</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Brochetas&nbsp;de&nbsp;cebolla&nbsp;cambray</h6>
                                    <p class="card-text">Escrito por Jesus&nbsp;Abelardo&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 10/3/2021 - 15:12:24</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Comida</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Albóndigas&nbsp;a&nbsp;la&nbsp;boloñesa</h6>
                                    <p class="card-text">Escrito por Marlene&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 12/3/2021 - 21:35:38</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Comida</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Camarones&nbsp;a&nbsp;la&nbsp;diabla</h6>
                                    <p class="card-text">Escrito por Marlene&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 13/3/2021 - 17:37:19</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Desayuno</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Pan&nbsp;frances</h6>
                                    <p class="card-text">Escrito por Marlene&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 5/3/2021 - 16:01:02</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Ensalada</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Ensalada&nbsp;de&nbsp;camarón</h6>
                                    <p class="card-text">Escrito por Marlene&nbsp;</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 7/3/2021 - 21:06:33</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Postre</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Carlota&nbsp;de&nbsp;chocolate</h6>
                                    <p class="card-text">Escrito por Guadalupe&nbsp;Cristel</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 1/3/2021 - 07:38:57</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Postre</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Arroz&nbsp;con&nbsp;leche</h6>
                                    <p class="card-text">Escrito por Guadalupe&nbsp;Cristel</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 2/3/2021 - 20:42:05</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Desayuno</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Bowl&nbsp;italiano</h6>
                                    <p class="card-text">Escrito por Guadalupe&nbsp;Cristel</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 6/3/2021 - 21:03:44</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Ensalada</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Ensalada&nbsp;rusa</h6>
                                    <p class="card-text">Escrito por Guadalupe&nbsp;Cristel</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 17/3/2021 - 18:49:33</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Botana</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Botana&nbsp;de&nbsp;jamón&nbsp;serrano</h6>
                                    <p class="card-text">Escrito por Guadalupe&nbsp;Cristel</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 9/3/2021 - 21:10:53</small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="card-subtitle d-block text-muted">Categoria: Bebida</small>
                            <span class="badge bg-red">En espera</span>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-md-8">
                                <div>
                                    <h6 class="card-title mb-0">Alfonso&nbsp;XIII</h6>
                                    <p class="card-text">Escrito por Guadalupe&nbsp;Cristel</p>
                                </div>
                            </div>

                            <div class="col d-md-flex align-items-center justify-content-end">
                                <a href="?page=detalles-platillo" class="btn btn-primary mr-2" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                <a href="?page=form-seguimiento-platillo" class="btn btn-success" data-toggle="tooltip" title="Actualizar seguimiento"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small>Fecha y hora: 11/3/2021 - 18:15:24</small>
                    </div>
                </div>
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

    <?php include $templates_footer_empleado ?>
</body>

</html>