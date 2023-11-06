<!DOCTYPE html>
<html>

<head>
    <title>Listado Alumnos</title>

    <link rel="stylesheet" href="http://virtual.localpablo.com/Autoescuela/css/estilosListadoAlu.css">
</head>

<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/Autoescuela/helpers/autocargador.php';

    ?>
    <div class="navbar">
        <img src="/Autoescuela/css/imagenes/logo.png" alt="Logo">
        <h1>Listado Alumnos</h1>
        <div class="icons">
            <img src="/Autoescuela/css/imagenes/usuario.png" alt="Perfil">
            <img src="/Autoescuela/css/imagenes/configuraciones.png" alt="Ajustes">
            <img src="/Autoescuela/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>

    <div id="contenedor">
        <div id="preguntas-container">
            <h2>ALUMNOS</h2>

        </div>


        <div id="info-container">
            <div id="cuadrado-exterior">
                <div id="cuadrado-interior"></div>
            </div>
            <div id="info-text">
                <p>Nombre:</p>
                <p>Apellidos:</p>
                <p>Nº de exámenes resueltos:</p>
                <p>Promedio de aprobar:</p>
                <p>Promedio de errores:</p>
            </div>
        </div>


    </div>
</body>

</html>