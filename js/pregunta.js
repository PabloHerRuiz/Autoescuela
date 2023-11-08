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
            "dif": dificultad.value,
            "cat": categoria.value,
            "enun": enunciado.value,
            "op1": op1.value,
            "op2": op2.value,
            "op3": op3.value,
            "cor": correcta.value
        };

        console.log(pregunta);

        var preguntaJson = JSON.stringify(pregunta);

        // Realiza la solicitud POST
        fetch("http://virtual.localpablo.com/API/apiPregunta.php", {
            method: "POST",
            body: preguntaJson,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
            .then(x => x.text())
            .then(y => {
                if (y.respuesta == "OK") {
                    console.log("pregunta creada");
                    document.location = "?menu=crea";
                }
            })
    });


    //listado de preguntas:
    var contenedorPreg = document.getElementById("preguntas-container");
    fetch("http://virtual.localpablo.com/vistas/plantillas/listadoPreg.html")
        .then(x => x.text())
        .then(y => {
            var contenedor = document.createElement("div");
            contenedor.innerHTML = y;
            var pregunta = contenedor.querySelector('.pregunta');
            fetch("http://virtual.localpablo.com/API/apiPregunta.php")
                .then(x => x.json())
                .then(y => {
                    for (let i = 0; i < y.length; i++) {
                        var pregAux = pregunta.cloneNode(true);
                        pregAux.getElementsByClassName("enunciado")[0].innerHTML = y[i].enunciado;
                        pregAux.setAttribute("data-id", y[i].id);

                        (function (elemento) {
                            elemento.addEventListener("click", function () {
                                var id = elemento.dataset.id;
                                fetch("http://virtual.localpablo.com/API/apiPregunta.php?id=" + id)
                                    .then(x => x.json())
                                    .then(y => {
                                        dificultad.value=y[0].idDificultad;
                                        categoria.value=y[0].idCategoria;
                                        enunciado.value=y[0].enunciado;
                                        op1.value=y[0].op1;
                                        op2.value=y[0].op2;
                                        op3.value=y[0].op3;
                                        correcta.value=y[0].correcta;
                                        //poner que al pulsar aparezca el boton de editar o algo que diga que se esta editando
                                        // tambien habria que poner que el boton de guardar no guarde sino que modifique los campos
                                    })




                                
                            });
                        })(pregAux);


                        contenedorPreg.appendChild(pregAux);
                    }
                })
        })







});
