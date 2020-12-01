$(document).ready(function (){
    let contador=0;
    //Función para el funcionamiento del menú de categorias.
    splide();
    //Funcion para mostrar el menú de categorías mediante el botón filtrar.
    mostrarCategorias(contador);
    //Funciónes para mostrar las publicaciones relacionadas con la categoría.
    //Mediante botónCategoría añadimos y quitamos clases, que cambiarán el color del botón para saber que está activo.
    botonCategoria();
    //Mediante ajaxCategoria llamamos a la base de datos para después mostrar los datos que necesitamos.
    ajaxCategorias();
    //La función buscador servirá para mostrar las publicaciones que contengan en el titulo lo escrito anteriormente en el buscador.
    buscador();
    //Esta función elimina las clases de los botones de categorías y reestablece el cuadro de publicaciones,
    // removiendo la búsqueda de publicación por categoría.
    removeFilter();
    //Función para mostrar la publicación seleccionada clickando en la misma publicación.
    mostrarPublicacion();
    //Función para volver al prinpicio de la página situado en la esquina inferior derecha cuando se hace un scroll predeterminado.
    subirPrin();
    // Función para mostrar el menú de perfil situado en la esquina superior derecha tras clickar en el botón de usuario situado en la cabecera.
    mostrarMenuPerfil(0);

    /*Funcion para que aparezca el boton cuando se haga scroll*/
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >300) {
            $("#subirPrincipio").css("display",'flex');
        } else {
            $("#subirPrincipio").css("display",'none');
        }
        })

});

/*Funcion para mostrar las categorias*/
function mostrarCategorias(contador){
    let boton= $('#filtro>a').eq(0);
    let menuCategoria=$('.splide, .removeFilter');
    //Función que contiene el contador utilizado para mostrar tanto el menú  de categorías como el de perfil.
    condicionDespliegue(boton,contador,menuCategoria);
}

    function splide(){
        new Splide( '#splide', {
            perPage: 3,
            rewind : true,
        } ).mount();
}

/*Funcion para los botones de la categoria*/
    function botonCategoria() {
        let botones = $('.splide__slide button');
        botones.on('click', function () {
            botones.addClass("botonDesactivado");
            $('.botonDesactivado').removeClass("botonActivo");
            $(this).addClass("botonActivo");
            $(this).removeClass("botonDesactivado");
        });
    }

/*Funcion para quitar el filtro y que nos muestre todas las publicaciones*/
    function removeFilter(){
        var boton= $('.removeFilter');
        boton.on('click',function (){
            var valor= "";
            mostrarCategorias(0);
            $('.splide__slide> button').removeClass('botonActivo').addClass('botonDesactivado');
               llamadaAjax(valor,"removeFil");
                $('.splide, .removeFilter').css('display','none');
        })
    }

/*Funcion para realizar una llamada ajax dependiendo del boton*/
function ajaxCategorias() {
    let boton = $('.splide__slide>button');
    boton.on('click', function () {

            if (boton.hasClass('botonActivo')) {
               var valor = $('.botonActivo').val();

               llamadaAjax(valor,"cat");
            }
        }
    )
}

/*Funcion para realizar una llamada ajax cuando se pulse una tecla*/
function buscador(){
    var busqueda= $('#busqueda');
    busqueda.keyup(function (){
       var titulo=busqueda.val();

        llamadaAjax(titulo,"search");

    });
}

/*Funcion ajax para mostrar los datos dependiendo de los filtros*/
function llamadaAjax(valor,oper){
    $.ajax({
        url: '../model/principal.php',

        data: {operacion:oper,valor: valor},

        type: "POST",

    })
        .done(function (response) {
            $('.cuadro_publicacion').remove();
            $('#publicaciones').append(response);
            mostrarPublicacion();
            subirPrin();
        })
}

/*Funcion para mostrar la publicacion segun el id*/
function mostrarPublicacion(){
    $('.publicacion').on('click', function () {
        var id = $('#IDHidden', this).val();
        location.href = '../model/publicacion-id.php?id=' + id;
    })
}

/*Funcion para subir al inicio al pulsar el boton*/
function subirPrin(){
    $('#subirPrincipio').on('click',function (){
        $("html, body").animate({ scrollTop: 0 }, 600);
    })
}







