<?php
$users= array(
    "user1"=>array(
        "Nombre"=>"Mario",
        "apellido"=>"ZATON",
        "contrasena"=>"12345"
    ),
    "user2"=>array(
        "Nombre"=>"Adrian",
        "apellido"=>"Pisabarro",
        "contrasena"=>"abcde"
    )
);



if(isset($_POST["user"]) && $_POST["password"]){
    $usuario= $_POST["user"];
    $password= $_POST["password"];
}
function comprobarLogin($user,$pass,$users){
    if($pass == $users[$user]["contrasena"]){
        $error=0;
    }
    elseif ($pass != $users[$user]["contrasena"]){
        $error=1;
    }

    return $error;
}
if(array_key_exists($usuario, $users)){
    $login= comprobarLogin($usuario, $password, $users);
    if ($login==0){
        require "../views/principal.view.php";
    }
    elseif($login==1){
        require "../views/index.view.php";
    }
}
else{
    $error=2;
    require "../views/index.view.php";
}