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
        sesion::iniciar_sesion();
        $idUser = sesion::leer_sesion("usuario");
        $conn = db::abreconexion();
        $examenRepository = new ExamenRepository($conn);
        $examenes = $examenRepository->getAllExam($idUser->getIdUser());

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
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    sesion::iniciar_sesion();
    $user = sesion::leer_sesion("usuario");

    // Obtén los datos enviados en la solicitud POST
    $datos = json_decode(file_get_contents("php://input"), true);
    $fechaActual = date("Y-m-d H:i:s");


    $conn = db::abreconexion();
    $examenRepository = new ExamenRepository($conn);

    
    //examen para todos o para el propio usuario
    if ($_GET["id"]==1) {
        $id = $_GET["id"];
        $examenRepository->createExamen($fechaActual, $id);
    } else {
        $examenRepository->createExamen($fechaActual, $user->getIdUser());
    }
    $ultimaId = $examenRepository->lastId();

    if ($datos["id"]) {

        foreach ($datos["id"] as $dato) {
            $examenRepository->addPreg($ultimaId, $dato["id"]);
        }

        echo '{"respuesta":"OK"}';
    }
}

?>