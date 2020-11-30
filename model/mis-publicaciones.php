<?php

require "general.php";


if($_GET['action']=="publicacion"){
    $tituloPagina="Mis publicaciones";
    $publicacion=generarMisPublicaciones($dbh);

}

if($_GET['action']=="fav"){
    $tituloPagina="Mis favoritos";
   $publicacion= generarMisFavoritos($dbh);

}


require "../views/mis-publicaciones.view.php";






