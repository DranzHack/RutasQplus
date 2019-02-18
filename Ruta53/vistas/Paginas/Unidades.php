<?php
    session_start();

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['privilegio']=='Unidad')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }
    else{
        session_destroy();
        header('location: ../../'); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unidades</title>
    <?php require_once '../Recursos/head.php' ?>
    <link rel="stylesheet" href="../css/Estilos.css">
    <!--<link rel="shortcut icon" href="../../img/Chofer.jpg" />-->
</head>
<body>
   <div class="section">
   	<?php require_once '../Recursos/NavBarUnidades.php' ?>
   	<?php require_once '../Recursos/footer.php' ?>
   </div>

    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
</body>
</html>