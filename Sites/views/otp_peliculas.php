<?php 
  session_start();
  $user_logged = $_SESSION['user_logged'];
?>


<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('../templates/header.html');?>
</head>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT DISTINCT peliculas.titulo, peliculas.pid
            FROM peliculas, proveedores, prov_pel
            WHERE prov_pel.pid=peliculas.pid
            AND prov_pel.pro_id=proveedores.id;";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $peliculas = $result -> fetchAll();
?>


<body class="bg-dark text-white">
  
<section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black navbar-shrink">
    <div class="container-fluid">
      <a class="navbar-brand text-warning text-uppercase" href="../index.php#page-top">Prime Max</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <?php
            if ($user_logged[0]){
              echo "<li class='nav-item'> <a class='nav-link active' href='profile.php'> $user_logged[0] </a> </li>";
              echo "<li class='nav-item'> <a class='nav-link active' href='login.php'> Cerrar Sesión </a> </li>";
            } else {
              echo "<li class='nav-item'> <a class='nav-link active' href='../index.php#ingresar'> Ingresar </a> </li>";
            };
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../index.php#about">Acerca de nosotros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>



<section class="text-center mt-5" id="ingresar" style="height: 20%">
  <h1 class="text-white pt-5 display-4 text-uppercase">
    One Time Purchases
  </h1>
  <h2 class="text-muted">
  Mostrando todas las peliculas y los proveedores que las ofrecen
  </h2>
</section>


<table class="rounded ">
    <tr>
      <th>Titulo</th>
      <th>Links</th>
    </tr>
    <?php
      foreach ($peliculas as $pelicula) {
        echo "<tr>
        <td>$pelicula[0]</td>
        <td>
          <form action='../consultas/consulta_peliculas.php' method='post'>
            <input type='hidden' name='pelicula' value='$pelicula[1]' >
            <input type='submit' class='btn btn-outline-warning mt-3' value='Más detalles' >
          </form>
        </td>
        </tr>";
      }
    ?>
	</table>

  <?php include('../templates/footer.html'); ?>
</body>

