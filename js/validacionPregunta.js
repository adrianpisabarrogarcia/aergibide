$('#publicar').on('click', function (event) {
    //para guardar el texto
    tinyMCE.triggerSave();

    //Recojo los datos
    let titulo = $('#titulo').val();
    let descripcion = $("#descripcion").val();
    let checked = $('input:radio[name=categorias]:checked').val();

    //Realizo comprobación de errores
    let comprobacion = validarRegistro(titulo, descripcion, checked);
    //si algo ha salido mal me paro
    if (comprobacion) {
        event.preventDefault();
    }
});

function validarRegistro(titulo, descripcion, checked) {
    let error = false;

    //Titulo
    let validarTitulo = new RegExp("^[\\d\\w\\W\\sÀ-ÿ\u00f1\u00d1]+$");

    if (!validarTitulo.test(titulo)) {
        $('#titulo').css('border', '1px solid red');
        $('#titulo').attr('placeholder', "Introduce un título correcto");
        $('#titulo').val("");
        error = true;
    }

    //Descripcion
    if (descripcion.length < 10) {
        // mostrarerror(descripcion,"Introudce una descripción de más de 10 carácteres");
        $("textarea").val("Introudce una descripción de más de 10 carácteres");
        let textoMalDescrip = "<span style='color: red;'> Debes introducir un texto con más de 10 carácteres</span><br>"
        $("#errorDescripcion").html(textoMalDescrip);
        error = true;
    }else{
        $("#errorDescripcion").html("");
    }

    //Comprueba si el radio esta seleccionado
    if (checked == undefined) {
        let textoMalChecked = "<span style='color: red;'> Debes marcar una categoría</span><br>"
        $("#errorCategoria").html(textoMalChecked);
        error = true;
    }else{
        $("#errorCategoria").html("");
    }

    return error;

}