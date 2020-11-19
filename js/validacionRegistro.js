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
    let error = false;
    //Usuario
    let validarUsuario = new RegExp("^[A-z._]{5,20}$");

    if (!validarUsuario.test(usuario.val()))
        mostrarerror(usuario,"El usuario es incorrecto");

    //Nombre y Apellido
    let validarNombreApellido = new RegExp("^([A-zÀ-ÿ]+[ ]?)+$");

    if (!validarNombreApellido.test(nombre.val()))
        mostrarerror(nombre,"El nombre es incorrecto");

    if (!validarNombreApellido.test(apellido.val()))
        mostrarerror(apellido,"El apellido es incorrecto");

    //Password
    let expPassword = new RegExp("^[a-zA-Z0-9_]{8,}$");
    if (!expPassword.test(password.val()))
    {
        mostrarerror(password,"La contraseña es incorrecta");
        passwordRep.val("");
    }

    //Comparar los dos campos de password
    if (password.val() != passwordRep.val())
    {
        mostrarerror(password,"Las contraseñas no coinciden");
        mostrarerror(passwordRep,"Las contraseñas no coinciden");
    }

    return error;

    function mostrarerror(elemento,dato){
        elemento.css('border', '1px solid red');
        elemento.attr('placeholder', dato);
        elemento.val("");
        error=true;
    }
}