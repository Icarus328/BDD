<head>
    <link href="../styles/estilos.css" rel="stylesheet">
    <?php include('../templates/header.html');   ?>
</head>

<?php
extract($_POST);
require("../config/conexion.php");
$email = $_POST['correo'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios where mail='$email' and password = '$password'limit 1";
$result = $db_par -> prepare($query);
$result -> execute();
?>