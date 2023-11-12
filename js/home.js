window.addEventListener("load", function () {

    var test = document.getElementById("irTest");
    var test1 = document.getElementById("irCTest");
    var test2 = document.getElementById("irLTest");
    var test3 = document.getElementById("irLAlu");

    var url = new URL(window.location.href);

    var menu = url.searchParams.get("menu");

    if (menu == "home") {
        test.addEventListener("click", function () {
            document.location = "?menu=test";
        })
    } else {
        test1.addEventListener("click", function () {
            document.location = "?menu=crea";
        })

        test2.addEventListener("click", function () {
            document.location = "?menu=test";
        })

        test3.addEventListener("click", function () {
            document.location = "?menu=listalu";
        })
    }

})