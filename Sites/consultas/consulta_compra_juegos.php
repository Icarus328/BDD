<head>
<link href="../styles/estilos.css" rel="stylesheet">
<?php
    $id_usuario = '38';
?>
</head>

<body> 
    
    <?php
        require("../config/conexion.php");

        $id_juego = $_POST["id_juego"];
        $id_proveedor = $_POST["id_proveedor"];
        $query = "SELECT DISTINCT videojuegos.titulo, videojuegos.id
        FROM videojuegos, pagos, codigos_pagos AS cdp
        WHERE pagos.id_codigo = cdp.id
        AND cdp.id_videojuego = videojuegos.id
        AND pagos.id_usuario = '$id_usuario'
        AND videojuegos.id = '$id_juego';";
        $result = $db_par -> prepare($query);
        $result -> execute();
        $juego_comprado = $result -> fetchAll();
    ?>


    <?php
        require("../config/conexion.php");
        $query = "SELECT cdp.id, CURRENT_TIMESTAMP
        FROM videojuegos, codigos_pagos AS cdp
        WHERE cdp.id_videojuego = videojuegos.id
        AND cdp.id_proveedor = '$id_proveedor'
        AND videojuegos.id = '$id_juego';";
        $result = $db_par -> prepare($query);
        $result -> execute();
        $codigo = $result -> fetch();

        if (count($juego_comprado)==0){
            $query="INSERT INTO pagos(id_usuario, id_codigo, fecha )
            VALUES ($id_usuario, $codigo[0], $codigo[1])";
            echo $query;
        } else {
            echo "El juego ya lo has comprado";
        };
    ?>
</body>