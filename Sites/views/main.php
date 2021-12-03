<html>

<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');   ?>
</head>

<body>

  <h1> One Time Purchases </h1>
  <form method="POST" action="otp_juegos.php">
    <input type="submit" value="Juegos"/>
  </form>

  <form method="POST" action="otp_peliculas.php">
    <input type="submit" value="Peliculas"/>
  </form>

  <h1> Buscar amigos </h1>
  <h3 align="center">buscar amigos</h3>

  <form align="center" action="consultas/consulta_user.php" method="post">
    <input type="text" name="username">
    <br/><br/>   
    <input type="submit" value="buscar!">
  </form>

  <?php include('../templates/footer.html'); ?>
</body>
</html>