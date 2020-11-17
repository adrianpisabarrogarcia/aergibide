<?php

require "conexion.php";
$dbh = connect();

$stmt=generarMisPublicaciones($dbh);


require "../views/mis-publicaciones.view.php";






