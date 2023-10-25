<?php
class DB
{

    private static $conexion = null;
    public static function abreConexion()
    {
        if (self::$conexion === null) {
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=autoescuela', 'pablo', '1234');
                $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
                echo "Versión: $version";
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return $conexion;
    }
}
?>