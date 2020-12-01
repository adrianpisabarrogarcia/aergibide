$(document).ready(function (){
    // Funciones para dar o quitar un like o favorito a una publicación.
    darQuitarLikePublicacion();
    darQuitarFavPublicacion();
    // Funciones para dar o quitar un like a una respuesta.

    darQuitarLikeRespuesta();



})
//En cada una de las funciones pasamos un "dato" distinto para que al hacer la llamada ajax, se ejecuten distintas operaciones(en el php)
//dependiendo de lo que queramos realizar(dar o quitar un like o favorito a una publicación, o dar o quitar un like a una respuesta).
function darQuitarLikePublicacion(){
    ajax($('.like'),"like");

}
function darQuitarFavPublicacion(){
    ajax($('.fav'),"fav");

}

function darQuitarLikeRespuesta(){
    ajax($('.likeRespuesta'),"likeRespuesta");

}

function ajax(LikeOFav,dato){
    var boton= LikeOFav;
    boton.on('click',function (event){
        var valor= $(this).val();
        $.ajax({
            url: "../model/likeFav.php",

            data: {operacion: dato, like_fav: valor},

            type: "POST",

        })
            .done(function (){
                location.reload();

            });


    });
}



