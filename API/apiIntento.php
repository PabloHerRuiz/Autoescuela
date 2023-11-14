<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    sesion::iniciar_sesion();
    $user=sesion::leer_sesion("usuario");
    $id = $_GET["id"];
    // Obtén los datos enviados en la solicitud POST
    $datos = json_decode(file_get_contents("php://input"), true);

    $conn = db::abreconexion();
    $intentoRepository = new IntentoRepository($conn);
    $intentoRepository->createIntento($id, $datos['json'], $user->getIdUser());
    $preguntaRepository= new preguntaRepository($conn);
    $preguntas=$preguntaRepository->getAllCor($id);

    $correctas = [];

    foreach ($preguntas as $index => $pregunta) {
        $correctas["r" . ($index + 1)] = strval($pregunta['correcta']);
    }

    $comprobar=json_decode($datos["json"],true);

    $aciertos=$preguntaRepository->compararRespuestas($comprobar,$correctas);

    echo $aciertos;

} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    sesion::iniciar_sesion();
    $user=sesion::leer_sesion("usuario");
    $conn = db::abreconexion();
    $intentoRepository = new IntentoRepository($conn);
    $intentos= $intentoRepository->getALLIntentos($user->getIdUser());


    $int = [];
        foreach ($intentos as $intento) {
            $int = [
                "idExamen" => $intento['Examen_idExamen'],
                //cambiar el tres por los aciertos reales
                "aciertos" => 3
            ];
            $ints[] = $int;
        }

        header('Content-Type: application/json');
        echo json_encode($ints);


}

?>