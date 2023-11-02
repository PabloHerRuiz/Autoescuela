<?php
class ExamenRepository{

    private $conexion = db::abreConexion;

    //CREAR
    public function createExamen($idExamen,$fechaHora,$idUser){
        $query="INSERT INTO EXAMEN (idExamen,fechaHora,idUser) VALUES (:idExamen,:fechaHora,:idUser)";
        $stmt= $this->conexion->prepare($query);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->bindParam(":fechaHora", $fechaHora, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }
    //BORRAR
    public function deleteExamen($idExamen){
        $query= "DELETE FROM EXAMEN WHERE IDEXAMEN=:idExamen";
        $stmt= $this->conexion->prepare($query);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
    }
    //UPDATE
    // public function updateExamen($idExamen){}

    //LEER
    public function readExamen($idExamen){
        $query= "SELECT * FROM EXAMEN WHERE IDEXAMEN=:idExamen";
        $stmt= $this->conexion->prepare($query);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
    }
    

}

?>