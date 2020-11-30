<?php
if (empty($dbh))
header("Location: ../model/login.php");
else
{
?>
<!DOCTYPE html>
            <!-- LOGIN DE USUARIOS -->
<html lang="es">
<header>
    <title>Aergibide</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!-- SEO -->
    <meta name="keywords" content="foro, aeronática, aergibide, herramientas aeronáticas"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">

</header>
<body>

<div class="">
    <img src="../img/logo_vertical_color.png">
    <form action="login.php" method="post"  accept-charset="utf-8">
        <input type="text" name="user" id="user" class="campo" placeholder="‍💻  Correo Electrónico" required>
        <input type="password" name="password" id="password" class="campo" placeholder="🗝️ Contraseña" required >

        <button type="submit" name="entrar" id="entrar" class="boton" value="Entrar">👉 &nbsp;Entrar</button>
        <input type="button" onclick="location.href='../model/register.php';" value="✏️ &nbsp;Registrarse" />
    </form>
    <?php if (isset($mensaje)){ ?>
        <span style="color: red"><?=$mensaje?></span>
    <?php } ?>
</div>


</body>
</html>
    <?php
}
?>