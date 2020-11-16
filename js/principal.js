$(document).ready(function (){

    splide();
    mostrarCategorias();
    mostrarMenuPerfil();
})

function mostrarCategorias(){
    let boton= $('#filtro>a').eq(0);
    let contador=0;
    let menuCategoria=$('.splide').eq(0);

    condicionDespliegue(boton,contador,menuCategoria);



}

function mostrarMenuPerfil(){
    let boton= $('#perfil');
    let contador=0;
    let menuperfil= $('#menu_usuario').eq(0);
    menuperfil.css('display','none');
    condicionDespliegue(boton,contador,menuperfil);
}

function condicionDespliegue(boton, contador, menu){
    boton.on('click', function (){
        contador++;
        if(contador % 2==0){
            menu.css('display', 'none');
        }
        else{
            menu.css('display','flex');
        }
    });
}

    function splide(){
        new Splide( '#splide', {
            perPage: 3,
            rewind : true,
        } ).mount();
}

function botonCategoria(){
    let botones= $('.splide__slide>button');
    botones.on('click',function (){
        botones.selected.css('backgorund-color','purple');
    })
}