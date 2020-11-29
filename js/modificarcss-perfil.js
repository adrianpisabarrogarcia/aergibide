$(document).ready(function () {
    let x = window.matchMedia("(max-width:824px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});

function propiedadesCssMenu(ventana) {
    if (ventana.matches) {
        let contadormenu = 0;
        $("#mostrarLista").on('click', function () {
            contadormenu++;
            if (contadormenu % 2 != 0) {
                $("#opciones").css("display", "flex !important");
            } else {
                $("#opciones").css("display", "none");
            }
        });
    }
}
