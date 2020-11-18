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


if(isset($_GET["valor"])){
    echo "Funciona";
}
//$publicacionPorCategorias= mostrarPublicacionPorCategoria( valor$dbh);

$categorias=mostrarCategorias($dbh);


require "../views/principal.view.php";





