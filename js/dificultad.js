window.addEventListener("load", function () {

    var select = document.getElementById("botonDif");


    //creamos las preguntas
    fetch('http://virtual.localpablo.com/API/apiDificultad.php')
        .then(x => x.text())
        .then(y => {
            console.log(y);
            console.log(y.length);
            for (let i = 0; i < 3; i++) {
                opcion = document.createElement("option");
                opcion.value = y.id;
                
                opcion.text = y.nombre;

                console.log(y.nombre);



                select.appendChild(opcion);
            }


        })

})