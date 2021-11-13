<head>
	<link href="../styles/estilos.css" rel="stylesheet">
	<?php include('../templates/header.html');?>
</head>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$genero = $_POST["genero"];

 	$query = "SELECT DISTINCT titulo, peliculas.genero
	 		  FROM peliculas, gen_sub
			  WHERE (peliculas.genero = '$genero')
			  OR (gen_sub.genero = '$genero' AND peliculas.genero = gen_sub.subgenero);";
	
	#"SELECT titulo 
	# 		  FROM peliculas, gen_sub 
	#		  WHERE (peliculas.genero=$genero) 
	#		  OR (gen_sub.genero=$genero AND peliculas.genero=gen_sub.subgenero);";


	$result = $db -> prepare($query);
	$result -> execute();
	$peliculas = $result -> fetchAll();
  ?>
	<table>
    <tr>
      <th>Titulo</th>
	  <th>Genero</th>
    </tr>
  <?php
	foreach ($peliculas as $p) {
  		echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
