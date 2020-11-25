<?php
session_start();
function connect()
{
    try {
        $host = "127.0.0.1";
        $dbname = "reto2";
        $user = "root";
        $pass = "";

        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $dbh;
    } catch (PDOException $e) {
        $e->getMessage();
        return null;
    }
}

function close()
{
    $dbh = null;
}


function entrarLogin($dbh, $usuario, $password)
{
    $data = array('user' => $usuario);
    $stmt = recogerDatosUsuario($dbh, $data);
    if ($stmt->rowcount() > 0) {
        // Comprobar contraseña correcta
        // Comprobar la contraseña introducida


        while ($row = $stmt->fetch()) {
            $hash2 = $row->Password;
            if (md5($password) == $hash2) {
                // Si es que si lo guardo en sesión
                $_SESSION["usuario"] = $usuario;
                return true;
            }
        }
    }
    return false;

}

function guardarDatosUsuario($dbh)
{
    $data = array('user' => $_SESSION['usuario']);
    $stmt = recogerDatosUsuario($dbh, $data);
    return $stmt;
}

function recogerDatosUsuario($dbh, $data)
{
    $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE Correo = :user OR Usuario = :user");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function registrarLogin($dbh, $usuario, $nombre, $apellido, $email, $password)
{
    //Comprueba si existe en la bbdd
    $data = array('user' => $usuario, 'email' => $email);
    $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE Correo = :email OR Usuario = :user");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    if ($stmt->rowcount() > 0) {
        return false;
    }
    insercionRegistro($dbh, $usuario, $nombre, $apellido, $email, $password);
    return true;

}

function insercionRegistro($dbh, $usuario, $nombre, $apellido, $email, $password)
{
    //Una vez hecha la comprobación bbdd lo vamos a insertar
    //Necesito añadir una imagen predeterminada que estará en la siguiente ruta:
    $rutaImagenPredeterminada = "../img/uploads/persona.jpg";
    // Crear la contraseña:
    $hash = md5($password);
    $data = array('nombre' => $nombre, 'apellido' => $apellido, 'usuario' => $usuario, 'correo' => $email, 'password' => $hash, 'imagen' => $rutaImagenPredeterminada);
    $stmt = $dbh->prepare("INSERT INTO Usuario (Nombre, Apellido, Usuario, Correo, Password, Imagen) VALUES (:nombre, :apellido, :usuario, :correo, :password, :imagen);");

    $stmt->execute($data);


}

function generarPublicaciones($dbh)
{
    $stmt = $dbh->prepare("SELECT Pregunta.ID as ID,Pregunta.Titulo AS Titulo, Pregunta.Descripcion AS Descripcion, Usuario.Usuario as Usuario, Pregunta.Fecha as Fecha, Pregunta.ID_Categoria as Categoria, Pregunta.Archivo as Archivo
                            FROM Pregunta, Usuario
                            WHERE Pregunta.ID_Usuario= Usuario.ID
                            GROUP BY Pregunta.ID
                            ORDER BY Pregunta.Fecha DESC ;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);

    $stmt->execute();
    return $stmt;
}

