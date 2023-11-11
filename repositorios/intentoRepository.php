<?php
class IntentoRepository
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    //CREAR
    public function createIntento($idExamen,$json, $idUser)
    {
        $query = "INSERT INTO INTENTOS (Examen_idExamen,json,User_idUser) VALUES(:idExamen,:json, :idUser)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":json", $json, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
    }

    //BORRAR
    public function deleteIntento($idIntentos)
    {
        $query = "DELETE FROM INTENTOS WHERE IDINTENTOS=:idIntentos";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idIntentos", $idIntentos, PDO::PARAM_INT);
        $stmt->execute();
    }

    //UPDATE
    // public function updateIntento($idIntento, $json, $idUser, $idExamen){
    //     $query = "UPDATE INTENTO SET ";
    //     $stmt = $this->conexion->prepare($query);
    // }

    //LEER
    public function readIntento($idIntentos)
    {
        $query = "SELECT * FROM INTENTOS WHERE IDINTENTO=:idIntentos";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idIntentos", $idIntentos, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>