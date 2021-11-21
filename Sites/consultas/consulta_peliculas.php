<head>
<link href="../styles/estilos.css" rel="stylesheet">
</head>

<body> 
    
    <?php
        require("../config/conexion.php");
        $titulo = $_POST["title"];
        $titulo = str_replace("@","''", $titulo);
        $query = "SELECT DISTINCT titulo, duracion, clasificacion, puntuacion, año, genero, nombre, costo
        FROM peliculas, proveedores, prov_pel
        WHERE prov_pel.pid=peliculas.pid
        AND prov_pel.pro_id=proveedores.id
        AND peliculas.titulo = '$titulo';";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $peliculas = $result -> fetchAll();
        ?>


    <h1 align='center'> Viendo más información </h1>

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
    <br>
    <br>

    <form>
        <input type="button" value="Atras" onclick="history.back()">
    </form>
</body>