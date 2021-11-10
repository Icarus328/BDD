<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre = $_POST["str"];

 	$query = "SELECT titulo, 'Pelicula' AS tipo, duracion, clasificacion, puntuacion, año, nombre, costo
            FROM peliculas, proveedores, prov_pel
            WHERE peliculas.titulo ILIKE '%$nombre%'
            AND (peliculas.pid = prov_pel.pid AND prov_pel.pro_id = proveedores.id)
            UNION
            SELECT titulo, 'Serie' AS tipo, duracion, clasificacion, puntuacion, año, nombre, costo
            FROM series, proveedores, prov_ser
            WHERE series.titulo ILIKE '%$nombre%'
            AND (series.sid = prov_ser.sid AND prov_ser.pro_id = proveedores.id)";



	$result = $db -> prepare($query);
	$result -> execute();
	$multimedia = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Titulo</th>
      <th>Tipo</th>
      <th>Duracion</th>
      <th>Clasificacion</th>
      <th>Puntuacion</th>
      <th>Año</th>
      <th>Proveedor</th>
      <th>Costo</th>
    </tr>
  <?php
	foreach ($multimedia as $m) {
  		echo "<tr><td>$m[0]</td><td>$m[1]</td><td>$m[2]</td><td>$m[3]</td><td>$m[4]</td><td>$m[5]</td><td>$m[6]</td><td>$m[7]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
