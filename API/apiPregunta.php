<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos enviados en la solicitud POST
    $data = json_decode(file_get_contents("php://input"));

    if ($data) {
        // Llama a la función createPregunta con los datos
        $conn = db::abreConexion();
        $preguntaRepository = new preguntaRepository($conn);
        $preguntaRepository->createPregunta($data->op1, $data->op2, $data->op3, $data->cor, $data->enun, $data->dif, $data->cat);
        // Devuelve una respuesta
        echo '{"respuesta":"OK"}';
    }
}
?>