$(document).ready(function (){
    let contador=0;
    splide();
    mostrarCategorias(contador);
    mostrarMenuPerfil(contador);
    botonCategoria();
    ajaxCategorias();
    buscador();
    removeFilter();
    mostrarMenu();
    mostrarPublicacion();
    subirPrin();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >500) {
            $("#subirPrincipio").css("display",'flex');
        } else {
            $("#subirPrincipio").css("display",'none');

        }
        })

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

function mostrarMenu(){
    var contadormenu=0;
    var menu= $(' #listaMovil');
    if($(window).width()<824){
        $('#mostrarLista').on('click', function () {
            contadormenu++;
            if (contadormenu % 2 == 0) {
                menu.css('display', 'none');
            } else {
                $('#listaMovil').slideDown(400,swing)
                propiedadesCssMenu(menu);
            }
        })

    }
    else{
        contadormenu=0;
        menu.css('display','none');
    }
}
function propiedadesCssMenu(menus ){
    menus.css('display', 'flex');
    menus.css('position', 'absolute');
    menus.css('top', '100px');
    menus.css('left', '0%');
    menus.css('height', '100px');
    menus.css('width', '100%');
    menus.css('background-color', 'black');
    menus.css('z-index', '3');
    menus.css('flex-direction', 'column');
    $('#listaMovil ul li:first-child').css('border-top', '1px solid white');
    $('#listaMovil ul li').css('border-bottom', '1px solid white');
    $('#listaMovil ul li').css('width', '100%');
    $('#listaMovil ul li').css('height', '50%');
    $('#listaMovil ul li a').css('height', '100%');
    $('#listaMovil ul li a').css('justify-content', 'center');
    $('#listaMovil ul li a').css('align-items', 'center');

}

function mostrarPublicacion(){
    $('.publicacion').on('click', function (){
        var id= $('#IDHidden',this).val();
        location.href= '../model/publicacion-id.php?id='+id;
    })
}
function subirPrin(){
    $('#subirPrincipio').on('click',function (){
        $("html, body").animate({ scrollTop: 0 }, 600);
    })
}





