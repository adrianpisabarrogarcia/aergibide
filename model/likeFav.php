<?php
require "general.php";
if(isset($_POST['like'])) {
    //recoger ID de usuario conectado.


    $userID = $datos->ID;
    //Comprobar que existe el like.
    $stmt = comprobarLike($dbh, $userID, $_POST['like']);

    if (!$stmt) {
        //Si devuelve una fila, existe un like a esa publicación, asi
        //que la borramos.
        deleteLike($dbh, $userID, $_POST['like']);
        echo false;
        die();
    } else {
        //Si devuelve null, insertamos el like en la base de datos.
        insertarLike($dbh, $userID, $_POST['like']);
        echo true;
        die();
    }
}



require "principal.php";
