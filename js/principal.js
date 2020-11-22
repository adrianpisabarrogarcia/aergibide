$(document).ready(function (){
    let contador=0;
    splide();
    mostrarCategorias(contador);
    mostrarMenuPerfil(contador);
    botonCategoria();
    ajaxPrincipal();
    buscador();
});

function mostrarCategorias(contador){
    let boton= $('#filtro>a').eq(0);
    let menuCategoria=$('.splide').eq(0);
    condicionDespliegue(boton,contador,menuCategoria);
}

function mostrarMenuPerfil(contador){
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

    function splide(){
        new Splide( '#splide', {
            perPage: 3,
            rewind : true,
        } ).mount();
}

function botonCategoria() {
    let botones = $('.splide__slide button');
    botones.on('click', function () {
        botones.addClass("botonDesactivado");
        $('.botonDesactivado').removeClass("botonActivo");
        $(this).addClass("botonActivo");
        $(this).removeClass("botonDesactivado");
    });
}

function ajaxPrincipal() {
    let boton = $('.splide__slide button');
    boton.on('click', function () {
        if (boton.hasClass('botonActivo')) {
            var valor=$('.botonActivo').val();
            $.ajax({
                url: '../model/principal.php',

                data: {valor:valor},

                type: 'GET',

            })
                .done(function (response){
                    alert($('.botonActivo').val());
                    $('.cuadro_publicacion').remove();
                    $('#publicaciones').append(response);

                })
        } else {
            alert("Error");
        }
    })
}

function buscador(){
    var busqueda= $('#busqueda');
    busqueda.keyup(function (){
       var titulo=busqueda.val();
       if(busqueda.val()){
           $.ajax({
               url: '../model/principal.php',

               data: {tituloPubli:titulo},

               type: 'POST',

           })
       .done(function (response){
           console.log(busqueda.val());
               $('.cuadro_publicacion').remove();
               $('#publicaciones').append(response);

           })
       }
    });
    busqueda.on('click', function (){
        busqueda.val("");
    })
}


