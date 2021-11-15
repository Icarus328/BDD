<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>
  <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $query = "SELECT DISTINCT titulo, duracion, clasificacion, puntuacion, año, genero, nombre, costo
              FROM peliculas, proveedores, prov_pel
              WHERE prov_pel.pid=peliculas.pid
              AND prov_pel.pro_id=proveedores.id;";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $peliculas = $result -> fetchAll();
  ?>

<h1> One Time Purchases: </h1>
<h3> Mostrando todas las peliculas y los proveedores que las ofrecen. </h2>


  <table>
    <tr>
      <th>Titulo</th>
      <th>Duracion</th>
      <th>Clasificacion</th>
      <th>Puntuacion</th>
      <th>Año</th>
      <th>Genero</th>
      <th>Proveedor</th>
      <th>Costo</th>
    </tr>
  
      <?php
        // echo $peliculas_gratis;
        foreach ($peliculas as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td><td>$p[6]</td><td>$p[7]</td></tr>";
      }
      ?>
      
  </table>

  <?php include('../templates/footer.html'); ?>
</body>

