$(document).ready(function (){
    let contador=0;
    splide();
    mostrarCategorias(contador);
    mostrarMenuPerfil(contador);
    botonCategoria();
    ajaxCategorias();
    buscador();
    removeFilter();
});

function mostrarCategorias(contador){
    let boton= $('#filtro>a').eq(0);
    let menuCategoria=$('.splide, .removeFilter');
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
function removeFilter(){
    var boton= $('.removeFilter');
    boton.on('click',function (){
        var valor= "";
        $('.splide__slide> button').removeClass('botonActivo').addClass('botonDesactivado');
           llamadaAjax(valor,"removeFil");
            $('.splide, .removeFilter').css('display','none');

    })
}

function ajaxCategorias() {
    let boton = $('.splide__slide>button');
    boton.on('click', function () {


            if (boton.hasClass('botonActivo')) {
               var valor = $('.botonActivo').val();

               llamadaAjax(valor,"cat");

            }
        }
    //}
    )
}

function buscador(){
    var busqueda= $('#busqueda');
    busqueda.keyup(function (){
       var titulo=busqueda.val();

        llamadaAjax(titulo,"search");

    });

}

function llamadaAjax(valor,oper){
    $.ajax({
        url: '../model/principal.php',

        data: {operacion:oper,valor: valor},

        type: "POST",

    })
        .done(function (response) {
            $('.cuadro_publicacion').remove();
            $('#publicaciones').append(response);

        })
}


