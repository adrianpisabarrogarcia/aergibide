<?php

require "conexion.php";
$dbh = connect();

$stmt=generarPublicaciones($dbh);


require "../views/principal.view.php";



