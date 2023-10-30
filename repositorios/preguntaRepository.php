<?php
class preguntaRepository{
    private $conexion = db::abreConexion;

    //CREAR
    public function createPregunta($idPregunta, $rep1, $rep2, $rep3, $correcta, $enunciado, $url, $idDificultad, $idCategoria) {
        $query = "INSERT INTO PREGUNTA (pregunta,rep1,rep2,rep3,correcta,enunciado,url,dificultad,categoria) values (:pregunta,:rep1,:rep2,:rep3,:correcta,:enunciado,:url,:dificultad,:categoria)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":pregunta", $idPregunta, PDO::PARAM_STR);
        $stmt->bindParam(":rep1", $rep1, PDO::PARAM_STR);
        $stmt->bindParam(":rep2", $rep2, PDO::PARAM_STR);
        $stmt->bindParam(":rep3", $rep3, PDO::PARAM_STR);
        $stmt->bindParam(":correcta", $correcta, PDO::PARAM_INT);
        $stmt->bindParam(":enunciado", $enunciado, PDO::PARAM_STR);
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->bindParam(":dificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        
    }

    //BORRAR
    public function deletePregunta($idPregunta) {
        $query = "DELETE PREGUNTA WHERE IDPREGUNTA=:idpregunta";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
        $stmt->execute();
    }

    //UPDATE
    // public function updatePregunta($idPregunta, $rep1, $rep2, $rep3, $correcta, $enunciado, $url, $idDificultad, $idCategoria) {
    //     $query = "UPDATE PREGUNTA SET ";
    // }

    //LEER
    public function readPregunta($idPregunta){
        $query = "SELECT * FROM PREGUNTA WHERE IDPREGUNTA=:idpregunta";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":pregunta", $idPregunta, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>