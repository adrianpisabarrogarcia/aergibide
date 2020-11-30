<?php


require "conexion.php";
$dbh = connect();


if (isset($_POST["entrar"]))  {
    $usuario = $_POST["user"];
    $nombre = $_POST["nombre"];
    $nombre = utf8_decode($nombre);
    $apellido = $_POST["apellido"];
    $apellido = utf8_decode($apellido);
    $email = $_POST["email"];
    $password = $_POST["password"];


    $login = registrarLogin($dbh, $usuario, $nombre, $apellido, $email, $password);
    if ($login){
        header('Location: ../model/login.php');
        die();
    }else{
        $mensaje="El usuario ya esta registrado";
        require "../views/register.view.php";
    }
}else{
    require "../views/register.view.php";
}


