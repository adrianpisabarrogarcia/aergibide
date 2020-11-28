<?php
$fallo= $publicacion;
$contador = $fallo->rowCount();
if($contador==0){
    ?>
    <h1>No se han encontrado publicaciones</h1>
<?php }else{

while ($row= $publicacion->fetch()) {
    $titulo = $row->Titulo;
    $descripcion = $row->Descripcion;
    $user = $row->Usuario;
    $fecha = $row->Fecha;
    $archivo = $row->Archivo;
    $ID = $row->ID;
    $respuestas = generarRespuestas($ID, $dbh);
    $row2 = $respuestas->rowCount();
    $numero = $row2;
    ?>

    <div class="publicacion">

        <div class="titulo">
            <h1 class="title"><?= utf8_encode($titulo) ?></h1>
        </div>

        <div class="descripcion">
            <span style="height: 120px; overflow: hidden; line-height: 1.55em;margin-left: 5%"><?= utf8_encode($descripcion) ?></span>
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
        <input type="hidden" value="<?=$ID?>" id="IDHidden">

    </div>
    <div class="like_fav">
        <div class="corazon">
            <?php
            $mostrarLike = comprobarLike($dbh, $datos->ID, $ID);
            $row = $mostrarLike->fetch();
            $ID_publicacion = $row->ID_Pregunta;
            $claseLike = "rosa"; ?>

            <button class="like "name="publicacion" value="<?= $ID ?>">
                <?php if ($ID_publicacion == $ID){ ?>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill <?= $claseLike ?>"
                     xmlns="http://www.w3.org/2000/svg">
                    <?php } else{ ?>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill "
                         xmlns="http://www.w3.org/2000/svg">
                        <?php } ?>
                        <path fill-rule="evenodd"
                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
            </button>
        </div>

        <div class="favorito">
            <?php
            $mostrarLike = comprobarFav($dbh, $datos->ID, $ID);
            $row = $mostrarLike->fetch();
            $ID_publicacion = $row->ID_Pregunta;
            $claseFav = "amarillo"; ?>

            <button class="fav" name="favorito" value="<?= $ID ?>">
                <?php if ($ID_publicacion == $ID){ ?>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill <?= $claseFav ?>"
                     xmlns="http://www.w3.org/2000/svg">
                    <?php } else{ ?>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill "
                         xmlns="http://www.w3.org/2000/svg">
                        <?php } ?>
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
            </button>

        </div>
    </div>
    <?php }
} ?>
</div>

</section>

</main>

<button id="subirPrincipio">
    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-up-circle" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
    </svg>
</button>


