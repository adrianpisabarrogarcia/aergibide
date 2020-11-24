$(document).ready(function (){
    darQuitarLike();



})
function darQuitarLike(){
    var boton= $('.like');
        boton.on('click',function (event){
            event.preventDefault();
            var color= $(this);
            var valor= $(this).val();
            alert(valor);
            $.ajax({
                    url: "../model/likeFav.php",

                    data: {like: valor},

                    type: "POST",

                })
            .done(function (response){
                alert(response);
               if(response){
                   alert(response+"añade");
                   color.css({fill:'pink'});
               }
               else{
                   color.css({fill:'black'});
                   alert(response+"quita");


               }
            });




        });

}


