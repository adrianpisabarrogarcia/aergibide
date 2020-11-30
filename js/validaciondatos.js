$(document).ready(function () {
    let usuario = $('#user').eq(0);
    let nombre = $('#nombre').eq(0);
    let email = $('#email').eq(0);
    let apellido = $('#apellido').eq(0);
    let password = $('#password').eq(0);
    let passwordRep = $('#passwordRep').eq(0);

    let boton = $('#registrar').eq(0);
    boton.on('click', function (event) {
        let comprobardatos = validardatos(usuario, nombre, email, apellido);
        let comprobarpass = validarcontra(password, passwordRep);
        if (comprobardatos || comprobarpass) {
            event.preventDefault();
        }
    });

    $("#datoscont").submit(function (event){
        let comprobacion = validarcontra(password,passwordRep);
        if (comprobacion)
            event.preventDefault();
        else
            modificarcontra(event);
    })
})

function validardatos(usuario,nombre,email,apellido){
    let errordatos = false;
    //Usuario
        let validarUsuario = new RegExp("^[A-z._]{5,20}$");

        if (!validarUsuario.test(usuario.val()))
        {
            mostrarerror(usuario,"El usuario es incorrecto");
            errordatos = true;
        }

    //Nombre y Apellido
        let validarNombreApellido = new RegExp("^([A-zÀ-ÿ]+[ ]?)+$");

        if (!validarNombreApellido.test(nombre.val()))
        {
            mostrarerror(nombre,"El nombre es incorrecto");
            errordatos = true;
        }

        if (!validarNombreApellido.test(apellido.val()))
        {
            mostrarerror(apellido,"El apellido es incorrecto");
            errordatos = true;
        }

    return errordatos;
}

function validarcontra(password, passwordRep) {
        let errorpass = false;

            let expPassword = new RegExp("^[a-zA-Z0-9_]{8,}$");
            if (!expPassword.test(password.val()))
            {
                mostrarerror(password,"La contraseña es incorrecta");
                passwordRep.val("");
                errorpass = true;
            }

        //Comparar los dos campos de password
            if (password.val() != passwordRep.val())
            {
                mostrarerror(password,"Las contraseñas no coinciden");
                mostrarerror(passwordRep,"Las contraseñas no coinciden");
                errorpass = true;
            }

        return errorpass;
}

function mostrarerror(elemento,dato){
    elemento.css('border', '1px solid red');
    elemento.attr('placeholder', dato);
    elemento.val("");
}

function modificarcontra(event){
    event.preventDefault();
    var parametros = new FormData($("#datoscont")[0]);

    $.ajax({
        data:parametros,
        url: "../model/perfil.php",
        type:"POST",
        contentType:false,
        processData:false,
        success:function (response){
            if (response === "Error")
                mostrarerror($("#passwordactu"),"La contraseña Actual es incorrecta");
            else
            {
                alert(response);
                location.reload();
            }
        }
    });
}
