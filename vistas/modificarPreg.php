<!DOCTYPE html>
<html>

<head>
    <title>Modifica Preguntas</title>
    <!-- por ahora tiene los mismo estilos que creaPreguntas -->
    <link rel="stylesheet" href="http://virtual.localpablo.com/css/estiloscreaPreg.css">
    <script src="http://virtual.localpablo.com/js/nav.js"></script>
</head>

<body>
    <div class="navbar">
        <img src="/css/imagenes/logo.png" alt="Logo">
        <h1>Modifica Preguntas</h1>
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
                <option value="Dificultad1">Fácil</option>
                <option value="Dificultad2">Medio</option>
                <option value="Dificultad3">Difícil</option>
            </select>
            <select id="botonCat">
                <option value="" disabled selected>Selecciona una categoría</option>
                <option value="Categoria">Autopista</option>
                <option value="Categoria">Coches</option>
                <option value="Categoria">Motos</option>
            </select>
            <h1>Enunciado:</h1>
            <textarea id="enunciado" rows="5" cols="50"></textarea>

            <h2>Opciones:</h2>
            <textarea id="opcion1" rows="3" cols="50" placeholder="Opción 1"></textarea>
            <textarea id="opcion2" rows="3" cols="50" placeholder="Opción 2"></textarea>
            <textarea id="opcion3" rows="3" cols="50" placeholder="Opción 3"></textarea>

        </div>
    </div>
</body>

</html>