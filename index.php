<?php
include "directorios.php";
include 'resources/class/class.connection.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR);

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        # pagina principal
        case 'inicio':
            include 'views/home/inicio.php';
            break;
        case 'ayuda':
            include 'views/home/ayuda.php';
            break;
        case 'comidas':
            include 'views/home/comidas.php';
            break;
        case 'postres':
            include 'views/home/postres.php';
            break;
        case 'desayunos':
            include 'views/home/desayunos.php';
            break;
        case 'ensaladas':
            include 'views/home/ensaladas.php';
            break;
        case 'platillo':
            include 'views/home/platillo.php';
            break;
        case 'login':
            include 'views/home/login.php';
            break;
       
        # pagina cliente
        case 'menu-cliente':
            include 'views/user/cliente/menu.php';
            break;
        case 'form-create-platillo-cliente':
            include 'views/user/cliente/form-platillo.php';
            break;
        case 'form-edit-platillo-cliente':
            include 'views/user/cliente/form-platillo.php';
            break;
        case 'mis-platillos-cliente':
            include 'views/user/cliente/mis-platillos.php';
            break;
        case 'platillo-cliente':
            include 'views/user/cliente/platillo-cliente.php';
            break;
        
        # pagina empleado
        case 'menu-empleado':
            include 'views/user/empleado/menu.php';
            break;
        case 'buzon-platillos':
            include 'views/user/empleado/buzon-platillos.php';
            break;
        case 'detalles-platillo':
            include 'views/user/empleado/detalles-platillo.php';
            break; 
        case 'form-seguimiento-platillo':
            include 'views/user/empleado/form-seguimiento-platillo.php';
            break;
        case 'form-create-platillo-empleado':
            include 'views/user/empleado/form-platillo.php';
            break;
        case 'form-edit-platillo-empleado':
            include 'views/user/empleado/form-platillo.php';
            break;
        case 'mis-platillos-empleado':
            include 'views/user/empleado/mis-platillos.php';
            break;
        case 'platillo-empleado':
            include 'views/user/empleado/platillo-empleado.php';
            break;

        # pagina admin
        case 'menu-admin':
            include 'views/user/admin/menu.php';
            break;
        case 'listado-usuarios':
            include 'views/user/admin/usuarios.php';
            break;
        case 'form-create-usuario':
            include 'views/user/admin/form-usuario.php';
            break;
        case 'form-edit-usuario':
            include 'views/user/admin/form-usuario.php';
            break;
        case 'ver-usuario':
            include 'views/user/admin/ver-usuario.php';
            break;                
        case 'listado-platillos':
            include 'views/user/admin/platillos.php';
            break;
        case 'form-edit-platillo-admin':
            include 'views/user/admin/form-edit-platillo-admin.php';
            break;
        case 'ver-platillo':
            include 'views/user/admin/ver-platillo.php';
            break;  
        case 'listado-visitas':
            include 'views/user/admin/visitas.php';
            break;
        case 'ver-visita':
            include 'views/user/admin/ver-visita.php';
            break;  
        case 'listado-categorias':
            include 'views/user/admin/categorias.php';
            break;
        case 'form-create-categoria':
            include 'views/user/admin/form-categoria.php';
            break;
        case 'form-edit-categoria':
            include 'views/user/admin/form-categoria.php';
            break;
        case 'ver-categoria':
            include 'views/user/admin/ver-categoria.php';
            break;
        case 'estadistica-usuarios':
            include 'views/user/admin/estadistica-usuarios.php';
            break;  
        case 'estadistica-platillos':
            include 'views/user/admin/estadistica-platillos.php';
            break; 
        case 'listado-categorias-pdf':
            include 'views/user/admin/listado-categorias-pdf.php';
            break; 
        case 'listado-platillos-pdf':
            include 'views/user/admin/listado-platillos-pdf.php';
            break; 
        case 'listado-usuarios-pdf':
            include 'views/user/admin/listado-usuarios-pdf.php';
            break;
        case 'listado-visitas-pdf':
            include 'views/user/admin/listado-visitas-pdf.php';
            break;
        case 'formato-categoria-pdf':
            include 'views/user/admin/formato-categoria-pdf.php';
            break;  
        case 'formato-platillo-pdf':
            include 'views/user/admin/formato-platillo-pdf.php';
            break;  
        case 'formato-usuario-pdf':
            include 'views/user/admin/formato-usuario-pdf.php';
            break;  
        case 'formato-visita-pdf':
            include 'views/user/admin/formato-visita-pdf.php';
            break;  
    }
} else {
    include 'views/home/inicio.php';
}