<?php

require "conexion.php";
$dbh = connect();


if($_GET['action']=="publicacion"){
    echo "<p style='color: white'> $user[x]</p>";
    $tituloPagina="Mis publicaciones";
    $stmt=generarMisPublicaciones($dbh);

}

if($_GET['action']=="fav"){
    $tituloPagina="Mis favoritos";
   $stmt= generarMisFavoritos($dbh);

}


require "../views/mis-publicaciones.view.php";






