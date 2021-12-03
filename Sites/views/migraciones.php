<html>

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


<section class="text-center mt-5" >
  
    <h1 > Hola, aquí están los algoritmos de passwords: </h1>
    <h3 class="mt-5 "> La contraseña de un usuario impar es un numero aleatorio de 9 digitos </h3>
    <?php function contraseña_impar()
    {
    return rand(100000000, 999999999);
    }
    $pass_random_impar = contraseña_impar();

    echo "la contraseña, para un usuario impar sería $pass_random_impar";
    ?>

    <?php function contraseña_par($username, $horas)
    {
        $userlen = strlen($username);
        $letras_a_eliminar = rand(0, floor($userlen/2));
        $parte_1_pass = substr($username, 0, ($userlen - $letras_a_eliminar));
        $parte_2_pass = rand(0, ceil($horas));
        $parte_2_pass = strval($parte_2_pass);
        $pass = $parte_1_pass . $parte_2_pass;
        return $pass;
    }
    ?>
    <h3 > La contraseña de un usuario par es su username, con una cantidad menor
         o igual a la mitad de su nombre eliminada, más un numero al azar menor o igual 
         a su cantidad de horas jugadas aproximadas hacia arriba </h3>

         <?php
  require("../config/conexion.php");

  $query = "SELECT nombre
  FROM usuarios
  WHERE id = 1";

	$result = $db_impar -> prepare($query);
	$result -> execute();
	$users = $result -> fetchAll();
  ?>

<?php
foreach ($users as $user) {
  $name = $user[0];
  $pass_par = contraseña_par($name, 50);
  echo "La contraseña, para un usuario impar de nombre $name y horas jugadas 50 sería $pass_par";
}
      ?>

<h3 > La id de usuario maxima es </h3>

<?php
  require("../config/conexion.php");

  $query = "SELECT MAX(id)
  FROM usuarios
  LIMIT 1";

	$result = $db_impar -> prepare($query);
	$result -> execute();
	$users = $result -> fetchAll();
  foreach ($users as $user) {
    $id = $user[0];
    echo "La maxima id es $id";
  }
  ?>

<h3 > La id de pago maxima en peliculas es </h3>

<?php
  require("../config/conexion.php");

  $query = "SELECT MAX(pago_id)
  FROM pagos_pel
  LIMIT 1";

	$result = $db_impar -> prepare($query);
	$result -> execute();
	$users = $result -> fetchAll();
  foreach ($users as $user) {
    $id = $user[0];
    echo "La maxima id es $id";
  }
  ?>

<h3 > La id de pago maxima en subs es </h3>

<?php
  require("../config/conexion.php");

  $query = "SELECT MAX(pago_id)
  FROM pagos_sub
  LIMIT 1";

	$result = $db_impar -> prepare($query);
	$result -> execute();
	$users = $result -> fetchAll();
  foreach ($users as $user) {
    $id = $user[0];
    echo "La maxima id es $id";
  }
  ?>

  

</section>

<div class="text-center mt-5" id="ingresar" style="padding-top: 5%">
      <a class="btn btn-outline-warning my-2 rounded w-75" href="../index.php">Volver</a>
</div>

</html>