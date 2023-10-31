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
    db::abreConexion();
    ?>

    <form enctype="multipart/form-data" action="registro.php" method="post">
        <h2>Registro de usuario:</h2>
        <p><input type="text" name="newUser" placeholder="Nombre"></p>
        <p><input type="password" name="newPw" placeholder="Contraseña"></p>
        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
        Enviar este fichero: <input name="fichero_usuario" type="file" />
        <p><input type="submit" name="Enviar_fichero" value="Enviar fichero" /></p>
        <p><a href="http://virtual.localpablo.com/Autoescuela/vistas/identificacion.php">Ya tienes cuenta?</a></p>
    </form>

</body>

</html>