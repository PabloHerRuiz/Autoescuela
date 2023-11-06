<?php
class IntentoRepository
{
    private $conexion = db::abreConexion;

    //CREAR
    public function createIntento($idIntento, $json, $idUser, $idExamen)
    {
        $query = "INSERT INTO INTENTO (idIntento, json, idUser, idExamen) VALUES(:idIntento,:json, :idUser, :idExamen)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idIntento", $idIntento, PDO::PARAM_INT);
        $stmt->bindParam(":json", $json, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
    }

    //BORRAR
    public function deleteIntento($idIntento)
    {
        $query = "DELETE FROM INTENTO WHERE IDINTENTO=:idIntento";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idIntento", $idIntento, PDO::PARAM_INT);
        $stmt->execute();
    }

    //UPDATE
    // public function updateIntento($idIntento, $json, $idUser, $idExamen){
    //     $query = "UPDATE INTENTO SET ";
    //     $stmt = $this->conexion->prepare($query);
    // }

    //LEER
    public function readIntento($idIntento){
        $query = "SELECT * FROM INTENTO WHERE IDINTENTO=:idIntento";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idIntento", $idIntento, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>