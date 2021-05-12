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
        <div class="container container-recipe">
            <div class="header-recipe row mb-4">
                <div class="col-12 col-md-8">
                    <img src="resources/img/platillos/pla1.png" alt="albondigas a la boloñesa">
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <small class="color-red">Comida</small>
                    <h3>Como preparar Albóndigas a la boloñesa</h3>

                    <div class="dates row text-center mb-4">
                        <div class="user col-4">
                            <i class="fas fa-user circle-shadow"></i>
                            <small class="d-block mt-2"><span class="text-muted">Por</span> Marlene</small>
                        </div>
                        <div class="date col-4">
                            <i class="fas fa-calendar-alt circle-shadow"></i>
                            <small class="text-muted d-block mt-2">22/03/2021</small>
                        </div>

                        <div class="time col-4">
                            <i class="fas fa-clock circle-shadow"></i>
                            <small class="text-muted d-block mt-2">19:20:0</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 p-1 m-0">
                            <a href="?page=form-edit-platillo-empleado" class="btn btn-primary w-100"><i class="fas fa-edit"></i> Actualizar</a>
                        </div>
                        <div class="col-6 p-1 m-0">
                            <a href="#" class="btn btn-danger w-100" data-href="borrar-usuarios.html?id=1" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i> Eliminar</a>
                        </div>
                        <div class="col-6 p-1 m-0">
                            <a href="impresion.pdf" download="RecetaTest" class="btn btn-success w-100"><i class="fas fa-file-download"></i> Descargar</a>
                        </div>
                        <div class="col-6 p-1 m-0">
                            <a href="?page=mis-platillos-empleado" class="btn btn-link w-100"> Regresar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-recipe row mb-5">
                <div class="col-12">
                    <h6>
                        Ingredientes:
                    </h6>
                    <p>
                        250 g de Linguini 1 cucharada de aceite de oliva 20 piezas de camarón 4 dientes de ajo (rebanado en láminas) 1 cucharadita de orégano 2 cucharadas de albahaca seca 2 cucharadas de pepperoncini 6 piezas de jitomate 400 g 1 pieza queso de cabra rallado
                        200 g 1 sal de mesa al gusto 1 pimienta al gusto
                    </p>
                </div>
                <div class="col-12">
                    <h6>
                        Preparación:
                    </h6>
                    <p>
                        Cocina la pasta con agua, sal y una gotas con aceite de oliva hasta que queden "al dente", este proceso tardará alrededor de 12 minutos, cuando esté lista retira el agua Hierve agua en una olla y sumerge los jitomates por 2 minutos, después colócalos
                        en un recipiente con hielo para que los puedas pelar y cortarlos en cubo pequeños Limpia los camarones: quítales la cabeza y pélalos con cuidado hasta que sólo quede la carne, en ese momento bajo el chorro de agua corta el lomo
                        del camarón y retira el aparato digestivo que es la parte negra y gelatinosa En un sartén con un poco de aceite añade ajo, orégano, albahaca y pepperocini para sofreír los camarones, en dos minutos agrega el jitomate y termina
                        de cocer todo Añade la pasta al sartén e incorpora queso de cabra, después apaga el fuego y corona tu plato con unas hojitas de albahaca
                    </p>
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