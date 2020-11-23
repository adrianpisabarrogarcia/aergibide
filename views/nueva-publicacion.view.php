<?php require "../vistasfijas/head.php"?>

<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link type="text/css" rel="stylesheet" href="../css/mis-publicaciones.css">
<link type="text/css" rel="stylesheet" href="../css/nueva-publicacion.css">


</head>
<?php require "../vistasfijas/cabecera.php"?>
<article id="barra_busqueda">
    <div id="filtro">
        <a> Filtrar</a>
    </div>
    <div id="buscador">
        <input type="text" placeholder="Inicia tu búsqueda" name="busqueda">
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
            <form action="../model/nueva-publicacion.php" method="post" enctype="multipart/form-data">
                <!-- titulo -->
                <label for="titulo">Título: * </label><br>
                <input type="text" id="titulo" name="titulo" placeholder="Inserta aquí el título" required><br><br>

                <!-- descripción -->
                <label for="descripcion">Descripción: *</label><br><br>
                <textarea id="descripcion" name="descripcion" required></textarea><br><br>
                <span id="errorDescripcion"></span>

                <!-- categoria -->
                <label for="categoria">Categoría: *</label><br>
                <?php while ($row = $categorias->fetch()) {
                    $categoria = utf8_encode($row->cat);
                    ?>
                    <input type="radio" class="categ-nueva-pregunta" name="categorias" value="<?= $categoria ?>"><?= $categoria ?><br>
                <?php } ?>
                <span id="errorCategoria"></span>
                <br><br>
                <label for="archivo">¿Algún archivo que añadir? </label><br>
                <input type="file" name="archivo" id="archivo"><br><br>

                <!-- botón enviar  -->
                <i>* obligatorio</i>
                <br>
                <button type="submit" name="introducir" class="boton" id="publicar" value="NuevaPregunta">
                    <b>
                        Publicar pregunta <svg width="1em" height="0.5em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </b>
                </button>
            </form>
        </div>
    </section>
</main>
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