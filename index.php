<?php
class Principal
{
    public static function main()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/enruta.php'; 
        require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php'; 
    }
}
Principal::main();
?>