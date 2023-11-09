window.addEventListener("load", function () {
    //contenido
    var nombrePerfil = document.querySelector(".nombreperfil");
    var idAlu = document.createElement("span");
    var info = document.getElementById("info-container");
    var btnAlu = document.getElementById("rolAlu");
    var btnProf = document.getElementById("rolProf");
    var btnAdmin = document.getElementById("rolAdmin");

    //funcionalidad
    idAlu.classList.add("id");
    info.style.display = "none";

    // Obtener la URL actual
    var url = new URL(window.location.href);

    // Obtener el valor del parámetro 'id'
    var menu = url.searchParams.get("menu");

    //listado
    function ActualizaListado() {

        // Borra los elementos existentes dentro de contenedorAlu
        var contenedorAlu = document.getElementById("alumnos-container");

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
                fetch("http://virtual.localpablo.com/API/apiUser.php?menu=" + menu)
                    .then(x => x.json())
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
                                            info.style.display = "";
                                            nombrePerfil.textContent = y[0].nombre;
                                            nombrePerfil.value = id;
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


    //botones roles

    //boton de alumno
    btnAlu.addEventListener("click", function () {
        idR = nombrePerfil.value;
        fetch("http://virtual.localpablo.com/API/apiUser.php?rol=alumno&id=" + idR,
            {
                method: "PUT"
            })
            .then(x => x.text())
            .then(y => {
                console.log("rol de alumno");
            })
        ActualizaListado();
    })

    //boton de profesor
    btnProf.addEventListener("click", function () {
        idR = nombrePerfil.value;
        fetch("http://virtual.localpablo.com/API/apiUser.php?rol=profesor&id=" + idR,
        {
            method: "PUT"
        })
            .then(x => x.text())
            .then(y => {
                console.log("rol de profesor");
            })
        ActualizaListado();
    })

    //boton de admin
    btnAdmin.addEventListener("click", function () {
        idR = nombrePerfil.value;
        fetch("http://virtual.localpablo.com/API/apiUser.php?rol=admin&id=" + idR,
        {
            method: "PUT"
        })
            .then(x => x.text())
            .then(y => {
                console.log("rol de admin");
            })
        ActualizaListado();
    })


});