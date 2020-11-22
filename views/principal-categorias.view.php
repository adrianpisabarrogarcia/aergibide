<div class="cuadro_publicacion">
    <?php
    if (isset($_GET['valor'])){
        $publicacionporCat= mostrarPublicacionPorCategoria($_GET['valor'], $dbh);
        $publicacion= $publicacionporCat;
    }
    elseif(isset($_POST['tituloPubli'])){
        $publicacionBuscador= mostrarPublicacionPorBuscador($_POST['tituloPubli'], $dbh);
        $publicacion=$publicacionBuscador;
    }

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
                <input type="text" maxlength="25" class="desc" value="<?= utf8_encode($descripcion) ?>">
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
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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