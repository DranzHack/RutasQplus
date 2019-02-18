<?php
    session_start();

  if(!(isset($_SESSION['privilegio'])))
  {
    if(empty($_GET['skditucx23']) && empty($_GET['dfsfgtbtd']))
    {
      $email_incorrect = '';
      $alert = '';
    }
    else
    {
      $email_incorrect = $_GET['skditucx23'];
      $alert = '¿Eres'.$email_incorrect.'?.<br /> Escriba sus datos correctos porfavor.';
    }
  }
  ?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Ruta 53</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>

  <body class="text-center">

    <form id="login_form" class="form-signin" name="formulario_registro" onsubmit="return Login();">
      <img class="mb-4" src="../img/Ruta53.jpg" alt="" width="300" height="350">

      <label for="Usuario" class="sr-only">Usuario</label>
      <input name="Usuario" id="Usuario" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" name="Pass" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar usuario
        </label>
      </div>
      <br>
      <label id="alert" style='float: right; color: red;'>
      </label>
      <!--<a href="registrobases.php">Ingresar</a>-->
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; VicomNet  2018</p>
    </form>
  </body>

  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="../Ajax/login.js"></script>
</html>
