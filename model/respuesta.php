<?php
require "general.php";


if (isset($_POST["descripcion"])){
    $descripcion = $_POST["descripcion"];

    if(!empty($_FILES['archivo']['name'])){
        $nombreArchivo = $_FILES['archivo']['tmp_name'];
        $nombreEspecial = str_shuffle($_FILES["archivo"]["name"].uniqid());
        $archivoRuta = "../img/files/" . $nombreEspecial . "." .pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION); // Ruta
        move_uploaded_file($nombreArchivo, $archivoRuta);
    }else{
        $archivoRuta= "";
    }

    $idPublicacion = $_POST["pregunta-id"];


    $idUsuario = guardarDatosUsuario($dbh,"");
    $idUsuario = $idUsuario->ID;

    $fecha = date("Y-m-d");
    insercionRespuesta($dbh, $descripcion, $idUsuario, $idPublicacion, $fecha, $archivoRuta);
    die();

}
if (isset($_POST["operacion"])){
    $identificador = $_POST["datos"];
    if ($_POST["operacion"] == 1){
        eliminarPregunta($dbh, $identificador);
    }else{
        eliminarRespuesta($dbh, $identificador);
    }
    echo $_POST["operacion"];
    die();
}



echo "Error grave en ajax";
