<!DOCTYPE html>
<html>

<head>
    <title>Crea Preguntas</title>
    <link rel="stylesheet" href="http://virtual.localpablo.com/css/estilosCreaPreg.css">
    <script src="http://virtual.localpablo.com/js/nav.js"></script>
    <script src="http://virtual.localpablo.com/js/pregunta.js"></script>
    <script src="http://virtual.localpablo.com/js/dificultad.js"></script>
    <script src="http://virtual.localpablo.com/js/categoria.js"></script>
</head>

<body>
    <div class="navbar">
        <img src="/css/imagenes/logo.png" alt="Logo">
        <h1>Crea Preguntas</h1>
        <div class="icons">
            <img id="perfil" src="/css/imagenes/usuario.png" alt="Perfil">
            <img id="ajustes" src="/css/imagenes/configuraciones.png" alt="Ajustes">
            <img id="cerrar" src="/css/imagenes/cerrar-sesion.png" alt="Cierra sesion">
        </div>
    </div>

    <div id="contenedor">
        <div id="preguntas-container">
            <h2>PREGUNTAS</h2>

        </div>

        <div id="Examen">
            <select id="botonDif">
                <option value="" disabled selected>Selecciona una dificultad</option>
            </select>
            <select id="botonCat">
                <option value="" disabled selected>Selecciona una categoría</option>
            </select>
            <h1>Enunciado:</h1>
            <textarea id="enunciado" rows="5" cols="50"></textarea>

            <h2>Opciones:</h2>
            <textarea id="opcion1" rows="3" cols="50" placeholder="Opción 1"></textarea>
            <textarea id="opcion2" rows="3" cols="50" placeholder="Opción 2"></textarea>
            <textarea id="opcion3" rows="3" cols="50" placeholder="Opción 3"></textarea>

            <select id="botonCor">
                <option value="" disabled selected>Selecciona la correcta</option>
                <option value="1">Opción 1</option>
                <option value="2">Opción 2</option>
                <option value="3">Opción 3</option>
            </select>
            <input type="file" value="imagen">
        </div>
        <img id="guardar" src="/css/imagenes/guardar.png" alt="Guardar">
    </div>
</body>

</html>