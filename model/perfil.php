<?php
    require "general.php";

    if (isset($_POST["operacion"])) {
        $ope = $_POST["operacion"];

        switch ($ope) {
            case "borrar":
                borrarcuenta($dbh);
            break;
            case "modimg":
                modificarimagen($dbh,$datos);
            break;
            case "mostrarpunt":
                sacarpuntuacion($dbh);
            break;
            case "cerrarsesion":
                session_unset();
                echo "ok";
            break;
            case "modicontra":
               modificarcontrase($dbh,$datos);
            break;
            case "moddatos":
                modificardatos($dbh,$datos);
            break;
        }
    }
    else
        require "../views/perfil.view.php";

    function borrarcuenta($dbh)
    {
        eliminarcuenta($dbh);
        session_unset();
        echo "La cuenta se ha eliminado correctamente";
    }

    function modificarimagen($dbh,$dato){
        $uploads_dir="../img/uploads";
        $imagen=$_FILES["foto"]["tmp_name"];
        $nombre=$dato->Usuario;
        $directorio = $uploads_dir.'/'.$nombre;
        if (file_exists($directorio))
            unlink($directorio);
        move_uploaded_file($imagen,$directorio);
        modificarimg($dbh,$directorio);
        echo "OK";
    }

    function sacarpuntuacion($dbh){
       $stmt = generarMisPublicaciones($dbh);
       $numero = $stmt -> fetchAll();
       $data['pregunta'] = count($numero);
       $stmt = cantidadMisRespuestas($dbh);
       $numero = $stmt -> fetchAll();
       $data['respuesta'] = count($numero);

       echo json_encode($data);
    }

    function modificarcontrase($dbh,$datos){
        $contraactu = $_POST["passwordactu"];
        $hash2 = $datos->Password;
        $contra = $_POST["password"];

        if (md5($contraactu) != $hash2)
            echo "Error";
        else
        {
            modificarcontra($dbh,md5($contra));
            echo "La Contraseña se ha modificado correctamente";
        }
    }

    function modificardatos($dbh,$datos){
        $usuario = $_POST["usu"];
        if (empty($usuario))
        {
            $usuario = $datos->Usuario;
        }
        else
        {
           $stmt = guardarDatosUsuario($dbh,$usuario);
           if ($usuario == $stmt->Usuario)
           {
               echo "ErrorUsu";
               die();
           }
        }

        $nombre = $_POST["nom"];
        $nombre = utf8_decode($nombre);
        if (empty($nombre))
            $nombre = $datos->Nombre;

        $apellido = $_POST["ape"];
        $apellido = utf8_decode($apellido);
        if (empty($apellido))
            $apellido = $datos->Apellido;

        $correo = $_POST["em"];
        if (empty($correo))
            $correo = $datos->Correo;
        else
        {
            $stmt = guardarDatosUsuario($dbh,$correo);
            if ($correo == $stmt->Correo)
            {
                echo "ErrorCorreo";
                die();
            }
        }

        modificardatosusu($dbh,$usuario,$nombre,$apellido,$correo);
        echo "OK";
    }




