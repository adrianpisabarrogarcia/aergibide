<div class="cuadro_publicacion">
    <?php
    if ($operacion=='categoria'){
        $publicacionporCat= mostrarPublicacionPorCategoria($_POST['valor'], $dbh);
        $publicacion= $publicacionporCat;
    }
    elseif($operacion=='buscar'){
        $publicacionBuscador= mostrarPublicacionPorBuscador($_POST['valor'], $dbh);
        $publicacion=$publicacionBuscador;
    }
    elseif ($operacion=='generarTodo'){
        $publicacion = generarPublicaciones($dbh);
    }


    require "publicacion.view.php"; ?>
</div>