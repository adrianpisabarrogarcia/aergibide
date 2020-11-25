<?php

require "general.php";

$categorias = mostrarCategorias($dbh);

if (isset($_GET["valor"])) {

    require "../views/principal-categorias.view.php";
    die();

} else {
    if (isset($_POST["tituloPubli"])) {
        if (!empty($_POST["tituloPubli"])) {
            if (isset($_POST["IDPubli"])){

        }
            require "../views/principal-categorias.view.php";
            die();
        }
        else
        {
            $publicacion = generarPublicaciones($dbh);
            require "../views/principal-categorias.view.php";
            die();
        }
    }
        }

$publicacion = generarPublicaciones($dbh);
$contador = $publicacion->rowcount();

require "../views/principal.view.php";








