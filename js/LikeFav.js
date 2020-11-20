$(document).ready(function (){

        let like = $('.like');
        like.on('click', function () {
            
            $(this).css('fill','#c43f58');
        })



        let fav = $('.fav');
        fav.on('click', function () {
            $(this).css('color','#e3c146');
        })


        let publicacion = $('.publicacion').eq(0);
        publicacion.on('click', function () {
            alert("Funciona");
        })
})