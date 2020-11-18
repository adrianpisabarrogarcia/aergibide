<?php

require "conexion.php";
$dbh = connect();


if($_GET['action']=="publicacion"){
    $tituloPagina="Mis publicaciones";
    $stmt=generarMisPublicaciones($dbh);

}

if($_GET['action']=='fav'){
    $tituloPagina="Mis favoritos";
    $favoritos= generarMisFavoritos($dbh);

}


require "../views/mis-publicaciones.view.php";






