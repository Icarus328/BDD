<html>

<head>
<link href="../styles/estilos.css" rel="stylesheet">
  <?php include('../templates/header.html');   ?>
</head>


<body>
<div class="signup-form">
  <form action="../controllers/login_controller.php" method="post">
		<h2>Inicio de Sesión</h2>
		<p>Ingresa tu correo y contraseña</p>
    <div class="form-group">
	    <div class="row">
		    <div class="col">
          <input type="email" name="email" placeholder="Corre electrónico" required="required">
         </div>
			  <div class="col">
          <input type="password" name="password" placeholder="Contraseña" required="required">
        </div>
      </div>
    </div>
    <br>
		<div class="form-group">
      <input type="submit" name="save" value="Iniciar Sesión"></input>
    </div>
    <br>
    <div class="text-center">Aún  no tienes una cuenta?
      <a href="register.php">Registrate</a>
    </div>
  </form>
</div>

  <form method="POST" action="../index.php">
    <input type="submit" value="Volver"/>
  </form>

</body>
</html>