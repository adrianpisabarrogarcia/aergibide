$(document).ready(function (){
    darQuitarLike();
    darQuitarFav();



})
function darQuitarLike(){
    ajax($('.like'),"like");

}
function darQuitarFav(){
    ajax($('.fav'),"fav");

}

function ajax(LikeOFav,dato){
    var boton= LikeOFav;
    boton.on('click',function (event){
        event.preventDefault();
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



