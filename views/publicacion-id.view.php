<?php
/*En caso de que los datos no existan nos redigira al login.php*/
if (empty($datos))
{
    header("Location: ../model/login.php");
}
else
{
    /*En caso de que los datos existan mostraremos la p*/
require "../vistasfijas/head.php"?>
<link type="text/css" rel="stylesheet" href="../css/principal.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="../css/publicacion-id.css">


</head>
<?php require "../vistasfijas/cabecera.php"?>

<article id="barra_busqueda">
    <div id="filtro">

    </div>
    <div id="buscador">


    </div>

    <div id="menu_usuario">
        <ul>
            <li><a href="../model/perfil.php">Perfil</a></li>
            <li><a onclick="cerrarsesion()">Cerrar sesión</a></li>
        </ul>
    </div>
</article>
<main>
    <div class="splide" id="splide">
        <div class="splide__track">
            <ul class="splide__list">
            </ul>
        </div>
    </div>

    <section id="publicaciones">
        <div class="cuadro_publicacion">
            <?php

            $row = $publica;
            $titulo = $row->Titulo;
            $descripcion = $row->Descripcion;
            $user = $row->Usuario;
            $fecha = $row->Fecha;
            $archivo = $row->Archivo;
            $ID = $row->ID;

            $usuarioSesion = $_SESSION["usuario"];

            ?>

            <div class="publicacion">
                <div class="titulo">
                    <h1 class="title"><?= utf8_encode($titulo) ?></h1>
                </div>

                <div class="descripcion">
                    <span><?= utf8_encode($descripcion) ?></span>
                </div>

                <div class="fecha">
                    <span class="date"><?= $fecha ?></span>
                </div>

                <div class="usuario">
                    <span class="user"><?= utf8_encode($user) ?></span>
                </div>

                <?php if($user == $usuarioSesion){ ?>
                    <div class="respuestas">
                        <button class="borrar_preg" value="<?= $ID ?>">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" style="color: #E74C3C" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg>
                        </button>

                    </div>
                <?php } ?>

            </div>
            <div class="like_fav">
                <div class="corazon">
                    <?php
                    $mostrarLike = comprobarLike($dbh, $datos->ID, $ID);
                    $ID_publicacion = 0;
                    while($row = $mostrarLike->fetch()){
                        $ID_publicacion = $row->ID_Pregunta;
                    }
                    $claseLike = "rosa"; ?>

                    <span><?= count($contadorL=contadorLikes($dbh,$ID));?></span>

                    <button class="like" value="<?= $ID ?>">
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
                    $mostrarFav = comprobarFav($dbh, $datos->ID, $ID);
                    $ID_publicacion = 0;
                    while($row = $mostrarFav->fetch()){
                        $ID_publicacion = $row->ID_Pregunta;
                    }
                    $claseFav = "amarillo"; ?>

                    <button class="fav" value="<?= $ID ?>">
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
                <?php if($archivo != ""){ ?>
                    <div class="down_title">Descargar archivo:</div>
                    <div class="descargar">
                        <a href="<?= $archivo ?>" target="_blank" style="height: 100%" download>
                            <button class="down">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                <?php } ?>

            </div>


        </div>

        </div>

    </section>
    <section id="responses">
        <div class="cuadro_publicacion">
            <?php
            $fallo= $respuest;
            $contador = $fallo->rowCount();
            if($contador==0){
                ?>
                <h1>No se han encontrado Respuestas</h1>
            <?php }else{ ?>
                <h1>Respuestas:</h1>
                <?php

                while ($row3 = $respuest->fetch()) {
                    $descripcion = $row3->Descripcion;
                    $userResp = $row3->Usuario;
                    $fecha = $row3->Fecha;
                    $archivoRespuesta = $row3->Archivo;
                    $idRespuesta = $row3->ID;



                    ?>

                    <div class="publicacion">
                        <div class="descripcion">
                            <span><?= utf8_encode($descripcion) ?></span>
                        </div>

                        <div class="fecha">
                            <span class="date"><?= $fecha ?></span>
                        </div>

                        <div class="usuario">
                            <span class="user"><?= utf8_encode($userResp) ?></span>
                        </div>

                        <?php if ($userResp == $usuarioSesion || $user == $usuarioSesion){ ?>
                            <div class="respuestas">
                                <button class="borrar" value="<?= $idRespuesta ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" style="color: #E74C3C" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                    </svg>
                                </button>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="like_fav_down" id="repuesta_like_fav_down">
                        <div class="corazon">
                            <?php
                            $mostrarLikeRespuesta = comprobarLikeRespuesta($dbh, $datos->ID, $idRespuesta );
                            $ID_resp = 0;
                            while($row = $mostrarLikeRespuesta->fetch()){
                                $ID_resp = $row->ID_Respuesta;
                            }
                            $claseLikeRespuesta = "rosa"; ?>

                            <button class="likeRespuesta" value="<?= $idRespuesta ?>">
                                <?php  if ($ID_resp == $idRespuesta){ ?>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill <?= $claseLikeRespuesta ?>"
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

                        <?php if($archivoRespuesta != ""){ ?>
                            <div class="down_title">Descargar archivo:</div>
                            <div class="descargar">
                                <a href="<?= $archivoRespuesta ?>" target="_blank" style="height: 100%" download>
                                    <button class="down">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                <?php }
            } ?>

        </div>

    </section>
    <section id="insertar-respuesta">
        <h1>Insertar Respuesta</h1>
        <form method="post" enctype="multipart/form-data" id="introducir-respuesta">

            <!-- descripción -->
            <label for="descripcion">Descripción: *</label><br><br>
            <textarea id="descripcion" name="descripcion" required></textarea><br><br>
            <span id="errorDescripcion"></span>

            <!-- añadir archivo -->
            <label for="archivo">¿Algún archivo que añadir? </label><br>
            <input type="file" name="archivo" id="archivo"><br><br>

            <!-- hidden pregunta -->
            <input type="hidden" id="idpre" name="pregunta-id" value="<?= $ID ?>">

            <!-- botón enviar  -->
            <i>* obligatorio</i>
            <br>
            <button type="submit" name="introducir" class="boton" id="publicar" value="NuevaPregunta">
                <b>
                    Insertar respuesta <svg width="1em" height="0.5em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </b>
            </button>
        </form>

    </section>

</main>
<button id="subirPrincipio">
    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-up-circle" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
    </svg>
</button>

<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="../js/LikeFav.js"></script>
<script src="../js/perfil.js"></script>
<script src="https://cdn.tiny.cloud/1/u3odj6obwmpr4y5vzm7zy8bk6ef0bfe8cv4yta79dv9ksh9k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script src="../js/respuesta.js"></script>
<script src="../js/modificarcss.js"></script>


</body>
</html>
<?php } ?>