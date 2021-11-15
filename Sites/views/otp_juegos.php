<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>

    <?php
        require('../config/conexion.php');
        $query = "SELECT DISTINCT videojuegos.titulo, videojuegos.fecha_de_lanzamiento, videojuegos.puntuacion, videojuegos.clasificacion, proveedores.nombre, cdp.tipo_venta, cdp.precio
        FROM codigos_pagos AS cdp, videojuegos, proveedores
        WHERE cdp.id_proveedor = proveedores.id
        AND cdp.id_videojuego = videojuegos.id
        ORDER BY videojuegos.titulo";
        $result = $db_par -> prepare($query);
        $result -> execute();
        $juegos = $result -> fetchAll();
    ?>

    <h1> One Time Purchases: </h1>
    <h3> Mostrando todos los juegos y los proveedores que los ofrecen. </h2>


  <table>
    <tr>
      <th>Nombre</th>
      <th>Fecha de Lanzamiento</th>
      <th>Puntuación</th>
      <th>Clasificación</th>
      <th>Proveedor</th>
      <th>Tipo de venta</th>
      <th>Precio</th>
    </tr>
    <?php
      foreach ($juegos as $juego) {
        echo "<tr><td>$juego[0]</td><td>$juego[1]</td><td>$juego[2]</td><td>$juego[3]</td><td>$juego[4]</td><td>$juego[5]</td><td>$juego[6]</td></tr>";
      }
    ?>
	</table>


  <?php include('../templates/footer.html'); ?>
</body>


