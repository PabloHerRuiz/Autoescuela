<!DOCTYPE html>
<html>

<head>
    <title>Listado Tests</title>

    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <script src="/js/nav.js"></script>
    <script src="/js/test.js"></script>
    <script src="https://kit.fontawesome.com/11fb434823.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    sesion::iniciar_sesion();
    ?>
    <div class='estadisticas' id="mostrartabla"><img src="/css/imagenes/estadisticas.png" alt=""></div>
    <div class="datos" id="tabla-container">
        <table id="tabla">
            <thead>
                <tr>
                    <th>ID EXAMEN</th>
                    <th>ACIERTOS</th>
                    <th>VOLVER A INTENTAR</th>
                    
                </tr>
            </thead>
            <tbody id="bodyTabla">
            </tbody>
        </table>
    </div>

    <div id="test-container"></div>
</body>

</html>