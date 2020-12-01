<!DOCTYPE html>
<?php
/*En caso de que no hayan datos iremos rediccionaremos al login.php*/
if (empty($datos))
header("Location: ../model/login.php");
else
{
    /*En caso de que existan generaremos el head de todas las paginas*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aergibide</title>
        <link rel="stylesheet" type="text/css" href="../css/header.css">
        <link rel="icon" type="image/png" href="../img/favicon.png">
        <meta name="keywords" content="foro, aeronática, aergibide, herramientas aeronáticas"/>
        <meta name="viewport" content="width=device-width, user-scalable=no">
<?php
}
?>