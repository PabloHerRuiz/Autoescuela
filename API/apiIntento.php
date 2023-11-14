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

    echo '{"respuesta":"OK"}';

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
                "aciertos" => 3
            ];
            $ints[] = $int;
        }

        header('Content-Type: application/json');
        echo json_encode($ints);


}

?>