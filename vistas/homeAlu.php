<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link rel="stylesheet" href="http://virtual.localpablo.com/Autoescuela/css/estilosHomeAlu.css">
    
</head>

<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/autocargador.php';
    Sesion::iniciar_sesion();
    ?>
    <div class="navbar">
        <img src="/Autoescuela/css/imagenes/logo.png" alt="Logo">
        <h1>HOME</h1>
        <div class="icons">
            <img id="perfil" src="/Autoescuela/css/imagenes/usuario.png" alt="Perfil">
            <img id="ajustes" src="/Autoescuela/css/imagenes/configuraciones.png" alt="Ajustes">
            <img id="cerrar" src="/Autoescuela/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>
    <div class="content">
        <div class="button-container">
            <button>Test</button>
            <button>Test de Errores</button>
            <button>Generar Test</button>
        </div>
    </div>
    <script src="http://virtual.localpablo.com/Autoescuela/js/nav.js"></script>
</body>

</html>