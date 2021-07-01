<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="?page=inicio"><b>Finder Food</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=inicio">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Recetas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?page=mas-platillos&id=1">Comida</a>
                            <a class="dropdown-item" href="?page=mas-platillos&id=2">Postre</a>
                            <a class="dropdown-item" href="?page=mas-platillos&id=3">Desayuno</a>
                            <a class="dropdown-item" href="?page=mas-platillos&id=4">Ensalada</a>
                            <a class="dropdown-item" href="?page=mas-platillos&id=5">Botana</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=menu-cliente">Mi menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=ayuda">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=mi-cuenta">Mi cuenta</a>
                    </li>
                </ul>
                <div>
                    <a href="controllers/controller.logout.php" class="btn btn-outline-dark-custom mx-1 px-3 my-2 my-sm-0">Salir</a>
                </div>
            </div>
        </div>
    </nav>
</header>