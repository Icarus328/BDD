<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $username = $_POST["username"];
  $query = "WITH vistas AS (
              SELECT series.titulo, duracion, clasificacion, puntuacion, año, COUNT(DISTINCT capitulos.titulo) AS capvistos
              FROM  usuarios, series, vis_cap, capitulos
              WHERE usuarios.username = '$username' AND vis_cap.uid=usuarios.id
              AND vis_cap.cid=capitulos.cid AND capitulos.sid=series.sid 
              AND EXTRACT(YEAR FROM vis_cap.fecha) = EXTRACT(YEAR FROM CURRENT_DATE)
              GROUP BY series.titulo, duracion, clasificacion, puntuacion, año)
            SELECT * FROM vistas WHERE capvistos >= 2;";

#WITH vistas AS (
#  SELECT series.titulo, COUNT(∗) AS capvistos
#  FROM  usuarios, series, vis_cap, capitulos
#  WHERE usuarios.username = 'lmoore1966' AND vis_cap.uid=usuarios.id
#  AND vis_cap.cid=capitulos.cid AND capitulos.sid=series.sid 
#  AND EXTRACT(YEAR FROM vis_cap.fecha) = EXTRACT(YEAR FROM CURRENT_DATE)
#  GROUP BY series.titulo)
#SELECT series.titulo, capvistos FROM vistas WHERE capvistos >= 2;";

  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Titulo</th>
      <th>Duracion</th>
      <th>Clasificacion</th>
      <th>Puntuacion</th>
      <th>Año</th>
      <th>Capitulos vistos</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>


