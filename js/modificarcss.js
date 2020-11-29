$(document).ready(function () {
    let x = window.matchMedia("(max-width:824px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});

function propiedadesCssMenu(ventana) {
    if (ventana.matches) {
        $("#lista, #listaNuevaPublicacion > ul").css("display", "none");
        let contadormenu = 0;
        $("#perfil").on('click', function () {
            if (ventana.matches) {
                $("#lista, #listaNuevaPublicacion > ul").css("display", "none");
                contadormenu = 0;
                $("#publicaciones").css("margin-top", "");
            }
        })


        let contador = 0;
        $('#lupa>span').on('click', function () {
            if (ventana.matches){
                contador++;
                if (contador % 2 == 0) {
                    $('#buscador>input').css('display', 'none');

                } else
                    $('#buscador>input').css('display', 'flex');
            }

        })


        $("#mostrarLista").on('click', function () {
            contadormenu++;
            if (contadormenu % 2 != 0) {
                $("#menu_usuario").css("display", "none");
                mostrarlista();
                mostrarlista2();
                mostrarMenuPerfil();

                if ($("#barra_busqueda").css('height') == "0px")
                    $("#publicaciones").css("margin-top", "250px");
                else
                    $("#publicaciones").css("margin-top", "120px");
            } else {
                $("#publicaciones").css("margin-top", "");
                $("#lista, #listaNuevaPublicacion > ul").css("display", "none");
            }
        });
    } else {
        $("#publicaciones").css("margin-top", "");
        defectolista();
        defectolista2();
        mostrarMenuPerfil();
        $("#buscador > input").css("display", "flex");
    }
}

function mostrarlista() {
    let menu = $("#lista,#listaNuevaPublicacion > ul");
    menu.css('display', 'flex');
    menu.css('position', 'absolute');
    menu.css('height', '100px');
    menu.css('background-color', 'black');
    menu.css('width', '100%');
    $("#lista").css('top', '194px');
    $("#listaNuevaPublicacion > ul").css('top', "94px");
    $("#listaNuevaPublicacion ul li:first-child").css('border-top', '1px solid white');
}

function defectolista() {
    let menu = $("#lista,#listaNuevaPublicacion > ul");
    menu.css('display', '');
    menu.css('position', '');
    menu.css('height', '');
    menu.css('background-color', '');
    menu.css('width', '');
    $("#lista").css('top', '');
    $("#listaNuevaPublicacion > ul").css('top', '');
    $("#listaNuevaPublicacion ul li:nth-of-type(1)").css('border-top', '');
}

function mostrarlista2() {
    let menu = ["#lista", "#listaNuevaPublicacion"];
    menu.forEach(function (i) {
        $(i + " ul li").css('border-bottom', '1px solid white');
        $(i + " ul li").css('width', '100%');
        $(i + " ul li").css('height', '50%');
        $(i + " ul li a").css('height', '100%');
        $(i + " ul li a").css('justify-content', 'center');
        $(i + " ul").css('flex-direction', 'column');
    });
}

function defectolista2() {
    let menu = ["#lista", "#listaNuevaPublicacion"];
    menu.forEach(function (i) {
        $(i + " ul li").css('border-bottom', '');
        $(i + " ul li").css('width', '');
        $(i + " ul li").css('height', '');
        $(i + " ul li:first-child").css('border-top', '');
        $(i + " ul li a").css('height', '');
        $(i + " ul li a").css('justify-content', '');
        $(i + " ul").css('flex-direction', '');
    })
}