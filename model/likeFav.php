<?php
require "general.php";
if(isset($_POST["likePublicacion"])){
    //recoger ID de usuario conectado.
    $userID=guardarDatosUsuario($dbh);
    $row=$userID->fetch();
    $userID=$row->ID;
    //Comprobar que existe el like.
    $stmt= comprobarLike($dbh);
    $row = $stmt->fetchAll();
    $rowcount = count($row);

    if($rowcount >0){
        //Si devuelve una fila, existe un like a esa publicación, asi
        //que la borramos.
        borrarLike($dbh, $userID,$_POST["likePublicacion"] );
    }
    else{
        //Si devuelve 0, insertamos el like en la base de datos.
        insertarLike($dbh,$userID,$_POST['likePublicacion']);
    }

}


require "principal.php";
