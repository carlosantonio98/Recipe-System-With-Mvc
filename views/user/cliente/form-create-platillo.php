<?php include $templates_header_cliente ?>

<body class="d-flex flex-column h-100">
    <?php include $templates_navbar_cliente ?>

    <!-- Begin page content -->
    <main role="main" class="mb-4">
        <div class="container">
            <h2><b><span class="color-red">Crear</span> platillo</b></h2>

            <form>
                <div class="form-group">
                    <label for="platillo">Platillo</label>
                    <input type="text" class="form-control" id="platillo" placeholder="Ingrese platillo">
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="ingrediente">Ingredientes</label>
                            <textarea class="form-control" name="preparación" id="ingrediente" cols="5" placeholder="Ingrese ingredientes" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="preparación">Preparación</label>
                            <textarea class="form-control" name="preparación" id="preparación" cols="5" placeholder="Ingrese preparación" style="resize: none;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nacimiento">Imagen</label>
                            <input type="file" class=" custom-file form-control" id="imagenPlatillo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" form-group ">
                            <label for="rol ">Categoria</label>
                            <select class="form-control custom-select " id="rol ">
                                <option disabled selected>Selecciona categoria</option>
                                <option>Comida</option>
                                <option>Postre</option>
                                <option>Desayuno</option>
                                <option>Ensalada</option>
                                <option>Botana</option>
                                <option>Entrada</option>
                                <option>Sopa</option>
                                <option>Guarnision</option>
                                <option>Bebida</option>
                                <option>Papilla</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <a href="?page=menu-cliente" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success">Crear platillo</button>
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

    <?php include $templates_footer_cliente ?>
</body>

</html>