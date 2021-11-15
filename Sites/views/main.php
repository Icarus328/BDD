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

  <?php include('../templates/footer.html'); ?>
</body>
</html>