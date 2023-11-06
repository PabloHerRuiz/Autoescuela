<?php
if (!isset($_GET['menu'])) {
    $_GET['menu'] = "login";
}
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/index.php';

    }
    if ($_GET['menu'] == "login") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/identificacion.php';

    }
    if ($_GET['menu'] == "registro") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/registro.php';

    }
    if ($_GET['menu'] == "prueba") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/prueba.php';

    }
}
?>