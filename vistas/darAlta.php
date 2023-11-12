<!DOCTYPE html>
<html>

<head>
    <title>Dar Alta Alumnos</title>

    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <script src="/js/nav.js"></script>
    <script src="/js/user.js"></script>
</head>

<body>
    <div class="navbar">
        <img id="logo" src="/css/imagenes/logo.png" alt="Logo">
        <h1>Dar Alta</h1>
        <div class="icons">
            <img id="perfil" src="/css/imagenes/usuario.png" alt="Perfil">
            <img id="ajustes" src="/css/imagenes/configuraciones.png" alt="Ajustes">
            <img id="cerrar" src="/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>

    <div id="botonAlta-list">
        <button id="irList">Listado Alumnos</button>
    </div>

    <div id="contenedor">
        <div id="alumnos-container">
            <h2>ALUMNOS</h2>

        </div>


        <div id="info-container">
            <div id="cuadrado-exterior">
                <div id="cuadrado-interior"></div>
            </div>
            <div id="info-text">
                <p>Nombre: <span class="nombreperfil"></span></p>
                <p>Apellidos:</p>
                <div class="botones-roles">
                    <button id="rolAlu">Alumno</button>
                    <button id="rolProf">Profesor</button>
                    <button id="rolAdmin">Admin</button>
                </div>
            </div>
        </div>


    </div>
</body>

</html>