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
    <main role="main">
        <div class="container">
            <h2><b><span class="color-red">Visita</span> #1</b></h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Fecha</th>
                        <td>17/3/2021</td>
                    </tr>
                    <tr>
                        <th>Hora</th>
                        <td>21:47:16</td>
                    </tr>
                    <tr>
                        <th>Nombre usuario</th>
                        <td>Carlos Antonio</td>
                    </tr>
                    <tr>
                        <th>Paterno</th>
                        <td>Camacho</td>
                    </tr>
                    <tr>
                        <th>Materno</th>
                        <td>Alvarez</td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td>carlosalvarez9805@gmail.com</td>
                    </tr>
                    <tr>
                        <th>Pais</th>
                        <td>Mexico</td>
                    </tr>
                    <tr>
                        <th>Rol</th>
                        <td>Admin</td>
                    </tr>
                </table>
            </div>

            <a href="?page=listado-visitas" class="btn btn-primary mb-3">Regresar</a>
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