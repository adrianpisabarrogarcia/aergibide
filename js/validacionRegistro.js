$(document).ready(function () {
    let usuario = $('#user').eq(0);
    let nombre = $('#nombre').eq(0);
    let email = $('#email').eq(0);
    let apellido = $('#apellido').eq(0);
    let password = $('#password').eq(0);
    let passwordRep = $('#passwordRep').eq(0);

    let boton = $('#registrar').eq(0);
    boton.on('click', function (event) {
        let comprobacion = validarRegistro(usuario, nombre, email, apellido, password, passwordRep);
        if (comprobacion) {
            event.preventDefault();
        }
    });


})

function validarRegistro(usuario, nombre, email, apellido, password, passwordRep) {

    try {
        let error = false;
        //Usuario
        let validarUsuario = new RegExp("^[A-z._]{5,20}$");

        if (!validarUsuario.test(usuario.val())) {
            usuario.css('border', '1px solid red');
            usuario.attr('placeholder', "El nombre es incorrecto");
            usuario.val("");
            error = true;
        }


        //Nombre y Apellido
        let validarNombreApellido = new RegExp("^([A-Z][a-zÀ-ÿ]+[ ]?)+$");

        if (!validarNombreApellido.test(nombre.val())) {
            nombre.css('border', '1px solid red');
            nombre.attr('placeholder', "El usuario es incorrecto");
            nombre.val("");
            error = true;
        }


        if (!validarNombreApellido.test(apellido.val())) {
            apellido.css('border', '1px solid red');
            apellido.attr('placeholder', "El apellido es incorrecto");
            apellido.val("");
            error = true;

        }
        //Password
        let expPassword = new RegExp("^[a-zA-Z0-9_]{8,}$");
        if (!expPassword.test(password.val())) {
            password.css('border', '1px solid red');
            password.attr('placeholder', 'La password es incorrecta');
            password.val("");
            passwordRep.val("");
            error = true;


        }
        //Comparar los dos campos de password
        if (password.val() != passwordRep.val()) {
            password.css('border', '1px solid red');
            passwordRep.css('border', '1px solid red');
            password.attr('placeholder', 'La contraseña no coincide');
            passwordRep.attr('placeholder', 'La contraseña no coincide');
            passwordRep.val("");
            error = true;
        }

        return error;

    } catch (e) {
        alert(e);
    }
}
