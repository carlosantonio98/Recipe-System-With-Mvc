<?php include $templates_header_empleado ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_empleado ?>

    <!-- Begin page content -->
    <main role="main">
        <div class="container">
            <h2><b><span class="color-red">Platillo</span> #1</b></h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Platillo</th>
                        <td>Linguini&nbsp;con&nbsp;camarón</td>
                    </tr>
                    <tr>
                        <th>Imagen</th>
                        <td>linguini.jpeg</td>
                    </tr>
                    <tr>
                        <th>Ingrediente</th>
                        <td>
                            250 g de Linguini 1 cucharada de aceite de oliva 20 piezas de camarón 4 dientes de ajo (rebanado en láminas) 1 cucharadita de orégano 2 cucharadas de albahaca seca 2 cucharadas de pepperoncini 6 piezas de jitomate 400 g 1 pieza queso de cabra rallado
                            200 g 1 sal de mesa al gusto 1 pimienta al gusto
                        </td>
                    </tr>
                    <tr>
                        <th>Preparación</th>
                        <td>

                            Cocina la pasta con agua, sal y una gotas con aceite de oliva hasta que queden "al dente", este proceso tardará alrededor de 12 minutos, cuando esté lista retira el agua Hierve agua en una olla y sumerge los jitomates por 2 minutos, después colócalos
                            en un recipiente con hielo para que los puedas pelar y cortarlos en cubo pequeños Limpia los camarones: quítales la cabeza y pélalos con cuidado hasta que sólo quede la carne, en ese momento bajo el chorro de agua corta el
                            lomo del camarón y retira el aparato digestivo que es la parte negra y gelatinosa En un sartén con un poco de aceite añade ajo, orégano, albahaca y pepperocini para sofreír los camarones, en dos minutos agrega el jitomate y
                            termina de cocer todo Añade la pasta al sartén e incorpora queso de cabra, después apaga el fuego y corona tu plato con unas hojitas de albahaca

                        </td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td>17/3/2021</td>
                    </tr>
                    <tr>
                        <th>Hora</th>
                        <td>21:47:16</td>
                    </tr>
                    <tr>
                        <th>Categoria</th>
                        <td>Comida</td>
                    </tr>
                    <tr>
                        <th>Seguimiento</th>
                        <td>En proceso</td>
                    </tr>
                    <tr>
                        <th>Usuario</th>
                        <td>Jesus&nbsp;Abelardo&nbsp;</td>
                    </tr>
                </table>
            </div>

            <div>
                <a href="?page=buzon-platillos" class="btn btn-primary mb-3">Regresar</a>
                <a href="?page=form-seguimiento-platillo" class="btn btn-success mb-3">Actualizar seguimiento</a>
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