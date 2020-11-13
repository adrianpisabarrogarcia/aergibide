<?php


if (isset($_POST["user"]) && isset($_POST["nombre"])  && isset($_POST["apellido"])
    && isset($_POST["email"]) && isset($_POST["password"])  && isset($_POST["passwordRep"]) )  {
    $usuario = $_POST["user"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    require "conexion.php";
    $login = registrarLogin($dbh, $usuario, $nombre, $apellido, $email, $password);
    if ($login){
        require "../views/principal.view.php";
    }else{
        $mensaje="El usuario ya esta registrado";
        require "../views/register.view.php";
    }
}else{
    require "../views/register.view.php";
}


