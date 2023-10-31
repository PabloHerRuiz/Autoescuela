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
    db::abreConexion();
    ?>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <p><input type="text" name="nombre" placeholder="Usuario"></p>
        <p><input type="password" name="pass" placeholder="Contraseña"></p>
        <p><input type="submit" name="login" value="Iniciar Sesion"></p>
        <a href="http://virtual.localpablo.com/Autoescuela/vistas/registro.php">Create una cuenta</a>
        
    </form>
</body>

</html>