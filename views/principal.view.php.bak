<?php require "head.php" ?>
<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php require "cabecera.php" ?>

<article id="barra_busqueda">
    <div id="filtro">
        <a> <svg width="1em" height="0.7em" viewBox="0 0 16 16" class="bi bi-filter-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
            </svg>Filtrar</a>
    </div>
    <div id="buscador">
        <input type="text" placeholder="Inicia tu búsqueda" name="busqueda" id="busqueda">
        <div id="lupa"><span><svg width="1em" height="0.7em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" color="white" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg></span></div>

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
                <?php
                while ($row = $categorias->fetch()) {
                    $categoria = utf8_encode($row->cat);
                    ?>
                    <li class="splide__slide">
                        <button value="<?= $categoria ?>"><?= $categoria ?></button>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <section id="publicaciones">
        <div class="cuadro_publicacion">
            <?php

            while ($row = $publicacion->fetch()) {
                $titulo = $row->Titulo;
                $descripcion = $row->Descripcion;
                $user = $row->Usuario;
                $fecha = $row->Fecha;
                $archivo = $row->Archivo;
                $ID = $row->ID;
                $respuestas = generarRespuestas($ID, $dbh);
                $row2 = $respuestas->fetchAll();
                $numero = count($row2);


                ?>

                <div class="publicacion">
                    <div class="titulo">
                        <h1 class="title"><?= utf8_encode($titulo) ?></h1>
                    </div>

                    <div class="descripcion">
                        <input type="text" maxlength="25" class="desc" value="<?= $descripcion ?>">
                    </div>

                    <div class="fecha">
                        <span class="date"><?= $fecha ?></span>
                    </div>

                    <div class="usuario">
                        <span class="user"><?= utf8_encode($user) ?></span>
                    </div>


                    <div class="respuestas">
                        <h1 class="num_respuestas"><?= $numero ?></h1>
                        <span>respuestas</span>
                    </div>

                </div>
                <div class="like_fav">
                    <div class="corazon">
                        <button class="like">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill"
                                   xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="favorito">
                        <button class="fav">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <?php
            } ?>
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
<script src="../js/LikeFav.js"></script>
</body>
</html>