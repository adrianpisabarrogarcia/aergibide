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

$dbh = connect();


function entrarLogin($dbh, $usuario, $password)
{
    $data = array('user' => $usuario);
    $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE Correo = :user OR Usuario = :user");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    if ($stmt->rowcount() > 0) {
        // Comprobar contraseña correcta
        // Comprobar la contraseña introducida


        while ($row = $stmt->fetch()) {
            $hash = $row->Password;
            if (Password::verify($password, $hash)) {
                // Si es que si lo guardo en sesión
                $_SESSION["usuario"] = $usuario;
                return true;
            }
        }
    }
    return false;

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
    $hash = Password::hash($password);
    $data = array('nombre' => $nombre, 'apellido' => $apellido, 'usuario' => $usuario, 'correo' => $email, 'password' => $hash);

    $stmt = $dbh->prepare("INSERT INTO Usuario (Nombre, Apellido, Usuario, Correo, Password, Imagen) VALUES (value1, value2, value3, ...);");
    $stmt->execute($data);


}


$dbhcerrar = close();


//Encriptación de Password
class Password {
    const SALT = 'EstoEsUnSalt';
    public static function hash($password) {
        return hash('sha512', self::SALT . $password);
    }
    public static function verify($password, $hash) {
        return ($hash == self::hash($password));
    }
}



