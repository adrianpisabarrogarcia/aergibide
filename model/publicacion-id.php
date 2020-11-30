<?php

require "general.php";

if (isset($_GET["id"])){
    $preguntaID = $_GET["id"];
    $publica=generarPublicacionID($dbh, $preguntaID);
    $respuest=generarRespuestasTodas($preguntaID, $dbh);
    require "../views/publicacion-id.view.php";

}else{
    echo "No has indicado ningún id";
}






