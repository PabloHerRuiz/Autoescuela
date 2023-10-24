<?php
class Sesion
{
    //inicia sesion
    function iniciar_sesion()
    {
        session_start();
    }
    //destruye la sesion
    function cerrar_session()
    {
        session_destroy();
    }

    //guarda una sesion por su clave valor
    function guardar_sesion($clave, $valor)
    {
        $_SESSION[$clave] = $valor;
    }

    //muestra un valor segun su clave
    function leer_sesion($clave)
    {
        if (isset($_SESSION[$clave])) {
            return $_SESSION[$clave];
        } else {
            return "";
        }

    }

    //comprueba si existe valor
    function esta_logueado()
    {
        return isset($_SESSION['usuario']);
    }

    //inicia y guarda el valor
    function login_sesion($valor)
    {
        iniciar_sesion();
        guardar_sesion('usuario', $valor);
    }

}
?>