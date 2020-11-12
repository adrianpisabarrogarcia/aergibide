<?php
session_start();
    function connect(){
        try {
            $host = "127.0.0.1";
            $dbname = "reto2";
            $user = "root";
            $pass = "";

            $dbh=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
            return $dbh;
        }
        catch (PDOException $e){
            $e -> getMessage();
            return null;
        }
    }

    function close(){
        $dbh = null;
    }

    $dbh = connect();
    entrarLogin($dbh, $usuario,$password);

    function entrarLogin($dbh, $usuario,$password){
        $data = array('user' => $usuario);
        $stmt = $dbh -> prepare("SELECT * FROM Usuario WHERE Correo = :user OR Usuario = :user");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($data);
        if ($stmt -> rowcount() > 0){
            // Comprobar contraseña correcta

            while ($row = $stmt->fetch()){
                $contra = $row->Password;


                if($contra== $password){
                    $_SESSION["usuario"]= $usuario;
                    require  "../views/principal.view.php";
                }
                else{
                    $mensaje= "Usuario o contraseña incorrecta.";
                    require  "../views/index.view.php";
                }
            }


            // Si es que si lo guardo en sesión
            // Cargo prinicipal.php



        }else{
            $mensaje = "Usuario o contraseña incorrecta";
            require "../views/index.view.php";
        }


    }





    $dbhcerrar = close();




