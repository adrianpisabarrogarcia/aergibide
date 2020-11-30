<?php

require "general.php";

$categorias = mostrarCategorias($dbh);

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

$publicacion = generarPublicaciones($dbh);



require "../views/principal.view.php";








