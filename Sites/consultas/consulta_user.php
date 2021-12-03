<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $username = $_POST["username"];
  $query = "SELECT DISTINCT usuarios.username, 'Comprada' AS Obtencion, peliculas.titulo, duracion, clasificacion, puntuacion, año, genero
            FROM usuarios, peliculas, pagos_pel
            WHERE usuarios.username='$username' 
            AND (usuarios.id=pagos_pel.uid AND peliculas.pid=pagos_pel.pid)
            UNION
            SELECT DISTINCT usuarios.username, 'Suscripcion' AS Obtencion, peliculas.titulo, duracion, clasificacion, puntuacion, año, genero
            FROM usuarios, peliculas, prov_pel, pagos_sub, subs
            WHERE usuarios.username='$username'
            AND (usuarios.id=subs.uid AND subs.pro_id=prov_pel.pro_id AND prov_pel.pid = peliculas.pid AND precio = 0)
            AND (pagos_sub.uid = usuarios.id AND pagos_sub.subs_id = subs.id)
            AND (subs.estado= 'activa' OR (subs.estado = 'cancelada' AND fecha_termino > CAST(CURRENT_TIMESTAMP AS DATE)));";

  $result = $db -> prepare($query);
  $result -> execute();
  $pelicula = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Nombre</th>
      <th>Metodo</th>
      <th>Titulo</th>
      <th>Duracion</th>
      <th>Clasificacion</th>
      <th>Puntuacion</th>
      <th>Año</th>
      <th>Genero</th>
    </tr>
  <?php
  foreach ($pelicula as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td><td>$p[6]</td><td>$p[7]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
