<html>

<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('../templates/header.html');?>
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


<section class="text-center mt-5" id="ingresar" style="height: 25%">
  <h1 class="text-white pt-5 display-4 text-uppercase">
    Registrandose
  </h1>
  <h2 class="text-muted">
    ¿Cuales son sus credenciales?
  </h2>

</section>

<section class="text-center" style="height: 45%; padding-left: 10%; padding-right: 10%">
  <form action="../controllers/login_controller.php" method="post">
    <div class="input-group mb-3" >
      <input type="text" name="first_name" class="form-control" placeholder="First Name" required="required">
    </div>

    <div class="input-group mb-3">
      <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="required">
    </div>

    <div class="input-group mb-3" >
      <input type="text" name="username" class="form-control" placeholder="Username" required="required">
    </div>

    <div class="input-group mb-3" >
      <input type="text" name="email" class="form-control" placeholder="Email" required="required">
    </div>

    <div class="input-group mb-3" >
      <input type="text" name="pass" class="form-control" placeholder="Password" required="required">
    </div>

    <div class="input-group mb-3" >
    <input type="text" name="cpass" class="form-control" placeholder="Confirmation Password" required="required">
    </div>

    <div class="form-group">
      <input type="submit" name="save" value="Registrarse"></input>
    </div>

    <div class="text-center mt-5">Ya tienes una cuenta? 
      <a href="login.php">Inicia sesion!</a>
    </div>

  </form>
</section>

<div class="text-center mt-5" id="ingresar">
  <a class="btn btn-outline-warning my-2 rounded w-75" href="../index.php">Volver</a>
</div>

</body>
</html>
