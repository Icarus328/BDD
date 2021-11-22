<head>
<link href="../styles/estilos.css" rel="stylesheet">
</head>

<body> 
    
    <?php
        require("../config/conexion.php");
        $id_pelicula = $_POST["pelicula"];
        $query = "SELECT DISTINCT titulo, duracion, clasificacion, puntuacion, año, nombre, costo
        FROM peliculas, proveedores, prov_pel
        WHERE prov_pel.pid=peliculas.pid
        AND prov_pel.pro_id=proveedores.id
        AND peliculas.pid = '$id_pelicula';";
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
      <th>Proveedor</th>
      <th>Costo</th>
    </tr>
  
      <?php
        // echo $peliculas_gratis;
        foreach ($peliculas as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td><td>$p[6]</td></tr>";
      }
      ?>
      
  </table>
    <br>
    <br>

    <?php
        require("../config/conexion.php");
        $query = "SELECT DISTINCT proveedores.nombre, proveedores.id
        FROM peliculas, proveedores, prov_pel
        WHERE prov_pel.pid = peliculas.pid
        AND prov_pel.pro_id = proveedores.id
        AND peliculas.pid = '$id_pelicula'";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $proveedores = $result -> fetchAll();
        ?>
  
    <form action= 'consulta_compra_peliculas.php' method='post'>
            Seleccione el proveedor al que desea comprar:
        <select name='id_proveedor'>
            <?php foreach ($proveedores as $proveedor) {
                echo "<option value='$proveedor[1]'>$proveedor[0]</option>";
            }
            ?>
        </select>
        <?php
        echo "<input type='hidden' name='id_pelicula' value='$id_pelicula' required='required'>"
        ?>
        <input type="submit" value="Comprar a este proveedor">
    </form>   

    <form>
        <input type="button" value="Atras" onclick="history.back()">
    </form>
</body>