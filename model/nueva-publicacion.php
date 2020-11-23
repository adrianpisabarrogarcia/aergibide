<?php

require "general.php";

$categorias=mostrarCategorias($dbh);


if (isset($_POST["introducir"])){
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $categorias = $_POST["categorias"];
    $archivo = $_POST["archivo"];
    $archivo = "../img/uploads/" . $archivo;




    echo $titulo . " " . $descripcion . " " . $categorias . " " . $archivo;

}else{
    require "../views/nueva-publicacion.view.php";
}



