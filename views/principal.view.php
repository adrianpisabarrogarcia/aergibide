<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aergibide</title>
    <link rel="stylesheet" type="text/css" href="../css/principal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

</head>
<body>
<?php require "header.view.php";?>
<article id="barra_busqueda">
    <div id="filtro">
        <a href=""> Filtrar</a>
    </div>
    <div id="buscador">
        <input type="text" placeholder="Inicia tu búsqueda"name="busqueda">
        <div id="lupa"><span>🔎</span></div>

    </div>

    <div id="menu_usuario">
        <ul>
            <li><a>Perfil</a></li>
            <li><a>Cerrar sesión</a></li>
        </ul>
    </div>
</article>
<main>
    <div class="temas">
            <div class="items">
                <button >Tema 1</button>
            </div>
            <div class="items">
                <button >Tema 2</button>
            </div>
            <div class="items">
                <button >Tema 3</button>
            </div>
            <div class="items">
                <button >Tema 4</button>
            </div>
            <div class="items">
                <button >Tema 5</button>
            </div>
            <div class="items">
                <button >Tema 6</button>
            </div>
    </div>

    <section id="publicaciones">
        <table>

        </table>
    </section>


</main>
hola
<div class="splide" id="splide">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">Slide 01</li>
            <li class="splide__slide">Slide 02</li>
            <li class="splide__slide">Slide 03</li>
            <li class="splide__slide">Slide 04</li>
            <li class="splide__slide">Slide 05</li>
            <li class="splide__slide">Slide 06</li>
            <li class="splide__slide">Slide 07</li>
            <li class="splide__slide">Slide 08</li>
            <li class="splide__slide">Slide 09</li>
            <li class="splide__slide">Slide 10</li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
    new Splide( '#splide', {
        perPage: 3,
        rewind : true,
    } ).mount();
</script>
</body>
</html>