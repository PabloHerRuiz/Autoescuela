window.addEventListener("load", function () {

    // Establece el tiempo inicial a 30 minutos (en segundos)
    var tiempoRestante = 30 * 60;

    // Obtén la referencia al elemento con la clase "timer"
    var timerElement = document.querySelector('.timer');

    // Función que actualiza el temporizador
    function actualizarTemporizador() {
        // Calcula minutos y segundos restantes
        var minutos = Math.floor(tiempoRestante / 60);
        var segundos = tiempoRestante % 60;

        // Formatea el tiempo en formato MM:SS
        var tiempoFormateado = minutos.toString().padStart(2, '0') + ':' + segundos.toString().padStart(2, '0');

        // Actualiza el contenido del elemento con la clase "timer"
        timerElement.textContent = tiempoFormateado;

        // Reduce el tiempo restante en 1 segundo
        tiempoRestante--;

        // Verifica si el tiempo ha llegado a cero
        if (tiempoRestante < 0) {
            clearInterval(intervalId); // Detén el temporizador cuando llega a cero
            timerElement.textContent = 'Tiempo agotado';
            // Aquí puedes agregar la lógica que deseas ejecutar cuando se agote el tiempo
        }
    }

    // Llama a la función actualizarTemporizador cada segundo (1000 milisegundos)
    var intervalId = setInterval(actualizarTemporizador, 1000);
})