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

        $id_pelicula = $_POST["id_pelicula"];
        $id_proveedor = $_POST["id_proveedor"];

        $query = "SELECT id FROM pagos_videojuegos ORDER BY id DESC LIMIT 1;";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $last_id = $result -> fetchAll();
        $new_id = $last_id[0][0]+1;


        $query = "SELECT DISTINCT peliculas.titulo, peliculas.pid
        FROM peliculas, pagos_pel
        WHERE peliculas.pid = pagos_pel.pid
        AND pagos_pel.uid = '$id_usuario'
        AND peliculas.pid = '$id_pelicula' ";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $pelicula_comprada = $result -> fetchAll();

        
        $query = "SELECT DISTINCT CURRENT_TIMESTAMP, peliculas.pid
        FROM peliculas
        WHERE peliculas.pid = '$id_pelicula' ";
        $result = $db_impar -> prepare($query);
        $result -> execute();
        $codigo = $result -> fetch();

        if (count($pelicula_comprada)==0){
            $query = "INSERT INTO pagos_pel(pago_id ,fecha, uid, pid, pro_id)
            VALUES ('$new_id','$codigo[0]', '$id_usuario', '$codigo[1]', '$id_proveedor')";
            $result = $db_impar -> prepare($query);
            $result -> execute();
            echo $query;
        } else {
            echo "La pelicula ya la has comprado";
        };
    ?>
</body>