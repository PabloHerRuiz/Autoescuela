window.addEventListener("load", function () {

    var url = new URL(window.location.href);

    var menu = url.searchParams.get("menu");
    var rol = url.searchParams.get("rol");

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
                            testAux.getElementsByClassName("idtest")[0].innerHTML = (i + 1);
                            testAux.setAttribute("data-id", y[i].idExamen);

                            (function (elemento) {
                                elemento.addEventListener("click", function () {
                                    document.location = "?menu=examen&id=" + y[i].idExamen + "&rol=" + rol;
                                });
                            })(testAux);



                            contenedorTest.appendChild(testAux);
                        }
                    })
            })

        var play = true;

        var datosAlu = document.getElementById("tabla-container");
        var mostrartabla = document.getElementById("mostrartabla");
        var tabla = document.getElementById("tabla");
        var tbody = document.getElementById("bodyTabla");

        mostrartabla.addEventListener("click", function () {

            if (play) {
                datosAlu.style.transition = 'width 0.5s ease-in-out';
                datosAlu.style.width = '30%';
                tabla.style.display = "table";
                play = false;
                setTimeout(function () {
                    tabla.style.opacity = 1;
                }, 700);

            } else {

                datosAlu.style.transition = 'width 0.5s ease-in-out';
                datosAlu.style.width = '0%';
                tabla.style.display = "none";
                play = true;
                setTimeout(function () {
                    tabla.style.display = "none";
                }, 500);
            }
        })

        fetch("http://virtual.localpablo.com/API/apiIntento.php")
            .then(x => x.json())
            .then(y => {
                console.log(y);
                if (y && y.length > 0) {
                    let tableContent = "";
                    y.forEach(datos => {
                        tableContent += `<tr>`;
                        tableContent += `<td>${datos.idExamen}</td>`;
                        tableContent += `<td>${datos.aciertos}</td>`;
                        tableContent += `<td><a class="reintentar" href="?menu=examen&id=${datos.idExamen}&rol=${rol}"><img src="/css/imagenes/reintentar.png"></a></td>`;

                        tableContent += `</tr>`;

                    });
                    tbody.innerHTML = tableContent;
                }
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
                            testAux.getElementsByClassName("idtest")[0].innerHTML = (i + 1);
                            testAux.setAttribute("data-id", y[i].id);

                            radioBtn = document.querySelector(".radio-buttons");
                            radioBtn.style.display = "none";

                            (function (elemento, indice) {
                                elemento.addEventListener("click", function () {
                                    caja = document.querySelector(".caja-grande");
                                    caja.innerHTML = y[indice].enunciado;

                                    radioBtn.style.display = "";

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



        //finalizar examen
        var btnFinalizar = document.querySelector("#fin");
        btnFinalizar.addEventListener("click", function () {

            var comprobacion = getResp();
            var comprobacionDone = JSON.stringify(comprobacion);
            var jsonRaw = {
                "json": comprobacionDone
            };

            var jsonDone = JSON.stringify(jsonRaw);

            // Muestra la ventana de confirmación con la variable aciertos
            var confirmacion = window.confirm('¿Estás seguro de finalizar el Examen?');

            // Si el usuario hace clic en "Aceptar"
            if (confirmacion) {
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
                        // aciertos = y;
                        console.log("intento creado");
                        console.log(y);
                        document.location = "?menu=test&rol=" + rol;
                    })
            }
            // Borra el elemento con la clave "respuestas" del localStorage
            localStorage.removeItem("respuestas");
        })

        //timer
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
                timerElement.textContent = 'FIN';

                ejecutarAlTerminar();

            }
        }

        // Llama a la función actualizarTemporizador cada segundo (1000 milisegundos)
        var intervalId = setInterval(actualizarTemporizador, 1000);

        // Función para ejecutar cuando el temporizador llega a cero
        function ejecutarAlTerminar() {
            alert('¡El tiempo se ha acabado!');
            document.location = "?menu=test&rol=" + rol;
        }


    } else {
        //generar examen
        var cant = document.getElementById("cantidad");
        var select = document.getElementById("botonCat");
        var genExamen = document.getElementById("genExamen");

        select.addEventListener("change", function () {
            var cat = select.value;
            fetch("http://virtual.localpablo.com/API/apiPregunta.php?modo=maximo&cat=" + cat)
                .then(x => x.text())
                .then(y => {
                    console.log(y);
                    cant.value = y;
                    cant.max = y;
                });
        });

        genExamen.addEventListener("click", function () {
            var cat = select.value;

            //manejar error
            // Almacenar mensajes de error
            var errores = [];
            // Validar que los campos no estén vacíos
            if (select.value === "") {
                errores.push('Por favor, selecciona una categoria.');
            }

            // Mostrar alerta con mensajes de error
            if (errores.length > 0) {
                alert(errores);
                // alert('Todos los campos son obligatorios. Por favor, completa todos los campos:\n\n' + errores.join('\n'));
                return;
            }


            fetch("http://virtual.localpablo.com/API/apiPregunta.php?todo=1&cat=" + cat)
                .then(x => x.json())
                .then(y => {
                    var idPregs = y;
                    idPregs.sort(function (a, b) { return Math.random() - 0.5 });
                    idPregs.splice(cant.value);

                    var crear = {
                        "id": idPregs
                    };

                    crearJson = JSON.stringify(crear);

                    if (menu == "homeadmin") {
                        var todos = document.getElementById("check");
                        if (todos.checked == true) {
                            var id = 1;
                        }
                    }
                    // Creamos el examen con las preguntas
                    fetch("http://virtual.localpablo.com/API/apiTest.php?id=" + id, {
                        method: "POST",
                        body: crearJson,
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                        .then(x => x.text())
                        .then(y => {
                            alert("examen creado");
                            console.log(y);
                        })
                });
        });





    }

})