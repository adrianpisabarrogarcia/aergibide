$(document).ready(function (){
    darQuitarLike();



})
function darQuitarLike(){
    var boton= $('.like, svg');
        boton.on('click',function (){
                $.ajax({
                    url: "../model/likeFav.php",

                    data: {like: $(this).val()},

                    type: "POST",

                });

        });

}


