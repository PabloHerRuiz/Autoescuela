<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://virtual.localpablo.com/Autoescuela/css/estilosRegistro.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/database/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/repositorios/userRepository.php';
    if (isset($_POST['registro'])) {
        $conn = db::abreConexion();
        $userRepository = new UserRepository($conn);
        if (!empty($_POST['newUser']) && !empty($_POST['newPw'])) {
            $userRepository->createUser($_POST['newUser'], $_POST['newPw']);
        }
    }
    ?>

    <form enctype="multipart/form-data" action="registro.php" method="post">
        <h2>Registro de usuario:</h2>
        <p><input type="text" name="newUser" placeholder="Nombre"></p>
        <p><input type="password" name="newPw" placeholder="Contraseña"></p>
        <p><input type="submit" name="registro" value="Registrar"></p>
        <p><a href="http://virtual.localpablo.com/Autoescuela/index.php">Ya tienes cuenta?</a></p>
    </form>

</body>

</html>