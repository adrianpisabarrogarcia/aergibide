/****** publicar respuesta **********/
$(document).ready(function (){
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >250) {
            $("#subirPrincipio").css("display",'flex');
        } else {
            $("#subirPrincipio").css("display",'none');

        }
    })
    subirPrin();
})
$('#publicar').on('click', function (event) {
    //para guardar el texto
    tinyMCE.triggerSave();

    //Recojo los datos
    let descripcion = $("#descripcion").val();

    //Realizo comprobación de errores
    let comprobacion = validarRegistro(descripcion);
    //si algo ha salido mal me paro
    if (comprobacion) {
        event.preventDefault();
    }else{
        let datos = new FormData($("#introducir-respuesta")[0]);

        $.ajax({
            data: datos,
            url: "../model/respuesta.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function () {
                location.reload();
            }
        });

    }



});

function validarRegistro(descripcion) {
    let error = false;

    //Descripcion
    if (descripcion.length < 10 || descripcion > 60000) {
        // mostrarerror(descripcion,"Introudce una descripción de más de 10 carácteres");
        let textoMalDescrip = "<span style='color: red;'> Debes introducir un texto con más de 10 carácteres y menos de 60000 carácteres</span><br><br>"
        $("#errorDescripcion").html(textoMalDescrip);
        error = true;
    }else{
        $("#errorDescripcion").html("");
    }

    return error;

}


/****** borrar pregunta **********/
$('.borrar_preg').on('click', function (event) {
    var idPregunta = $('.borrar_preg').val();
    if (confirm("¿Estas seguro/a de eliminar la pregunta?")){
        borrar(idPregunta, 1)
    }else{
        event.preventDefault();
    }

});

/****** borrar respuesta **********/

$('.borrar').on('click', function (event) {
    var idRespuesta = $('.borrar').val();
    if (confirm("¿Estas seguro/a de eliminar la respuesta?")){
        borrar(idRespuesta, 2);
    }else{
        event.preventDefault();
    }

});


function borrar(identificador, dato){
    $.ajax({
        data: {operacion: dato, datos:identificador},
        url: "../model/respuesta.php",
        type: "POST",
        success: function (response) {
            if(response==1){
                location.href = "../model/principal.php";
            }else{
                location.reload();
            }
        }
    });
}
function subirPrin(){
    $('#subirPrincipio').on('click',function (){
        $("html, body").animate({ scrollTop: 0 }, 600);
    })
}
