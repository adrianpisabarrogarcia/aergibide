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
    <div class="splide" id="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide"><button>Tema 1</button></li>
                <li class="splide__slide"><button>Tema 2</button></li>
                <li class="splide__slide"><button>Tema 3</button></li>
                <li class="splide__slide"><button>Tema 4</button></li>
                <li class="splide__slide"><button>Tema 5</button></li>
                <li class="splide__slide"><button>Tema 6</button></li>
                <li class="splide__slide"><button>Tema 7</button></li>
                <li class="splide__slide"><button>Tema 8</button></li>
                <li class="splide__slide"><button>Tema 9</button></li>
                <li class="splide__slide"><button>Tema 10</button></li>
            </ul>
        </div>
    </div>

    <section id="publicaciones">

    </section>

</main>


<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
    new Splide( '#splide', {
        perPage: 3,
        rewind : true,
    } ).mount();
</script>
</body>
</html>