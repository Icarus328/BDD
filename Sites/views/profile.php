<html>

<?php include('../templates/profile.html');   ?>

<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('../templates/header.html');   ?>
</head>

<body class="bg-dark text-white">

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



<section class="text-center">
  <div class="my-5">
    <h1 class="my-4 text-warning display-3">Perfil de Usuario </h1>
  </div>

  </div>
    <h3 class="text-warning"> Nombre de usuario </h3>
    <h4 > nombre </h4>
    <h3 class="text-warning"> Correo </h3>
    <h4 > correo </h4>
    <h3 class="text-warning"> Cantidad de Peliculas Vistas</h3>
    <h4 > n_peliculas </h4>
    <h3 class="text-warning"> Cantidad de Capitulos Vistos</h3>
    <h4 > n_capitulos </h4>
    <h3 class="text-warning"> Cantidad de Juegos</h3>
    <h4 > n_juegos </h4>

    <br>

    <div class="text-center mt-5" id="ingresar" style="padding-top: 5%">
      <a class="btn btn-outline-warning my-2 rounded w-75" href="../index.php">Volver</a>
    </div>
  </div>
</section>

</html>