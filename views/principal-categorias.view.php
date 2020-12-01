<?php
/*En caso de que no haya operaciones nos redirigira al login.php*/

if (empty($operacion))
{
    header("Location: ../model/login.php");
}
else
{
    /*En caso de que si que haya generaremos las publicaciones segun la operacion*/
?>
<div class="cuadro_publicacion">
    <?php
    //Mediante unas funciones de JS situadas en "principal.js" enviamos un ajax con el dato 'operación' con el que según
    // las publicaciones que queramos mostrar, se realizará una operación u otra.
    //Mostrar publicaciones por categoría.
    if ($operacion=='categoria'){
        $publicacionporCat= mostrarPublicacionPorCategoria($_POST['valor'], $dbh);
        $publicacion= $publicacionporCat;
    }
    //Mostrar publicaciones por buscador
    elseif($operacion=='buscar'){
        $publicacionBuscador= mostrarPublicacionPorBuscador($_POST['valor'], $dbh);
        $publicacion=$publicacionBuscador;
    }
    //Mostrar publicaciones generales.
    elseif ($operacion=='generarTodo'){
        $publicacion = generarPublicaciones($dbh);
    }

    require "publicacion.view.php"; ?>
</div>
<?php } ?>