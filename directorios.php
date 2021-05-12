<?php
$base_dir = $_SERVER["DOCUMENT_ROOT"] . "/proyecto";
# ---------------------------------------------------
# Recursos
# ---------------------------------------------------
$recursos_dir = $base_dir . "/recursos";

#Bootstrap
$recursos_bs_css  = "vendor/bootstrap/css/bootstrap.min.css";
$recursos_bs_js   = "vendor/bootstrap/js/bootstrap.min.js";
$recursos_bs_jq   = "vendor/bootstrap/js/jquery-3.2.1.slim.min.js";
$recursos_pop_js  = "vendor/bootstrap/js/popper.min.js";
$recursos_bs_sticky = "vendor/bootstrap/css/sticky-footer-navbar.css";

# Iconos FontAwesome
$iconos_fontAwesome = "vendor/fontawesome/css/all.css";

# Estilo CSS
$estilos_css = "resources/css/style.css";

# Acciones JS
$acciones_js = "resources/js/app.js";

# Charts Js
$chartBundle_js = "vendor/chartjs/Chart.bundle.js";
$chartUtils_js = "vendor/chartjs/samples/utils.js";

# Templates
$templates_dir = $base_dir . "/views/template";

$templates_navbar = $base_dir . "/views/template/navbar.php";
$templates_header = $base_dir . "/views/template/header.php";
$templates_footer = $base_dir . "/views/template/footer.php";

$templates_navbar_cliente = $base_dir . "/views/template/navbar_cliente.php";
$templates_header_cliente = $base_dir . "/views/template/header_cliente.php";
$templates_footer_cliente = $base_dir . "/views/template/footer_cliente.php";

$templates_navbar_empleado = $base_dir . "/views/template/navbar_empleado.php";
$templates_header_empleado = $base_dir . "/views/template/header_empleado.php";
$templates_footer_empleado = $base_dir . "/views/template/footer_empleado.php";

$templates_navbar_admin = $base_dir . "/views/template/navbar_admin.php";
$templates_header_admin = $base_dir . "/views/template/header_admin.php";
$templates_footer_admin = $base_dir . "/views/template/footer_admin.php";
