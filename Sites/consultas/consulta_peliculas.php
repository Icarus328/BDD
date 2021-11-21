<head>
<link href="../styles/estilos.css" rel="stylesheet">
</head>

<body> 
    
    <?php
        require("../config/conexion.php");
        $titulo = $_POST["title"];
        $titulo = str_replace("@","''", $titulo);
        $query = "SELECT DISTINCT titulo, duracion, clasificacion, puntuacion, año, nombre, costo
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
        $titulo = $_POST["title"];
        $titulo = str_replace("@","''", $titulo);
        $query = "SELECT DISTINCT nombre
        FROM peliculas, proveedores, prov_pel
        WHERE prov_pel.pid=peliculas.pid
        AND prov_pel.pro_id=proveedores.id
        AND peliculas.titulo = '$titulo';";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $proveedores = $result -> fetchAll();
        ?>
  
    <form action= 'consulta_compra.php' method='post'>
            Seleccione el proveedor al que desea comprar:
        <select name=tipo>
            <?php foreach ($proveedores as $proveedor) {
                echo "<option value=$proveedor[0]>$proveedor[0]</option>";
            }
            ?>

            <input type="submit" value="Comprar a este proveedor">
    </form>   

    <form>
        <input type="button" value="Atras" onclick="history.back()">
    </form>
</body>