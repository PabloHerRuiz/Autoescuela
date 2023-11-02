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

    //creamos validator
    $valida = new Validator();
    //comprobamos que se ha hecho el post de formulario
    if (isset($_POST['login'])) {
        //creamos conexion y login
        $conn = db::abreConexion();
        $login = new login($conn);

        //validamos
        $valida->Requerido('nombre');
        $valida->Requerido('pass');
        //Comprobamos validacion
        if ($valida->ValidacionPasada()) {
            if (!empty($_POST['nombre']) && !empty($_POST['pass'])) {
                if ($login->user_login($_POST['nombre'], $_POST['pass'])) {
                    header("location:http://virtual.localpablo.com/Autoescuela/vistas/prueba.php");
                }
            }
        }
    }

    ?>
    <form action="vistas/identificacion.php" method="post">
        <h2>Login</h2>
        <p><input type="text" name="nombre" placeholder="Usuario"></p>
        <?= $valida->ImprimirError('nombre') ?>
        <p><input type="password" name="pass" placeholder="Contraseña"></p>
        <?= $valida->ImprimirError('pass') ?>
        <p><input type="submit" name="login" value="Iniciar Sesion"></p>
        <a href="http://virtual.localpablo.com/Autoescuela/vistas/registro.php">Create una cuenta</a>

    </form>
</body>

</html>