<?php require "head.php"?>
<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link type="text/css" rel="stylesheet" href="../css/mis-publicaciones.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <h1><?=$tituloPagina?></h1>
            <?php

            while ($row = $stmt->fetch()){
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
                    <input  type="text" maxlength="25"  class="desc" value="<?=$descripcion?>">
                </div>

                <div class="fecha">
                    <span class="date"><?=$fecha?></span>
                </div>

                <div class="usuario">
                    <span class="user"><?= utf8_encode($user)?></span>
                </div>



                <div class="respuestas">
                    <h1 class="num_respuestas"><?=$numero ?></h1>
                    <span>respuestas</span>
                </div>

            </div>
                <div class="like_fav">
                    <div class="corazon">
                        <button class="like"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg></button>
                    </div>

                    <div class="favorito">
                        <button class="fav"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg></button>
                    </div>
                </div>
            <?php
            }?>
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
<script>
    $(document).ready(function(){
        let like= $('.like').eq(0);
        like.on('click', function (){
            alert("like");
        })

        let publicacion= $('.publicacion').eq(0);
        publicacion.on('click', function (){
            alert("Funciona");
        })

    })
</script>
</body>
</html>