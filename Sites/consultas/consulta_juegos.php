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
    require("../config/conexion.php");
    $id_juego = $_POST["juego"];
    $query = "SELECT DISTINCT videojuegos.titulo, videojuegos.fecha_de_lanzamiento, videojuegos.puntuacion, videojuegos.clasificacion, proveedores.nombre, cdp.tipo_venta, cdp.precio
    FROM codigos_pagos AS cdp, videojuegos, proveedores
    WHERE cdp.id_proveedor = proveedores.id
    AND cdp.id_videojuego = videojuegos.id
    AND videojuegos.id = '$id_juego' 
    ORDER BY proveedores.nombre;"; 
    $result = $db_par -> prepare($query);
    $result -> execute();
    $juegos = $result -> fetchAll();


    $query = "SELECT DISTINCT proveedores.nombre, proveedores.id
    FROM codigos_pagos AS cdp, videojuegos, proveedores
    WHERE cdp.id_proveedor = proveedores.id
    AND cdp.id_videojuego = videojuegos.id
    AND videojuegos.id = '$id_juego'
    ORDER BY proveedores.nombre;"; 
    $result = $db_par -> prepare($query);
    $result -> execute();
    $proveedores = $result -> fetchAll();

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
              echo "<li class='nav-item'> <a class='nav-link active' href='../views/profile.php'> $user_logged[0] </a> </li>";
              echo "<li class='nav-item'> <a class='nav-link active' href='../views/login.php'> Cerrar Sesión </a> </li>";
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
    Viendo más información acerca de los juegos
    </h2>
</section>

<table class="rounded ">
    <tr>
        <th class="px-3">Nombre</th>
        <th class="px-3">Fecha de lanzamiento</th>
        <th class="px-3">Puntuacion</th>
        <th class="px-3">Clasificacion</th>
        <th class="px-3">Proveedor</th>
        <th class="px-3">Tipo de venta</th>
        <th class="px-3">Precio</th>
    </tr>
    <?php
        foreach ($juegos as $juego) {
            echo "<tr class='px-3'><td>$juego[0]</td><td>$juego[1]</td><td>$juego[2]</td><td>$juego[3]</td><td>$juego[4]</td><td>$juego[5]</td><td>$juego[6]</td></tr>";
        }
    ?>
</table>

<br>
<br>

<section class="text-center mt-5" id="ingresar" style="height: 20%">
    <form action= 'consulta_compra_juegos.php' method='post'>
            Seleccione el proveedor al que desea comprar:
        <select name='id_proveedor' >
            <?php foreach ($proveedores as $proveedor) {
                echo "<option value='$proveedor[1]'>$proveedor[0]</option>";
            }
            ?>
        </select>
        <?php
        echo "<input type='hidden' name='id_juego' value='$id_juego' required='required'>"
        ?>
        <input type="submit" value="Comprar a este proveedor">
    </form>  
        
    <form>
        <input type="button" value="Atras" onclick="history.back()">
    </form>
</section>

</body>