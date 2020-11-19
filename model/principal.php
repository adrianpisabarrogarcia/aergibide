<?php

require "conexion.php";
$dbh = connect();

if(isset($_GET["valor"])){
    $publicacion= mostrarPublicacionPorCategoria( $_GET['valor'], $dbh);
}

else{

    $publicacion=generarPublicaciones($dbh);

}
$categorias=mostrarCategorias($dbh);


require "../views/principal.view.php";





