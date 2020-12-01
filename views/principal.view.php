<?php
/*En caso de que no haya categorias*/
if (empty($categorias))
{
    header("Location: ../model/login.php");
}
else
{
    /*En caso de que hayan categorias mostraremos el siguiente html*/
require "../vistasfijas/head.php"?>
<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php require "../vistasfijas/cabecera.php"?>
    <!-- Este articulo contendrá un botón llamado filtro mediante el que se mostará el menú de categorías
         para así poder buscar distintas publicaciones según la categoría seleccionada. -->
<article id="barra_busqueda">
    <div id="filtro">
        <!--Eset elemento 'a' contiene el botón para mostrar el menú de categorías.-->
        <a> <svg width="1em" height="0.7em" viewBox="0 0 16 16" class="bi bi-filter-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
            </svg>Filtrar</a>
        <!--Este otro elemento 'a' servirá para borrar el filtro/búsqueda por categorias.-->
        <a class="removeFilter"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path class="circulo" fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg></a>
    </div>
    <!-- El siguiente div contiene el buscador, que nos servirá para buscar publicaciones según el título.-->
    <div id="buscador">
        <input type="text" placeholder="Inicia tu búsqueda" name="busqueda" id="busqueda">
        <div id="lupa"><span><svg width="1em" height="0.7em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" color="white" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg></span></div>

    </div>
    <!--Este div contiene el menu de usuario que contiene los 2 elementos 'a'. Uno para mostrar el perfil y el otro para cerrar sesión.-->
    <div id="menu_usuario">
        <ul>
            <li><a href="../model/perfil.php">Perfil</a></li>
            <li><a onclick="cerrarsesion()">Cerrar sesión</a></li>
        </ul>
    </div>
</article>
<main>
    <!--El siguiente div sirve para generar el menú de categorías.
 Mediante una librería que hemos encontrado podemos desplazar el menú de izquierda a derecha y viceversa-->
    <div class="splide" id="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <!--A continuación generamos automaticamente los elementos 'li' según el número de categorías guardadas en nuestra base de datos.-->
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
    <!--En esta sección es donde estarán ubicados as publicaciones existentes-->

    <section id="publicaciones">
        <div class="cuadro_publicacion">
            <?php require "publicacion.view.php"; ?>





<!--Añadir paginación en un futuro: https://github.com/itsalb3rt/ligne_paginatejs -->
            <script
                    src="https://code.jquery.com/jquery-3.5.1.js"
                    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                    crossorigin="anonymous">
            </script>
            <script src="../js/principal.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
            <script src="../js/LikeFav.js"></script>
            <script src="../js/perfil.js"></script>
            <script src="../js/modificarcss.js"></script>

</body>
</html>
            <?php } ?>