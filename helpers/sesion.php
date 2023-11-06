<?php
class Sesion
{
    //inicia sesion
    public function iniciar_sesion()
    {
        session_start();
    }
    //destruye la sesion
    public function cerrar_session()
    {
        session_destroy();
    }

    //guarda una sesion por su clave valor
    public function guardar_sesion($clave, $valor)
    {
        $_SESSION[$clave] = $valor;
    }

    //muestra un valor segun su clave
    public function leer_sesion($clave)
    {
        if (isset($_SESSION[$clave])) {
            return $_SESSION[$clave];
        } else {
            return "";
        }

    }

    //comprueba si existe valor
    public function esta_logueado()
    {
        return isset($_SESSION['usuario']);
    }

    //inicia y guarda el valor
    public function login_sesion($valor)
    {
        iniciar_sesion();
        guardar_sesion('usuario', $valor);
    }

}
?>