<?php

/*Abrimos la conexion a la base de datos*/
require "conexion.php";
$dbh = connect();

/*Comprobamos si nos an mandado los datos si es que si validamos los datos contra la bd si es que no mostramos la vista por primera vez*/
if (isset($_POST["user"]) && isset($_POST["password"])) {
    $usuario = $_POST["user"];
    $password = $_POST["password"];
    $login = entrarLogin($dbh, $usuario,$password);
    /*En caso de que los datos sean correctos*/
    if($login){
        header('Location: ./principal.php');
        die();
    }
    else{
        /*En caso de que los datos no sean correctos*/
        $mensaje= "Usuario o contraseña incorrecta.";
    }

}
require "../views/index.view.php";


