<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $n = $_POST["n_temporadas"];

 	$query = "SELECT DISTINCT series.titulo, duracion, clasificacion, puntuacion, año
            FROM series, capitulos 
            WHERE capitulos.sid=series.sid 
            AND capitulos.numero=$n;";
	$result = $db -> prepare($query);
	$result -> execute();
	$series = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Titulo</th>
      <th>Duracion</th>
      <th>Clasificacion</th>
      <th>Puntuacion</th>
      <th>Año</th>
    </tr>
  <?php
	foreach ($series as $s) {
  		echo "<tr><td>$s[0]</td><td>$s[1]</td><td>$s[2]</td><td>$s[3]</td><td>$s[4]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
