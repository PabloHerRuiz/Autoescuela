window.addEventListener("load", function () {

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

                            contenedorTest.appendChild(testAux);
                        }
                    })
            })

})