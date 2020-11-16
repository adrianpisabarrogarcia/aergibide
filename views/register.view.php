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
    <h2>Registrarse</h2>
    <form action="../model/register.php" method="post" accept-charset="utf-8">
        <input type="text" name="user" id="user" class="campo" placeholder="🙋‍♀️ Usuario *" required>
        <input type="text" name="nombre" id="nombre" class="campo" placeholder="✍️ Nombre *" required>
        <input type="text" name="apellido" id="apellido" class="campo" placeholder="✍️ Apellidos *" required>
        <input type="email" name="email" id="email" class="campo" placeholder="🧑‍💻 Correo Electrónico *" required>
        <input type="password" name="password" id="password" class="campo" placeholder="🗝️ Contraseña *" required>
        <input type="password" name="passwordRep" id="passwordRep" class="campo" placeholder="🗝️ Repite la contraseña *" required>
        <?php if (isset($mensaje)){ ?>
            <span style="text-align: center; color: red"><?php echo $mensaje; ?></span>
        <?php }?>

        <button type="submit" name="entrar" id="registrar" class="boton" value="Registrarse">🚪️ &nbsp;Registrarse</button>
        <input type="button" onclick="location.href='../model/login.php';" value="🤏️ &nbsp;Atrás" />

    </form>
</div>

<!-- CDN JQUERY -->
<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
</script>
<script src="../js/validacionRegistro.js"></script>
</body>
</html>