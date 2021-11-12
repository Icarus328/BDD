<?php include('templates/profile.html');   ?>


<body>
<html>
  <h1 align="center">Perfil de Usuario </h1>
  <h3> Nombre de usuario: </h3>
  <h4 style="color:blue"> nombre </h4>
  <h3> Correo </h3>
  <h4 style="color:blue"> correo </h4>
  <h3> Cantidad de Peliculas Vistas</h3>
  <h4 style="color:blue"> n_peliculas </h4>
  <h3> Cantidad de Capitulos Vistos</h3>
  <h4 style="color:blue"> n_capitulos </h4>
  <h3> Cantidad de Juegos</h3>
  <h4 style="color:blue"> n_juegos </h4>

  <br>

  <form method="POST" action="index.php">
    <input type="submit" value="Volver"/>
  </form>