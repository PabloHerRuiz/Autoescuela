<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos enviados en la solicitud POST
    $datos = json_decode(file_get_contents("php://input"));
    var_dump($datos);
    if ($datos) {
        // Llama a la función createPregunta con los datos
        $conn = db::abreConexion();
        $preguntaRepository = new preguntaRepository($conn);
        $preguntaRepository->createPregunta($datos->op1, $datos->op2, $datos->op3, $datos->cor, $datos->enun, $datos->dif, $datos->cat);
        // Devuelve una respuesta
        echo '{"respuesta":"OK"}';
    }
}
?>