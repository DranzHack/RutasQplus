<?php
    session_start();
    error_reporting(0);
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
    <title>Login Rutas Puebla</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  </head>

  <body class="text-center">
    <?php require_once dirname(__DIR__).'/controlador/checkRuta.php'; ?>
  </body>

  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="../Ajax/login.js"></script>
</html>


