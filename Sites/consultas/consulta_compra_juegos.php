<?php 
  session_start();
  $user_logged = $_SESSION['user_logged'];
?>

<head>
<link href="../styles/estilos.css" rel="stylesheet">
<?php
    $id_usuario = $user_logged[3];
?>
</head>

<body> 
    
    <?php
        require("../config/conexion.php");

        $id_juego = $_POST["id_juego"];
        $id_proveedor = $_POST["id_proveedor"];

        $query = "SELECT cdp.id, CURRENT_TIMESTAMP
        FROM videojuegos, codigos_pagos AS cdp
        WHERE cdp.id_videojuego = videojuegos.id
        AND cdp.id_proveedor = '$id_proveedor'
        AND videojuegos.id = '$id_juego';";
        $result = $db_par -> prepare($query);
        $result -> execute();
        $codigo = $result -> fetch();

        $query = "SELECT id FROM pagos_videojuegos ORDER BY id DESC LIMIT 1;";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $last_id = $result -> fetchAll();
        $new_id = $last_id[0][0]+1;


        $query = "SELECT DISTINCT cdp.id_videojuego
        FROM pagos, codigos_pagos AS cdp
        WHERE pagos.id_codigo = cdp.id
        AND cdp.id_videojuego = '$id_juego'
        AND pagos.id_usuario = '$id_usuario';";
        $result = $db_par -> prepare($query);
        $result -> execute();
        $juego_comprado_par = $result -> fetchAll();

        $query = "SELECT DISTINCT cdp.id_videojuego
        FROM pagos_videojuegos AS pagos, codigos_pagos AS cdp
        WHERE pagos.id_codigo = cdp.id
        AND cdp.id_videojuego = '$id_juego'
        AND pagos.id_usuario = '$id_usuario';";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $juego_comprado_impar = $result -> fetchAll();

        
        if (count($juego_comprado_par)+count($juego_comprado_impar)==0){
            $query="INSERT INTO pagos_videojuegos(id, id_usuario, id_codigo, fecha )
            VALUES ('$new_id' ,'$id_usuario', '$codigo[0]', '$codigo[1]' )";
            $result = $db_impar -> prepare($query);
            $result -> execute();
            echo $query;

            $query="INSERT INTO pagos(id, id_usuario, id_codigo, fecha )
            VALUES ('$new_id' ,'$id_usuario', '$codigo[0]', '$codigo[1]' )";
            $result = $db_par -> prepare($query);
            $result -> execute();
            echo $query;

        } else {
            echo "El juego ya lo has comprado";
        };

    ?>
</body>