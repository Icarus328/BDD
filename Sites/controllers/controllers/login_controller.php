<head>
</head>

<?php
extract($_POST);
require("../config/conexion.php");
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT nombre, mail, username FROM usuarios WHERE mail='$email' AND password='$password' limit 1";
$result = $db_impar -> prepare($query);
$result -> execute();
$usuario_registrado = $result -> fetch();

echo"holanda";
echo "$usuario_registrado[0], $usuario_registrado[1], $usuario_registrado[2]";

?>