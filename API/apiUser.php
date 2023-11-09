<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = db::abreconexion();
    $userRepository = new UserRepository($conn);
    $usuarios = $userRepository->getAllUser();

    $user = [];
    foreach ($usuarios as $usuario) {
        $user = [
            "id" => $usuario['idUser'],
            "nombre" => $usuario['nombre']
        ];
        $users[] = $user;
    }

    header('Content-Type: application/json');
    echo json_encode($users);
}

?>