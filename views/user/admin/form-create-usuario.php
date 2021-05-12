<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->FkRol<>1) {
    header('location:?page=login');
}
?>

<?php include $templates_header_admin ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_admin ?>

    <!-- Begin page content -->
    <main role="main" class="mb-4">
        <div class="container">
            <h2><b><span class="color-red">Crear</span> usuario</b></h2>

            <form>
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="paterno">Apellido paterno</label>
                            <input type="text" class="form-control" id="paterno" placeholder="Ingrese apellido paterno">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="materno">Apellido materno</label>
                            <input type="text" class="form-control" id="materno" placeholder="Ingrese apellido materno">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nacimiento">Nacimiento</label>
                            <input type="date" class="form-control" id="nacimiento" placeholder="Ingrese fecha de nacimiento">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <select class="form-control custom-select" id="pais">
                                <option disabled selected>Seleccione un pais</option>
                                <option>Mexico</option>
                                <option>Puerto Rico</option>
                                <option>Francia</option>
                                <option>Argentina</option>
                                <option>Brasil</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" placeholder="Ingrese correo">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select class="form-control custom-select" id="rol">
                            <option disabled selected>Seleccione un rol</option>
                            <option>Admin</option>
                            <option>Empleado</option>
                            <option>Cliente</option>
                        </select>
                </div>

                <div class="form-group">
                    <a href="?page=listado-usuarios" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success">Crear usuario</button>
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

    <?php include $templates_footer_admin ?>
</body>

</html>