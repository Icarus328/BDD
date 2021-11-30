<?php
session_start();
extract($_POST);
require("../config/conexion.php");
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$cpass = $_POST["cpass"];
$name = "$first_name"." "."$last_name";

$query = "SELECT * FROM usuarios where mail='$email' limit 2";
$result = $db_impar -> prepare($query);
$result -> execute();
$usuarios_registrados = $result -> fetchAll();

$query = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1;";
$result = $db_impar -> prepare($query);
$result -> execute();
$last_id = $result -> fetchAll();
$new_id = $last_id[0][0]+1;

if($usuarios_registrados != array()) {
    echo "El usuario con este email ya existe";
} elseif($pass != $cpass) {
    echo "Las contraseñas ingresadas no coinciden";
} else {
    $query="INSERT INTO usuarios(id, nombre, mail, password, username )
            VALUES ('$new_id' ,'$name', '$email', '$pass', '$username')";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    header('Location: ../views/login.php');
    
}

?>


</body>