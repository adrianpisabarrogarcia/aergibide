$(document).ready(function (){
    let x = window.matchMedia("(max-width:824px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});

function propiedadesCssMenu(ventana){
    let menu=$('#lista');
    let menu2 = $('#listaNuevaPublicacion > ul');
    if (ventana.matches)
    {
        let contadormenu=0;
        removeFilter();
        condicionDespliegue();
        $("#perfil").on('click',function (){
            $("#lista, #listaNuevaPublicacion > ul").css("display","none");
            contadormenu=0;
            $("#publicaciones").css("margin-top","");
        })
        $("#lista, #listaNuevaPublicacion > ul").css("display","none");

        $("#mostrarLista").on('click', function (){
            contadormenu++;
            if (contadormenu % 2 != 0) {
                mostrarlista(menu,"194px");
                mostrarlista(menu2,"94px");
                mostrarlista2("#lista ul li,#listaNuevaPublicacion ul li");
                mostrarlista2("#listaNuevaPublucacion");
                $("#menu_usuario").css("display","none");
                mostrarMenuPerfil(0);
                $("#publicaciones").css("margin-top","120px");
            }
            else
            {
                $("#publicaciones").css("margin-top","");
                $("#lista, #listaNuevaPublicacion > ul").css("display","none");
            }
        });
    }
    else{
        $("#publicaciones").css("margin-top","");
        let prueba = $('#listaNuevaPublicacion > ul');
        defectolista(prueba);
    }
}

function mostrarlista(menu,dato){
    menu.css('display','flex');
    menu.css('top',dato);
    menu.css('position','absolute');
    menu.css('height','100px');
    menu.css('background-color', 'black');
}

function mostrarlista2(menu){
    $(menu).css('border-bottom','1px solid white');
    $(menu).css('width','100%');
    //$(menu+' ul li")').css('height','50%');
    //$(menu+' ul li:first-child")').css('border-top','1px solid white');
    //$(menu+' ul li a")').css('height','100%');
    //$(menu+' ul li a")').css('justify-content','center');
    //$(menu+' ul ")').css('flex-direction','column');
}

/*function mostrarlista(menu){
    //$('#lista').css('display', 'flex');
    //$('#listaNuevaPublicacion > ul').css('display', 'flex');
    //menu.css('position', 'absolute');
    //$('#lista').css('top', '194px');
    //$('#listaNuevaPublicacion > ul').css('top', '95px');
    //menu.css('left', '0%');
    //menu.css('height', '100px');
    $('#listaNuevaPublicacion > ul').css('width', '100%');
    //menu.css('background-color', 'black');
    //$('#listaNuevaPublicacion > ul').css('flex-direction', 'column');
    //$('#lista ul li:first-child').css('border-top', '1px solid white');
    //$('#lista ul li').css('border-bottom', '1px solid white');
    //$('#lista ul li').css('width', '100%');
    //$('#lista ul li').css('height', '50%');
    //$('#lista ul li a').css('height', '100%');
    //$('#lista ul li a').css('justify-content', 'center');
    //$('#lista > ul').css('flex-direction', 'column');
    //$('#listaNuevaPublicacion ul li:first-child').css('border-top', '1px solid white');
    //$('#listaNuevaPublicacion ul li').css('border-bottom', '1px solid white');
    //$('#listaNuevaPublicacion ul li').css('width', '100%');
    //$('#listaNuevaPublicacion ul li').css('height', '50%');
    //$('#listaNuevaPublicacion ul li a').css('height', '100%');
    //$('#listaNuevaPublicacion ul li a').css('justify-content', 'center');
}*/

function defectolista(menu){
    $('#lista').css('display', '');
    $('#listaNuevaPublicacion > ul').css('display', '');
    menu.css('position', '');
    $('#lista').css('top', '194px');
    $('#listaNuevaPublicacion > ul').css('top', '');
    menu.css('left', '');
    menu.css('height', '');
    $('#listaNuevaPublicacion > ul').css('width', '');
    menu.css('background-color', '');
    $('#listaNuevaPublicacion > ul').css('flex-direction', '');
    $('#lista ul li:first-child').css('border-top', '');
    $('#lista ul li').css('border-bottom', '');
    $('#lista ul li').css('width', '');
    $('#lista ul li').css('height', '');
    $('#lista ul li a').css('height', '');
    $('#lista ul li a').css('justify-content', '');
    $('#lista > ul').css('flex-direction', '');
    $('#listaNuevaPublicacion ul li:first-child').css('border-top', '');
    $('#listaNuevaPublicacion ul li').css('border-bottom', '');
    $('#listaNuevaPublicacion ul li').css('width', '');
    $('#listaNuevaPublicacion ul li').css('height', '');
    $('#listaNuevaPublicacion ul li a').css('height', '');
    $('#listaNuevaPublicacion ul li a').css('justify-content', '');
}