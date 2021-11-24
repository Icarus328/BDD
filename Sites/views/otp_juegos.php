<head>
  <link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');?>
</head>

<body>

    <?php
        require('../config/conexion.php');
        $query = "SELECT DISTINCT videojuegos.titulo, videojuegos.id
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
      <th>Links</th>
    </tr>
    <?php
      foreach ($juegos as $juego) {
        echo "<tr>
        <td>$juego[0]</td>
        <td>
          <form action='../consultas/consulta_juegos.php' method='post'>
            <input type='hidden' name='juego' value='$juego[1]' >
            <input type='submit' value='Más detalles' >
          </form>
        </td>
        </tr>";
      }
    ?>
	</table>


  <?php include('../templates/footer.html'); ?>
</body>


