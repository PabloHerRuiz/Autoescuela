window.addEventListener("load", function () {

    var test = document.getElementById("irTest");
    var test1 = document.getElementById("irCTest");
    var test2 = document.getElementById("irLTest");
    var test3 = document.getElementById("irLAlu");

    var url = new URL(window.location.href);

    var menu = url.searchParams.get("menu");
    var rol = url.searchParams.get("rol");


    if (menu == "home") {
        test.addEventListener("click", function () {
            document.location = "?menu=test&rol="+rol;
        })
    } else {
        test1.addEventListener("click", function () {
            document.location = "?menu=crea&rol=admin";
        })

        test2.addEventListener("click", function () {
            document.location = "?menu=test&rol=admin";
        })

        test3.addEventListener("click", function () {
            document.location = "?menu=listalu&rol=admin";
        })
    }

})