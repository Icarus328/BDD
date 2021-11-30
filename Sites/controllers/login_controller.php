<?php
session_start();
extract($_POST);
require("../config/conexion.php");
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT nombre, mail, username FROM usuarios WHERE mail='$email' limit 1";
$result = $db_impar -> prepare($query);
$result -> execute();
$usuario_registrado = $result -> fetchAll();

if(count($usuario_registrado) > 0) {
    $_SESSION['user_logged'] = $usuario_registrado[0];
    header('Location: ../index.php');
    echo "El usuario con este email ya existe"; 
} else {
    echo "No existe el usuario indicado";
};

?>

