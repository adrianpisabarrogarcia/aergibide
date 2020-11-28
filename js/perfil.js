$(document).ready(function () {
    mostrarMenuPerfil();
    let botones = $("#opciones button");
    botones.on('click', organizacion);
    $("#foto").on("change", modificarimagen);

    $(".in button").on('click', function (event) {
        event.preventDefault();
        switch (this.value) {
            case "usu":
                habilitaropcion($("#usu").eq(0));
                break;
            case "nom":
                habilitaropcion($("#nom").eq(0));
                break;
            case "ape":
                habilitaropcion($("#ape").eq(0));
                break;
            case "em":
                habilitaropcion($("#em").eq(0));
                break;
        }
    })

    $("#modificarusu").submit(function (event) {
        event.preventDefault();
        var parametros = new FormData($("#modificarusu")[0]);

        $.ajax({
            data: parametros,
            url: "../model/perfil.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "ErrorUsu")
                    mostrarerror($("#usu"), "El usuario ya existente");
                else if (response === "ErrorCorreo")
                    mostrarerror($("#em"), "El correo ya existente");
                else {
                    alert(response);
                    location.reload();
                }
            }
        });
    });

    function mostrarerror(elemento, dato) {
        $(elemento).attr("placeholder", dato);
        $(elemento).css("border", "1px solid red");
        $(elemento).val("");
    }
});

function habilitaropcion(elemento) {
    elemento.attr("disabled", false);
    elemento.css("border", "1px solid black");
    $("#modatos").attr("disabled", false);
}

function organizacion() {
    let valorboton = $(this).val();
    switch (valorboton) {
        case "volver":
            location.href = "../model/principal.php";
            break;
        case "datospersonales":
            mostrarcapa("div#mostrardatos");
            break;
        case "modificarcuenta":
            mostrarcapa("div#modificarcuenta");
            break;
        case "modificarcontraseña":
            mostrarcapa("div#modificarcontra");
            break;
        case "borrarcuenta":
            let confir = confirm("¿Estas segur@ de eliminar permanentemente tu cuenta?");
            if (confir)
                borrarcuenta();
            break;
        case "cerrarsesion":
            cerrarsesion();
            break;
        case "puntuaciones":
            mostrarpuntuacion();
            mostrarcapa("div#puntuacion");
            break;
        case "publicaciones":
            location.href = "../model/mis-publicaciones.php?action=publicacion";
            break;
        case "favoritos":
            location.href = "../model/mis-publicaciones.php?action=fav";
            break;

    }
}

function cerrarsesion() {
    $.ajax({
        url: '../model/perfil.php',
        data: {operacion: "cerrarsesion"},
        type: "POST",

        success: function () {
            location.href = "../model/login.php";
        },
    });
}

function borrarcuenta() {
    $.ajax({
        url: '../model/perfil.php',
        data: {operacion: "borrar"},
        type: "POST",

        success: function (response) {
            alert(response);
            location.href = "../model/login.php";
        },
    });
}

function mostrarpuntuacion() {
    $.ajax({
        url: '../model/perfil.php',
        data: {operacion: "mostrarpunt"},
        type: "POST",
    })
        .done(function (data) {
            let datos = JSON.parse(data);
            $(".pregunt").text(datos.pregunta);
            $(".respues").text(datos.respuesta);
            generarpuntuacionynivel(datos);
        });
}

function generarpuntuacionynivel(datos) {
    const pregunt = 100;
    const respue = 200;

    let puntuacion = (datos.pregunta * pregunt) + (datos.respuesta * respue);
    $('.total').text(puntuacion);

    let nivel = "0";
    if (puntuacion >= 300 && puntuacion < 500)
        nivel = "1";
    else if (puntuacion >= 500 && puntuacion < 1000)
        nivel = "2";
    else if (puntuacion >= 1000 && puntuacion < 2500)
        nivel = "3";
    else if (puntuacion >= 2500 && puntuacion < 5000)
        nivel = "4";
    else if (puntuacion >= 5000)
        nivel = "5";

    $('.nivel').text(nivel);
}


function mostrarcapa(dato) {
    let capas = ["div#puntuacion", "div#modificarcuenta", "div#mostrardatos", "div#modificarcontra"];
    for (let i = 0; i < capas.length; i++) {
        if (capas[i] !== dato)
            $(capas[i]).hide();
        else
            $(capas[i]).show();
    }

    valorpordefectoinput();
    valorespordefecto($("#passwordactu").eq(0), "🗝️ Contraseña Actual *");
    valorespordefecto($("#password").eq(0), "🗝️ Contraseña Nueva *");
    valorespordefecto($("#passwordRep").eq(0), "🗝️ Repite Contraseña Nueva *");
}

function valorpordefectoinput() {
    let defecto = ["#modatos", "#usu", "#nom", "#ape", "#em"];

    for (let i = 0; i < defecto.length; i++) {
        $(defecto[i]).attr("disabled", true);
        $(defecto[i]).val("");
        $(defecto[i]).removeAttr("placeholder");
        $(defecto[i]).css("border", "2px solid rgba(118, 118, 118, 0.3)");
    }
}

function valorespordefecto(elemento, dato) {
    elemento.attr("placeholder", dato);
    elemento.css("border", "1px solid black");
    elemento.val("");
}

function modificarimagen() {
    var parametros = new FormData($("#modificarimagen")[0]);

    $.ajax({
        data: parametros,
        url: "../model/perfil.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function () {
            location.reload();
        }
    });
}
function mostrarMenuPerfil(){
    var contador=0;
    let boton= $('#perfil');
    let menuperfil= $('#menu_usuario').eq(0);
    menuperfil.css('display','none');
    condicionDespliegue(boton,contador,menuperfil);
}

function condicionDespliegue(boton, contador, menu){
    boton.on('click', function (){
        contador++;
        if(contador % 2==0){
            menu.css('display', 'none');
        }
        else{
            menu.css('display','flex');
        }
    });
}
