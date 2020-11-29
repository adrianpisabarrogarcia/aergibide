<?php
require "general.php";
if (isset($_POST['like_fav'])) {
    //recoger ID de usuario conectado.
    $userID = $datos->ID;
    if ($_POST["operacion"] == "like") {
        //Comprobar que existe el like.

        darQuitarLike($dbh, $userID, $_POST['like_fav']);
        die();
    } elseif ($_POST["operacion"] == "likeRespuesta") {
        darQuitarLikeRespuesta($dbh, $userID, $_POST['like_fav']);
        die();

    } else {
        darQuitarFav($dbh, $userID, $_POST['like_fav']);
        die();
    }
}

require "principal.php";
