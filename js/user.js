window.addEventListener("load", function () {
    //contenido
    var nombrePerfil = document.getElementById("nombreperfil");
    var idAlu = document.createElement("span");

    //funcionalidad
    idAlu.classList.add("id");

    //listado
    function ActualizaListado() {

        // Borra los elementos existentes dentro de contenedorAlu
        var contenedorAlu = document.getElementById("preguntas-container");

        // Obtén el elemento h2 dentro de contenedorAlu
        var h2 = contenedorAlu.querySelector("h2");

        while (contenedorAlu.firstChild) {
            contenedorAlu.removeChild(contenedorAlu.firstChild);
        }

        // Vuelve a agregar el elemento h2
        contenedorAlu.appendChild(h2);

        fetch("http://virtual.localpablo.com/vistas/plantillas/listadoAlu.html")
            .then(x => x.text())
            .then(y => {
                
                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var alumno = contenedor.querySelector('.alumno');
                fetch("http://virtual.localpablo.com/API/apiUser.php")
                    .then(x => x.text())
                    .then(y => {
                        console.log(y);
                        for (let i = 0; i < y.length; i++) {
                            var aluAux = alumno.cloneNode(true);
                            aluAux.getElementsByClassName("nombrelista")[0].innerHTML = y[i].nombre;
                            aluAux.setAttribute("data-id", y[i].id);

                            (function (elemento) {
                                elemento.addEventListener("click", function () {
                                    var id = elemento.dataset.id;
                                    fetch("http://virtual.localpablo.com/API/apiUser.php?id=" + id)
                                        .then(x => x.json())
                                        .then(y => {
                                            nombrePerfil.value = y[0].nombre;
                                        })
                                });
                            })(aluAux);


                            contenedorAlu.appendChild(idAlu);
                            contenedorAlu.appendChild(aluAux);
                        }
                    })
            })
    }

    ActualizaListado();




});