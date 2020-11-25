<?php require "../vistasfijas/head.php"?>
<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link type="text/css" rel="stylesheet" href="../css/mis-publicaciones.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php require "../vistasfijas/cabecera.php"?>
<article id="barra_busqueda">
    <div id="filtro">
        <a> Filtrar</a>
    </div>
    <div id="buscador">
        <input type="text" placeholder="Inicia tu búsqueda"name="busqueda">
        <div id="lupa"><span></span></div>

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

        <div class="cuadro_publicacion">
            <h1><?=$tituloPagina?></h1>
            <?php require "publicacion.view.php"; ?>



            <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
</script>
<script src="../js/principal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="../js/LikeFav.js"></script>
</body>
</html>