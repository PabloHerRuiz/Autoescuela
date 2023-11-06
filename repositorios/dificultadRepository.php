<?php
class DificultadRepository{
    private $conexion = db::abreConexion;

    //CREAR
    public function createDificultad($idDificultad,$nombre){
        $query="INSERT INTO DIFICULTAD (idDificultad,nombre) VALUES (:idDificultad,:nombre)";
        $stmt=$this->conexion->prepare($query);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();

    }
        
    //BORRAR
    public function deleteDificultad($idDificultad){
        $query= "DELETE FROM DIFICULTAD WHERE IDDIFICULTAD=:idDificultad";
        $stmt=$this->conexion->prepare($query);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->execute();
    }

    //UPDATE
    // public function updateDificultad($idDificultad){}

    //LEER
    public function readDificultad($idDificultad){
        $query= "SELECT * FROM DIFICULTAD WHERE IDDIFICULTAD=:idDificultad";
        $stmt=$this->conexion->prepare($query);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>