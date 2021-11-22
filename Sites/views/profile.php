<?php include('../templates/profile.html');
session_start();
$_SESSION["username"] = 'Pedro';   ?>



<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');   ?>
</head>

<body>
<html>
  <h1 align="center">Perfil de Usuario </h1>
  <h3> Nombre de usuario: </h3>
  <h4 style="color:blue"> <?php $user_name; ?> </h4>
  <h3> Correo </h3>
  <h4 style="color:blue"> correo </h4>
  <h3> Cantidad de Peliculas Vistas</h3>
  <h4 style="color:blue"> n_peliculas </h4>
  <h3> Cantidad de Capitulos Vistos</h3>
  <h4 style="color:blue"> n_capitulos </h4>
  <h3> Cantidad de Juegos</h3>
  <h4 style="color:blue"> n_juegos </h4>

  <br>

  <form method="POST" action="../index.php">
    <input type="submit" value="Volver"/>
  </form>