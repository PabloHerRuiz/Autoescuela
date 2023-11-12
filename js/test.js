window.addEventListener("load", function () {

    var url = new URL(window.location.href);

    var menu = url.searchParams.get("menu");

    if (menu == "test") {
        var contenedorTest = document.getElementById("test-container");

        // //creamos las cajas
        fetch("http://virtual.localpablo.com/vistas/plantillas/testAlu.html")
            .then(x => x.text())
            .then(y => {
                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var test = contenedor.querySelector('.test');
                fetch("http://virtual.localpablo.com/API/apiTest.php")
                    .then(x => x.json())
                    .then(y => {
                        console.log(y);
                        for (let i = 0; i < y.length; i++) {
                            var testAux = test.cloneNode(true);
                            testAux.getElementsByClassName("idtest")[0].innerHTML = i;
                            testAux.setAttribute("data-id", y[i].idExamen);

                            (function (elemento) {
                                elemento.addEventListener("click", function () {
                                    document.location = "?menu=examen&id=" + y[i].idExamen;
                                });
                            })(testAux);



                            contenedorTest.appendChild(testAux);
                        }
                    })
            })
    } else if (menu == "examen") {
        var contenedorExamen = document.querySelector(".caja-alargada");
        var id = url.searchParams.get("id");


        //funcion que guarda las respuestas en un json en el localstorage
        function guardarResp() {
            var seleccionadas = document.querySelectorAll("input:checked");
            var listaResp = JSON.parse(localStorage.getItem("respuestas")) || {};

            seleccionadas.forEach(function (resp) {
                var name = resp.name;
                var valor = resp.value;

                // Añade o sobrescribe el valor para el nombre dado
                listaResp[name] = valor;
            });

            localStorage.setItem("respuestas", JSON.stringify(listaResp));
        }

        //cogemos el array del localstorage
        function getResp() {
            var respuestas = localStorage.getItem("respuestas");
            if (respuestas === null) {
                lista = {};
            } else {
                lista = JSON.parse(respuestas);
            }
            return lista;
        }
        //cargamos las respuestas
        function cargaResp() {
            var marcadas = getResp();

            // Desmarcar todos los radio buttons antes de cargar las respuestas
            var radioButtons = document.querySelectorAll('.radio-buttons input[type="radio"]');
            radioButtons.forEach(function (radio) {
                radio.checked = false;
            });

            for (var clave in marcadas) {
                if (marcadas.hasOwnProperty(clave)) {
                    var valor = marcadas[clave];

                    var coincide = document.querySelector('input[type="radio"][value="' + valor + '"][name="' + clave + '"]');

                    if (coincide) {
                        coincide.checked = true;
                    }
                }
            }
        }


        // //creamos las cajas
        fetch("http://virtual.localpablo.com/vistas/plantillas/testAlu.html")
            .then(x => x.text())
            .then(y => {
                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var test = contenedor.querySelector('.test');
                fetch("http://virtual.localpablo.com/API/apiTest.php?id=" + id)
                    .then(x => x.json())
                    .then(y => {
                        console.log(y);
                        for (let i = 0; i < y.length; i++) {
                            var testAux = test.cloneNode(true);
                            testAux.getElementsByClassName("idtest")[0].innerHTML = i;
                            testAux.setAttribute("data-id", y[i].id);

                            (function (elemento, indice) {
                                elemento.addEventListener("click", function () {
                                    caja = document.querySelector(".caja-grande");
                                    caja.innerHTML = y[indice].enunciado;

                                    opciones = document.querySelectorAll(".resp");
                                    opciones[0].textContent = y[indice].op1;
                                    opciones[1].textContent = y[indice].op2;
                                    opciones[2].textContent = y[indice].op3;

                                    document.querySelectorAll(".radio-buttons input")[0].setAttribute("name", "r" + (indice + 1));
                                    document.querySelectorAll(".radio-buttons input")[1].setAttribute("name", "r" + (indice + 1));
                                    document.querySelectorAll(".radio-buttons input")[2].setAttribute("name", "r" + (indice + 1));

                                    // Añade un evento change para llamar a guardarResp cuando se selecciona un input
                                    var radioButtons = document.querySelectorAll(".radio-buttons input");
                                    radioButtons.forEach(function (radio) {
                                        radio.addEventListener("change", function () {
                                            guardarResp();
                                        });
                                    });
                                    cargaResp();
                                });
                            })(testAux, i);


                            contenedorExamen.appendChild(testAux);
                        }
                    })
            })

        //conseguimos las respuestas correctas en formato json
        function getCor() {
            return fetch("http://virtual.localpablo.com/API/apiPregunta.php?cor=1&id=" + id)
                .then(x => x.json())
                .then(y => {
                    return y; // Devolvemos el valor para que esté disponible en la cadena then siguiente
                });
        }

        //comprobar preguntas
        function compararRespuestas(respuestasEstudiante, respuestasCorrectas) {
            var aciertos = 0;

            for (var pregunta in respuestasEstudiante) {
                // Compara la respuesta del estudiante con la respuesta correcta
                if (respuestasEstudiante[pregunta] === respuestasCorrectas[pregunta]) {
                    aciertos++;
                }
            }

            return aciertos;
        }

        //finalizar examen
        var btnFinalizar = document.querySelector("#fin");

        btnFinalizar.addEventListener("click", function () {
            var comprobacion = getResp();

            // Llamamos a la función getCor
            getCor().then(correctas => {
                var aciertos = compararRespuestas(comprobacion, correctas);
                console.log("estos son los aciertos " + aciertos);
            })

            var comprobacionDone = JSON.stringify(comprobacion);
            //hay que cambiar esto con el id del usuario del sesion start pero ahora mismo me da pereza
            var jsonRaw = {
                "idUser": 1,
                "json": comprobacionDone
            };

            var jsonDone = JSON.stringify(jsonRaw);

            fetch("http://virtual.localpablo.com/API/apiIntento.php?id=" + id, {
                method: "POST",
                body: jsonDone,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
                .then(x => x.text())
                .then(y => {
                    console.log(y);
                    console.log("intento creado");
                })

        })




    }

})