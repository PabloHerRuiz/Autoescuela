<?php
class Login
{
    private $conexion;

    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    //funcion que inicia sesion del usuario
    public function user_login($nombre, $pass)
    {
        $query = "SELECT * FROM USER WHERE nombre = :nombre and password=:pass";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            // Inicio de sesión exitoso
            // $_SESSION['nombre'] = $nombre;
            return true;
        } else {
            // Credenciales incorrectas
            return false;
        }
    }

    //funcion que cierra la sesion del usuario
    public function user_logout()
    {

    }
}
?>