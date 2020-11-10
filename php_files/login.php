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
if(array_key_exists($usuario, $users)){

}