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
                                });
                            })(testAux, i);
                            

                            contenedorExamen.appendChild(testAux);
                        }
                    })
            })
    }

})