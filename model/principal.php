<?php

require "conexion.php";
$dbh = connect();

$publicacion=generarPublicaciones($dbh);
/*
while ($row= $publicacion->fetchAll()){
    $ID= $row->ID;
    $respuestas= generarRespuestas($ID, $dbh);

}
*/

//$publicacionPorCategorias= mostrarPublicacionPorCategoria( valor$dbh);

$categorias=mostrarCategorias($dbh);

if(isset($_POST["valor"])){
    $hola = "Hola Mundo!";
    echo $hola;
    die();
}

require "../views/principal.view.php";





