<head>
<link href="../styles/estilos.css" rel="stylesheet">
</head>

<body> 
    
    <?php
        require("../config/conexion.php");
        $titulo = $_POST["juego"];
        $titulo = str_replace("@","''", $titulo);
        $query = "SELECT DISTINCT videojuegos.titulo, videojuegos.fecha_de_lanzamiento, videojuegos.puntuacion, videojuegos.clasificacion, proveedores.nombre, cdp.tipo_venta, cdp.precio
        FROM codigos_pagos AS cdp, videojuegos, proveedores
        WHERE cdp.id_proveedor = proveedores.id
        AND cdp.id_videojuego = videojuegos.id
        AND videojuegos.titulo = '$titulo' 
        ORDER BY videojuegos.titulo, proveedores.nombre"; 

        $result = $db_par -> prepare($query);
        $result -> execute();
        $juegos = $result -> fetchAll();
    ?>


    <h1 align='center'> Viendo más información </h1>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha de lanzamiento</th>
            <th>Puntuacion</th>
            <th>Clasificacion</th>
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
    <br>
    <br>


    <?php
        require("../config/conexion.php");
        $query = "SELECT DISTINCT proveedores.nombre
        FROM codigos_pagos AS cdp, videojuegos, proveedores
        WHERE cdp.id_proveedor = proveedores.id
        AND cdp.id_videojuego = videojuegos.id
        AND videojuegos.titulo = '$titulo' 
        ORDER BY proveedores.nombre"; 

        $result = $db_par -> prepare($query);
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