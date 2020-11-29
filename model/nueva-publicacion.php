<?php

require "general.php";

$categorias=mostrarCategorias($dbh);


if (isset($_POST["introducir"])){
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $titulo = utf8_decode($titulo);
    $descripcion = utf8_decode($descripcion);
    $categorias = $_POST["categorias"];
    if(isset($_FILES['archivo']['tmp_name'])){
        $nombreArchivo = $_FILES['archivo']['tmp_name'];
        $nombreEspecial = str_shuffle($_FILES["archivo"]["name"].uniqid());
        $archivoRuta = "../img/files/" . $nombreEspecial . "." .pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION); // Ruta
        move_uploaded_file($nombreArchivo, $archivoRuta);
    }else{
        $archivoRuta= "";
    }


    $idUsuario = guardarDatosUsuario($dbh,"");
    $idUsuario = $idUsuario->ID;

    $idCategoria = mostrarCategoria($dbh, $categorias);
    $row2 = $idCategoria->fetch();
    $idCategoria = $row2->ID;

    $fecha = date("Y-m-d");
    insercionPublicacion($dbh, $titulo, $descripcion, $idUsuario, $fecha, $idCategoria, $archivoRuta);

    header('Location: ../model/mis-publicaciones.php?action=publicacion');

}else{
    require "../views/nueva-publicacion.view.php";
}
