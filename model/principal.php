<?php

require "conexion.php";
$dbh = connect();

$categorias=mostrarCategorias($dbh);

if(isset($_GET["valor"])){

    echo  require "../views/principal-categorias.view.php";
    die();



}
else{
   $publicacion=generarPublicaciones($dbh);

}

require "../views/principal.view.php";





