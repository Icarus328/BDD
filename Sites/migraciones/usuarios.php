<?php
  require("../config/conexion.php");

  function contraseña_par($username, $horas)
  {
      $userlen = strlen($username);
      $letras_a_eliminar = rand(0, floor($userlen/2));
      $parte_1_pass = substr($username, 0, ($userlen - $letras_a_eliminar));
      $parte_2_pass = rand(0, ceil($horas));
      $parte_2_pass = strval($parte_2_pass);
      $pass = $parte_1_pass . $parte_2_pass;
      return $pass;
  }

  function contraseña_impar()
  {
  return rand(100000000, 999999999);
  }

  $query = "SELECT DISTINCT id
  FROM usuarios";

    $result = $db_impar -> prepare($query);
    $result -> execute();
    $id_impares = $result -> fetchAll();

    foreach ($id_impares as $id_usuario_impar) {
        $id_usuario_impar_update = $id_usuario_impar[0];
        $new_pass_impar = contraseña_impar();
        echo nl2br("el usuario de id $id_usuario_impar_update, tendra contraseña $new_pass_impar");
        $query = "UPDATE usuarios 
        SET password=$new_pass_impar
        WHERE id = $id_usuario_impar_update";

        $result = $db_impar -> prepare($query);
        $result -> execute();
        
    }
    





  $query = "SELECT DISTINCT id_usuario
  FROM horas_jugadas";

  $result = $db_par -> prepare($query);
  $result -> execute();
  $horas_jugadas = $result -> fetchAll();

  foreach ($horas_jugadas as $datos_de_usuario) {
      $id_usuario = $datos_de_usuario[0];

        $query = "SELECT SUM(horas)
        FROM horas_jugadas
        WHERE id_usuario = $id_usuario";

        $result = $db_par -> prepare($query);
        $result -> execute();
        $horas_totales = $result -> fetchAll();

        $horas_totales_de_usuario = $horas_totales[0][0];

        $query = "SELECT username
        FROM usuarios
        WHERE id = $id_usuario";

        $result = $db_par -> prepare($query);
        $result -> execute();
        $usernames = $result -> fetchAll();

        $name_of_user = $usernames[0][0];
    
        $new_pass = contraseña_par($name_of_user, $horas_totales_de_usuario);

        $query = "SELECT *
        FROM usuarios
        WHERE id = $id_usuario";

        $result = $db_par -> prepare($query);
        $result -> execute();
        $user_data = $result -> fetchAll();

        $nombre = $user_data[0][2];
        $mail = $user_data[0][3];

        $id_usuario_par = $id_usuario + 147;

        $query = "INSERT INTO usuarios
        VALUES ($id_usuario_par, '$nombre', '$mail', '$new_pass', '$name_of_user')";

        $result = $db_impar -> prepare($query);
        $result -> execute();
        
        
        

  }
      

?>
