<html>

<head>
  <link href="styles/estilos.css" rel="stylesheet">
  <?php include('templates/header.html');   ?>
</head>


<body>
<div class="signup-form">
  <form action="register_controller.php" method="post">
		<h2>Registrandose</h2>
		<p>Crea tu cuenta</p>
    <div class="form-group">
	    <div class="row">
		    <div class="col">
          <input type="text" name="first_name" placeholder="First Name" required="required">
         </div>
			  <div class="col">
          <input type="text" name="last_name" placeholder="Last Name" required="required">
        </div>
      </div>
    </div>
    <div class="form-group">
    	<input type="text" name="username" placeholder="Username" required="required">
    </div>
    <div class="form-group">
      <input type="text" name="email" placeholder="Email" required="required">
    </div>
		<div class="form-group">
      <input type="text" name="pass" placeholder="Password" required="required">
    </div>
		<div class="form-group">
      <input type="text" name="cpass" placeholder="Confirm Password" required="required">
    </div>
    <br>
		<div class="form-group">
      <input type="submit" name="save" value="Registrarse"></input>
    </div>
    <br>
    <div class="text-center">Ya tienes una cuenta? 
      <a href="login.php">Inicia sesion!</a>
    </div>
  </form>
	
</div>


  <form method="POST" action="index.php">
    <input type="submit" value="Volver"/>
  </form>

</body>

</html>
