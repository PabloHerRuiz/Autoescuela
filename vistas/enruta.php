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
    if ($_GET['menu'] == "home") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/homeAlu.php';

    }
    if ($_GET['menu'] == "homeadmin") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/homeAdmin.php';

    }
    if ($_GET['menu'] == "crea") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/creaPreguntas.php';

    }
    if ($_GET['menu'] == "modifica") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/modificarPreg.php';

    }
    if ($_GET['menu'] == "listalu") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/listadoAlu.php';

    }
    if ($_GET['menu'] == "alta") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/darAlta.php';

    }
}
?>