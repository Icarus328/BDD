<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $query = "SELECT nombre, mail, username, SUM(precio) AS monto
            FROM  usuarios, pagos_pel, prov_pel
            WHERE usuarios.id=pagos_pel.uid
            AND pagos_pel.pro_id=prov_pel.pro_id 
            AND pagos_pel.pid=prov_pel.pid 
            GROUP BY nombre, mail, username;";

  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Username</th>
      <th>Dinero malgastado</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>


