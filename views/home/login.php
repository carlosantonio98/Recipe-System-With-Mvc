<?php include $templates_navbar ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_header ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Iniciar sesion</h1>
                        <form action="controllers/controller.login.php" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Aceptar">
                        </form>
                    </div>
                    <div class="card-footer">
                        <?php
                        session_start();
                        if (isset($_SESSION['error']) && $_SESSION['error']) {
                            echo "<h1 style='color: crimson'>Credenciales incorrectas</h1>";
                            session_destroy();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    
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
</body>

</html>