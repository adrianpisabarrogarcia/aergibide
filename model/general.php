<?php
    //Enlazamos el archivo de conexion.php
    require "conexion.php";

    /*En caso de que no exista la sesion de usuario*/
    if (!isset($_SESSION["usuario"]))
        header("Location: login.php");
    else
    {
        /*Si existe abrimos la conexion y guardamos todos los datos del usuario*/
        $dbh=connect();
        $datos=guardarDatosUsuario($dbh,"");
    }
