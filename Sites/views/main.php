<html>

<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('../templates/header.html'); ?>
</head>

<body class="bg-dark">

<section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black navbar-shrink">
    <div class="container-fluid">
      <a class="navbar-brand text-warning text-uppercase" href="../index.php">Prime Max</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="../index.php#ingresar">Ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php#about">Acerca de nosotros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>


<section class="text-center mt-5" id="ingresar" style="height: 50%">
  <h1 class="text-white pt-5 display-4 text-uppercase">
    One Time Purchases
  </h1>
  <h2 class="text-muted">
    ¿Que desea comprar?
  </h2>
  <div class="btn-group-vertical w-75">
    <a class="btn btn-warning my-2 rounded" href="otp_juegos.php" >Juegos</a>
    <a class="btn btn-warning my-2 rounded" href="otp_peliculas.php"">Peliculas</a>
  </div>
</section>

<div class="text-center mt-5" id="ingresar" style="padding-top: 5%">
  <a class="btn btn-outline-warning my-2 rounded w-75" href="../index.php">Volver</a>
</div>

</body>
</html>