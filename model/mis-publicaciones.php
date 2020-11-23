<?php

require "general.php";


if($_GET['action']=="publicacion"){
    $tituloPagina="Mis publicaciones";
    $stmt=generarMisPublicaciones($dbh);

}

if($_GET['action']=="fav"){
    $tituloPagina="Mis favoritos";
   $stmt= generarMisFavoritos($dbh);

}


require "../views/mis-publicaciones.view.php";






