<?php

if (isset($_POST["user"]) && $_POST["password"]) {
    $usuario = $_POST["user"];
    $password = $_POST["password"];
    require "conexion.php";
    $login = entrarLogin($dbh, $usuario,$password);
    if($login){
        require "../views/principal.view.php";
    }
    else{
        $mensaje= "Usuario o contraseña incorrecta.";
    }
    die();
}
require "../views/index.view.php";


