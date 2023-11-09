<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn = db::abreconexion();
        $userRepository = new UserRepository($conn);
        $usuarios = $userRepository->readUser($id);

        $user = [];
        foreach ($usuarios as $usuario) {
            $user = [
                "id" => $usuario['idUser'],
                "nombre" => $usuario['nombre'],
                "pass" => $usuario['password'],
                "rol" => $usuario['rol']
            ];
            $users[] = $user;
        }

        header('Content-Type: application/json');
        echo json_encode($users);
    } else if ($_GET['menu'] == "alta") {

        $conn = db::abreconexion();
        $userRepository = new UserRepository($conn);
        $usuarios = $userRepository->getAllUserNoRol();

        $user = [];
        foreach ($usuarios as $usuario) {
            $user = [
                "id" => $usuario['idUser'],
                "nombre" => $usuario['nombre'],
                "pass" => $usuario['password'],
                "rol" => $usuario['rol']
            ];
            $users[] = $user;
        }

        header('Content-Type: application/json');
        echo json_encode($users);
    } else {
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
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $id = $_GET["id"];
    $rol = $_GET["rol"];
    $conn = db::abreconexion();
    $userRepository = new UserRepository($conn);
    $userRepository->updateUserRol($id, $rol);

} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $_GET["id"];
    $conn = db::abreconexion();
    $userRepository = new UserRepository($conn);
    $userRepository->deleteUser($id);
}

?>