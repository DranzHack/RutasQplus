<?php
    session_start();

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['privilegio']=='Administrador')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }else{
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
    <title>Recorridos Unidad</title>
    <link rel="stylesheet" href="../css/Estilos.css">
    <?php require_once '../Recursos/head.php' ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

</head>
<body>

    <div class="section">
        <?php require_once '../Recursos/navbarRuta.php' ?>
        <form id="DatosAlv">
                    <select class="form-control" name="unidad" id="unidad">
                        <?php require_once '../../controlador/ComboUnidades.php'; ?>
                    </select>
        </form>
        <div id = "map"> </div>
        <?php require_once '../Recursos/footer.php' ?>
    </div>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAWY2yv9Y9aJKB3oQsYYH0f0mVCHUGdPUY&callback=initMap"> </script>
    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/PorEquipo.js"></script>
    
</body>
</html>