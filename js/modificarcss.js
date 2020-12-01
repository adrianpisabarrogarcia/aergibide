$(document).ready(function () {
    /*Declaramos el tamaño de pantalla y cada vez que se escuche un cambio llamamos a la funcion para cambiar las propiedades css*/
    let x = window.matchMedia("(max-width:824px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});

/*Funcion para modificar el css dependiendo del tamaño de pantalla*/
    function propiedadesCssMenu(ventana) {
        /*Cuando el tamaño de pantalla coincide*/
        if (ventana.matches) {
            $("#lista, #listaNuevaPublicacion > ul").css("display", "none");
            let contadorperfil = 0;
            let contadormenu = 0;
            /*Cuando pulsamos en el boton de perfil ocultamos el otro menu y asignamos margen a las publicaciones para mostrar el menu de perfil*/
                $("#perfil").on('click', function () {
                    if (ventana.matches) {
                        contadorperfil++;
                        $("#lista, #listaNuevaPublicacion > ul").css("display", "none");
                        cambiarmenuperfil(contadorperfil);
                        contadormenu = 0;
                        mostrarCategorias(0);
                    }
                })

            /*Cuando pulsamos en la lupa y siempre y cuando coincida con la pantalla lo que aremos será ocultar o mostrar la barra de busqueda*/
                let contador = 0;
                $('#lupa>span').on('click', function () {
                    if (ventana.matches){
                        contador++;
                        if (contador % 2 == 0) {
                            $('#buscador>input').css('display', 'none');
                            if ($("#busqueda").val()!="")
                            {
                                $('#busqueda').css('placeholder',"Inicia tu búsqueda");
                                $('#busqueda').val("");
                                llamadaAjax($("#busqueda").val(),"");
                            }
                        } else
                            $('#buscador>input').css('display', 'flex');
                    }
                })

            /*Función para mostrar la lista cuando pulses en el boton y se apliquen los diferentes atributos css*/
                $("#mostrarLista").on('click', function () {
                    contadormenu++;
                    if (contadormenu % 2 != 0) {
                        $("#menu_usuario").css("display", "none");
                        mostrarlista();
                        mostrarlista2();
                        mostrarMenuPerfil();
                        mostrarmenus("250px","120px");
                        mostrarCategorias(0);
                    } else {
                        $("#publicaciones").css("margin-top", "");
                        $("#lista, #listaNuevaPublicacion > ul").css("display", "none");
                    }
                });
        } else {
            /*Cuando no coincida con el tamaño de pantalla para poner los balores por defecto*/
                $("#publicaciones").css("margin-top", "");
                defectolista();
                defectolista2();
                mostrarMenuPerfil();
                $("#buscador > input").css("display", "flex");
        }
    }

/*Funcion para asignar el margen a las publicaciones cuando se pulse en el boton*/
    function cambiarmenuperfil(contadorperfil){
            if (contadorperfil % 2!=0)
                mostrarmenus("200px","60px");
            else
                $("#publicaciones").css("margin-top", "");
    }

/*Funcion para aplicar los cambios de */
    function mostrarmenus(dato1,dato2){
        if ($("#barra_busqueda").css('height') == "0px")
            $("#publicaciones").css("margin-top", dato1);
        else
            $("#publicaciones").css("margin-top", dato2);
        $('.splide, .removeFilter').css("display","none");
    }

/*Funcion para mostrar la lista*/
    function mostrarlista() {
        let menu = $("#lista,#listaNuevaPublicacion > ul");
        menu.css('display', 'flex');
        menu.css('position', 'absolute');
        menu.css('height', '100px');
        menu.css('background-color', 'black');
        menu.css('width', '100%');
        $("#lista").css('top', '194px');
        $("#listaNuevaPublicacion > ul").css('top', "94px");
        $("#listaNuevaPublicacion ul li:first-child").css('border-top', '1px solid white');
    }

/*Funcion para quitar el estilo css*/
    function defectolista() {
        let menu = $("#lista,#listaNuevaPublicacion > ul");
        menu.css('display', '');
        menu.css('position', '');
        menu.css('height', '');
        menu.css('background-color', '');
        menu.css('width', '');
        $("#lista").css('top', '');
        $("#listaNuevaPublicacion > ul").css('top', '');
        $("#listaNuevaPublicacion ul li:nth-of-type(1)").css('border-top', '');
    }

/*Funcion para mostrar la lista*/
    function mostrarlista2() {
        let menu = ["#lista", "#listaNuevaPublicacion"];
        menu.forEach(function (i) {
            $(i + " ul li").css('border-bottom', '1px solid white');
            $(i + " ul li").css('width', '100%');
            $(i + " ul li").css('height', '50%');
            $(i + " ul li a").css('height', '100%');
            $(i + " ul li a").css('justify-content', 'center');
            $(i + " ul").css('flex-direction', 'column');
        });
    }

/*Funcion para quitar el estilo css*/
    function defectolista2() {
        let menu = ["#lista", "#listaNuevaPublicacion"];
        menu.forEach(function (i) {
            $(i + " ul li").css('border-bottom', '');
            $(i + " ul li").css('width', '');
            $(i + " ul li").css('height', '');
            $(i + " ul li:first-child").css('border-top', '');
            $(i + " ul li a").css('height', '');
            $(i + " ul li a").css('justify-content', '');
            $(i + " ul").css('flex-direction', '');
        })
    }