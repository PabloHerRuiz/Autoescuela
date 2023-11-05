<?php
// echo "estas dentro";

require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/autocargador.php';
$conn=db::abreConexion();
$userRepository= new UserRepository($conn);

$userData = $userRepository->readUser(1);

foreach ($userData as $key => $value) {
    echo $key ."->". $value . "<br>";
}


?>