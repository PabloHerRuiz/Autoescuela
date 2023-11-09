<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/estilosLogin.css">
</head>

<body>
    <?php
    //creamos validator
    $valida = new Validator() ;
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
                $userRepository = new UserRepository($conn);
                $user=$userRepository->encuentra($_POST['nombre'],md5($_POST['pass']));
                if ($login->user_login($user)) {
                    header("location:?menu=home");
                }
            }
        }
    }

    ?>
    <form action="index.php" method="post">
        <h2>Login</h2>
        <p><input type="text" name="nombre" placeholder="Usuario"></p>
        <?= $valida->ImprimirError('nombre') ?>
        <p><input type="password" name="pass" placeholder="Contraseña"></p>
        <?= $valida->ImprimirError('pass') ?>
        <p><input type="submit" name="login" value="Iniciar Sesion"></p>
        <p><a href="index.php?menu=registro">Create una cuenta</a></p>


    </form>
</body>

</html>