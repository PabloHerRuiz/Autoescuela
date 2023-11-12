window.addEventListener("load", function () {
    const imgPerfil = document.getElementById("perfil");
    const imgAjustes = document.getElementById("ajustes");
    const imgCerrar = document.getElementById("cerrar");
    const logo = document.getElementById("logo");

    var url = new URL(window.location.href);

    var rol = url.searchParams.get("rol");

    imgCerrar.addEventListener("click", function () {
        // Realizar una solicitud al servidor para cerrar la sesión
        fetch('http://virtual.localpablo.com/API/apiSesion.php')
            .then(x => x.json())
            .then(y => {
                if (y.respuesta == "OK") {
                    document.location = "?menu=login";
                }
            })
    });

    if (rol == "admin") {
        logo.addEventListener("click", function () {
            document.location = "?menu=homeadmin";
        });
    } else {
        logo.addEventListener("click", function () {
            document.location = "?menu=home&rol="+rol;
        });
    }

});