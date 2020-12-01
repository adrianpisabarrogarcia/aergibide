<?php
/*En caso de que no existan los datos*/
if (empty($datos))
header('Location: ../model/login.php');
else
{
    /*En caso de que exista generaremos la pagina del perfil*/
require "../vistasfijas/head.php";
?>
<link rel="stylesheet" href="../css/estiloperfil.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
require "../vistasfijas/cabecera.php";
?>
<div id="contenedor">
    <div id="menu">
        <div id="opciones">
            <button value="volver"><i class="w3-margin-left fa fa-home"></i></button>
            <button value="datospersonales">Datos Personales</button>
            <button value="modificarcuenta">Modificar Cuenta</button>
            <button value="modificarcontraseña">Cambiar Contraseña</button>
            <button value="borrarcuenta">Borrar Cuenta</button>
            <button value="cerrarsesion">Cerrar Sesión</button>
            <button value="publicaciones">Mis Publicaciones</button>
            <button value="favoritos">Mis Favoritos</button>
            <button value="puntuaciones">Mis Puntuaciones</button>
        </div>
    </div>
    <div id="contenido">
        <div id="mostrardatos">
            <h1 align="center">DATOS PERSONALES</h1>
            <div id="datusu">
                <div id="datos">
                    <p><b>Usuario: </b><?= $datos->Usuario; ?></p>
                    <p><b>Nombre: </b><?= utf8_encode($datos->Nombre); ?></p>
                    <p><b>Apellido: </b><?= utf8_encode($datos->Apellido); ?></p>
                    <p><b>Correo: </b><?= $datos->Correo; ?></p>
                </div>
                <div id="imag">
                    <img src="<?= $datos->Imagen ?>">
                </div>
            </div>
        </div>
        <div id="modificarcuenta">
            <h1 align="center">MODIFICAR CUENTA</h1>
            <div id="mod">
                <div id="dato">
                    <div id="datosusu">
                        <form name="modificarusu" id="modificarusu" method="post">
                            <label><b>Usuario:</b></label>
                            <div class="in">
                                <input type="text" id="usu" name="usu" required pattern="^[A-z._]{5,20}$">
                                <button id="usua" value="usu">Editar</button>
                            </div>
                            <br/>
                            <label><b>Nombre:</b></label>
                            <div class="in">
                                <input type="text" id="nom" name="nom" required pattern="^([A-zÀ-ÿ]+[ ]?)+$">
                                <button id="nomb" value="nom">Editar</button>
                            </div>
                            <br/>
                            <label><b>Apellido:</b></label>
                            <div class="in">
                                <input type="text" id="ape" name="ape" required pattern="^([A-zÀ-ÿ]+[ ]?)+$">
                                <button id="apel" value="ape">Editar</button>
                            </div>
                            <br/>
                            <label><b>Email:</b></label>
                            <div class="in">
                                <input type="email" id="em" name="em" required>
                                <button id="ema" value="em">Editar</button>
                            </div>
                            <input type="hidden" name="operacion" value="moddatos">
                            <button type="submit" id="modatos">Modificar Datos</button>
                        </form>
                    </div>
                </div>
                <div id="imagen">
                    <div id="imgper">
                        <img src="<?= $datos->Imagen; ?>">
                    </div>
                    <br/>
                    <div id="botonmod">
                        <form name="modificarimagen" id="modificarimagen" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="operacion" value="modimg">
                            <input type="file" id="foto" name="foto" accept="image/jpeg,image/png,image/jpg">
                            <label for="foto">Cambiar foto de perfil</label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modificarcontra">
            <h1 align="center">CAMBIAR CONTRASEÑA</h1>
            <div id="modcont">
                <form name="datoscont" id="datoscont" method="post">
                    <input type="password" name="passwordactu" id="passwordactu" required/>
                    <br/>
                    <input type="password" name="password" id="password" required/>
                    <br/>
                    <input type="password" name="passwordRep" id="passwordRep" required/>
                    <br/>
                    <input type="hidden" name="operacion" value="modicontra">
                    <button type="submit" id="modcontra">Modificar Contraseña</button>
                </form>
            </div>
        </div>
        <div id="puntuacion">
            <h1 align="center">MIS PUNTUACIONES</h1>
            <div id="puntua">
                <div id="punt">
                    <p><b>Total de Preguntas:</b><span class="pregunt"></span></p>
                    <p><b>Total de Respuestas:</b><span class="respues"></span></p>
                    <p><b>Total de Puntuación:</b><span class="total"></span></p>
                    <p><b>Nivel:</b><span class="nivel"></span></p>
                </div>
                <div id="resumen">
                    <h3>
                        <ins>Puntuaciones</ins>
                    </h3>
                    <img src="../img/punt1.png">
                    <img src="../img/punt2.png">
                    <h3>
                        <ins>Niveles</ins>
                    </h3>
                    <img src="../img/punt3.png">
                    <img src="../img/punt4.png">
                    <img src="../img/punt5.png">
                    <img src="../img/punt6.png">
                    <img src="../img/punt7.png">
                </div>
            </div>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
</script>
<script src="../js/perfil.js"></script>
<script src="../js/validaciondatos.js"></script>

</body>
</html>
<?php } ?>