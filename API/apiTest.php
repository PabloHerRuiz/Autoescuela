<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = db::abreconexion();
    $examenRepository = new ExamenRepository($conn);
    $examenes = $examenRepository->getAllTest();

    $exam = [];
    foreach ($examenes as $examen) {
        $exam = [
            "idExamen" => $examen['Examen_idExamen'],
            "idPregunta" => $examen['Pregunta_idPregunta']
        ];
        $exams[] = $exam;
    }

    header('Content-Type: application/json');
    echo json_encode($exams);
}

?>