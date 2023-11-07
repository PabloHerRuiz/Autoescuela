window.addEventListener("load", function () {
    //contenido
    var dificultad = document.getElementById("botonDif");
    var categoria = document.getElementById("botonCat");
    var enunciado = document.getElementById("enunciado");
    var op1 = document.getElementById("opcion1");
    var op2 = document.getElementById("opcion2");
    var op3 = document.getElementById("opcion3");
    var correcta = document.getElementById("botonCor");

    //funcionalidad
    var imgGuardar = document.getElementById("guardar");

    imgGuardar.addEventListener("click", function () {
        var pregunta = {
            dif: dificultad.value,
            cat: categoria.value,
            enun: enunciado.value,
            op1: op1.value,
            op2: op2.value,
            op3: op3.value,
            cor: correcta.value
        };

        console.log(pregunta);

        var options = {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(pregunta)
        };
        var url = "http://virtual.localpablo.com/API/apiPregunta.php";

        console.log(options);

        // Realiza la solicitud POST
        fetch(url, options)
            .then(x => x.json)
            .then(y => {
                if (y.respuesta = "OK") {

                    // document.location = "?menu=crea";
                }
            })
    });
})
