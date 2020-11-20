<?php

require "conexion.php";
$dbh = connect();

$categorias=mostrarCategorias($dbh);

require "../views/nueva-publicacion.view.php";


