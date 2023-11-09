<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link rel="stylesheet" href="/css/estilosHomeAlu.css">
    <script src="/js/nav.js"></script>
</head>

<body>
    <?php
    Sesion::iniciar_sesion();
    ?>
    <div class="navbar">
        <img src="/css/imagenes/logo.png" alt="Logo">
        <h1>HOME</h1>
        <div class="icons">
            <img id="perfil" src="/css/imagenes/usuario.png" alt="Perfil">
            <img id="ajustes" src="/css/imagenes/configuraciones.png" alt="Ajustes">
            <img id="cerrar" src="/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>
    <div class="content">
        <div class="button-container">
            <button>Test</button>
            <button>Test de Errores</button>
            <button>Generar Test</button>
        </div>
    </div>
    
</body>

</html>