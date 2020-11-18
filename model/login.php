<?php

require "conexion.php";
$dbh = connect();

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $usuario = $_POST["user"];
    $password = $_POST["password"];
    $login = entrarLogin($dbh, $usuario,$password);
    if($login){
        header('Location: ./principal.php');
        die();
    }
    else{
        $mensaje= "Usuario o contraseña incorrecta.";
    }

}
require "../views/index.view.php";


