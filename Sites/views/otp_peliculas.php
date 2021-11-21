<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>
  <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $query = "SELECT DISTINCT titulo
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
      <th>Links</th>
    </tr>
    <?php
      foreach ($peliculas as $pelicula) {
        $title = str_replace("'","@", $pelicula[0]);
        echo "<tr>
        <td>$pelicula[0]</td>
        <td>
          <form action='../consultas/consulta_peliculas.php' method='post'>
            <input type='hidden' name='title' value='$title' >
            <input type='submit' value='Más detalles' >
          </form>
        </td>
        </tr>";
      }
    ?>
	</table>

  <?php include('../templates/footer.html'); ?>
</body>

