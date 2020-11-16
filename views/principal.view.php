<?php require "head.php"?>
<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

</head>
<?php require "cabecera.php"?>
<article id="barra_busqueda">
    <div id="filtro">
        <a> Filtrar</a>
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
        <div class="cuadro_publicacion">
            <?php

            while ($row = $stmt->fetch()){
                $titulo = $row->Titulo;
                $descripcion= $row->Descripcion;
                $user= $row->Usuario;
                $fecha=$row->Fecha;
                $archivo=$row->Archivo;
                $respuestas=$row->Respuestas;
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
                    <h1 class="num_respuestas"><?=$respuestas ?></h1>
                    <span>respuestas</span>
                </div>

            </div>
            <div class="like_fav">
                <div class="corazon">
                    <button class="like"><img src=""></button>
                </div>

                <div class="favorito">
                    <button class="fav"><img src=""></button>
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