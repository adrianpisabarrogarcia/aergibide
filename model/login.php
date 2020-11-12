<?php

if (isset($_POST["user"]) && $_POST["password"]) {
    $usuario = $_POST["user"];
    $password = $_POST["password"];
    require "conexion.php";
}else{
    require "../views/index.view.php";
}

