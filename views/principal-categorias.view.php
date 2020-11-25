<div class="cuadro_publicacion">
    <?php
    if (isset($_GET['valor'])){
        $publicacionporCat= mostrarPublicacionPorCategoria($_GET['valor'], $dbh);
        $publicacion= $publicacionporCat;
    }
    elseif($_POST['tituloPubli']!=""){
        $publicacionBuscador= mostrarPublicacionPorBuscador($_POST['tituloPubli'], $dbh);
        $publicacion=$publicacionBuscador;
    }


    require "publicacion.view.php"; ?>
</div>