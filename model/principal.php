<?php

/*Enlazamos el archivo de general.php y llamamos a mostrar todas las categorias*/
require "general.php";

$categorias = mostrarCategorias($dbh);

/*En caso de que nos manden algun valor en la peticion ajax*/
if (isset($_POST['valor'])) {

    if ($_POST['operacion'] == "cat") {
        $operacion = 'categoria';
    }
    elseif($_POST['operacion'] == "search") {
        $operacion = 'buscar';
    }
    else{
        $operacion='generarTodo';
    }
    require '../views/principal-categorias.view.php';
    die();
}

/*En caso de que no exista ningun valor mostraremos todas las publicaciones*/
$publicacion = generarPublicaciones($dbh);

require "../views/principal.view.php";








