<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/autocargador.php';
    sesion::iniciar_sesion();
    sesion::cerrar_session();
    echo '{"respuesta":"OK"}';

?>