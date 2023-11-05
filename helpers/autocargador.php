<?php
function autocargador($class)
{
    $dirs = [
        $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/API/',
        $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/clases/',
        $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/database/',
        $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/',
        $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/repositorios/',
        $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/vistas/'
    ];

    // Reemplaza los espacios de nombres con barras diagonales
    $class = str_replace('\\', '/', $class);

    foreach ($dirs as $dir) {
        $file = $dir . $class . '.php';

        // Si el archivo de clase existe, lo incluye y sale del bucle
        if (file_exists($file)) {
            include $file;
            return;
        }
    }
}

spl_autoload_register('autocargador');

?>