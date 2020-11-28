$(document).ready(function (){
    darQuitarLikePublicacion();
    darQuitarFavPublicacion();
    darQuitarLikeRespuesta();



})
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
        alert(valor);
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



