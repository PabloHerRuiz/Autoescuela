<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://virtual.localpablo.com/Autoescuela/css/estilosLogin.css">
    <title>Document</title>
</head>
<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/database/db.php';

    db::abreConexion();
    require_once $_SERVER["DOCUMENT_ROOT"] .'/Autoescuela/vistas/identificacion.php';
    ?>
</body>
</html>