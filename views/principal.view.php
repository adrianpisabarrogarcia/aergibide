<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aergibide</title>


</head>
<body>
<?php require "header.view.php";?>
<article id="barra_busqueda">
    <div id="filtro">
        <a href=""> Filtrar</a>
    </div>
    <div id="buscador">
        <input type="text" placeholder="Inicia tu búsqueda"name="busqueda">
        <div id="lupa"><span>🔎</span></div>

    </div>

    <div id="menu_usuario">
        <ul>
            <li><a>Perfil</a></li>
            <li><a>Cerrar sesión</a></li>
        </ul>
    </div>
</article>
<main>
    <div class="temas">
            <div class="items">
                <button >Tema 1</button>
            </div>
            <div class="items">
                <button >Tema 2</button>
            </div>
            <div class="items">
                <button >Tema 3</button>
            </div>
            <div class="items">
                <button >Tema 4</button>
            </div>
            <div class="items">
                <button >Tema 5</button>
            </div>
            <div class="items">
                <button >Tema 6</button>
            </div>
    </div>

    <section id="publicaciones">
        <table>

        </table>
    </section>
</main>
</body>
</html>