<?php
class UserRepository
{
    private $conexion = db::abreConexion;
    //CREAR
    public function creaUser($nombre, $password, $rol)
    {
        $query = "INSERT INTO USER (nombre,password,rol) values (:nombre,:password,:rol)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->execute();
    }
    //BORRAR
    public function deleteUser($id)
    {
        $query = "DELETE USER WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //UPDATE
    public function updateUser($id, $nombre, $password, $rol)
    {
        //hay que hacer un if con isset para cada post vaya comparando con su atributo y añadir por parametro solo pasar el objeto usuario
        $query = "UPDATE USER SET NOMBRE=:nombre,PASSWORD=:password,ROL=:rol WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //LEER
    public function readUser($id)
    {
        $query = "SELECT * FROM USER WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>