function generarRespuestas($pregunta, $dbh)
{
    $data = array('pregunta' => $pregunta);
    $stmt = $dbh->prepare("SELECT ID_Pregunta
                            FROM Respuesta
                            WHERE ID_Pregunta= :pregunta");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    return $stmt;
}

function mostrarCategorias($dbh)
{
    $stmt = $dbh->prepare("SELECT Descripcion AS cat FROM Categoria
                            ORDER BY ID asc");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt;
}

function mostrarCategoria($dbh, $datos)
{
    $data = array('descripcion' => $datos);
    $stmt = $dbh->prepare("SELECT * FROM Categoria
                            WHERE Descripcion = :descripcion");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function mostrarPublicacionPorCategoria($cat, $dbh)
{

    $data = array("category" => utf8_decode($cat));
    $stmt = $dbh->prepare("SELECT Pregunta.ID as ID,Pregunta.Titulo AS Titulo, Pregunta.Descripcion AS Descripcion, Usuario.Usuario as Usuario, Pregunta.Fecha as Fecha, Pregunta.ID_Categoria as Categoria, Pregunta.Archivo as Archivo
                            FROM Pregunta, Usuario, Categoria
                            WHERE Pregunta.ID_Usuario= Usuario.ID
                            AND Pregunta.ID_Categoria =Categoria.ID 
                            AND Categoria.Descripcion = :category 
                            GROUP BY Pregunta.ID
                            ORDER BY Pregunta.Fecha DESC ;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    return $stmt;
}

function generarMisPublicaciones($dbh)
{
    $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario);
    $stmt = $dbh->prepare("SELECT Pregunta.ID as ID,Pregunta.Titulo AS Titulo, Pregunta.Descripcion AS Descripcion, Usuario.Usuario as Usuario, Pregunta.Fecha as Fecha, Pregunta.ID_Categoria as Categoria, Pregunta.Archivo as Archivo
                            FROM Pregunta, Usuario
                            WHERE Pregunta.ID_Usuario= Usuario.ID
                            AND (Usuario.Usuario = :usuario OR Usuario.Correo = :usuario)
                            GROUP BY Pregunta.ID
                            ORDER BY Pregunta.Fecha DESC ;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function generarMisFavoritos($dbh)
{
    $usuario = guardarDatosUsuario($dbh);
    $row = $usuario->fetch();
    $user = $row->ID;
    $data = array("id" => $user);
    $stmt = $dbh->prepare("SELECT Pregunta.ID as ID,Pregunta.Titulo AS Titulo, Pregunta.Descripcion AS Descripcion, Usuario.Usuario as Usuario, Pregunta.Fecha as Fecha, Pregunta.ID_Categoria as Categoria, Pregunta.Archivo as Archivo
                            FROM Pregunta, Usuario, Favoritos
                            WHERE Pregunta.ID_Usuario = Usuario.ID
                            AND Pregunta.ID = Favoritos.ID_Pregunta
                            AND Favoritos.ID_Usuario = :id;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function mostrarPublicacionPorBuscador($title, $dbh)
{
    $data = array("tituloPorBuscador" => utf8_decode($title));
    $stmt = $dbh->prepare("SELECT Pregunta.ID as ID,Pregunta.Titulo AS Titulo, Pregunta.Descripcion AS Descripcion, Usuario.Usuario as Usuario, Pregunta.Fecha as Fecha, Pregunta.ID_Categoria as Categoria, Pregunta.Archivo as Archivo
                            FROM Pregunta, Usuario
                            WHERE Pregunta.ID_Usuario= Usuario.ID
                            AND LOWER(Pregunta.Titulo) LIKE CONCAT('%',:tituloPorBuscador,'%')
                            GROUP BY Pregunta.ID
                            ORDER BY Pregunta.Fecha DESC ;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function datosusuario($dbh, $usuario)
{
    if (empty($usuario))
        $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario);
    $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE Usuario=:usuario OR Correo=:usuario");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    return $stmt->fetch();
}

function eliminarcuenta($dbh)
{
    $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario);
    $stmt = $dbh->prepare("DELETE FROM Usuario WHERE Usuario=:usuario OR Correo=:usuario");
    $stmt->execute($data);
}

function modificarimg($dbh, $directorio)
{
    $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario, 'directorio' => $directorio);
    $stmt = $dbh->prepare("UPDATE Usuario SET Imagen=:directorio WHERE Usuario=:usuario OR Correo=:usuario");
    $stmt->execute($data);
}


function cantidadMisRespuestas($dbh)
{
    $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario);
    $stmt = $dbh->prepare("SELECT *
                                FROM Respuesta
                                WHERE ID_Usuario=(SELECT ID FROM Usuario WHERE Usuario=:usuario OR Correo=:usuario)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    return $stmt;
}

function modificarcontra($dbh, $contra)
{
    $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario, "password" => $contra);
    $stmt = $dbh->prepare("UPDATE Usuario SET Password=:password WHERE Usuario=:usuario OR Correo=:usuario");
    $stmt->execute($data);
}

function modificardatosusu($dbh, $usu, $nombre, $apellido, $correo)
{
    $usuario = $_SESSION["usuario"];
    $data = array('usuario' => $usuario, 'usu' => $usu, 'nombre' => $nombre, 'apellido' => $apellido, 'correo' => $correo);
    $stmt = $dbh->prepare("UPDATE Usuario SET Usuario=:usu,Nombre=:nombre,Apellido=:apellido,Correo=:correo WHERE Usuario=:usuario OR Correo=:usuario");
    $stmt->execute($data);
    $_SESSION["usuario"] = $usu;
}


function insercionPublicacion($dbh, $titulo, $descripcion, $idUsuario, $fecha, $idCategoria, $archivo)
{
    $data = array('titulo' => $titulo, 'descripcion' => $descripcion, 'idUsuario' => $idUsuario, 'fecha' => $fecha, 'idCategoria' => $idCategoria, 'archivo' => $archivo);
    $stmt = $dbh->prepare("INSERT INTO Pregunta (Titulo, Descripcion, ID_Usuario, Fecha, ID_Categoria, Archivo) 
                            VALUES (:titulo, :descripcion, :idUsuario, :fecha, :idCategoria, :archivo);");
    $stmt->execute($data);
}
//Funciones orientadas a los Likes
function comprobarLike($dbh, $userID,$publicacionID)
{
    $data = array('userID' => $userID, 'publicacionID' => $publicacionID);
    $stmt = $dbh->prepare("SELECT * FROM Likes
                                    WHERE ID_Usuario= :userID
                                    AND ID_Pregunta= :publicacionID;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function darQuitarLike($dbh, $userID,$publicacionID){
    $stmt=comprobarLike($dbh, $userID,$publicacionID);
    if($stmt->rowcount()>0){
        deleteLike($dbh, $userID, $_POST['like_fav']);
    }
    else{
        insertarLike($dbh, $userID, $_POST['like_fav']);
    }

}



function insertarLike($dbh,$userID, $publicacionID){
    $data= array('userID'=>$userID, 'publicacionID'=>$publicacionID);
    $stmt=$dbh->prepare("INSERT INTO Likes (ID_Pregunta,ID_Usuario) VALUES (:publicacionID,:userID)");
    $stmt->execute($data);
}

function deleteLike($dbh,$userID, $publicacionID){
    $data= array('userID'=>$userID, 'publicacionID'=>$publicacionID);
    $stmt = $dbh->prepare("DELETE FROM Likes
                             WHERE ID_Pregunta= :publicacionID
                             AND ID_Usuario= :userID;");
    $stmt->execute($data);

}
//Funciones orientadas a los Favoritos
function comprobarFav($dbh, $userID,$publicacionID)
{
    $data = array('userID' => $userID, 'publicacionID' => $publicacionID);
    $stmt = $dbh->prepare("SELECT * FROM Favoritos
                                    WHERE ID_Usuario= :userID
                                    AND ID_Pregunta= :publicacionID;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    return $stmt;
}

function darQuitarFav($dbh, $userID, $publicacionID){
    $stmt= comprobarFav($dbh, $userID,$publicacionID);
    if($stmt->rowcount()>0){
        deleteFav($dbh, $userID, $_POST['like_fav']);
    }
    else{
        insertarFav($dbh, $userID, $_POST['like_fav']);
    }
}

function insertarFav($dbh,$userID, $publicacionID){
    $data= array('userID'=>$userID, 'publicacionID'=>$publicacionID);
    $stmt=$dbh->prepare("INSERT INTO Favoritos (ID_Pregunta,ID_Usuario) VALUES (:publicacionID,:userID)");
    $stmt->execute($data);
}

function deleteFav($dbh,$userID, $publicacionID){
    $data= array('userID'=>$userID, 'publicacionID'=>$publicacionID);
    $stmt = $dbh->prepare("DELETE FROM Favoritos
                             WHERE ID_Pregunta= :publicacionID
                             AND ID_Usuario= :userID;");
    $stmt->execute($data);

}

$dbhcerrar = close();




