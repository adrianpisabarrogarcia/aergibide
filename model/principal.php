<?php

require "conexion.php";
$dbh = connect();

$publicacion=generarPublicaciones($dbh);

$publicacionPorCategorias= mostrarPublicacionPorCategoria($dbh);

$categorias=mostrarCategorias($dbh);


require "../views/principal.view.php";



