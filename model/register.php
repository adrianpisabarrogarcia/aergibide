<?php


require "conexion.php";
$dbh = connect();


if (isset($_POST["entrar"]))  {
    $usuario = $_POST["user"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];


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


