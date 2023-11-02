<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://virtual.localpablo.com/Autoescuela/css/estilosLogin.css">
</head>

<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/database/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/login.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/validator.php';
    

    $valida = new Validator();
    if (isset($_POST['login'])) {
        $conn = db::abreConexion();
        $login=new login($conn);

        $valida->Requerido('nombre');
        $valida->Requerido('pass');
        //Comprobamos validacion
        if ($valida->ValidacionPasada()) {
            if ($login->user_login($_POST['nombre'], $_POST['pass'])) {
                header("location:http://virtual.localpablo.com/Autoescuela/vistas/prueba.php");
            }
        }
    }

    ?>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <p><input type="text" name="nombre" placeholder="Usuario"></p>
        <?= $valida->ImprimirError('nombre') ?>
        <p><input type="password" name="pass" placeholder="Contraseña"></p>
        <p><input type="submit" name="login" value="Iniciar Sesion"></p>
        <a href="http://virtual.localpablo.com/Autoescuela/vistas/registro.php">Create una cuenta</a>

    </form>
</body>

</html>