<?php
  require("../config/conexion.php");

  $query = "CREATE TABLE pagos_videojuegos(
  id INT PRIMARY KEY,
  id_usuario INT,
  id_codigo INT,
  fecha TIMESTAMP)";

	$result = $db_impar -> prepare($query);
	$result -> execute();


  $query = "CREATE TABLE codigos_pagos(
  id INT PRIMARY KEY,
  id_proveedor INT,
  id_videojuego INT,
  tipo_venta VARCHAR(50),
  precio INT)";

	$result = $db_impar -> prepare($query);
	$result -> execute();   

  $query = "SELECT *
   FROM pagos";

  $result = $db_par -> prepare($query);
  $result -> execute();
  $info_pagos = $result -> fetchAll();

  foreach ($info_pagos as $pago) {
    $id_pago = $pago[0];
    $id_usuario = $pago[1];
    $id_codigo = $pago[2];
    $fecha = $pago[3];

    $id_pago = $id_pago + 10745;
    $id_usuario = $id_usuario + 147;
    $query = "INSERT INTO pagos_videojuegos
    VALUES ($id_pago, $id_usuario, $id_codigo, '$fecha')";

    $result = $db_impar -> prepare($query);
    $result -> execute();
  }

  $query = "SELECT *
  FROM codigos_pagos";

  $result = $db_par -> prepare($query);
  $result -> execute();
  $codigos_pagos = $result -> fetchAll();

  foreach ($codigos_pagos as $codigo_pago) {
      $id = $codigo_pago[0];
      $id_proveedor = $codigo_pago[1];
      $id_videojuego = $codigo_pago[2];
      $tipo_venta = $codigo_pago[3];
      $precio = $codigo_pago[4];

      $query = "INSERT INTO codigos_pagos
      VALUES ($id, $id_proveedor, $id_videojuego, '$tipo_venta', $precio)";

      $result = $db_impar -> prepare($query);
      $result -> execute();

      

  }


  ?>


