<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $conn = db::abreconexion();
        $examenRepository = new ExamenRepository($conn);
        $examenes = $examenRepository->getAllTest($id);

        $exam = [];
        foreach ($examenes as $examen) {
            $exam = [
                "id" => $examen['idPregunta'],
                "enunciado" => $examen['enunciado'],
                "op1" => $examen['rep1'],
                "op2" => $examen['rep2'],
                "op3" => $examen['rep3'],
                "idCategoria" => $examen['Categorias_idCategoria'],
                "idDificultad" => $examen['Dificultad_idDificultad'],
                "correcta" => $examen['correcta']
            ];
            $exams[] = $exam;
        }

        header('Content-Type: application/json');
        echo json_encode($exams);

    } else {
        $conn = db::abreconexion();
        $examenRepository = new ExamenRepository($conn);
        $examenes = $examenRepository->getAllExam();

        $exam = [];
        foreach ($examenes as $examen) {
            $exam = [
                "idExamen" => $examen['Examen_idExamen']
            ];
            $exams[] = $exam;
        }

        header('Content-Type: application/json');
        echo json_encode($exams);
    }
}

?>