<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link rel="stylesheet" href="http://virtual.localpablo.com/Autoescuela/css/estilosHomeAlu.css">
</head>

<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/autocargador.php';

    ?>
    <div class="navbar">
        <img src="/Autoescuela/css/imagenes/logo.png" alt="Logo">
        <h1>HOME</h1>
        <div class="icons">
            <img src="/Autoescuela/css/imagenes/usuario.png" alt="Perfil">
            <img src="/Autoescuela/css/imagenes/configuraciones.png" alt="Ajustes">
            <img src="/Autoescuela/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>
    <div class="content">
        <div class="button-container">
            <button>Test</button>
            <button>Test de Errores</button>
        </div>
    </div>
</body>

</html>