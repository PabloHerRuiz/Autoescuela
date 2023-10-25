<?php
class UserRepository
{
    private $conexion = db::abreConexion;
    //CREAR
    public function creaUser($nombre, $password, $rol)
    {
        $query = "INSERT INTO USER (nombre,password,rol) values ($nombre,$password,$rol)";
        $stmt = $this->conexion->prepare($query);


    }
    //BORRAR
//UPDATE
//LEER
}
?>