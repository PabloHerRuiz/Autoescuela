<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <script src="/js/nav.js"></script>
    <script src="/js/home.js"></script>
    <script src="https://kit.fontawesome.com/11fb434823.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    Sesion::iniciar_sesion();
    ?>

    <div class="content">
        <div class="button-container">
            <button id="irTest">Test</button>
            <button id="irTestERR">Test de Errores</button>
            <button id="irGenT">Generar Test</button>
        </div>
    </div>

</body>

</html>