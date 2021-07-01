<?php require_once "./models/model.usuario.php" ?>
<?php require_once "./models/model.pais.php" ?>
<?php require_once "./models/model.rol.php" ?>
<?php 
    session_start();

    if ($_SESSION['usuario']->FkRol == 1) {
        include $templates_header_admin;
    } else if ($_SESSION['usuario']->FkRol == 2) {
        include $templates_header_empleado;
    } else if ($_SESSION['usuario']->FkRol == 3) {
        include $templates_header_cliente;
    } else {
        include $templates_header;
    }

    $id = $_SESSION['usuario']->IdUsuario;
    $usuario->getOne($id);
?>

<body class="d-flex flex-column h-100">
    <?php
        if ($_SESSION['usuario']->FkRol == 1) {
            include $templates_navbar_admin;
        } else if ($_SESSION['usuario']->FkRol == 2) {
            include $templates_navbar_empleado;
        } else if ($_SESSION['usuario']->FkRol == 3) {
            include $templates_navbar_cliente;
        } else {
            include $templates_navbar;
        }
    ?>

    <!-- Begin page content -->
    <main role="main" class="mb-4">
        <div class="container">

            <?php if($_GET['page'] == 'crear-usuario'): ?>
                <h2><b><span class="color-red">Crear</span> nueva cuenta</b></h2>
            <?php else: ?>
                <h2><b><span class="color-red">Mi</span> cuenta</b></h2>
            <?php endif; ?>
            
            <form action="controllers/controller.usuario.php" method="POST">
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" value="<?= $usuario->data->NombreUsuario ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paterno">Apellido paterno</label>
                            <input type="text" class="form-control" name="paterno" placeholder="Ingrese apellido paterno" value="<?= $usuario->data->Paterno ?>">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="materno">Apellido materno</label>
                            <input type="text" class="form-control" name="materno" placeholder="Ingrese apellido materno" value="<?= $usuario->data->Materno ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nacimiento">Nacimiento</label>
                            <input type="date" class="form-control" name="nacimiento" placeholder="Ingrese fecha de nacimiento" value="<?= $usuario->data->Nacimiento ?>">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <select class="form-control custom-select" name="pais">
                                <option disabled selected>Seleccione un pais</option>
                                
                                <!-- Cargando la lista de paises-->
                                <?php 
                                    $pais->getAll();
                                    $usuario->insertItemPaisesDropdown($pais, $usuario->data->FkPais);
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" placeholder="Ingrese correo" value="<?= $usuario->data->Correo ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="<?= ($_GET['page'] == 'crear-usuario') ? 'password':'text' ?>" class="form-control" name="password" placeholder="Ingrese contraseña" value="<?= $usuario->data->Clave ?>">
                        </div>
                    </div>
                </div>

                <?php if($_GET['page'] == 'crear-usuario'): ?>
                    <input type="hidden" name="tipo" value="nuevo">
                <?php else: ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="tipo" value="actualizar">
                <?php endif; ?>

                <div class="form-group">
                    <a href="?page=<?= ($_GET['page'] == 'crear-usuario') ? 'login':'inicio' ?>" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success"><?= ($_GET['page'] == 'crear-usuario') ? 'Crear usuario':'Guardar cambios' ?></button>
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

    <?php include $templates_footer ?>
</body>

</html>