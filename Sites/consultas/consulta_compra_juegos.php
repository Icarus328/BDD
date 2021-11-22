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
        if (count($juego_comprado)==0){
            echo "Compraremos este juego";
        } else {
            echo "El juego ya lo has comprado";
        };
    ?>
</body>