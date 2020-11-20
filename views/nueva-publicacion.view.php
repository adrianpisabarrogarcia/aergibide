<?php require "head.php"?>

<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link type="text/css" rel="stylesheet" href="../css/mis-publicaciones.css">
<link type="text/css" rel="stylesheet" href="../css/nueva-publicacion.css">


</head>
<?php require "cabecera.php"?>
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
            <h1>Nueva Publicación</h1>
            <form action="" method="post">
                <label for="titulo">Título: * </label><br>
                <input type="text" id="titulo" placeholder="Inserta aquí el título"><br><br>
                <label for="descripcion">Descripción: *</label><br><br>
                <textarea id="descripcion">Inserta aquí la pregunta</textarea><br><br>
                <label for="categoria">Categoría: *</label><br>
                <?php while ($row = $categorias->fetch()) {
                    $categoria = utf8_encode($row->cat);
                    ?>
                    <input type="radio" class="categ-nueva-pregunta" name="categorias" value="<?= $categoria ?>"><?= $categoria ?><br>
                <?php } ?>
                <br><br>
                <label for="archivo">¿Algún archivo que añadir? </label><br>
                <input type="file" name="archivo" id="archivo"><br><br>

                <i>* obligatorio</i>
                <br>
                <button type="submit" class="boton">
                    <b><svg width="0.6em" height="0.6em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>&nbsp;

                        Publicar pregunta

                    </b>
                </button>
            </form>
        </div>

    </section>

</main>
<!--Añadir paginación: https://github.com/itsalb3rt/ligne_paginatejs -->

<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
</script>
<script src="../js/principal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="https://cdn.tiny.cloud/1/u3odj6obwmpr4y5vzm7zy8bk6ef0bfe8cv4yta79dv9ksh9k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script src="../js/validacionPregunta.js"> </script>
</body>
</html>