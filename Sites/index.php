<html>
  
<head>
  <link href="styles/estilos.css" rel="stylesheet">
  <?php include('templates/header.html');   ?>
</head>


<body>


  <form method="POST" action="profile.php">
    <input type="submit" value="Ver Perfil"/>
  </form>

  <form method="POST" action="register.php">
    <input type="submit" value="Registrarse"/>
  </form>

  <h1 align="center">Prime Max </h1>
  <h2 style="text-align:center;">Aquí podrás encontrar consultas sobre tus plataformas favoritas (o no) </h2>

  <br>

  <h3 align="center"> Estas son todas las peliculas gratis junto con sus proveedores!</h3>
  <form align="center" action="consultas/consulta_1.php" method="post">
  <input type="submit" value="Mostrar!">
 </form>
  <br>
  <br>
  <br>

  <h3 align="center"> Muestrame todas las series que tengan </h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <input type="text" name="n_temporadas">
    <h3> temporadas o más </h3>
    <input type="submit" value="Mostrar!">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Muestrame el contenido interactivo audiovisual que contenga</h3> 

  <form align="center" action="consultas/consulta_3.php" method="post">
    <input type="text" name="str">
    <h3 align="center"> en el nombre y los proveedores que lo ofrecen</h3>
    <input type="submit" value="Mostrar!">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Muestrame todas las peliculas que pertenezcan al genero</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT genero FROM gen_sub;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_4.php" method="post">
    <select name="genero">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value='$d[0]'>$d[0]</option>";
      }
      ?>
    </select>
  <h3 align="center"> o a alguno de sus subgeneros</h3>
    <input type="submit" value="Mostrar!">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center">Muestrame todas las peliculas disponibles para mi DCCompañero cuyo username es</h3>

  <form align="center" action="consultas/consulta_5.php" method="post">
    <input type="text" name="username">
    <br/><br/>   
    <input type="submit" value="Mostrar!">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">En el ultimo año, mi DCCompañero de username</h3>

<form align="center" action="consultas/consulta_6.php" method="post">
  <input type="text" name="username">
  <h3 align="center">ha visto más de un capitulo de las series a continuación listadas en ningún orden en especifico</h3>
  <input type="submit" value="Mostrar!">
</form>
<br>
<br>
<br>

<h3 align="center"> Muestrame la cantidad de numerario que cada Dccompañero ha malgastado en peliculas que no se veian incluidas de forma gratuita en sus planes de subscripcion</h3>
<form align="center" action="consultas/consulta_7.php" method="post">  
  <input type="submit" value="Mostrar!">
</form>
  <br>
  <br>
  <br>

  <br>
</body>
</html>
