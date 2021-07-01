<?php 
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('location:?page=login');
    }
    
    if ($_SESSION['usuario']->FkRol == 1) {
        include $templates_header_admin;
    } else if ($_SESSION['usuario']->FkRol == 2) {
        include $templates_header_empleado;
    } else if ($_SESSION['usuario']->FkRol == 3) {
        include $templates_header_cliente;
    }
?>

<body class="d-flex flex-column h-100">
    <?php 
        if ($_SESSION['usuario']->FkRol == 1) {
            include $templates_navbar_admin;
        } else if ($_SESSION['usuario']->FkRol == 2) {
            include $templates_navbar_empleado;
        } else if ($_SESSION['usuario']->FkRol == 3) {
            include $templates_navbar_cliente;
        }
    ?>

    <!-- Begin page content -->
    <main role="main" class="help">
        <div class="container">
            <div class="help-title mb-4 text-center">
                <h2><b><span class="color-black">Ayuda</span></b></h2>
            </div>
            <div class="help-answers">
                <div class="answer mb-4 p-4 b-shadow">
                    <h5>¿Como puedo ver una receta?</h5>
                    <p>Para poder ver la preparacion de un platillo sigue los siguientes pasos:</p>
                    <ol>
                        <li>Iniciar sesion</li>
                        <li>Buscar un platillo a tu eleccion</li>
                        <li>Presionar el boton <b>Ver receta</b></li>
                    </ol>
                </div>

                <div class="answer mb-4 p-4 b-shadow">
                    <h5>¿Como puedo descargar un receta?</h5>
                    <p>Para poder descargar un receta sigue los siguientes pasos:</p>
                    <ol>
                        <li>Iniciar sesion</li>
                        <li>Buscar un platillo a tu eleccion</li>
                        <li>Presionar el boton <b>Ver receta</b></li>
                        <li>Dar click en <b>Descargar receta</b></li>
                    </ol>
                </div>

                <div class="answer mb-4 p-4 b-shadow">
                    <h5>¿Como puedo crear un platillo o receta?</h5>
                    <p>Para poder crear un platillo sigue los siguientes pasos:</p>
                    <ol>
                        <li>Iniciar sesion</li>
                        <li>Presionar la opcion <b>Mi menu</b>, esta opcion se encuentra en la parte superior de la pagina</li>
                        <li>Dar click en la opcion <b>Crear nueva receta</b></li>
                        <li>Rellenar todos los datos que te pide el fomulario, estos datos ayudaran a crear tu platillo</li>
                        <li>Presionar la opcion <b>Crear platillo</b></li>
                    </ol>
                </div>

                <div class="answer mb-4 p-4 b-shadow">
                    <h5>¿Como puedo ver mis recetas?</h5>
                    <p>Para poder ver nuestros propias recetas solo tenemos que dirigirnos a <b>Mi menu</b> y dar click en <b>Mis platillos</b>, en este apartado podremos ver todos nuestros platillos que hemos compartido con la comunidad</p>
                </div>

                <div class="answer mb-4 p-4 b-shadow">
                    <h5>¿Qué significa la etiqueta que sale en la parte superior derecha de nuestro platillo?</h5>
                    <p>La etiqueta que sale en la parte superior derecha del platillo sirve para indicar el estado de aceptacion en el que se encuentra este. Acontinuacion se muestrara una tabla de los estados en el que se puede llegar a encontrar nuestro
                        platillo.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Etiqueta</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge badge-primary">En proceso</span></td>
                                    <td>En proceso</td>
                                    <td>Este seguimiento o estado indica que el platillo todavia no se ha revisado</td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-success">Aprobado</span></td>
                                    <td>Aprobado</td>
                                    <td>Este seguimiento o estado indica que el platillo se ha revisado y se ha aprobado, cuando un platillo se aprueba todos los usuarios podran visualizarla</td>
                                </tr>

                                <tr>
                                    <td><span class="badge badge-danger">No aprobado</span></td>
                                    <td>No aprobado</td>
                                    <td>Este seguimiento o estado indica que el platillo no cumple con los requisitos o que ya existe, por lo tanto este platillo es rechazado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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

    <?php 
        if ($_SESSION['usuario']->FkRol == 1) {
            include $templates_footer_admin;
        } else if ($_SESSION['usuario']->FkRol == 2) {
            include $templates_footer_empleado;
        } else if ($_SESSION['usuario']->FkRol == 3) {
            include $templates_footer_cliente;
        } else {
            include $templates_footer;
        }
    ?>
</body>

</html>