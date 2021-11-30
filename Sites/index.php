<html>
<head lang="en" >
  <link href="styles/estilos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('templates/header.html'); ?>
</head>

<body class="bg-dark" id="page-top">

<section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-warning text-uppercase" href="#page-top">Prime Max</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#ingresar">Ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#aboutus">Acerca de nosotros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>

<section class="hero is-success is-halfheight banner text-center">
  <div class="hero-body" style="height: 70%">
    <div class="text-center  text-white" style="padding: 7%">
      <h1 class="text-warning display-1 text-uppercase ">
        Prime Max
      </h1>
      <h2 class="text-white display-6">
        Bienvenido a la mejor página de videojuegos y películas.
      </h2>
    </div>
    <div class="btn-group w-75 pt-5">
      <a class="btn btn-outline-warning mx-2 rounded" href="views/main.php" ">Ver main</a>
      <a class="btn btn-outline-warning mx-2 rounded" href="views/profile.php" >Ver Perfil</a>
      <a class="btn btn-outline-warning mx-2 rounded" href="views/migraciones.php" ">Ver migraciones</a>
    </div>
  </div>
</section>

<section class="text-center mt-5" id="ingresar" style="height: 50%">
  <h2 class="text-white pt-5 display-4 text-uppercase">
    Accede a Prime Max
  </h2>

  <h3 class="text-muted">
    Inicia sesión o Registrate
  </h3>

  <div class="btn-group-vertical w-75">
    <a class="btn btn-warning my-2 rounded" href="views/login.php" >Iniciar Sesión</a>
    <a class="btn btn-warning my-2 rounded" href="views/register.php"">Registrarse</a>
  </div>
</section>


<section class="text-center" id="about" style="height: 20%">
  <h3 class="text-muted">
  Grupo 77 y Grupo 112
  </h3>
  
</section>

</body>

</html>

