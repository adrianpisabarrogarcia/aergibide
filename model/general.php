<?php
    require "conexion.php";

    if (!isset($_SESSION["usuario"]))
        header("Location: login.php");
    else
    {
        $dbh=connect();
        $datos=guardarDatosUsuario($dbh,"");
    }
