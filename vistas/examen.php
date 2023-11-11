<!DOCTYPE html>
<html>

<head>
    <title>EXAMEN</title>

    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <script src="/js/nav.js"></script>
    <script src="/js/test.js"></script>
</head>

<body>
    <div class="navbar">
        <img src="/css/imagenes/logo.png" alt="Logo">
        <h1>Examen</h1>
        <div class="icons">
            <img id="perfil" src="/css/imagenes/usuario.png" alt="Perfil">
            <img id="ajustes" src="/css/imagenes/configuraciones.png" alt="Ajustes">
            <img id="cerrar" src="/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>

    <div id="exam-container">
        <div class="caja-grande"></div>
        <div class="caja-larga"></div>
        <div class="radio-buttons">
            <input type="radio" value="1" class="radio-button"><span class="resp"></span><br>
            <input type="radio" value="2" class="radio-button"><span class="resp"></span><br>
            <input type="radio" value="3" class="radio-button"><span class="resp"></span><br>
        </div>
        <div class="caja-alargada"></div>
        <div class="timer"></div>
        <div class="terminar"><button id="fin">Finalizar</button></div>
    </div>

</body>

</html>